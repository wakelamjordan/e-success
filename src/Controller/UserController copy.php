<?php

namespace App\Controller;

use PDO;
use Vuser;
use VuserManager;
use App\Model\Manager;
use App\Service\MyFct;
use App\Model\RoleManager;
use App\Model\UserManager;
use App\Model\PeopleManager;
use App\Model\V_userGestionManager;

//toutes les actions lié à la connexion et à la création de compte se trouvent ici, voir si il ne serait pas plus judicieu de les mettre dans acceuil ctrl par exemple

class UserController extends MyFct
{
    function __construct()
    {
        if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
        // par defaut on met action sur liste
        $action = 'liste';
        // on extract get pour avoir l'action si jamais elle est renseigné dans l'url
        extract($_GET);
        // et on switch sur cette action
        switch ($action) {
            case 'show':
                $this->show($id);
                break;
            case 'modify':
                // if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                $this->show($id);
                break;
            case 'insert':
                $this->inserer();
                break;


            case 'save':


                // echo 'save';
                // die;


                $this->save($_POST, $_FILES);
                break;




            case 'delete':
                // if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                $this->supprimerUser($id);
                break;
            case 'listRole':
                // if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                $this->listRole();
                break;
            default:
                // if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                $this->liste();
        }
    }
    public function save($post, $file)
    {
        // extract($_POST);

        $id_user=$_POST['id_user'];

        // $variables=[
        //     'path'=>,
        //     'phone'=>,
        //     'mail'=>,
        //     'name'=>,
        //     'surname'=>,
        //     'date_birth'=>,
        //     'roles'=>,
        //     'last_connexion'=>,
        // ];
        
        $v=new V_userGestionManager;
        $v->insertById($_POST['id_user'],);
 
    }
    //pour récupérer tout les roles possible
    public function listRole()
    {
        $r = new RoleManager;

        $result = $r->findAll();

        $result = json_encode($result);

        echo $result;
    }
    // }
    public function show($id)
    {

        // die;
        // print_r($_GET);
        $u = new V_userGestionManager;

        $result = $u->findById($id);

        $result = json_encode($result);

        echo $result;
    }
    //liste de tout les utilisateurs accessible en role admin dans onglet parametres
    public function liste()
    {

        // $um = new UserManager();

        // $users = $um->findAll();

        // $sql = "
        // SELECT 
        //     p.id,
        //     ph.path,
        //     mail,
        //     phone
        // FROM 
        //     people p
        // JOIN
        //     user u ON p.id = u.id_people 
        // JOIN
        //     photo ph ON p.id_photo = ph.id;
        // ";

        // $m=new Manager;

        // $result=$m->request($sql);

        $um = new UserManager;

        $result = $um->findAll();

        // print_r($result);
        // exit;

        // dans file on va préparer notre tableau pour acceuillir la liste
        $file = '../View/user/file.html.php';
        // dans variable il faudra les différentes variables nécéssaire à file pour créer le tableau
        // pour obtenir ces variables on a besoin de requêter la bdd
        // il nous faudra l'id de user, username, datecréation, ses roles et sa photo
        //test requêtage
        $variables = [
            'lignes' => $result,
            'nbr' => count($result),
        ];
        $this->generatePage($file, $variables);
    }
    // avec la requete, les variables à mettre dans execute, et l'objet à retourner(class existante)
    // function request($sql, $variables = [])
    // {
    //     $connexion = $this->connexion();

    //     $request = $connexion->prepare($sql);

    //     $request->execute($variables);

    //     $count = $request->rowCount();

    //     if ($count != 0) {
    //         if ($count > 1) {
    //             $result = $request->setFetchMode(PDO::FETCH_ASSOC);
    //             // $request->setFetchMode(PDO::FETCH_CLASS, $obj);
    //             $result = $request->fetchAll();
    //         } else {
    //             $result = $request->setFetchMode(PDO::FETCH_ASSOC);
    //             // $request->setFetchMode(PDO::FETCH_CLASS, $obj);
    //             $result = $request->fetch();
    //         }
    //         return $result;
    //     }
    // }
    //connexion utilisé par request
    // private function connexion()
    // {
    //     //constantes de connection
    //     require_once '../Config/parametre.php';

    //     $host = HOST;
    //     $dbname = DBNAME;

