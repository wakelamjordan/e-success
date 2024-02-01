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
    <script src="../Public/js/myScript.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

</head>
<!--NAVBAR-->
<div class="promo">
    <p>Livraison GRATUITE dans toute L'EUROPE🌎</p>
</div>

<!--LIEN UTILE-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="acceuil">ACCEUIL</a></li>
            <li class="nav-item"><a class="nav-link" href="acceuil">PRODUIT</a></li>
            <?php if($_SESSION['login']!='visiteur'): ?>
                
 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-togglea" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    MON COMPTE
                </a>
                <div class="dropdown-menuaa" aria-labelledby="navbarDropdown">
                    <a class="dropdown-itema" href="user&action=logout">se deconnecter</a>
                    <?php else :?>


                   
                    <li class="nav-item"><a class="nav-link" href="user&action=login">CONNEXION</a></li>
                    <?php endif; ?>
                    <?php if(MyFct::isGranted('ROLE_ADMIN')): ?>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-togglea" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    PARAMETRE
                </a>
                <div class="dropdown-menua" aria-labelledby="navbarDropdowna">
                    <a class="dropdown-item" href="user">USER</a>
                    <a class="dropdown-item" href="role">ROLE</a>
                </div>
            </li>

            <?php endif; ?>
            <li class="nav-item"><a class="nav-link" href="acceuil&action=create">INSCRIPTION</a></li>
        </ul>
        <div class="right">
            <h1 class="text-dark"> E-SUCESS </h1>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

</header>

<!--BODY-->
<body>
    <div class="main">
        <?=$content?>
    </div>

</body>

<!--FOOTER-->
<footer>
    <div class="w-50px">
    <i class="fa-brands fa-square-twitter"></i>
    <i class="fa-brands fa-square-facebook"></i>
</footer>

</html>