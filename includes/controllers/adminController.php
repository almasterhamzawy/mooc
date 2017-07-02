<?php

class adminController extends controller
{

    public function __construct()
    {
        $this->checkPermission(1);
    }


    public function index()
    {
       include(VIEWS.'/back/admin/header.html');
       include(VIEWS.'/back/admin/menu.html');
       include(VIEWS.'/back/admin/index.html');
       include(VIEWS.'/back/admin/footer.html');
    }
} 