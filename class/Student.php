<?php

class Student extends Person
{
    private $studentId;

    public function setStudentID($studentId)
    {
        $this->studentId = $studentId;
    }

    public function getStudentID()
    {
        return $this->studentId;
    }

    //method addCourse
    public function addCourse($course)
    {
        echo "Course added: " . $course;
    }
}
