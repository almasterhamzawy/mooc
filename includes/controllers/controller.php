<?php

class controller
{
    public function __construct()
    {
        $this->clearErrors();
        $this->clearSuccess();
    }

    public function checkPermission($groupId)
    {
        if(isset($_SESSION['user']['user_group'])&&  $_SESSION['user']['user_group'] != $groupId)
        {
            //admin
            if($_SESSION['user']['user_group'] == 1)
            {
                header('LOCATION:../admin');
            }
            elseif($_SESSION['user']['user_group'] == 2)
            {
                header('LOCATION:../instructor');
            }
            elseif($_SESSION['user']['user_group'] == 3)
            {
                header('LOCATION:../student');
            }
            exit;
        }
        else
        {

            if(!isset($_SESSION['user']['user_group']))
            {
                header('LOCATION:login.php');
                exit;
            }

        }


    }

    public function setControllerErrors($errors)
    {
        if(is_array($errors))
        {
            foreach ($errors as $error) {
                $_SESSION['errors'][] = $error;
            }

        }
        else
        {
            $_SESSION['errors'][] = $errors;
        }

    }

    public function clearErrors()
    {
        unset($_SESSION['errors']);
    }


    public function setControllerSuccess($message)
    {
        $_SESSION['success'] = $message;
    }

    public function clearSuccess()
    {
        unset($_SESSION['success']);
    }
} 