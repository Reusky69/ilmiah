<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
        
    }
    
    
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'), 
                'menu_id' => $this->input->post('menu_id'), 
                'url' => $this->input->post('url'), 
                'icon' => $this->input->post('icon'), 
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
 
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/role', $data);
        $this->load->view('templates/footer');
    } 
    
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 3);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/role-access', $data);
        $this->load->view('templates/footer');
    }



    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        set_pesan('Access changed successfully');
    }


    public function usermanagement()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['usermanagement'] = $this->menu->get_usermanagement();
        $data['roleadmin'] = $this->menu->get_roleadmin();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('id_role_admin', 'id_role_admin', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/usermanagement/user', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'id_role_admin' => $this->input->post('id_role_admin')
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New company added!</div>');
        redirect('menu/admin');
    }
    }

    public function usermanagement_add()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['employeeprofile'] = $this->menu->getDataEmployeeProfile();
        $data['user1'] = $this->menu->get_usermanagement();
        $data['menu'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name');
        $this->form_validation->set_rules('email', 'email');
        $this->form_validation->set_rules('password', 'password');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = "User Management";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/employee/usermanagement/add', $data);
            $this->load->view('templates/footer');

        } else {
            $email = $this->input->post('email', true);
            $id_employee = $this->input->post('id_employee', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'id_employee' => htmlspecialchars($id_employee),
                'email' => htmlspecialchars($email),
                'image' => 'user.png',
                'role_id' => 3,
                'id_role_admin' => 2,
                'password' => 123456,
                'is_active' => 1,
                'date_created' => time()
            ];

            $save = $this->menu->insert('user', $data);
            $upload_image = $_FILES['image']['name'];
            
            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if($old_image != 'user.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
                
            }
            if ($save) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New directorate added!</div>');
                redirect('menu/usermanagement');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal!</div>');
                redirect('menu/usermanagement_add');
            }
        }
    

    }

    public function usermanagement_edit()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model');

        $id = $this->input->get('id');
        $data['usertbl'] = $this->Menu_model->selectusertbl($id);


        $this->form_validation->set_rules('id_employee', 'Id user');
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('id_role_admin', 'id_role_admin', 'required|trim');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/usermanagement/edit', $data);
        $this->load->view('templates/footer');
        } else {
            $id_employee = $this->input->post('id_employee');
            $name = $this->input->post('name');
            $id_role_admin = $this->input->post('id_role_admin');

            $this->db->where('id_employee', $id_employee);
            $this->db->set('name', $name);
            $this->db->set('id_role_admin', $id_role_admin);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Management has been updated!</div>');
            redirect('menu/usermanagement');
        
        }

    
    }

	// public function usermanagement_delete($getId)
    // {
    //     $this->load->model('Admin_model', 'admin');
    //     $id = encode_php_tags($getId);
    //     if ($this->admin->delete('user', 'id_user', $id)) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
    //     }
    //     redirect('menu/usermanagement');
    // }

    public function toggle($getId)
    {
        $id = encode_php_tags($getId);
        $this->load->model('Admin_model', 'admin');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('id_role_admin', 'id_role_admin', 'required');

        $status = $this->admin->get('user', ['id_employee' => $id])['is_active'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

        if ($this->admin->update('user', 'id_employee', $id, ['is_active' => $toggle])) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil dinonaktifkan</div>');
        }
        redirect('menu/usermanagement');
    }


} 