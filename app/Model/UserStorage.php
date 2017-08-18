<?php

namespace app\Model;

use app\Lib\Registry;

class UserStorage
{
    public static function getUsers()
    {
        $pdo = Registry::get('pdo');

        $result = $pdo->query('SELECT User, Host, id FROM users');

        $users = [];
        $rows = $result->fetchAll();

        foreach ($rows as $row) {
            $users[] = new UserModel($row['Host'], $row['User'], $row['id']);
        }

        return $users;
    }

    public static function findById($id)
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        if ($row = $stmt->fetch()) {
            return new UserModel($row['Host'], $row['User'], $row['id']);
        }

        return null;
    }

    public static function findByNumber($id)
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        if ($row = $stmt->fetch()) {
            return new UserModel($row['Host'], $row['User'], $row['id']);
        }

        return null;
    }

    public static function deleteByNumber($id)
    {
        /** @var \PDO $pdo */
        $pdo = Registry::get('pdo');

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        return ($stmt->execute());
    }

    public static function save($id, $host, $user)
    {
        if ($id === null){
           return self::insertUserIntoDatabase($host, $user);
        }

       return self::updateUserInDatabase($id, $host, $user);
    }

    private static function insertUserIntoDatabase($host, $user)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("INSERT INTO users (user,host) VALUES (?,?)");
        $stmt->bindParam(1, $user, \PDO::PARAM_STR);
        $stmt->bindParam(2, $host, \PDO::PARAM_STR);

        return $stmt->execute();
    }

    private static function updateUserInDatabase($id, $host, $user)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("UPDATE users SET user = ?, host = ? WHERE `id` = ?");
        $stmt->bindParam(1, $user, \PDO::PARAM_STR);
        $stmt->bindParam(2, $host, \PDO::PARAM_STR);
        $stmt->bindParam(3, $id, \PDO::PARAM_STR);

        return $stmt->execute();
    }

}