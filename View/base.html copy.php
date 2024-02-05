<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./Public/style/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="./Public/style/bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./Public/style/style.css">
    <script src="./Public/style/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js" defer></script>
    <script src=".Public/style/bootstrap-5.3.2-dist/js/bootstrap.min.js" defer></script>
    <script src="./Public/js/myScript.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body class="d-flex flex-column ">
    <div class="">
        <div class="promo">
            <p>Livraison GRATUITE dans toute L'EUROPE🌎</p>
        </div>
        <!-- HEADER -->
        <header>

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">E SUCCESS</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- dddd -->
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="acceuil">Acceuil</a>
                            </li>
                            <!-- $_SESSION['login']!='visiteur' -->

                            <!-- caisse -->
                            <?php if (MyFct::isGranted('ROLE_CAISSE')) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="acceuil&action=produit">Produit</a>
                                </li>
                            <?php endif; ?>

                            <!-- sav  -->
                            <?php if (MyFct::isGranted('ROLE_SAV')) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="acceuil&action=client">Client</a>
                                </li>
                            <?php endif; ?>
                            <!-- else if -->

                            <!-- admin -->
                            <?php if (MyFct::isGranted('ROLE_ADMIN')) : ?>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Parametre
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="user">User</a></li>
                                        <li><a class="dropdown-item" href="role">Role</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (MyFct::isGranted('ROLE_USER')) : ?>
                                <!-- mon compte avec deconnexion quand on est connecté -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle bi bi-person-badge" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Mon Compte
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="user&action=logout">Se deconnecter</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                        </ul>
                        <form class="d-flex" role="search">
                            <!-- <a href="user&action=login">ttttttt</a> -->
                            <a href="user&action=login" class="btn btn-outline-success ">Se connecter ou s'inscrire</a>
                            <!-- <button class="btn btn-outline-success" type="submit" href="user&action=login">Connexion</button> -->
                        </form>
                        <!-- <li class="nav-item"><a class="nav-link" href="acceuil&action=create">INSCRIPTION</a></li> -->
                        </ul>
                        <!-- <div class="right">
                    <h1 class="text-dark"> E-SUCESS </h1>
                      </div> -->
                    </div>
            </nav>

            <!-- ---------------------------------------------- -->
            <!-- <nav
                class="navbar navbar-expand-lg navbar-light bg-light"
              >
                <div class="container">
                  <a class="navbar-brand" href="#">Navbar</a>
                  <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page"
                          >Home
                          <span class="visually-hidden">(current)</span></a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="#"
                          id="dropdownId"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >Dropdown</a
                        >
                        <div
                          class="dropdown-menu"
                          aria-labelledby="dropdownId"
                        >
                          <a class="dropdown-item" href="#"
                            >Action 1</a
                          >
                          <a class="dropdown-item" href="#"
                            >Action 2</a
                          >
                        </div>
                      </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                      <input
                        class="form-control me-sm-2"
                        type="text"
                        placeholder="Search"
                      />
                      <button
                        class="btn btn-outline-success my-2 my-sm-0"
                        type="submit"
                      >
                        Search
                      </button>
                    </form>
                  </div>
                </div>
              </nav> -->



            <!-- ---------------------------------------------- -->

        </header>
    </div>

    <main class="container-lg ">
        <?= $content ?>
    </main>

    <!--FOOTER -->
    <footer class="container-fluid py-5 fixed-bottoma">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24">
                    <title>Product</title>
                    <circle cx="12" cy="12" r="10" />
                    <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                </svg>
                <small class="d-block mb-3 text-body-secondary">&copy; 2023–2024</small>
                <H5>E-SUCCESS</H5>
                <p>Nous sommes une équipe de 4 personnes passionnées par le développement, et nous avons développé ce
                    site pour vendre des produits spécialisés dans le domaine du sport.</p>
            </div>
            <div class="col-6 col-md">
                <h5>Politique</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">Conditions générales de vente</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Politique de remboursement</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Politique de confidentialité</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">A propos de nous</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Politique d'expédition</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Nous contacter</h5>
                <p>Le service clientèle est ouvert du lundi au dimanche de 9h à 18h.</p>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">contact@essuccess.com</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">24/7</a></li>
                    <form action="envoyer_mail.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Abonnez-vous à nos emails :</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Besoin d'aide ?</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary text-decoration-none" href="#">Suivre vos commandes</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Service Client</a></li>
                    <li><a class="link-secondary text-decoration-none" href="#">Methode de paiement</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>