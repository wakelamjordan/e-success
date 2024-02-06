<?php
class ApController extends MyFct
{
    private $objet='ap';
    public function __construct()
    {
        $action = '';

        extract($_GET);

        switch ($action) {
            case 'inscription':
                $this->inscription();
                break;
            case 'recuperation':
                $this->recuperation();
                break;
            case 'login':
                $this->login();
                break;
            case "signin":
                $this->signIn();
                break;
            default:
        }
    }
    //fonction qui charge en premier lieu formulaire identifiant qui prend mail ou telephone
    //au submit il controlle si présence dans bdd.user
    //si pas présent charge le formulaire d'inscription
    //si présent charge le formulaire de connexion avec le mail pré remplie
    public function signIn()
    {
        //si il n'y a rien dans post
        if (empty($_POST)) {
            //génération de page avec le formulaire qui demande que le mail ou le numéros de telephone
            $file = '../View/ap/formUsername.html.php';
            $variables = [
                'title' => 'Connexion ou création de compte en 1 minute',
            ];
            $this->generatePage($file, $variables);
        } else {
            //dans post on aura phone ou login
            //chercher si correspondance dans bdd
            extract($_POST);

            $sql = "SELECT mail,phone FROM user WHERE mail LIKE ? OR phone LIKE ?";

            $variables = [
                $mail,
                $mail,
            ];

            $obj = $this->request($this->objet,$sql, $variables);

            if ($obj->getMail()=='') {
                // echo $mail;
                // echo "<br>password<br>";
                // echo "<br>nom<br>";
                // echo "<br>prénom<br>";
                // echo "<br>date de naissance<br>";
                // echo "s'inscrire";
                // echo "<br>mot de passe oublié<br>";

                $file = "../View/ap/formInscription.html.php";

                $variables = [
                    'title' => 'Inscription'
                ];

                $this->generatePage($file, $variables);
            } else {

                $file = "../View/ap/formLogin.html.php";

                $variables = [
                    'title' => 'Connexion',
                    'mail' => $obj->getMail()
                ];

                $this->generatePage($file, $variables);
                echo $obj->getMail();
                echo "<br>password";
            }
        }
    }

    //formulaire de connexion, opération de connexion
    public function login()
    {
        $erreur = "identifiant ou mot de pass incorrect! <a href='ap&action=recuperation'>Récupération de compte</a>";

        // echo "recherche dans bdd.user avec mail et password et récupére information pour mettre dans session";
        extract($_POST);
        $password = $this->cryptage($password);

        $sql = "SELECT * FROM user WHERE mail = ? AND password=?";

        $variables = [
            $mail,
            $password
        ];

        $obj = $this->request($this->objet,$sql, $variables);

        if ($obj->getMail()=='') {
            echo $erreur;
        } else {
            // nom roles
            // $obj = new Ap($result);
            $sql = "SELECT name, roles FROM people p, user u WHERE u.id_people = p.id AND u.mail = ? AND u.password = ?";
            $variables = [
                $mail,
                $password
            ];

            $obj = $this->request($this->objet,$sql, $variables);

            if ($obj->getName()=='') {
                echo $erreur;
            } else {
                // extract($result);
                // $obj=new Ap($result);

                $name=$obj->getName();
                $roles=$obj->getRoles();

                echo "<br>$name<br>$roles";
            }
        }
    }
    //inscription
    public function inscription(){
        echo 'inscription';
    }
    // récupération de compte
    public function recuperation(){
        echo "recuperation compte <a href=\"acceuil\">Acceuil</a>";
    }

    // --------------------------
    //cryptage
    public function cryptage($data, $iteration = 127)
    {
        for ($i = 0; $i <= $iteration; $i++) {
            $data = sha1($data);
        }
        return $data;
    }

    // à partir de $sql = requête string, et $variables renvoi le résultat de la requete
    function request($objet,$sql, $variables = [])
    {
        $connexion = $this->connexion();

        $request = $connexion->prepare($sql);

        $request->execute($variables);

        $count = $request->rowCount();

        if ($count > 1) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = $request->fetch(PDO::FETCH_ASSOC);
        }

        $obj=ucfirst($objet);

        $obj=new $obj($result);

        return $obj;
    }
    //connexion utilisé par request
    private function connexion()
    {
        //constantes de connection
        require_once '../Config/parametre.php';
        $host = HOST;
        $dbname = DBNAME;

        $user = USER;
        $password = PASSWORD;
        // formation dsn 
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        // try pour test de la connexion

        try {
            //création de l'objet pour la connexion
            $pdo = new PDO($dsn, $user, $password);
            return $pdo;
        } catch (PDOException $e) {
            echo 'pas bon ' . $e->getMessage();
            die;
        }
    }
}
