<?php

class Template{
    private $route;

    public function __construct($route){
        $this->route = $route;
    }

    public function header(){?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./assets/css/index.css">
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
            <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
            <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.css">
            <title>StagEase | <?php echo $this->route->getUrlName(); ?></title>
        </head>
        <body>
    <?php }
    public function modal(){?>
        <div id="modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    <?php }
    public function menu(){?>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">StagEase</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link active" href="/">Accueil
                        <!-- <span class="visually-hidden">(current)</span> -->
                    </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto">
                        <?php 
                            if($this->route->isLogin()){?>
                                <li><a href="/Planning" class="nav-link">Planning</a></li>
                                <li><a href="/Logout" class="nav-link">Deconnexion</a></li>
                            <?php }else{ ?>
                                <li><a href="/Login" class="nav-link">Login</a></li>
                                <li><a href="/Register" class="nav-link">Register</a></li>
                            <?php }
                        ?>
                    </ul>
                </form>
                </div>
            </div>
        </nav>
    <?php }

    public function footer(){?>
        <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="./assets/js/index.js"></script>
    <?php }

    public function LoginForm(){?>
        <form action="" method="post" class="d-flex flex-column container-fluid col-10 col-sm-8 col-md-6 m-5">
            <legend>Connexion</legend>
            <div class="form-group row" style="width: 100%;">
                <label for="Email" class="col-form-label align-middle">Email</label>
                <div class="codl-sm-10">
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="email@example.com">
                </div>
            </div>
            <div class="form-group row" style="width: 100%;">
                <label for="Password" class="col-form-label align-middle">Mot de passe</label>
                <div class="codl-sm-10">
                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Votre mot de passe">
                </div>
            </div>
            <hr>
            <div class="form-group row" style="width: 100%;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Connexion</button>
            </div>
        </form>
    <?php }

    public function RegisterForm(){?>
        <form action="" method="post" class="d-flex flex-column container-fluid col-10 col-sm-8 col-md-6 m-5">
            <legend>Inscription</legend>
            <div class="form-group row" style="width: 100%;">
                <label for="Email" class="col-form-label align-middle">Email</label>
                <div class="codl-sm-10">
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="email@example.com">
                </div>
            </div>
            <div class="form-group row" style="width: 100%;">
                <label for="r_nom" class="col-form-label align-middle">Nom</label>
                <div class="codl-sm-10">
                    <input type="text" class="form-control" name="r_nom" id="r_nom" placeholder="Nom">
                </div>
            </div>
            <div class="form-group row" style="width: 100%;">
                <label for="r_prenom" class="col-form-label align-middle">Prenom</label>
                <div class="codl-sm-10">
                    <input type="text" class="form-control" name="r_prenom" id="r_prenom" placeholder="Prenom">
                </div>
            </div>
            <div class="form-group row" style="width: 100%;">
                <label for="Password" class="col-form-label align-middle">Mot de passe</label>
                <div class="codl-sm-10">
                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Votre mot de passe">
                </div>
            </div>
            <div class="form-group row" style="width: 100%;">
                <label for="Password2" class="col-form-label align-middle">Mot de passe</label>
                <div class="codl-sm-10">
                    <input type="password" class="form-control" name="Password2" id="Password2" placeholder="Repeter votre mot de passe">
                </div>
            </div>
            <hr>
            <div class="form-group row" style="width: 100%;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Inscription</button>
            </div>
        </form>
    <?php }

    public function loadplanning(){?>
        <!-- <button type="button" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal">Primary</button> -->
        <div class="container-fluid d-flex justify-content-center">
            <div id="calendar" class="col-8 h-25"></div>
        </div>
    <?php }
}