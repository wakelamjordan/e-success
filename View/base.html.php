<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./Public/style/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="./Public/style/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./Public/style/style.css">
    <script src="../Public/style/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body class="">

    <header class="position-fixeda vw-100">
        <nav class="navbar navbar-expand-md navbar-light bg-light p-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fas fa-laptop display-3"></i></a>

                <div class="d-flex flex-row-reverse align-items-baseline">
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <h1 class="h4 d-md-none mx-3">nom</h1>
                </div>

                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">Acceuil <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Client</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Liste</a>
                                <a class="dropdown-item" href="#">Ajout client</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Article</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Liste</a>
                                <a class="dropdown-ite" href="#">Ajout article</a>
                            </div>
                        </li>
                    </ul>

                    <!-- -----------------inscription sur pett écran -->

                    <div class="d-md-none">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Login</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Mot de passe</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                                </div>
                            </div>

                            <small id="helpId" class="form-text text-muted p-1"><a href="">Récupération mot de passe</a></small>
                            <div class="">
                                <button type="submit" class="btn btn-primary w-100 m-1">
                                    Connection
                                </button>
                                <a name="" id="" class="btn btn-primary w-100 m-1" href="#" role="button">S'inscrire</a>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex">
                        <h1 class="h4 d-none d-md-block mx-3 my-auto">nom</h1>
                    </div>

                    <div class="dropdown open d-none d-md-block">
                        <a class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end w_" aria-labelledby="triggerId">
                            <form action="" method="">
                                <div class="d-flex row-cols-2">
                                    <div class="p-1">
                                        <label for="" class="form-label">Login</label>
                                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="" />
                                    </div>

                                    <div class="p-1">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="" id="" placeholder="" />
                                    </div>
                                </div>
                                <small id="helpId" class="form-text text-muted p-1"><a href="">Récupération mot de passe</a></small>
                                <div class="row-cols-1 w-100 p-1">
                                    <button type="submit" class="btn btn-primary">
                                        Connection
                                    </button>
                                </div>
                            </form>
                            <div class="w-100 p-1 col-1">
                                <a name="" id="" class="btn btn-primary w-100" href="#" role="button">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>



    <!-- <header class="">
    <p>Livraison GRATUITE dans toute L'EUROPE</p>
    
</header> -->

    <main>
        <h1>E-success</h1>
        <nav>
            <ul class="">
                <li><a href="acceuil">ACCEUIL</a></li>
                <li><a href="#" class="">PRODUIT</a></li>
                <li><a href="#">MON COMPTE</a></li>
                <li><a href="">PARAMETRE</a>
                    <ul><a href="user">USER</a></ul>
                    <ul><a href="role">ROLE</a></ul>
                </li>
            </ul>
        </nav>
    </main>

    <div class="main">
        <?= $content ?>
    </div>

    <footer>

        <p>CopyRight by A-Success</p>


    </footer>


</body>

</html>