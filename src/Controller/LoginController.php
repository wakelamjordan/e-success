<?php

namespace App\Controller;

use App\Model\Manager;
use App\Service\MyFct;
use App\Model\UserManager;
use App\Model\PeopleManager;
use App\Model\AcceuilManager;

class LoginController extends MyFct
{
    function __construct()
    {
        $action = '';
        extract($_GET);
        switch ($action) {
            case 'validation':
                // en cas de validation d'un formulaire d'inscription ou de connexion
                $this->validation();
                break;
            case 'logout':
                $this->seDeconnecter();
                break;

            default:
                // si variable global post vide
                if (empty($_POST)) {
                    // fonction pour aficher formulaire afin de récupérer le mail ou le phone
                    $this->identifiant();
                } else {
                    // si post contien quelque chose
                    $this->identifiantExist();
                }
        }
    }
    public function validation()
    {

        // print_r($_POST);
        // exit;
        if (key_exists('date_birth', $_POST)) {

            // print_r($_POST);

            //chose à faire en ajax je pense pour avoir une réponse  directe dans le formulaire de création de compte sans recharger la page et éffacer le formulaire, sinon l'utilisateur risque de devoir tout réecrire
            $d = new UserManager;
            $result = $d->findByMailPhone();

            // var_dump($result);

            // exit;

            if ($result != null) {
                $m = new MyFct;
                $m->throwMessage('Mail déjà utilisé.');
            }
            // créer nouveau compte
            // $sql = "
            // INSERT INTO people(name,surname,date_birth) VALUES(?,?,?);INSERT INTO user (mail,password,id_people) VALUES (?,?,LAST_INSERT_ID());
            // ";

            // $variables = [
            //     $_POST['name'],
            //     $_POST['surname'],
            //     $_POST['date_birth'],
            //     $_POST['mail'],
            //     $this->crypter($_POST['password']),
            // ];



            //insertion dans people de name surname date_birth;


            // exit;

            $p = new PeopleManager;
            $p->insertPeople();

            // Manager::request($sql, $variables);

            //insertion dans user de mail et password et last_insert_id()

            $u = new UserManager;
            $u->insertByLast_id();

            // exit;
            // print_r($variables);

            // exit;

            //connexion automatique aprés réussite d'inscription



            $this->throwMessage("Bienvenue " . $_POST['surname'] . ", vous pouvez maintenant vous connecter.");
        } else {
            // rechercher dans la bdd si mail/phone avec password ok et maj last_connexion
            extract($_POST);
            // requetage user avec mail password mail password

            $u = new UserManager;
            $u = $u->findByMailPhonePassword();

            // var_dump($u);
            // exit;

            //si il n'y a pas de correspondence dans user
            if ($u == NULL) {

                $m = new MyFct;
                $m->throwMessage("Identifiant ou mot de passe incorrect.");
                // $m->throwMessage("Identifiant ou mot de passe incorrect.");
            }
            // requetage people par id de l'user de la requete precedente 

            $p = new PeopleManager;
            $p = $p->findById($u['id_people']);

            // print_r($p);

            // mise en variable session du mail de l'user ses roles et du surnom de people
            $_SESSION = [
                'login' => $u['mail'],
                'roles' => $u['roles'],
                'surname' => $p['surname'],
            ];

            //redirection vers la page 'acceuil
            header("location:acceuil");
        }
    }
    //affichage du formulaire pour demander d'entrer un identifiant ou numéros de téléphone
    public function identifiant()
    {
        $file = '../View/login/formulaires/formUsername.html.php';
        $variables = [
            'title' => 'Connexion ou création de compte en 1 minute',
        ];
        $this->generatePage($file, $variables);
    }
    //quand mail ou numéros de teléphone saisi et formulaire soumis controle si mail ou numéros de téléphone existant
    public function identifiantExist()
    {
        // controle de l'identifiant retourné dans la bdd.user.mail/phone
        extract($_POST);

        $sql = "SELECT id, mail, phone FROM user WHERE mail like ? OR phone like ?";

        $variables = [
            $mail,
            $mail
        ];

        $m = new Manager;
        $exist = $m->request($sql, $variables);

        // print_r($exist);
        // exit;

        if ($exist == true) {

            //si existant on charge le formulaire de connexion qui demandera le mot de pass et mettra la valeur de input mail/phone précédement saisi dans l'identifiant
            // insertion dans la user nouvelle date 
            $um = new UserManager;
            $um->updateLast_connexion($exist['id']);
            //--------------------------------------
            $file = "../View/login/formulaires/formLogin.html.php";

            $variables = [
                'title' => 'Connexion',
                'mail' => $mail
            ];

            $this->generatePage($file, $variables);
        } else {
            // si non existant déjà dans la base de donner on charge le formulaire d'inscription
            $file = "../View/login/formulaires/formInscription.html.php";

            $variables = [
                'title' => 'Inscription',
            ];

            $this->generatePage($file, $variables);
        }
    }
    function seDeconnecter()
    {
        session_destroy();
        header('location:acceuil');
        exit;
    }
}
