<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 13.07.2017
 * Time: 17:59
 */

namespace app\Model;

use app\Lib\Registry;

class AdminModel
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     *@var integer
     */

    private $pass;

    /**
     * UserModel constructor.
     * @param string $name
     * @param string $email
     */
    public function __construct($name, $email, $pass)
    {
        $this->name = $name;
        $this->email = $email;
        $this->pass = self::encodePass($pass);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


    private static function encodePass($pass)
    {
        return md5($pass);
    }

    public function save()
    {
        return AdminStorage::save($this->name, $this->email, $this->pass);
    }

    public static function issetAdmin($email, $pass)
    {
        $data = AdminStorage::issetAdmin($email, self::encodePass($pass));
        if (!$data){
            return $data;
        }

        return new AdminModel($data['name'], $data['email'], $data['pass']);
    }


    public function insertCookieIntoDatabase($cookie)
    {
        AdminStorage::deleteCookieIfExist($this->email);
        return AdminStorage::insertCookieIntoDatabase($this->email, $cookie);
    }

    public static function getAdminByCookie($cookie)
    {
        return AdminStorage::getAdminByCookie($cookie);
    }

    public static function deleteCookie($cookie)
    {
        return AdminStorage::deleteCookie($cookie);
    }
}