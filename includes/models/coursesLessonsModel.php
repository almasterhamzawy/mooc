<?php

class coursesLessonsModel extends model
{
    public function addLesson($dataArray)
    {
        if(System::Get('db')->Insert('courses_lesson',$dataArray))
            return true;

        $this->setError('error adding lesson ,'.System::Get('db')->getDBErrors());
        return false;
    }


    public function updateLesson($id,$dataArray)
    {
        if(System::Get('db')->Update('courses_lessons',$dataArray,"WHERE `lesson_id`=$id"))
            return true;

        return false;
    }



    public function deleteLesson($id)
    {
        if(System::Get('db')->Delete('courses_lessons',"WHERE `lesson_id`=$id"))
            return true;

        return false;
    }



    public function getLessons($extra='')
    {
        System::Get('db')->Execute("SELECT `courses_lessons`.*,`courses`.`course_title`,`users`.`username` FROM `courses_lessons` LEFT JOIN `courses` ON `courses_lessons`.`lesson_course`=`courses`.`course_id` LEFT JOIN `users` ON `courses_lessons`.`lesson_instructor`=`users`.`user_id` $extra");

        if(System::Get('db')->AffectedRows()>0)
            return System::Get('db')->GetRows();

        return [];
    }



    public function getLessonsByCourseId($courseId)
    {
        $lessons = $this->getLessons("WHERE `courses_lessons`.`lesson_course`=$courseId");

        if(count($lessons)>0)
            return $lessons;
        return [];
    }



    public function getLesson($id)
    {
        $lessons = $this->getLessons("WHERE `courses_lessons`.`lesson_id`=$id");

        if(count($lessons)>0)
            return $lessons[0];

        return [];
    }

} 