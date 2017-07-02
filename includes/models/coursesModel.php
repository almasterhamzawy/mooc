<?php

class coursesModel extends model
{
    /**
     * add new course
     * @param $dataArray
     * @return bool
     */
    public function addCourse($dataArray)
    {
        if(System::Get('db')->Insert('courses',$dataArray))
            return true;

        return false;
    }


    /**
     * update course
     * @param $id
     * @param $dataArray
     * @return bool
     */
    public function updateCourse($id,$dataArray)
    {
        if(System::Get('db')->Update('courses',$dataArray,"WHERE `course_id`=$id"))
            return true;

        return false;
    }


    /**
     * delete course
     * @param $id
     * @return bool
     */
    public function deleteCourse($id)
    {
        if(System::Get('db')->Delete('courses',"WHERE `course_id`=$id"))
            return true;

        return false;
    }


    /**
     * @param string $extra
     * @return array
     */
    public function getCourses($extra='')
    {
        System::Get('db')->Execute("SELECT `courses`.*,`courses_categories`.`category_name`,`users`.`username`FROM `courses` LEFT JOIN `courses_categories` ON `courses`.`course_category` = `courses_categories`.`category_id` LEFT JOIN `users` ON `courses`.`course_instructor` = `users`.`user_id` $extra");

        if(System::Get('db')->AffectedRows()>0)
            return System::Get('db')->GetRows();

        return [];
    }


    /**
     * get category by id
     * @param $id
     * @return array
     */
    public function getCourse($id)
    {
        $courses = $this->getCourses("WHERE `course_id`=$id");

        if(count($courses)>0)
            return $courses[0];

        return [];
    }


    public function getCoursesByInstructorId($id)
    {
        return $this->getCourses("WHERE `courses`.`course_instructor`=$id");
    }



    public function getCoursesByCategoryId($id)
    {
        return $this->getCourses("WHERE `courses`.`course_category`=$id");
    }
} 