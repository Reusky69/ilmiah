<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function get_employeeprofile()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        ";
        return $this->db->query($que)->result_array();
    }
    public function select_idprofile(){
        $userlogin = $this -> session ->userdata ('id_employee');
        $table = "SELECT user.*, gender.gender, agama.agama
        FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        ";
        $query=$this->db->query($table);
        return $query->result_array();
}

    public function get_agama()
    {
        $query = "SELECT * FROM agama";
        return $this->db->query($query)->result_array();
    }

    public function get_gender()
    {
        $query = "SELECT * FROM gender";
        return $this->db->query($query)->result_array();
    }

    public function get_employeeplacement()
    {
        $que = "SELECT * FROM employeeplacement
        INNER JOIN company ON employeeplacement.id_company = company.id_company
        INNER JOIN directorate ON employeeplacement.id_directorate = directorate.id_directorate
        INNER JOIN division ON employeeplacement.id_division = division.id_division
        INNER JOIN sub_division ON employeeplacement.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON employeeplacement.id_level = level_position.id_level
        INNER JOIN job_position ON employeeplacement.id_job = job_position.id_job
        INNER JOIN status_jabatan ON employeeplacement.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON employeeplacement.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON employeeplacement.id_grade = grade_level.id_grade
        INNER JOIN unit ON employeeplacement.id_unit = unit.id_unit
        INNER JOIN consol_level ON employeeplacement.id_consol = consol_level.id_consol
        ";
        return $this->db->query($que)->result_array();
    }
    
    public function get_place()
    {
        $que = "SELECT user.*, employeeplacement.* 
        From user
        Join employeeplacement on user.id_employee = employeeplacement.id_employee where user. id_employee
        ";
        return $this->db->query($que)->result_array();

    }

}