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
</head>

<body class="">
    

<header class="">
    <p>Livraison GRATUITE dans toute L'EUROPE</p>
    
</header>

<main>
    <h1>E-success</h1>
    <nav>
        <ul class="">
            <li><a href="acceuil">ACCEUIL</a></li>
            <li><a href="#" class="">PRODUIT</a></li>

            <?php if($_SESSION['login']!='visiteur'): ?>

            <li><a href="#">MON COMPTE</a></li>
            <li><a href="user&action=logout">Se Deconnecter</a></li>

            <?php else :?>

            <li><a href="user&action=login">connexion</a></li>

            <?php endif; ?>

            <?php if(MyFct::isGranted('ADMIN_ROLE')): ?>

            <li><a href="">PARAMETRE</a>
            <ul><a href="user">USER</a></ul>
            <ul><a href="role">ROLE</a></ul>
            </li>

            <?php endif; ?>  

        </ul>
    </nav>
</main>

<div class="main">
    <?=$content?>
</div>

<footer>
    
    <p>CopyRight by A-Success</p>

    
</footer>


</body>
</html>