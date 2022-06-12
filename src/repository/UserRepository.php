<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser (string $email): ?User
    {
        //TODO
        $stmt = $this->database->connect()->prepare(
           'SELECT * FROM public.users WHERE email = :email'

        );
        //            SELECT * FROM d3qe917bnvbuf.public.Users WHERE email = :email'
        //$stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        $user = $stmt ->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            //TODO TRYCATCH
            return null;

        }

        return new User(
            $user['email'],
            $user['password']

        );
    }


}