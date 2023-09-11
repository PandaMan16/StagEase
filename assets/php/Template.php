<?php

class Template{
    private $route;

    public function __construct($route){
        $this->route = $route;
    }

    public function header(){ ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://bootswatch.com/5/morph/bootstrap.css">
            <link rel="stylesheet" href="./assets/css/index.css">
            <title>StagEase | <?php echo $this->route->getUrlName(); ?></title>
        </head>
        <body>
            
        </body>
        </html>
    <?php }

    public function menu(){?>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
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
                                <!--  -->
                            <?php }else{ ?>
                                <li><a href="?page=Login" class="nav-link">Login</a></li>
                                <li><a href="?page=Register" class="nav-link">Register</a></li>
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

    public function LoginForm(){ ?>
        <form action="" method="post" class="d-flex flex-column container-fluid col-10 col-sm-8 col-md-6 m-5">
            <div class="form-group row">
                <label for="Email" class="col-sm-2 col-form-label align-middle">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="Email" id="Email" placeholder="email@example.com">
                </div>
            </div>
            <div class="form-group row">
                <label for="Password" class="col-sm-2 col-form-label align-middle">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Votre mot de passe">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
        </form>
    <?php }
}