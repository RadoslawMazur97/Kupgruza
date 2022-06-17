<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();
   // $user = new User('jsnow@pk.edu.pl', 'admin', 'John', 'Snow');

        if(!$this->isPost()){
            return $this->render('login');
        }
    $email = $_POST["email"];
    $password = $_POST["password"];

    $user= $userRepository->getUser($email);


    if(!$user){
        return $this->render('login', ['messages'=> ['User not exists']]);

    }


    if ($user->getEmail() !==$email){
        return $this->render('login', ['messages'=> ['User with this email not exists']]);

    }
    if ($user->getPassword() !==$password){
            return $this->render('login', ['messages'=> ['Wrong Password']]);

        }
        //return $this->render('advertisement');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/advertisements");
    }

}