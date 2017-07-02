<?php

function getErrors()
{
    if(isset($_SESSION['errors']) && count($_SESSION['errors'])>0)
    {
        $errors = $_SESSION['errors'];
        $HTMLerror = '<div class="alert alert-block alert-danger fade in"><strong>Error Occurred :</strong><br />';

        $HTMLerror .= '<ul>';
        foreach($errors as $error)
        {
            $HTMLerror .= "<li>$error</li>";
        }
        $HTMLerror .='</ul></div>';

        $_SESSION['errors'] = [];
        return $HTMLerror;
    }

    return null;
}

function getSuccess()
{
    if(isset($_SESSION['success']) && strlen($_SESSION['success'])>0)
    {

        $HTMLsuccess = '<div class="alert alert-block alert-success fade in"><strong>Done :</strong><br />'.$_SESSION['success'].'</div>';
        $_SESSION['success'] = '';
        return $HTMLsuccess;
    }

    return null;
}


/**
 * salted passwords
 * @param $password
 * @return string
 */
function hashPasswords($password)
{
    return sha1(md5($password.'$@##$%asda').'#@$syam');
}



function checkLogin()
{
    if(isset($_SESSION['user']))
        return true;

    return false;
}


function invalidRedirect($depth='')
{
    if(isset($_SESSION['user']))
    {
        if($_SESSION['user']['user_group'] == 1)
            Redirect::To($depth.'admin/index.php');
        elseif($_SESSION['user']['user_group'] == 2)
            Redirect::To($depth.'instructor/index.php');
        elseif($_SESSION['user']['user_group'] == 3)
            Redirect::To($depth.'student/index.php');
        else
            Redirect::To($depth.'index.php');
    }}