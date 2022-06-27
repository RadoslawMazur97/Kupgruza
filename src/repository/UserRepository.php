<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser (string $email): ?User
    {
        //TODO
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_user_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        $stmt->execute();
        $user = $stmt ->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;

        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['user_role']
        );
    }
    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (name, surname, phone)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_user_details, user_role)
            VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            strtolower($user->getEmail()),
            $user->getPassword(),
            $this->getUserDetailsId($user),
            $user->getUser_role()
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = ? AND surname = ? AND phone = ?
        ');

        $stmt->execute([
                $user->getName(),
                $user->getSurname(),
                $user->getPhone()
            ]

        );

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }


}