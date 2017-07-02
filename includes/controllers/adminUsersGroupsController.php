<?php

class adminUsersGroupsController extends controller
{
    private $usersGroupsModel;


    public function __construct()
    {
        parent::__construct();
        $this->usersGroupsModel = new usersGroupsModel();
    }

    public function getUserGroups()
    {
        //1- user groups from model
        $groups = $this->usersGroupsModel->getUserGroups();

        //2- view user groups
        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/usersgroups.html');
        include(VIEWS.'/back/admin/footer.html');
    }


    public function deleteUserGroup()
    {
        $gid = (isset($_GET['id']))? (int)$_GET['id']:0;

        if($this->usersGroupsModel->deleteUserGroup($gid))
        {
            $this->setControllerSuccess('User Group Deleted Successfully');
        }
        else
        {
            $this->setControllerErrors('Error Deleting User Group');
        }
        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/footer.html');

    }



    public function addUserGroup()
    {
        include(VIEWS.'/back/admin/header.html');
        if(count($_POST)>0)
        {
            //submit
            $groupName = $_POST['group_name'];

            if(strlen($groupName)>2)
            {
                if($this->usersGroupsModel->addUserGroup($groupName))
                {
                    $this->setControllerSuccess('Group Added Successfully');
                }
                else
                {
                    $this->setControllerErrors('Error Adding New Group');
                }
            }
            else
            {
                $this->setControllerErrors('Group Name Must Be > 2 Chars');
            }
            include(VIEWS.'/back/admin/menu.html');
        }
        else
        {
            //show form

            include(VIEWS.'/back/admin/menu.html');
            include(VIEWS.'/back/admin/addusergroup.html');

        }
        include(VIEWS.'/back/admin/footer.html');

    }


    public function updateuserGroup()
    {
        include(VIEWS.'/back/admin/header.html');

        if(count($_POST)>0)
        {
            //update
            $group_name = $_POST['group_name'];
            $group_id   = $_POST['group_id'];

            if(strlen($group_name)>2)
            {
                if($this->usersGroupsModel->updateUserGroup($group_id,$group_name))
                {
                    $this->setControllerSuccess('User Group Updated Successfully');
                }
                else
                {
                    $this->setControllerErrors('Error Updating User Group');
                }
            }
            else
            {
                $this->setControllerErrors('User Group Name Must Be > 2 Chars');
            }
            include(VIEWS.'/back/admin/menu.html');
        }
        else
        {
            //display group
            $id = (isset($_GET['id']))? (int)$_GET['id']:0;
            $group = $this->usersGroupsModel->getUserGroupById($id);

            if(count($group)>0)
            {
                include(VIEWS.'/back/admin/menu.html');
                include(VIEWS.'/back/admin/updateusergroup.html');
            }
            else
            {
                $this->setControllerErrors('User Group Not Found');
                include(VIEWS.'/back/admin/menu.html');
            }
        }

        include(VIEWS.'/back/admin/footer.html');
    }


} 