<?php

namespace App\Service\router;

class Route
{
    private $matches;
    private $params;



    public function __construct(
        private $path,
        private $callable,
    ) {
        $this->path = trim($path, '/'); //retirer les / en début et en fin de valeur $path
        // $this->callable=$callable; déjà réalisé en initiant la variables dans le paramétrage du constructeur (toujours pas intuitif mais économe X)
    }




    /** 
     * groupe de commentaire à voir je crois que c'était ce que je cherchais pour allimenter la documentation de mes fonctions dans vscode
     * match permet de capturer l'url avec les paramétres(les actiond je crois);
     **/
    public function match($url)
    {
        // on trim aussi l'url pour qu'elle puisse correspondre avec le path
        $url = trim($url, '/');
        // là c'est chaud, en gros quand j'ai une url qui serait user/:username ça remplacerai username par le deuxiéme paramétre ce qui permettra d'obtenir une un match avec l'url tout en gardant jordan...je crois
        //les expressions régulière ça casse la tête (mise en to do liste à voir)
        $path = preg_replace('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        //retire la premiére valeur et réassigne les indices afin qu'ils commence à 0, pouquoi on a besoin de faire ça?
        array_shift($matches);
        $this->matches = $matches;  // On sauvegarde les paramètre dans l'instance pour plus tard
        return true;
    }


    private function paramMatch($match)
    {
        if (isset($this->params[$match[1]])) {
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }




    //retourne la fonction demandé avec callable et un tableau qui donnera dans l'odre de leur position chaque valeurs en paramétre de la mthode appelé.
    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }





    //pour gérer les expréssions régulières des paramétres
    public function with($param, $regex)
    {
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this; //je comprend rien
    }
}
