<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
{
    private $UserRepository;

    public function __construct()
    {
        parent::__construct();
        $this->UserRepository = new UserRepository();
    }

    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('login');
        }
    $email = strtolower($_POST["email"]);
        $password = $_POST["password"];

    $user= $userRepository->getUser($email);


    if(!$user){
        return $this->render('login', ['messages'=> ['User not exists']]);

    }


    if ($user->getEmail() !==$email){
        return $this->render('login', ['messages'=> ['User with this email not exists']]);

    }
    if(password_verify($password,$user->getPassword())) {
        setcookie("userCookie", $user->getEmail(), time() + (86400 * 1), "/");
        setcookie("isAdminCookie", $user->getIsAdmin(), time() + (86400 * 1), "/"); // 86400 = 1 day
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/advertisements");
    }
        return $this->render('login', ['messages'=> ['Wrong Password']]);
    }


    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($email, password_hash($password,PASSWORD_DEFAULT), $name, $surname);
        $user->setPhone($phone);

        $this->UserRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

}