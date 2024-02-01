<?php
class RoleController{
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
        $file = '../View/role/file.html.php';
        $variables = [
            'title' => 'Roles',
            'table' => 'liste des roles'
        ];
        $page->generatePage($file, $variables);
    }
}