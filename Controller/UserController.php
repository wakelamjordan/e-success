<?php
class UserController
{
    function __construct()
    {
        // par defaut on met action sur liste
        $action = 'liste';
        // on extract get pour avoir l'action si jamais elle est renseigné dans l'url
        extract($_GET);
        // et on switch sur cette action
        switch ($action) {
            // à défaut quelque soit ce qui sera rentré comme action la méthode liste sera appliqué
            default:
                $this->liste();
        }
    }

    function liste()
    {
        $page = new MyFct;
        // dans file on va préparer notre tableau pour acceuillir la liste
        $file = '../View/user/file.html.php';
        // dans variable il faudra les différentes variables nécéssaire à file pour créer le tableau
        // pour obtenir ces variables on a besoin de requêter la bdd
        // il nous faudra l'id de user, username, datecréation, ses roles et sa photo
        //test requêtage
        $variables = [
            'title' => 'User',
            'table' => 'liste des user'
        ];
        $page->generatePage($file, $variables);
    }
}
