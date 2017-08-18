<?php

namespace app\Controller;

use app\Model\UserModel;

class UserController extends AbstractController
{
    public function listAction()
    {
        $admin = $this->isLoggedIn();

        if(!$admin){
            $this->redirect('/login/');
            exit;
        }

        $users = UserModel::getUsers();
        $this->renderView('users', ['users' => $users, 'admin'=> $admin]);
    }

    public function itemAction($id)
    {
        $user = UserModel::findById($id);

        if ($user === null) {
            throw new \InvalidArgumentException();
        }

        $this->renderView('user', ['user' => $user]);
    }

    public function addUserAction()
    {
        $this->renderView('add.user');
    }

    public function addAction()
    {
        $name = trim($_POST['name']);
        $host = trim($_POST['host']);
        $id = ($_POST['id']) ? trim($_POST['id']) : null;

        $user = new UserModel(
            $host,
            $name,
            $id
        );

        if (!($result = $user->save())) {
            throw new \RuntimeException('Can not add new user');
        }

        $this->redirect('/users/');
    }

    public function editAction($id)
    {
        $user = UserModel::findByNumber($id);

        if (!$user) {
            throw new \RuntimeException('Can not get info about user');
        }

        $this->renderView('add.user', ['user' => $user]);
    }

    public function deleteAction($id)
    {
        $deleted = UserModel::deleteByNumber($id);

        if (!$deleted) {
            throw new \RuntimeException('Can not delete user');
        }

        $this->redirect('/users/');
    }

}