    //     $user = USER;
    //     $password = PASSWORD;
    //     // formation dsn 
    //     $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    //     // try pour test de la connexion

    //     try {
    //         //création de l'objet pour la connexion
    //         $pdo = new PDO($dsn, $user, $password);
    //         return $pdo;
    //     } catch (PDOException $e) {
    //         echo 'pas bon ' . $e->getMessage();
    //         die;
    //     }
    // }
    ///-----------------------------------------------------------------
    function supprimerUser($id)
    {
        $vm = new VuserManager();
        $vm->deleteById($id);
        header("location:user");
        exit();
    }




    function valider($data)
    {
        $vm = new VuserManager();
        extract($data);

        $dataCondition = [
            'login' => $login,
            'password' => $this->crypter($password),
        ];

        $user = $vm->findOneByCondition($dataCondition);
        //$this->printr($user); die;

        if ($user->getLogin()) {
            $_SESSION['login'] = $user->getLogin();
            $_SESSION['roles'] = $user->getRoles();



            header('location:acceuil');
            exit;
        } else {
            $message = "<div class='center'>";
            $message .= "<p>email et ou mot de passe incorrect <p>";
            $message .= "</div>";

            $variables = [
                'message' => $message,
            ];

            $file = "../View/erreur/erreur.html.php";
            $this->generatePage($file, $variables);
        }
    }


    public function seConnecter()
    {

        $file = "../View/user/formLogin.html.php";
        $this->generatePage($file);
    }

    function enregistrerVuser($data, $files = [])
    {
        // $this->printr($files);die;
        if ($files['photo']['name']) {

            $file_photo = $files['photo'];
            $name = $file_photo['name'];
            $source = $file_photo['tmp_name'];
            $destination = "upload/$name";
            move_uploaded_file($source, $destination);

            //insersion du path dans variable data à aller insert dans la bdd

            $data['path'] = $name;
        } else {
            unset($data['name']);
        }
        $vm = new VuserManager();
        $connexion = $vm->connexion();
        $data['roles'] = json_encode($data['roles']);
        $password = $data['password'];
        if ($password) {
            $password = $this->crypter($password);
            $data['password'] = $password;
        } else {
            unset($data['password']);
        }
        // $this->printr($data);die;
        extract($data);
        $id = (int) $id;
        if ($id != 0) {



            $vm->update($data, $id);
        } else {

            $vm->insert($data);
        }

        header("location:user");
    }


    function inserer()
    {
        $user = new Vuser();
        $user->setRoles(['USER_ROLE']);
        // $user->setId(0);     
        $disabled = "";
        $this->generateFrom($user, $disabled);
    }


    function modifier($id)
    {

        $um = new VuserManager();

        $user = $um->findById($id);

        $user_roles = $user->getRoles();
        $user_roles = json_decode($user_roles);

        $user->setRoles($user_roles);

        $disabled = '';

        $this->generateFrom($user, $disabled);
    }

    function afficher($id)
    {

        $um = new VuserManager();

        $user = $um->findById($id);

        $user_roles = $user->getRoles();
        $user_roles = json_decode($user_roles);

        // print_r($user_roles);

        // $this->printr($user_roles);

        $user->setRoles($user_roles);

        // print_r($user);
        // die;

        $disabled = 'disabled';

        $this->generateFrom($user, $disabled);
    }

    function generateFrom($user, $disabled)
    {

        $photo = $user->getPhoto();


        $user_roles = $user->getRoles();

        // print_r($user_roles);
        // die;


        if (!$photo) {
            $photo = "fakePhoto.jpg";
        }

        $rm = new RoleManager();

        $myRoles = $rm->findAll();

        // print_r($myRoles);

        // die;

        $roles = [];

        foreach ($myRoles as $value) {

            $libelle = $value['libelle'];

            if (in_array($libelle, $user_roles)) {
                $checked = "checked";
            } else {

                $checked = "";
            }

            $roles[] = ['libelle' => $libelle, 'checked' => $checked];
        }

        $variables = [
            'photo' => $photo,
            'roles' => $roles,
            'id' => $user->getId(),
            'login' => $user->getLogin(),
            'mail' => $user->getMail(),
            'disabled' => $disabled,
            'password' => '',

        ];

        $file = "../View/user/formFile.html.php";

        $this->generatePage($file, $variables);
    }
}
