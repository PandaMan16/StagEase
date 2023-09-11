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
        if(isset($_GET['page'])){
            $this->urlName = $_GET['page'];
        }

        $this->template = new Template($this);
        $this->template->header();
        $this->template->menu();
        switch($this->urlName) {
            case "Login":
                $this->template->LoginForm();
                break;
            default:
                break;
        }
        $this->template->footer();
        // var_dump($this);
    }

}