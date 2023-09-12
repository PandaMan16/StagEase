<?php

class User extends Bdd{
    
    private $user;

    public function __construct(int $id = null) {
        if($id!= null){
            $query = $this->Connect()->prepare("SELECT * FROM identifiant WHERE id = ?");
            $query->bindValue(1, $id, PDO::PARAM_INT);
            $query->execute();
            $this->user = $query->fetch();
        }
    }

    private function encriptPassword(string $password){
        return password_hash("Panda".$password, PASSWORD_DEFAULT);
    }
    
    private function comparepassword(string $password, string $password_db){
        return password_verify("Panda".$password, $password_db);
    }

    public function Register(string $email, string $password,string $password2,string $nom, string $prenom){
        //check password
        if($password == $password2 && $password != ""){
            //check email already exist
            $query = $this->Connect()->prepare("SELECT COUNT(id) FROM identifiant WHERE email = ?");
            $query->bindParam(1, $email, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch();
            if($result['COUNT(id)'] == 0){
                //register user
                $query = $this->Connect()->prepare("INSERT INTO identifiant(email, password, nom, prenom) VALUES(?,?,?,?)");
                $encriptpass = $this->encriptPassword($password);
                $query->bindParam(1, $email, PDO::PARAM_STR);
                $query->bindParam(2, $encriptpass, PDO::PARAM_STR);
                $query->bindParam(3, $nom, PDO::PARAM_STR);
                $query->bindParam(4, $prenom, PDO::PARAM_STR);
                $query->execute();
                return array("error" => false, "message" => "Votre compte a bien été créé!");
            }else{
                return array("error" => true , "message" => "Email exist deja");
            }
        }else{
            return array("error" => true, "message" => "Les mots de passe ne correspondent pas.");
        }
    }

    public function Login(string $email, string $password){
        if($password != ""){
            //get user by email
            $query = $this->Connect()->prepare("SELECT * FROM identifiant WHERE email =? ");
            $query->bindParam(1, $email, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetch();
            if($result!= null){
                //check password
                if($this->comparepassword($password, $result['password'])){
                    return array("error" => false, "message" => "vous etes connecté!", "user" => $result);
                }else{
                    return array("error" => true, "message" => "Mot de passe incorrect");
                }
            }else{
                return array("error" => true, "message" => "Email incorrect");
            }
        }else{
            return array("error" => true, "message" => "Veuillez saisir un mot de passe");
        }
    }
}