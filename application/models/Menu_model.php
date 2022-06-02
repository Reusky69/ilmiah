<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model{
    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*,user_menu.menu
                    FROM user_sub_menu JOIN user_menu
                    ON user_sub_menu.menu_id = user_menu.id
        ";
        return $this->db->query($query)->result_array();
    }

    public function get_usermanagement()
    {
        $que = "SELECT * FROM user
        INNER JOIN user_role_admin ON user.id_role_admin = user_role_admin.id_role_admin
        ";
        return $this->db->query($que)->result_array();
    }
    public function get_roleadmin()
    {
        $query = "SELECT * FROM user_role_admin";
        return $this->db->query($query)->result_array();
    }
    public function getDataEmployeeProfile()
    {
    $query = "SELECT * FROM user";
    return $this->db->query($query)->result_array();
    }
    public function selectusertbl($where){
    $id = $where;
    $table = "SELECT * FROM user WHERE id_employee = '$id' ";
    $query=$this->db->query($table);
    return $query->result_array();
    }


    
    public function get_user()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
    public function select_iduser($where){
        $id = $where;
        $table = "SELECT * FROM user WHERE id_employee = '$id' ";
        $query=$this->db->query($table);
        return $query->result_array();
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
public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }





}