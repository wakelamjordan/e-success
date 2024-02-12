<?php
namespace App\Service\router;

use App\Service\exception\RouterException;

class Router{
    private $routes=[]; //liste des route...pas encore bien compris, estc-ce que il s'agit des chemin vers le fichier? en faite il s'agit de la méthode qui est associé à l'url

    //un constructeur pour attribuer la valeur $url 
    public function __construct(
        //équivaut à le mettre en haut et écrire dans le constructeur $this->url=$url; moin de code mais moins de compréhension je pense, je l'utilise ici juste pour s'en souvenir
        private $url, //url de la page que l'on souhaite
        )
    {
        
    }

    //méthodes pour les différentes méthodes HTTP GET POST PUT DELETE
    public function get($path,$callable){
        //callable est la méthode qui sera exécuté au moment ou le path détecté...encore sombre tout ça 
        //création d'une nouvelle route (donc il y a bien une autre classe pour instancier une route pas compris l'objectif on va voir aprés);
        $route=new Route($path,$callable);
        //on met dans l'array routes à l'indice GET l'objet route instancier précédement.
        $this->routes["GET"][]=$route;
    }

    //méthode pour déclencher le matching vérifier si méthode avec route existe(je crois)
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            // on prend la valeur de request_method dans server et on vérifi qu'elle corresponde bien à la route demandé
            throw new RouterException('REQUEST_METHOD does not exist');
            //redéfinition du méssage de l'exeption (faudra que je fasse des recherche sur les exeption pas tout compris)
        }
        //du coup dans le cas ou la méthode de session correspond à la méthode de l'url alors on va for each chaque route de notre méthode qui sera la key dans notre cas pour l'instant get
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        // dans le cas ou aucun match n'est trouvé
        throw new RouterException('No matching routes');
    }
}