<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});

class StudentService
{
    public function getAllStudents(){
        return Database::getInstance()
            ->query("SELECT id, firstName, lastName, gender, dateOfBirth, city, province, country, postalCode, email FROM `tblstudent` WHERE role='student' ORDER BY id DESC");
    }

    public function deleteStudentByID($id){
        return Database::getInstance()
            ->execStmt("DELETE FROM `tblstudent` WHERE id = ?", "s", $id);
    }
}