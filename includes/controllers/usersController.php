<?php

class usersController extends controller
{

    private $usersModel;

    public function __construct($usersModel)
    {
        $this->usersModel = $usersModel;
    }

    public function usersLogin()
    {

        if(checkLogin())
            invalidRedirect();

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = hashPasswords($_POST['password']);

            if($this->usersModel->login($username,$password))
            {
                $userData = $this->usersModel->getUserData();
                $_SESSION['user'] = $userData;

                invalidRedirect();
            }
            else
            {
                $this->setControllerErrors($this->usersModel->getErrors());
                include(VIEWS.'/front/login.html');
            }

        }
        else
        {
            //form
            include(VIEWS.'/front/login.html');
        }
    }
} 