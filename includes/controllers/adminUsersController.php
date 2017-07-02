<?php

class adminUsersController extends controller
{
    private $userModel;
    private $userGroupsModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new usersModel();
        $this->userGroupsModel = new usersGroupsModel();
    }



    public function getUsers()
    {
        //get users
        $users = $this->userModel->getUsers();

        //design
        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/users.html');
        include(VIEWS.'/back/admin/footer.html');
    }


    public function addUser()
    {
        include(VIEWS.'/back/admin/header.html');
        if(count($_POST)>0)
        {
            $username = $_POST['username'];
            $password = hashPasswords($_POST['password']);
            $email    = $_POST['email'];
            $group    = $_POST['user_group'];

            $data = array(
                'username' => $username,
                'password' => $password,
                'email'    => $email,
                'user_group' => $group,

            );

            if($this->userModel->addUser($data))
            {
                $this->setControllerSuccess('User Added Successfully');
            }
            else
            {
                $this->setControllerErrors('Error Adding User');
            }
            include(VIEWS.'/back/admin/menu.html');
        }
        else
        {

            $groups = $this->userGroupsModel->getUserGroups();
            include(VIEWS.'/back/admin/menu.html');
            include(VIEWS.'/back/admin/adduser.html');

        }

        include(VIEWS.'/back/admin/footer.html');
    }

} 