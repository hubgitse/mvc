<?php

namespace app\Controller;

use app\Model\AdminModel;

class AdminController extends AbstractController
{
    public function registerAdminFormAction()
    {
        $this->renderView('register.form');
    }

    public function registerAdminAction()
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $pass = $_POST['pass'];

        $admin = new AdminModel(
            $name,
            $email,
            $pass
        );

        if(!$admin -> save()){
            throw new \RuntimeException("Can\'t add a new Admin");
        }

        $this->redirect('/login/');
    }

    public function loginFormAdminAction()
    {
        $this->renderView('login.admin.form');
    }

    public function loginAdminAction()
    {
        $email = trim($_POST['email']);
        $pass = trim($_POST['pass']);

        $admin = AdminModel::issetAdmin($email, $pass);

        if(!$admin){
            $message = ($admin === false) ? 'Password is wrong' : 'No admins found';
            throw new \RuntimeException($message);
        }

        $cookie = md5(rand(1000,9999).$admin->getEmail().rand(1000,9999).$admin->getName().rand(1000,9999));
        if($admin -> insertCookieIntoDatabase($cookie)){
            setcookie('myid', $cookie);
            $this->redirect('/users/');
        }
    }

    public function logoutAdminAction()
    {
       $cookie = $_COOKIE['myid'];
       if(AdminModel::deleteCookie($cookie)){
           setcookie('myid','');
           $this->redirect('/login/');
       };

    }
}