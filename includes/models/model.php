<?php

class model
{

    private $errors = array();

    public function setError($error)
    {
        if(is_array($error))
            $this->errors = $error;
        else
            $this->errors[] = $error;
    }


    public function getErrors()
    {
        return $this->errors;
    }
    
} 