<?php
class UserController extends MyFct
{
    function __construct()
    {
        // par defaut on met action sur liste
        $action = 'liste';
        // on extract get pour avoir l'action si jamais elle est renseigné dans l'url
        extract($_GET);
        // et on switch sur cette action
        switch ($action) {
                // $this->throwMessage()
                // à défaut quelque soit ce qui sera rentré comme action la méthode liste sera appliqué
            case 'liste':
                // if ($this->notGranted('ROLE_ADMIN')) {
                if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                // die;
                // }
                // die;
                $this->liste();
                break;
            case 'show':
                if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");

                $this->afficher($id);
                break;
            case 'modify':
                if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                $this->modifier($id);
                break;
            case 'insert':
                $this->inserer();
                break;
            case 'save':
                $this->enregistrerVuser($_POST, $_FILES);
                break;
            case 'login':
                // si variable global post vide
                if (empty($_POST)) {
                    // fonction pour aficher formulaire afin de récupérer le mail ou le phone
                    $this->identifiant();
                } else {
                    // si post contien quelque chose
                    $this->identifiantExist();
                }
                break;
            case 'validation':
                // en cas de validation d'un formulaire d'inscription ou de connexion
                $this->validation();
                break;
            case 'logout':
                $this->seDeconnecter();
                break;
            case 'delete':
                if ($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas <br> le droit d'utiliser cette action!");
                $this->supprimerUser($id);
                break;
        }
    }
    // public function userConnexion(){
    // }
    // public function inscription(){

    // }
    public function validation()
    {
        if (key_exists('date_birth', $_POST)) {
            $sql = "
            INSERT INTO people(name,surname,date_birth) VALUES(?,?,?);INSERT INTO user (mail,password,id_people) VALUES (?,?,LAST_INSERT_ID());
            ";
            $variables = [
                $_POST['name'],
                $_POST['surname'],
                $_POST['date_birth'],
                $_POST['mail'],
                $this->crypter($_POST['password']),
            ];

            $m = new Manager;
            $m->request($sql, $variables);
            // Manager::request($sql, $variables);

            $this->throwMessage("Bienvenue " . $_POST['surname'] . ", vous pouvez maintenant vous connecter.");
        } else {
            extract($_POST);

            $sql = "
            SELECT roles, mail ,surname, last_connexion FROM user u JOIN people p ON u.id_people = p.id  WHERE mail=? AND password = ? OR phone = ? AND password = ?;UPDATE user SET last_connexion=NOW()";

            $variables = [
                $mail,
                $this->crypter($password),
                $mail,
                $this->crypter($password),
            ];

            $sql = $this->request($sql, $variables);

            $_SESSION = [
                'login' => $sql['mail'],
                'surname' => $sql['surname'],
                'roles' => $sql['roles'],
            ];

            header("location:acceuil");
        }
    }
    //affichage du formulaire pour demander d'entrer un identifiant ou numéros de téléphone
    public function identifiant()
    {
        $file = '../View/ap/formUsername.html.php';
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

        $sql = "SELECT mail, phone FROM user WHERE mail like ? OR phone like ?";

        $variables = [
            $mail,
            $mail
        ];

        $m = new Manager;
        $exist=$m->request($sql, $variables);

        if ($exist == true) {

            //si existant on charge le formulaire de connexion qui demandera le mot de pass et mettra la valeur de input mail/phone précédement saisi dans l'identifiant
            $file = "../View/ap/formLogin.html.php";

            $variables = [
                'title' => 'Connexion',
                'mail' => $mail
            ];

            $this->generatePage($file, $variables);
        } else {
            // si non existant déjà dans la base de donner on charge le formulaire d'inscription
            $file = "../View/ap/formInscription.html.php";

            $variables = [
                'title' => 'Inscription',
            ];

            $this->generatePage($file, $variables);
        }
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


    function seDeconnecter()
    {
        session_destroy();
        header('location:acceuil');
        exit;
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

    function liste()
    {

        // $um = new UserManager();

        // $users = $um->findAll();

        $sql = "
        SELECT 
            p.id,
            ph.path,
            mail,
            phone
        FROM 
            people p
        JOIN
            user u ON p.id = u.id_people 
        JOIN
            photo ph ON p.id_photo = ph.id;
        ";

        $m=new Manager;

        $result=$m->request($sql);

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
}
