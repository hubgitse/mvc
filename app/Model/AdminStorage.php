<?php

namespace app\Model;

use app\Lib\Registry;

class AdminStorage
{
    public static function save($name, $email, $pass)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("INSERT INTO admins (name,email,pass) VALUES (?,?,?)");
        $stmt->bindParam(1, $name, \PDO::PARAM_STR);
        $stmt->bindParam(2, $email, \PDO::PARAM_STR);
        $stmt->bindParam(3, $pass, \PDO::PARAM_STR);

        return $stmt->execute();
    }

    public static function issetAdmin($email, $pass)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = (?)");
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);

        $stmt->execute();

        if ($row = $stmt->fetch()) {
            return ($row['pass'] === $pass) ? $row : false;
        }

        return null;
    }

    public static function insertCookieIntoDatabase($email, $cookie)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("INSERT INTO admin_cookie (email,cookie) VALUES (?,?)");
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->bindParam(2, $cookie, \PDO::PARAM_STR);

       return $stmt->execute();
    }

    public static function getAdminByCookie($cookie)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("SELECT * FROM admins ad JOIN admin_cookie ac on ac.email = ad.email WHERE ac.cookie = (?)");
        $stmt->bindParam(1, $cookie, \PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch()) {
            return new AdminModel($row['name'], $row['email'], $row['pass']);
        }

        return null;
    }

    public static function deleteCookie($cookie)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("DELETE FROM admin_cookie WHERE cookie = (?)");
        $stmt->bindParam(1, $cookie, \PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function deleteCookieIfExist($email)
    {
        $pdo = Registry::get('pdo');
        $stmt = $pdo->prepare("DELETE FROM admin_cookie WHERE email = (?)");
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
    }
}