<?php

class usersGroupsModel extends model
{

    /**
     * add user group
     * @param $groupName
     * @return bool
     */
    public function addUserGroup($groupName)
    {
        $data = array(
            'group_name' => $groupName
        );
        if(System::Get('db')->Insert('users_groups',$data))
            return true;

        return false;
    }


    /**
     * update user group
     * @param $id
     * @param $groupName
     * @return bool
     */
    public function updateUserGroup($id,$groupName)
    {
        $data = array(
            'group_name' => $groupName
        );
        if(System::Get('db')->Update('users_groups',$data,"WHERE `group_id`=$id"))
            return true;

        return false;
    }


    /**
     * delete user group
     * @param $id
     * @return bool
     */
    public function deleteUserGroup($id)
    {
        if(System::Get('db')->Delete('users_groups',"WHERE `group_id`=$id"))
            return true;

        return false;
    }


    /**
     * get all users groups as array
     * @param string $extra
     * @return array
     */
    public function getUserGroups($extra='')
    {
        System::Get('db')->Execute("SELECT * FROM `users_groups` $extra");
        $groups = array();
        if(System::Get('db')->NumRows()>0)
        {
            $groups = System::Get('db')->GetRows();
        }

        return $groups;
    }


    /**
     * get group by id
     * @param $id
     * @return array
     */
    public function getUserGroupById($id)
    {
        System::Get('db')->Execute("SELECT * FROM `users_groups` WHERE `group_id`=$id");
        $groups = array();
        if(System::Get('db')->NumRows()>0)
        {
            $groups = System::Get('db')->GetRow();
        }

        return $groups;
    }

} 