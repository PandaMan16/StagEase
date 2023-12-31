<?php

class Routes extends Bdd{

    private $template;
    private $urlName = "Accueil";
    private $user;

    public function getUrlName(){
        return $this->urlName;
    }

    public function isLogin(){
        if(empty($this->user)){
            return false;
        }else{
            return true;
        }
    }

    public function __construct(){
        $logg = "";
        if(isset($_SESSION['id'])){
            $this->user = new User($_SESSION['id']);
            $planning = new Planning($_SESSION['id']);
        }
        if(isset($_GET['page'])){
            $this->urlName = $_GET['page'];
        }
        switch ($this->urlName){
            case 'Logout':
                $this->user = null;
                session_destroy();
                header("Location: /");
            case 'Register':
                if(isset($_POST['Email']) && isset($_POST['r_nom']) && isset($_POST['r_prenom']) && isset($_POST['Password']) && isset($_POST['Password'])){
                    $user = new User();
                    $user->Register($_POST['Email'], $_POST['Password'], $_POST['Password2'], $_POST['r_nom'], $_POST['r_prenom']);
                    header("Location: /Login");
                }
                break;
            case 'Login':
                if(isset($_POST['Email']) && isset($_POST['Password'])){
                    $user = new User();
                    $result = $user->Login($_POST['Email'], $_POST['Password']);
                    if($result["error"] == false){
                        $this->user = $result["user"];
                        $_SESSION['id'] = $this->user['id'];
                        header("Location: /Accueil");
                    }
                }
                break;
            case 'Planning/Add':
                $result = $planning->addPlanning($_POST['f_date'],$_POST['f_start'],$_POST['f_end'],$_POST['f_name'],$_POST['f_entreprise'],$_POST['f_adresse'],$_POST['f_c_postal'],$_POST['f_ville'],$_POST['f_tel']);
                $this->urlName = "Planning";
                header("Location: /Planning");
                break;
            case 'Accueil':
                break;
            default:
                break;
        }
        $this->template = new Template($this);
        $this->template->header();
        $this->template->modal();
        $this->template->menu();
        switch($this->urlName) {
            case "Login":
                $this->template->LoginForm();
                break;
            case "Register":
                $this->template->RegisterForm();
                break;
            case "Planning":
                $this->template->loadplanning();
            default:
                break;
        }
        $this->template->footer();
        // var_dump($this);
    }

}