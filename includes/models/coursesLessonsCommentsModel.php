<?php

class coursesLessonsCommentsModel extends model
{


    public function addComment($dataArray)
    {
        if(System::Get('db')->Insert('courses_lessons_comments',$dataArray))
            return true;

        return false;
    }


    public function updateComment($id,$dataArray)
    {
        if(System::Get('db')->Update('courses_lessons_comments',$dataArray,"WHERE `comment_id`=$id"))
            return true;

        return false;
    }



    public function deleteComment($id)
    {
        if(System::Get('db')->Delete('courses_lessons_comments',"WHERE `comment_id`=$id"))
            return true;

        return false;
    }



    public function getComments($lessonId,$extra='')
    {
        System::Get('db')->Execute("SELECT `courses_lessons_comments`.*,`users`.`username` FROM `courses_lessons_comments` LEFT JOIN `users` ON `courses_lessons_comments`.`comment_user`=`users`.`user_id` $extra");

        if(System::Get('db')->AffectedRows()>0)
            return System::Get('db')->GetRows();

        return [];
    }



    public function getComment($id)
    {
        $lessons = $this->getComments("WHERE `courses_lessons_comments`.`comment_id`=$id");

        if(count($lessons)>0)
            return $lessons[0];

        return [];
    }

} 