<?php

namespace App\Model;

class UserManager extends AbstractManager 
{
    public const TABLE = 'user';

      /**
     * Get one row from database by email and password.
     */
    public function selectOneByAccount(string $email, string $password): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE email=:email AND password=:password");
        $statement->bindValue('password', $password, \PDO::PARAM_STR);
        $statement->bindValue('email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

}