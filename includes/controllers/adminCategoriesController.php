<?php

class adminCategoriesController extends controller
{

    private $categoriesModel;

    public function __construct()
    {
        parent::__construct();

        $this->checkPermission(1);
        $this->categoriesModel = new coursesCategoriesModel();
    }

    /**
     * get all Categories
     */
    public function getCategories()
    {
        //Model to get categories from db
        $categories = $this->categoriesModel->getCategories();

        //View -> display categories
        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/categories.html');
        include(VIEWS.'/back/admin/footer.html');

    }



    public function addCategory()
    {
        if(isset($_POST['submitAddCategory']))
        {
            $categoryName = $_POST['category'];
            if(strlen($categoryName)<5)
            {
                $this->setControllerErrors('Category Name must be at least 5 chars');
                include(VIEWS.'/back/admin/header.html');
                include(VIEWS.'/back/admin/menu.html');
                include(VIEWS.'/back/admin/addcategory.html');
                include(VIEWS.'/back/admin/footer.html');
            }
            else
            {
                //1- prepare data
                $dataArray = array(
                    'category_name' => $categoryName,
                    'created_by'    => $_SESSION['user']['user_id']
                );

                //2- get model
                if($this->categoriesModel->addCategory($dataArray))
                    Redirect::To('categories.php');

                //if not added and db error
                $this->setControllerErrors($this->categoriesModel->getErrors());

                include(VIEWS.'/back/admin/header.html');
                include(VIEWS.'/back/admin/menu.html');
                include(VIEWS.'/back/admin/addcategory.html');
                include(VIEWS.'/back/admin/footer.html');

            }
        }
        else
        {
            include(VIEWS.'/back/admin/header.html');
            include(VIEWS.'/back/admin/menu.html');
            include(VIEWS.'/back/admin/addcategory.html');
            include(VIEWS.'/back/admin/footer.html');
        }
    }



    public function updateCategory()
    {

        if(isset($_POST['submitUpdateCategory']))
        {

            $categoryId = $_POST['categoryId'];
            $categoryName = $_POST['category'];

            $data = array('category_name'=>$categoryName);

            include(VIEWS.'/back/admin/header.html');
            if($this->categoriesModel->updateCategory($categoryId,$data))
            {
                $this->setControllerSuccess('category updated successfully');
            }
            else
            {
                $this->setControllerErrors('Error Updating Category');
            }
            include(VIEWS.'/back/admin/menu.html');
            include(VIEWS.'/back/admin/footer.html');
        }
        else
        {
            //get category by id
            $id = (isset($_GET['id']))? (int)$_GET['id'] : 0;

            $category = $this->categoriesModel->getCategory($id);

            include(VIEWS.'/back/admin/header.html');

            if(count($category)>0)
            {
                include(VIEWS .'/back/admin/menu.html');
               include(VIEWS.'/back/admin/updatecategory.html');
            }
            else
            {
                $this->setControllerErrors('Not Found');

                include(VIEWS.'/back/admin/menu.html');

            }
            include(VIEWS.'/back/admin/footer.html');
        }
    }


    public function deleteCategory()
    {
        //id from url
        $id = (isset($_GET['id']))? (int)$_GET['id']:0;

        //db-> delete
        if($this->categoriesModel->deleteCategory($id))
        {
            //set success
            $this->setControllerSuccess('Category Deleted Successfully');
        }
        else
        {
            //set error
            $this->setControllerErrors('Error Deleting Category');
        }

        include(VIEWS.'/back/admin/header.html');
        include(VIEWS.'/back/admin/menu.html');
        include(VIEWS.'/back/admin/footer.html');
    }

} 