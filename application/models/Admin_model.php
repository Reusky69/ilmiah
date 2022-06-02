<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    // public function autonumber()
    // {
    //     $thn=date("Ym");
    //     $this->db->select('RIGHT(user.id_employee, 4) as nim', FALSE);
    //     $this->db->order_by('id_employee', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('user');

    //     if($query->num_rows() <> 0)
    //     {
    //         $data = $query->row();
    //         $autonumber = intval($data->id_employee) + 1;
    //     } else { $autonumber = 1;}
    //     $limit = str_pad($autonumber, 4, "0", STR_PAD_LEFT);
    //     $id_employee = $thn.$limit;
    //     return $id_employee;
    // }
    public function tampil_data1()
    {
        return $this->db->get('company');
    }
    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function get_agem1()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) < 21 AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef1()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) < 21 AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }

    public function get_agem2()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 21 AND 25 
        AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef2()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 21 AND 25 
        AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }
    public function get_agem3()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 26 AND 30 
        AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef3()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 26 AND 30 
        AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }
    public function get_agem4()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 31 AND 35 
        AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef4()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 31 AND 35 
        AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }
    public function get_agem5()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 36 AND 40 
        AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef5()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 36 AND 40 
        AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }
    public function get_agem6()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 41 AND 45 
        AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef6()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 41 AND 45 
        AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }
    public function get_agem7()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 46 AND 50 
        AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef7()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) BETWEEN 46 AND 50 
        AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }
    public function get_agem8()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) > 51 AND id_gender = 1";
        return $this->db->query($query)->num_rows();
    }

    public function get_agef8()
    {
        $query = "SELECT *,YEAR(CURDATE()) - YEAR(`tgl_lahir`) AS umur
        FROM `user`
        WHERE YEAR(CURDATE()) - YEAR(`tgl_lahir`) > 51 AND id_gender = 2";
        return $this->db->query($query)->num_rows();
    }

    
    
    public function select_idcom($where){
            $id = $where;
            $table = "SELECT * FROM company WHERE id_company = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_iddir($where){
            $id = $where;
            $table = "SELECT * FROM directorate WHERE id_directorate = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_iddiv($where){
            $id = $where;
            $table = "SELECT * FROM division WHERE id_division = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idsubdiv($where){
            $id = $where;
            $table = "SELECT * FROM sub_division WHERE id_subdivision = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idlev($where){
            $id = $where;
            $table = "SELECT * FROM level_position WHERE id_level = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idjob($where){
            $id = $where;
            $table = "SELECT * FROM job_position WHERE id_job = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idconsol($where){
            $id = $where;
            $table = "SELECT * FROM consol_level WHERE id_consol = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idstatus($where){
            $id = $where;
            $table = "SELECT * FROM status_jabatan WHERE id_status_jabatan = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idgrade($where){
            $id = $where;
            $table = "SELECT * FROM grade_level WHERE id_grade = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_idunit($where){
            $id = $where;
            $table = "SELECT * FROM unit WHERE id_unit = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }

    public function select_idprofile($where){
            $id = $where;
            $table = "SELECT * FROM user WHERE id_employee = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }

    public function select_idplacement($where){
            $id = $where;
            $table = "SELECT * FROM employeeplacement WHERE id_employee = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }
    public function select_iduser($where){
            $id = $where;
            $table = "SELECT * FROM user WHERE id_employee = '$id' ";
            $query=$this->db->query($table);
            return $query->result_array();
    }




    public function get_user1()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    public function get_company()
    {
        $query = "SELECT * FROM company";
        return $this->db->query($query)->result_array();
    }
    public function get_company1()
    {
        $query = "SELECT * FROM company WHERE id_company=1";
        return $this->db->query($query)->result_array();
    }
    

    public function get_direct()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        ";
        return $this->db->query($que)->result_array();

    }

    public function get_division()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_subdivision()
    {
        $que = "SELECT sub_division.*,division.division_name
        FROM sub_division JOIN division
        ON sub_division.id_division = division.id_division
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_level()
    {
        $query = "SELECT * FROM level_position";
        return $this->db->query($query)->result_array();
    }
    public function get_job()
    {
        $que = "SELECT job_position.*,level_position.level_name
        FROM job_position JOIN level_position
        ON job_position.id_level = level_position.id_level
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_consol()
    {
        $query = "SELECT * FROM consol_level";
        return $this->db->query($query)->result_array();
    }
    public function get_status_jabatan()
    {
        $query = "SELECT * FROM status_jabatan";
        return $this->db->query($query)->result_array();
    }
    public function get_gradelevel()
    {
        $query = "SELECT * FROM grade_level";
        return $this->db->query($query)->result_array();
    }
    public function get_unit()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_employeeprofile()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_usermanagement()
    {
        $que = "SELECT * FROM user
        INNER JOIN user_role_admin ON user.id_role_admin = user_role_admin.id_role_admin
        ";
        return $this->db->query($que)->result_array();
    }

    public function get_agama()
    {
        $query = "SELECT * FROM agama";
        return $this->db->query($query)->result_array();
    }
    public function get_roleadmin()
    {
        $query = "SELECT * FROM user_role_admin";
        return $this->db->query($query)->result_array();
    }
    public function get_gender()
    {
        $query = "SELECT * FROM gender";
        return $this->db->query($query)->result_array();
    }
    public function get_user()
    {
        $que = "SELECT user.*,user_role_admin.role_admin
        FROM user JOIN user_role_admin
        ON user.id_role_admin = user_role_admin.id_role_admin
        ";
        return $this->db->query($que)->result_array();
    }


    public function get_employeeplacement()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_manageleaves()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        ";
        return $this->db->query($que)->result();
    }
    
    public function get_status_leaves()
    {
        $query = "SELECT * FROM status_leaves";
        return $this->db->query($query)->result_array();
    }
    public function select_manageleaves($where){
        $id = $where;
        $table = "SELECT * FROM leaves WHERE id_leaves = '$id' ";
        $query=$this->db->query($table);
        return $query->result_array();
    }
    public function get_leave_type()
    {
        $query = "SELECT * FROM leave_type";
        return $this->db->query($query)->result_array();
    }
    public function leave_user($id)
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE leaves.id_employee= $id
        ";
        return $this->db->query($que)->result();
    }
    public function get_leaves()
    {
        $que = "SELECT leaves.*, status_leaves.*, leave_type.* 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        ";
        return $this->db->query($que)->result();
    }




    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function getDataDirectorate()
    {
        $query = "SELECT * FROM directorate";
        return $this->db->query($query)->result_array();
    }
    public function getDataDivision()
    {
        $query = "SELECT * FROM division";
        return $this->db->query($query)->result_array();
    }
    public function getDataEmployeeProfile()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    public function getDataEmployeePlacement()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    public function getDataSubDivision()
    {
        $query = "SELECT * FROM sub_division";
        return $this->db->query($query)->result_array();
    }
    public function getDataJob()
    {
        $query = "SELECT * FROM job_position";
        return $this->db->query($query)->result_array();
    }
    public function getDataStatusEmployee()
    {
        $query = "SELECT * FROM statusemployee";
        return $this->db->query($query)->result_array();
    }
    public function getDataUnit()
    {
        $query = "SELECT * FROM unit";
        return $this->db->query($query)->result_array();
    }

    public function tampil_data(){
        return $this->db->get('user');
    }
    
    public function cari($id){
        $query= $this->db->get_where('user',array('id_employee'=>$id));
        return $query;
    }

    public function get_direct1()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 1
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct2()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 2
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct3()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 3
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct4()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 4
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct5()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 5
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct6()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 6
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct7()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 7
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct8()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 8
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct9()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 9
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct10()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 10
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_direct11()
    {
        $que = "SELECT directorate.*,company.company_name
        FROM directorate JOIN company
        ON directorate.id_company = company.id_company
        WHERE company.id_company = 11
        ";
        return $this->db->query($que)->result_array();

    }

    public function get_div1()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 1
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div2()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 2
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div3()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 3
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div4()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 4
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div5()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 5
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div6()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 6
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div7()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 7
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div8()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 8
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div9()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 9
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div10()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 10
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function get_div11()
    {
        $que = "SELECT division.*,directorate.directorate_name
        FROM division JOIN directorate
        ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 11
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div1()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 1
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div2()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 2
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div3()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 3
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div4()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 4
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div5()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 5
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div6()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 6
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div7()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 7
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div8()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 8
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div9()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 9
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div10()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 10
        ";
        return $this->db->query($que)->result_array();
        
    }
    public function getsub_div11()
    {
        $que = "SELECT sub_division.*,division.division_name FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 11
        ";
        return $this->db->query($que)->result_array();
        
    }

    public function get_unit1()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 1
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit2()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 2
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit3()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 3
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit4()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 4
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit5()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 5
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit6()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 6
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit7()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 7
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit8()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 8
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit9()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 9
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit10()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 10
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_unit11()
    {
        $que = "SELECT unit.*,company.company_name
        FROM unit JOIN company
        ON unit.id_company = company.id_company
        WHERE company.id_company = 11
        ";
        return $this->db->query($que)->result_array();
    }


    // INDEX ADMIN 1-11
    public function dir1()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir2()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir3()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir4()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir5()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir6()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir7()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir8()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir9()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir10()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function dir11()
    {
        $que = "SELECT id_directorate FROM directorate
        WHERE id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function div1()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 1
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div2()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 2
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div3()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 3
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div4()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 4
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div5()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 5
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div6()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 6
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div7()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 7
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div8()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 8
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div9()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 9
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div10()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 10
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function div11()
    {
        $que = "SELECT id_division FROM division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 11
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div1()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 1
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div2()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 2
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div3()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 3
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div4()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 4
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div5()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 5
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div6()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 6
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div7()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 7
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div8()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 8
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div9()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 9
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div10()
    {

        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 10
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function sub_div11()
    {
        $que = "SELECT id_subdivision FROM sub_division
        INNER JOIN division ON sub_division.id_division = division.id_division
        INNER JOIN directorate ON division.id_directorate = directorate.id_directorate
        WHERE directorate.id_company = 11
        ";
        return $this->db->query($que)->num_rows();
        
    }
    public function male1()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 1 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function female1()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 1 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();
    }

    public function male2()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 2 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function female2()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 2 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();
    }

    public function male3()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 3 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female3()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 3 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male4()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 4 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female4()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 4 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male5()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 5 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female5()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 5 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male6()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 6 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female6()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 6 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male7()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 7 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female7()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 7 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male8()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 8 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female8()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 8 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male9()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 9 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female9()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 9 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male10()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 10 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    
    public function female10()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 10 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function male11()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 11 AND user.id_gender = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }

    public function female11()
    {
        $que = "SELECT * FROM user
        WHERE user.id_company = 11 AND user.id_gender = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }

    public function permanent1()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent1()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }


    public function permanent2()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent2()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }

    
    public function permanent3()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent3()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }

        public function permanent4()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent4()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    
    public function permanent5()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent5()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    
    public function permanent6()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent6()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    
    public function permanent7()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent7()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }

    public function permanent8()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent8()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    
    public function permanent9()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent9()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    
    public function permanent10()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent10()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    
    
    public function permanent11()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 1 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();

        
    }
    public function nonpermanent11()
    {
        $que = "SELECT * FROM user
        WHERE id_status_employee = 2 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu1()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua1()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga1()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat1()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima1()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam1()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu2()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua2()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga2()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat2()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima2()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam2()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu3()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua3()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga3()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat3()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima3()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam3()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu4()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua4()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga4()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat4()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima4()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam4()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu5()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua5()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga5()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat5()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima5()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam5()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu6()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua6()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga6()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat6()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima6()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam6()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu7()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua7()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga7()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat7()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima7()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam7()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu8()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua8()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga8()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat8()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima8()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam8()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu9()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua9()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga9()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat9()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima9()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam9()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu10()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua10()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga10()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat10()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima10()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam10()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolsatu11()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 1 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoldua11()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 2 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consoltiga11()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 3 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolempat11()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 4 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consollima11()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 5 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function consolenam11()
    {
        $que = "SELECT * FROM user
        WHERE id_consol = 6 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }

    public function gradesatu1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats1()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 1
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats2()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 2
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats3()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 3
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats4()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 4
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats5()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 5
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats6()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 6
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats7()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 7
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats8()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 8
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats9()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 9
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats10()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 10
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesatu11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 1 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedua11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 2 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetiga11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 3 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempat11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 4 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradelima11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 5 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeenam11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 6 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetujuh11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 7 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradedelapan11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 8 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesembilan11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 9 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesepuluh11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 10 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradesebelas11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 11 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeduas11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 12 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradetigas11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 13 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }
    public function gradeempats11()
    {
        $que = "SELECT * FROM user
        WHERE id_grade = 14 AND id_company = 11
        ";
        return $this->db->query($que)->num_rows();
    }


    public function employeeprofile1()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 1
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile2()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 2
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile3()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 3
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile4()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 4
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile5()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 5
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile6()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 6
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile7()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 7
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile8()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 8
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile9()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 9
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile10()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 10
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeprofile11()
    {
        $que = "SELECT * FROM user
        INNER JOIN agama ON user.id_agama = agama.id_agama
        INNER JOIN gender ON user.id_gender = gender.id_gender
        WHERE user.id_company = 11
        ";
        return $this->db->query($que)->result_array();
    }


    public function employeeplacement1()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 1
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement2()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 2
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement3()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 3
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement4()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 4
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement5()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 5
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement6()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 6
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement7()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 7
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement8()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 8
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement9()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 9
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement10()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 10
        ";
        return $this->db->query($que)->result_array();
    }
    public function employeeplacement11()
    {
        $que = "SELECT * FROM user
        INNER JOIN company ON user.id_company = company.id_company
        INNER JOIN directorate ON user.id_directorate = directorate.id_directorate
        INNER JOIN division ON user.id_division = division.id_division
        INNER JOIN sub_division ON user.id_subdivision = sub_division.id_subdivision
        INNER JOIN level_position ON user.id_level = level_position.id_level
        INNER JOIN job_position ON user.id_job = job_position.id_job
        INNER JOIN status_jabatan ON user.id_status_jabatan = status_jabatan.id_status_jabatan
        INNER JOIN statusemployee ON user.id_status_employee = statusemployee.id_status_employee
        INNER JOIN grade_level ON user.id_grade = grade_level.id_grade
        INNER JOIN unit ON user.id_unit = unit.id_unit
        INNER JOIN consol_level ON user.id_consol = consol_level.id_consol
        WHERE user.id_company = 11
        ";
        return $this->db->query($que)->result_array();
    }

    public function get_leaves1()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 1
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves2()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 2
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves3()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 3
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves4()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 4
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves5()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 5
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves6()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 6
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves7()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 7
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves8()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 8
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves9()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 9
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves10()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 10
        ";
        return $this->db->query($que)->result_array();

    }
    public function get_leaves11()
    {
        $que = "SELECT * 
        FROM leaves
        INNER JOIN company ON leaves.id_company = company.id_company
        INNER JOIN user ON leaves.id_employee = user.id_employee
        INNER JOIN status_leaves ON leaves.id_status = status_leaves.id_status
        INNER JOIN leave_type ON leaves.id_leave_type = leave_type.id_leave_type
        WHERE company.id_company = 11
        ";
        return $this->db->query($que)->result_array();

    }

}