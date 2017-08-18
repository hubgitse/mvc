<?php

namespace app\Model;

// ActiveRecord vs DomainModel
// ActiveRecord = Model + Repository
use app\Lib\Registry;

class UserModel
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $user;

    /**
     *@var integer
     */

    private $id;

    /**
     * UserModel constructor.
     * @param string $host
     * @param string $user
     */
    public function __construct($host, $user, $id)
    {
        $this->host = $host;
        $this->user = $user;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return UserModel[]
     */
    public static function getUsers()
    {
        return UserStorage::getUsers();
    }

    public static function findById($id)
    {
        return UserStorage::findById($id);
    }

    public static function findByNumber($id)
    {
        return UserStorage::findByNumber($id);
    }

    public static function deleteByNumber($id)
    {
        return UserStorage::deleteByNumber($id);
    }

    public function save()
    {
        return UserStorage::save($this->id, $this->host, $this->user);
    }
}