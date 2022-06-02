<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();   
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('hp', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $name = $this->input->post('name');
            $hp = $this->input->post('hp');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diuplad
            $upload_image = $_FILES['image']['name'];
            
            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 10000;
                $config['upload_path'] = './assets/img/profile/';
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
                
            }

            $this->db->set('name', $name);
            $this->db->set('hp', $hp);
            $this->db->set('alamat', $alamat);
            $this->db->where('email', $email);
            $this->db->update('user');

            set_pesan('Your profile has been changed!');
            redirect('user');
        }

    }
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');

        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //passwordnya sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    set_pesan('Password changed successfully');
                    redirect('user/changepassword');
                    }
                
            }
        }
    }

    public function information()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];
        $this->load->model('User_model');
        $userlogin = $this -> session ->userdata ('id_employee');
        $data['employeeprofile1'] = $this->db->get_where('user', ['id_employee' => $this->session->userdata('id_employee')])->row_array();
        $query = $this->db->query("SELECT user.id_employee,
                                    agama.agama, gender.gender
                                    FROM user 
                                    JOIN agama
                                    ON user.id_agama = agama.id_agama
                                    JOIN gender
                                    ON user.id_gender = gender.id_gender
                                    where user.id_employee = $userlogin ")->result();
        $data['ep'] = $query;

        $data['employeeprofile'] = $this->db->get_where('user', ['id_employee' => $this->session->userdata('id_employee')])->row_array();
        $query1 = $this->db->query("SELECT user.id_employee,
                                    company.company_name, directorate.directorate_name,division.division_name,
                                    sub_division.subdivision_name, level_position.level_name, job_position.job_name,
                                    status_jabatan.status_jabatan_name, statusemployee.status_employee,
                                    grade_level.grade_level, unit.unit, consol_level.consol_name
                                    FROM user 
                                    JOIN company
                                    ON user.id_company = company.id_company
                                    JOIN directorate
                                    ON user.id_directorate = directorate.id_directorate
                                    JOIN division
                                    ON user.id_division = division.id_division
                                    JOIN sub_division
                                    ON user.id_subdivision = sub_division.id_subdivision
                                    JOIN level_position
                                    ON user.id_level = level_position.id_level
                                    JOIN job_position
                                    ON user.id_job = job_position.id_job
                                    JOIN status_jabatan
                                    ON user.id_status_jabatan = status_jabatan.id_status_jabatan
                                    JOIN statusemployee
                                    ON user.id_status_employee = statusemployee.id_status_employee
                                    JOIN grade_level
                                    ON user.id_grade = grade_level.id_grade
                                    JOIN unit
                                    ON user.id_unit = unit.id_unit
                                    JOIN consol_level
                                    ON user.id_consol = consol_level.id_consol
                                    where user.id_employee = $userlogin ")->result();
        $data['employeeprofile'] = $query1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/info', $data);
        $this->load->view('templates/footer');
    }

    public function leaves()
    {
        $data['title'] = 'Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');
        
        $id = $this->session->userdata('id_employee');
        $data['leaves'] = $this->Admin_model->leave_user($id);
        // echo "<pre>";
        // print_r($data['leaves']);die;
        $data['status_leaves'] = $this->Admin_model->get_status_leaves();
        $data['company'] = $this->Admin_model->get_company();
        $data['leave_type'] = $this->Admin_model->get_leave_type();
        $data['admin'] = $this->db->get('leaves')->result_array();
        // echo "<pre>";
        // print_r($data);die;


        // $data['leaves'] = $this->db->get_where('leaves', ['id_employee' => $this->session->userdata('id_employee')])->row_array();
        // $query = $this->db->query("SELECT leaves.id_employee, 
        //                             where leaves.id_employee = $userlogin ")->result();
        // $data['leaves'] = $query;
        
        $this->form_validation->set_rules('id_leave_type', 'id_leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('id_status', 'id_status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/leaves/leaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_leave_type' => $this->input->post('id_leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'id_status' => $this->input->post('id_status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('leaves', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New company added!</div>');
        redirect('menu/admin');
    }
    }

    public function leaves_add()
    {
        $data['title'] = 'Add Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');
        $userlogin = $this -> session ->userdata ('id_employee');
        $data['usernya'] =  $this->db->query("SELECT user.*, company.*
                                    FROM user 
                                    JOIN company 
                                    on user.id_company = company.id_company
                                    WHERE user.id_employee = $userlogin")->row_array();

        $data['leaves'] = $this->admin->get_leaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['leave_type'] = $this->admin->get_leave_type();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_leave_type', 'id_leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/leaves/add', $data);
        $this->load->view('templates/footer', $data);
        } else {
            $id_company = $this->input->post('id_company', true);
            $id_employee = $this->input->post('id_employee', true);
            $id_leave_type = $this->input->post('id_leave_type', true);
            $leave_reason = $this->input->post('leave_reason', true);
            $start_date = $this->input->post('start_date', true);
            $end_date = $this->input->post('end_date', true);
            $data = [
                'id_employee' => htmlspecialchars($id_employee),
                'id_company' => htmlspecialchars($id_company),
                'id_leave_type' => htmlspecialchars($id_leave_type),
                'leave_reason' => htmlspecialchars($leave_reason),
                'start_date' => htmlspecialchars($start_date),
                'end_date' => htmlspecialchars($end_date),
                'id_status' => 3,
                'remarks' => '-'
            ];
            $save = $this->admin->insert('leaves', $data);

            if ($save) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New employeeprofile added!</div>');
                redirect('user/leaves');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal!</div>');
                redirect('user/leaves_add');
            }
        }
    

    }
}