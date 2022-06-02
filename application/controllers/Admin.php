<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');
        $data['employeeprofile'] = $this->admin->count('user');
        $data['company'] = $this->admin->count('company');
        $data['directorate'] = $this->admin->count('directorate');
        $data['division'] = $this->admin->count('division');
        $data['sub_division'] = $this->admin->count('sub_division');

        $result1 = $this->db->get_where('user', array('id_gender' => 1))->num_rows();
        $result2 = $this->db->get_where('user', array('id_gender' => 2))->num_rows();
        $result = "{ label: 'laki-laki', value: $result1 }, { label: 'perempuan', value: $result2 }";
        $data['gender'] = $result;
        $data['male'] = $result1;
        $data['female'] = $result2;

        $status1 = $this->db->get_where('user', array('id_status_employee' => 1))->num_rows();
        $status2 = $this->db->get_where('user', array('id_status_employee' => 2))->num_rows();
        $data['permanent'] = $status1;
        $data['nonpermanent'] = $status2;
        
        $consol1 = $this->db->get_where('user', array('id_consol' => 1))->num_rows();
        $consol2 = $this->db->get_where('user', array('id_consol' => 2))->num_rows();
        $consol3 = $this->db->get_where('user', array('id_consol' => 3))->num_rows();
        $consol4 = $this->db->get_where('user', array('id_consol' => 4))->num_rows();
        $consol5 = $this->db->get_where('user', array('id_consol' => 5))->num_rows();
        $consol6 = $this->db->get_where('user', array('id_consol' => 6))->num_rows();
        $data['bod'] = $consol1;
        $data['bod1'] = $consol2;
        $data['bod2'] = $consol3;
        $data['komisaris'] = $consol4;
        $data['komite'] = $consol5;
        $data['other'] = $consol6;

        $level1 = $this->db->get_where('user', array('id_grade' => 1))->num_rows();
        $level2 = $this->db->get_where('user', array('id_grade' => 2))->num_rows();
        $level3 = $this->db->get_where('user', array('id_grade' => 3))->num_rows();
        $level4 = $this->db->get_where('user', array('id_grade' => 4))->num_rows();
        $level5 = $this->db->get_where('user', array('id_grade' => 5))->num_rows();
        $level6 = $this->db->get_where('user', array('id_grade' => 6))->num_rows();
        $level7 = $this->db->get_where('user', array('id_grade' => 7))->num_rows();
        $level8 = $this->db->get_where('user', array('id_grade' => 8))->num_rows();
        $level9 = $this->db->get_where('user', array('id_grade' => 9))->num_rows();
        $level10 = $this->db->get_where('user', array('id_grade' => 10))->num_rows();
        $level11 = $this->db->get_where('user', array('id_grade' => 11))->num_rows();
        $level12 = $this->db->get_where('user', array('id_grade' => 12))->num_rows();
        $level13 = $this->db->get_where('user', array('id_grade' => 13))->num_rows();
        $level14 = $this->db->get_where('user', array('id_grade' => 14))->num_rows();
        $data['I'] = $level1;
        $data['II'] = $level2;
        $data['III'] = $level3;
        $data['IV'] = $level4;
        $data['IX'] = $level5;
        $data['V'] = $level6;
        $data['VI'] = $level7;
        $data['VIII'] = $level8;
        $data['X'] = $level9;
        $data['XI'] = $level10;
        $data['XII'] = $level11;
        $data['XIII'] = $level12;
        $data['XIV'] = $level13;
        $data['XV'] = $level14;
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }
    

    //COMPANY
    public function company()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['company'] = $this->admin->get_company();
        $data['admin'] = $this->db->get('company')->result_array();


        $this->form_validation->set_rules('id_company', 'Id_company');
        $this->form_validation->set_rules('company_name', 'Company_name', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/company/company', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'), 
            'company_name' => $this->input->post('company_name'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->insert('company', $data);
        redirect('menu/admin');
    }
    }

    
    public function company_add()
    {
        $data['title'] = 'Add Company';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['company'] = $this->admin->get_company();
        $data['admin'] = $this->db->get('company')->result_array();

        $this->form_validation->set_rules('id_company', 'Id_company');
        $this->form_validation->set_rules('company_name', 'Company_name', 'required');
        
        if ($this->form_validation->run() == false) {
            $data['title'] = "Add Company";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datamaster/company/add', $data);
            $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('company', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/company');
        } else {
            set_pesan('Data failed to add', false);
        }
                redirect('admin/company_add');
            }
        }
    
    public function company_edit()
    {
        $data['title'] = 'Edit Company';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $data['company'] = $this->Admin_model->get_company();
        $id = $this->input->get('id');
        $data['company'] = $this->Admin_model->select_idcom($id);
        //$data['company'] = $this->Admin_model->select_idcom();
        $this->form_validation->set_rules('id_company', 'Id company');
        $this->form_validation->set_rules('company_name', 'Company name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');

        if($this->form_validation->run() == false) {
           $this->load->view('templates/header', $data);
           $this->load->view('templates/sidebar2', $data);
           $this->load->view('templates/topbar', $data);
           $this->load->view('admin/datamaster/company/edit', $data);
           $this->load->view('templates/footer');

        } else {
           $id_company = $this->input->post('id_company');
           $company_name = $this->input->post('company_name');
           $alamat = $this->input->post('alamat');

           $this->db->where('id_company', $id_company);
           $this->db->set('company_name', $company_name);
           $this->db->set('alamat', $alamat);
           $this->db->update('company');

           set_pesan('Data changed successfully');
           redirect('admin/company');
        }

    }


	public function company_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('company', 'id_company', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/company');
    }
	
    

    

    //DIRECTORATE
    public function directorate()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }

    public function directorate_add()
    {
        $data['title'] = 'Add Directorate';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct();
        $data['company'] = $this->admin->get_company();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datamaster/directorate/add', $data);
            $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('directorate', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/directorate');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/directorate_add');
            }
    }
}

    public function directorate_edit()
    {
        $data['title'] = 'Edit Directorate';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        
        
        
        $id = $this->input->get('id');
        $data['directorate'] = $this->Admin_model->select_iddir($id);
        $data['company'] = $this->Admin_model->get_company();
        
        $this->form_validation->set_rules('id_directorate', 'Id_directorate');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datamaster/directorate/edit', $data);
            $this->load->view('templates/footer');


        } else {
            $id_directorate = $this->input->post('id_directorate');
            $directorate_name = $this->input->post('directorate_name');
            $id_company = $this->input->post('id_company');

            $this->db->where('id_directorate', $id_directorate);
            $this->db->set('directorate_name', $directorate_name);
            $this->db->set('id_company', $id_company);
            $this->db->update('directorate');

            set_pesan('Data changed successfully');
            redirect('admin/directorate');
        }

    }

    public function directorate_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('directorate', 'id_directorate', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/directorate');
    }




    public function division()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_division();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }



    public function division_add()
    {
        $data['title'] = 'Add Division';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_division();
        $data['direct'] = $this->admin->getDataDirectorate();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/add', $data);
        $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('division', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/division');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/division_add');
            }
        }
    

    }

    public function division_edit()
    {
        $data['title'] = 'Edit Division';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

       
        
        $id = $this->input->get('id');
        $data['division'] = $this->Admin_model->select_iddiv($id);
        $data['direct'] = $this->Admin_model->getDataDirectorate();

        $this->form_validation->set_rules('id_division', 'Id_division');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datamaster/division/edit', $data);
            $this->load->view('templates/footer');


        } else {
            $id_division = $this->input->post('id_division');
            $division_name = $this->input->post('division_name');
            $id_directorate = $this->input->post('id_directorate');

            $this->db->where('id_division', $id_division);
            $this->db->set('division_name', $division_name);
            $this->db->set('id_directorate', $id_directorate);
            $this->db->update('division');

            set_pesan('Data changed successfully');
            redirect('admin/division');
        }

    }

    public function division_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('division', 'id_division', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/division');
    }





    public function subdivision()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->get_subdivision();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }

    public function subdivision_add()
    {
        $data['title'] = 'Add Sub Division';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->get_subdivision();
        $data['division'] = $this->admin->getDataDivision();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/add', $data);
        $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('sub_division', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/subdivision');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/subdivision_add');
            }
        }
    

    }

    public function subdivision_edit()
    {
        $data['title'] = 'Edit Sub Division';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

       
        
        $id = $this->input->get('id');
        $data['sub_division'] = $this->Admin_model->select_idsubdiv($id);
        $data['division'] = $this->Admin_model->getDataDivision();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datamaster/subdivision/edit', $data);
            $this->load->view('templates/footer');

        } else {
            $id_subdivision = $this->input->post('id_subdivision');
            $subdivision_name = $this->input->post('subdivision_name');
            $id_division = $this->input->post('id_division');

            $this->db->where('id_subdivision', $id_subdivision);
            $this->db->set('subdivision_name', $subdivision_name);
            $this->db->set('id_division', $id_division);
            $this->db->update('sub_division');

            set_pesan('Data changed successfully');
            redirect('admin/subdivision');
        }

    }

    public function subdivision_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('sub_division', 'id_subdivision', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/subdivision');
    }






    public function levelposition()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['level'] = $this->admin->get_level();
        $data['admin'] = $this->db->get('level_position')->result_array();

        $this->form_validation->set_rules('id_level', 'Id_level', 'required');
        $this->form_validation->set_rules('level_name', 'Level_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/levelposition/levelposition', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_level' => $this->input->post('id_level'), 
            'level_name' => $this->input->post('level_name')
        ];
        $this->db->insert('level_position', $data);
        redirect('menu/admin');
    }
    }

    public function levelposition_add()
    {
        $data['title'] = 'Add Position Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['level'] = $this->admin->get_level();
        $data['admin'] = $this->db->get('level_position')->result_array();

        $this->form_validation->set_rules('id_level', 'Id_level');
        $this->form_validation->set_rules('level_name', 'Level_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/levelposition/add', $data);
        $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('level_position', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/levelposition');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/levelposition_add');
            }
        }
    

    }
    
    public function levelposition_edit()
    {
        $data['title'] = 'Edit Position Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['level_position'] = $this->Admin_model->select_idlev($id);


        // $data['level'] = $this->admin->get_level();
        // $data['admin'] = $this->db->get('level_position')->result_array();

        $this->form_validation->set_rules('id_level', 'Id_level');
        $this->form_validation->set_rules('level_name', 'Level_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/levelposition/edit', $data);
        $this->load->view('templates/footer');
        } else {
            $id_level = $this->input->post('id_level');
            $level_name = $this->input->post('level_name');

            $this->db->where('id_level', $id_level);
            $this->db->set('level_name', $level_name);
            $this->db->update('level_position');

            set_pesan('Data changed successfully');
            redirect('admin/levelposition');
        
        }

    }


		
    public function levelposition_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('level_position', 'id_level', $id)) 
        {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/levelposition');
    }




    public function jobposition()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['job_position'] = $this->admin->get_job();
        $data['admin'] = $this->db->get('job_position')->result_array();

        $this->form_validation->set_rules('id_job', 'Id_Job');
        $this->form_validation->set_rules('job_name', 'Job_name', 'required');
        $this->form_validation->set_rules('id_level', 'id_level', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/jobposition/jobposition', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_job' => $this->input->post('id_job'), 
            'job_name' => $this->input->post('job_name'),
            'id_level' => $this->input->post('id_level')
        ];
        $this->db->insert('job_position', $data);
        redirect('menu/admin');
    }
    }
    public function jobposition_add()
    {
        $data['title'] = 'Add Position Job';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['job_position'] = $this->admin->get_job();
        $data['level'] = $this->admin->get_level();
        $data['admin'] = $this->db->get('job_position')->result_array();

        $this->form_validation->set_rules('id_job', 'Id_Job');
        $this->form_validation->set_rules('job_name', 'Job_name', 'required');
        $this->form_validation->set_rules('id_level', 'Id_level', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/jobposition/add', $data);
        $this->load->view('templates/footer');


        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('job_position', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/jobposition');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/jobposition_add');
            }
        }
    

    }

    public function jobposition_edit()
    {
        $data['title'] = 'Edit Position Job';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['job_position'] = $this->Admin_model->select_idjob($id);
        $data['level'] = $this->Admin_model->get_level();

        $this->form_validation->set_rules('id_job', 'Id_Job');
        $this->form_validation->set_rules('job_name', 'Job_name', 'required');
        $this->form_validation->set_rules('id_level', 'Id_level', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/jobposition/edit', $data);
        $this->load->view('templates/footer');

        } else {
            $id_job = $this->input->post('id_job');
            $job_name = $this->input->post('job_name');
            $id_level = $this->input->post('id_level');

            $this->db->where('id_job', $id_job);
            $this->db->set('job_name', $job_name);
            $this->db->set('id_level', $id_level);
            $this->db->update('job_position');

            set_pesan('Data changed successfully');
            redirect('admin/jobposition');
        }

    }

    public function jobposition_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('job_position', 'id_job', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/jobposition');
    }






    public function consollevel()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['consollevel'] = $this->admin->get_consol();
        $data['admin'] = $this->db->get('consol_level')->result_array();

        $this->form_validation->set_rules('id_consol', 'Id_consol');
        $this->form_validation->set_rules('consol_name', 'Consol_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/consollevel/consollevel', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_consol' => $this->input->post('id_consol'), 
            'consol_name' => $this->input->post('consol_name')
        ];
        $this->db->insert('consol_level', $data);
        redirect('menu/admin');
    }
    }


    public function consollevel_add()
    {
        $data['title'] = 'Add Console Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['consollevel'] = $this->admin->get_consol();
        $data['admin'] = $this->db->get('consol_level')->result_array();

        $this->form_validation->set_rules('id_consol', 'Id_consol');
        $this->form_validation->set_rules('consol_name', 'Consol_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/consollevel/add', $data);
        $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('consol_level', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/consollevel');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/consollevel_add');
            }
        }
    

    }
    public function consollevel_edit()
    {
        $data['title'] = 'Edit Console Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

       
        
        $id = $this->input->get('id');
        $data['consol_level'] = $this->Admin_model->select_idconsol($id);

        $this->form_validation->set_rules('id_consol', 'Id_consol');
        $this->form_validation->set_rules('consol_name', 'Consol_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/consollevel/edit', $data);
        $this->load->view('templates/footer');

        } else {
            $id_consol = $this->input->post('id_consol');
            $consol_name = $this->input->post('consol_name');

            $this->db->where('id_consol', $id_consol);
            $this->db->set('consol_name', $consol_name);
            $this->db->update('consol_level');

            set_pesan('Data changed successfully');
            redirect('admin/consollevel');
        }

    }

		public function consollevel_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('consol_level', 'id_consol', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/consollevel');
    }



    public function statusjabatan()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['status_jabatan'] = $this->admin->get_status_jabatan();
        $data['admin'] = $this->db->get('status_jabatan')->result_array();

        $this->form_validation->set_rules('id_status_jabatan', 'Id_status_jabatan');
        $this->form_validation->set_rules('status_jabatan_name', 'Status_jabatan_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/statusjabatan/statusjabatan', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_status_jabatan' => $this->input->post('id_status_jabatan'), 
            'status_jabatan_name' => $this->input->post('status_jabatan_name'),
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('status_jabatan', $data);
        redirect('menu/admin');
    }
    }


    public function statusjabatan_add()
    {
        $data['title'] = 'Add Position Status';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['status_jabatan'] = $this->admin->get_status_jabatan();
        $data['admin'] = $this->db->get('status_jabatan')->result_array();

        $this->form_validation->set_rules('id_status_jabatan', 'Id_status_jabatan');
        $this->form_validation->set_rules('status_jabatan_name', 'Status_jabatan_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/statusjabatan/add', $data);
        $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('status_jabatan', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/statusjabatan');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/statusjabatan_add');
            }
        }
    

    }
    public function statusjabatan_edit()
    {
        $data['title'] = 'Edit Position Status';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

       
        
        $id = $this->input->get('id');
        $data['status_jabatan'] = $this->Admin_model->select_idstatus($id);

        $this->form_validation->set_rules('id_status_jabatan', 'Id_status_jabatan');
        $this->form_validation->set_rules('status_jabatan_name', 'Status_jabatan_name', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/statusjabatan/edit', $data);
        $this->load->view('templates/footer');

        } else {
            $id_status_jabatan = $this->input->post('id_status_jabatan');
            $status_jabatan_name = $this->input->post('status_jabatan_name');

            $this->db->where('id_status_jabatan', $id_status_jabatan);
            $this->db->set('status_jabatan_name', $status_jabatan_name);
            $this->db->update('status_jabatan');

            set_pesan('Data changed successfully');
            redirect('admin/statusjabatan');
        }

    }

		public function statusjabatan_delete($getId)
        {
            $this->load->model('Admin_model', 'admin');
            $id = encode_php_tags($getId);
            if ($this->admin->delete('status_jabatan', 'id_status_jabatan', $id)) {
                set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
            redirect('admin/statusjabatan');
        }






    public function gradelevel()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['grade'] = $this->admin->get_gradelevel();
        $data['admin'] = $this->db->get('grade_level')->result_array();

        $this->form_validation->set_rules('id_grade', 'Id_grade');
        $this->form_validation->set_rules('grade_level', 'Grade_level', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/gradelevel/gradelevel', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_grade' => $this->input->post('id_grade'), 
            'grade_level' => $this->input->post('grade_level')
        ];
        $this->db->insert('grade_level', $data);
        redirect('menu/admin');
    }
    }

    public function gradelevel_add()
    {
        $data['title'] = 'Add Grade Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['grade'] = $this->admin->get_gradelevel();
        $data['admin'] = $this->db->get('grade_level')->result_array();

        $this->form_validation->set_rules('id_grade', 'Id_grade');
        $this->form_validation->set_rules('grade_level', 'Grade_level', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/gradelevel/add', $data);
        $this->load->view('templates/footer');
        
        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('grade_level', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/gradelevel');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/gradelevel_add');
            }
        }
    

    }
    public function gradelevel_edit()
    {
        $data['title'] = 'Edit Grade Level';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

       
        
        $id = $this->input->get('id');
        $data['grade_level'] = $this->Admin_model->select_idgrade($id);

        $this->form_validation->set_rules('id_grade', 'Id_grade');
        $this->form_validation->set_rules('grade_level', 'Grade_level', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/gradelevel/edit', $data);
        $this->load->view('templates/footer');

        } else {
            $id_grade = $this->input->post('id_grade');
            $grade_level = $this->input->post('grade_level');

            $this->db->where('id_grade', $id_grade);
            $this->db->set('grade_level', $grade_level);
            $this->db->update('grade_level');

            set_pesan('Data changed successfully');
            redirect('admin/gradelevel');
        }

    }

		public function gradelevel_delete($getId)
        {
            $this->load->model('Admin_model', 'admin');
            $id = encode_php_tags($getId);
            if ($this->admin->delete('grade_level', 'id_grade', $id)) {
                set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
            redirect('admin/gradelevel');
        }







    public function unit()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }

    public function unit_add()
    {
        $data['title'] = 'Add Unit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit();
        $data['company'] = $this->admin->get_company();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/add', $data);
        $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('unit', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/unit');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/unit_add');
            }
        }
    

    }

    public function unit_edit()
    {
        $data['title'] = 'Edit Unit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['unit'] = $this->Admin_model->select_idunit($id);
        $data['company'] = $this->Admin_model->get_company();

        $this->form_validation->set_rules('id_unit', 'Id_unit');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/edit', $data);
        $this->load->view('templates/footer');


        } else {
            $id_unit = $this->input->post('id_unit');
            $unit = $this->input->post('unit');
            $id_company = $this->input->post('id_company');

            $this->db->where('id_unit', $id_unit);
            $this->db->set('unit', $unit);
            $this->db->set('id_company', $id_company);
            $this->db->update('unit');

            set_pesan('Data changed successfully');
            redirect('admin/unit');
        }

    }

    public function unit_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('unit', 'id_unit', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/unit');
    }
    
    public function autonumber()
    {
        $thn=date("y");
        $this->db->select('RIGHT(user.id_employee, 4) as id_employee', FALSE);
        $this->db->order_by('id_employee', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('user');

        if($query->num_rows() <> 0)
        {
            $data = $query->row();
            $autonumber = intval($data->id_employee) + 1;
        } else { $autonumber = 1;}
        $limit = str_pad($autonumber, 4, "0", STR_PAD_LEFT);
        $id_employee = $thn.$limit;
        return $id_employee;
    }

    public function employeeprofile()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->get_employeeprofile();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        // $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->autonumber(),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }


    public function employeeprofile_add()
    {
        $data['title'] = 'Add Employee Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->get_employeeprofile();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        // $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        // $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/add', $data);
        $this->load->view('templates/footer', $data);
        } else {
            $id_employee = $this->autonumber();
            $name = $this->input->post('name', true);
            $email = $this->input->post('email', true);
            $hp = $this->input->post('hp', true);
            $nik = $this->input->post('nik', true);
            $no_ktp = $this->input->post('no_ktp', true);
            $id_agama = $this->input->post('id_agama', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $id_gender = $this->input->post('id_gender', true);
            $alamat = $this->input->post('alamat', true);
            $npwp = $this->input->post('no_ktp', true);
            $tgl_masuk_kerja = $this->input->post('tgl_masuk_kerja', true);
            $tgl_pengangkatan = $this->input->post('tgl_pengangkatan', true);
            $tgl_pensiun = $this->input->post('tgl_pensiun', true);
            $data = [
                'id_employee' => htmlspecialchars($id_employee),
                'name' => htmlspecialchars($name),
                'email' => htmlspecialchars($email),
                'hp' => htmlspecialchars($hp),
                'nik' => htmlspecialchars($nik),
                'no_ktp' => htmlspecialchars($no_ktp),
                'id_agama' => htmlspecialchars($id_agama),
                'tempat_lahir' => htmlspecialchars($tempat_lahir),
                'tgl_lahir' => htmlspecialchars($tgl_lahir),
                'id_gender' => htmlspecialchars($id_gender),
                'alamat' => htmlspecialchars($alamat),
                'npwp' => htmlspecialchars($npwp),
                'tgl_masuk_kerja' => htmlspecialchars($tgl_masuk_kerja),
                'tgl_pengangkatan' => htmlspecialchars($tgl_pengangkatan),
                'tgl_pensiun' => htmlspecialchars($tgl_pensiun),
                'image' => 'user.png',
                'role_id' => 3,
                'id_role_admin' => 2,
                'password' => '$2y$10$JIfF63MxobmxjVGH8gFcze2xYpClvROLgEFTwGVsq7tKKjLVoCpzC',
                'is_active' => 0,
                'date_created' => time()
            ];


            
            $save = $this->admin->insert('user', $data);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/employeeprofile');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/employeeprofile_add');
            }
        }
    

    }

    public function employeeprofile_edit()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['employeeprofile'] = $this->Admin_model->select_idprofile($id);
        $data['agama'] = $this->Admin_model->get_agama();
        $data['gender'] = $this->Admin_model->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/edit', $data);
        $this->load->view('templates/footer', $data);


        } else {
            $id_employee = $this->input->post('id_employee');
            $name = $this->input->post('name');
            $hp = $this->input->post('hp');
            $email = $this->input->post('email');
            $nik = $this->input->post('nik');
            $no_ktp = $this->input->post('no_ktp');
            $id_agama = $this->input->post('id_agama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $id_gender = $this->input->post('id_gender');
            $alamat = $this->input->post('alamat');
            $npwp = $this->input->post('npwp');
            $tgl_masuk_kerja = $this->input->post('tgl_masuk_kerja');
            $tgl_pengangkatan = $this->input->post('tgl_pengangkatan');
            $tgl_pensiun = $this->input->post('tgl_pensiun');

            $this->db->where('id_employee', $id_employee);
            $this->db->set('name', $name);
            $this->db->set('hp', $hp);
            $this->db->set('email', $email);
            $this->db->set('nik', $nik);
            $this->db->set('no_ktp', $no_ktp);
            $this->db->set('id_agama', $id_agama);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('id_gender', $id_gender);
            $this->db->set('alamat', $alamat);
            $this->db->set('npwp', $npwp);
            $this->db->set('tgl_masuk_kerja', $tgl_masuk_kerja);
            $this->db->set('tgl_pengangkatan', $tgl_pengangkatan);
            $this->db->set('tgl_pensiun', $tgl_pensiun);
            $this->db->update('user');

            set_pesan('Data changed successfully');
            redirect('admin/employeeprofile');
        }
    

    }

    public function employeeprofile_delete($getId)
    {
        $this->load->model('Admin_model', 'admin');
        $id = encode_php_tags($getId);
        if ($this->admin->delete('user', 'id_employee', $id)) {
            set_pesan('Data deleted successfully');
        } else {
            set_pesan('Data failed to delete', false);
        }
        redirect('admin/employeeprofile');
    }
    public function employeeplacement()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->get_employeeplacement(); 
        $data['admin'] = $this->db->get('user')->result_array();
        // echo (count($data['admin']));die;

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }

    // public function cari(){
    //     $id_company=$_GET['id_company'];
    //     $cari =$this->admin->cari($id_company)->result();
    //     echo json_encode($cari);
    //     var_dump($cari);
    //     die;
    // } 

    public function employeeplacement_add()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');
        
        $data['record']=  $this->admin->tampil_data();

        // $data['employeeplacement'] = $this->admin->get_employeeplacement();
        // $data['name'] = $
        $data['noplace'] = $this->db->query("select * from user where id_company = '' ")->result_array();
        $data['employeeprofile'] = $this->admin->getDataEmployeeProfile();
        $data['company'] = $this->admin->get_company();
        $data['direct'] = $this->admin->getDataDirectorate();
        $data['division'] = $this->admin->getDataDivision();
        $data['subdivision'] = $this->admin->getDataSubDivision();
        $data['level'] = $this->admin->get_level();
        $data['job_position'] = $this->admin->getDataJob();
        $data['status_jabatan'] = $this->admin->get_status_jabatan();
        $data['statusemployee'] = $this->admin->getDataStatusEmployee();
        $data['grade'] = $this->admin->get_gradelevel();
        $data['unit'] = $this->admin->getDataUnit();
        $data['consollevel'] = $this->admin->get_consol();
        $data['admin'] = $this->db->get('user')->result_array();

        // $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        // $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/add', $data);
        $this->load->view('templates/footer');

        } else {
            $id_employee = $this->input->post('id_employee');
            $id_company = $this->input->post('id_company');
            $id_directorate = $this->input->post('id_directorate');
            $id_division = $this->input->post('id_division');
            $id_subdivision = $this->input->post('id_subdivision');
            $id_level = $this->input->post('id_level');
            $id_job = $this->input->post('id_job');
            $id_status_jabatan = $this->input->post('id_status_jabatan');
            $id_status_employee = $this->input->post('id_status_employee');
            $id_grade = $this->input->post('id_grade');
            $id_unit = $this->input->post('id_unit');
            $id_consol = $this->input->post('id_consol');

            $this->db->where('id_employee', $id_employee);
            $this->db->set('id_company', $id_company);
            $this->db->set('id_directorate', $id_directorate);
            $this->db->set('id_division', $id_division);
            $this->db->set('id_subdivision', $id_subdivision);
            $this->db->set('id_level', $id_level);
            $this->db->set('id_job', $id_job);
            $this->db->set('id_status_jabatan', $id_status_jabatan);
            $this->db->set('id_status_employee', $id_status_employee);
            $this->db->set('id_grade', $id_grade);
            $this->db->set('id_unit', $id_unit);
            $this->db->set('id_consol', $id_consol);
            $this->db->update('user');

            set_pesan('Data added successfully');
            redirect('admin/employeeplacement');
        }

    }
    public function employeeplacement_edit()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['employeeplacement'] = $this->Admin_model->select_idprofile($id);

        // $data['employeeprofile'] = $this->Admin_model->getDataEmployeeProfile();
        $data['company'] = $this->Admin_model->get_company();
        $data['directorate'] = $this->Admin_model->getDataDirectorate();
        $data['division'] = $this->Admin_model->getDataDivision();
        $data['sub_division'] = $this->Admin_model->getDataSubDivision();
        $data['level_position'] = $this->Admin_model->get_level();
        $data['job_position'] = $this->Admin_model->getDataJob();
        $data['status_jabatan'] = $this->Admin_model->get_status_jabatan();
        $data['statusemployee'] = $this->Admin_model->getDataStatusEmployee();
        $data['grade_level'] = $this->Admin_model->get_gradelevel();
        $data['unit'] = $this->Admin_model->getDataUnit();
        $data['consollevel'] = $this->Admin_model->get_consol();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID status_employee', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/edit', $data);
        $this->load->view('templates/footer', $data);


        } else {
            $id_employee = $this->input->post('id_employee');
            $name = $this->input->post('name');
            $id_company = $this->input->post('id_company');
            $id_directorate = $this->input->post('id_directorate');
            $id_division = $this->input->post('id_division');
            $id_subdivision = $this->input->post('id_subdivision');
            $id_level = $this->input->post('id_level');
            $id_job = $this->input->post('id_job');
            $id_status_jabatan = $this->input->post('id_status_jabatan');
            $id_status_employee = $this->input->post('id_status_employee');
            $id_grade = $this->input->post('id_grade');
            $id_unit = $this->input->post('id_unit');
            $id_consol = $this->input->post('id_consol');

            $this->db->where('id_employee', $id_employee);
            $this->db->set('name', $name);
            $this->db->set('id_company', $id_company);
            $this->db->set('id_directorate', $id_directorate);
            $this->db->set('id_division', $id_division);
            $this->db->set('id_subdivision', $id_subdivision);
            $this->db->set('id_level', $id_level);
            $this->db->set('id_job', $id_job);
            $this->db->set('id_status_jabatan', $id_status_jabatan);
            $this->db->set('id_status_employee', $id_status_employee);
            $this->db->set('id_grade', $id_grade);
            $this->db->set('id_unit', $id_unit);
            $this->db->set('id_consol', $id_consol);
            $this->db->update('user');

            set_pesan('Data changed successfully');
            redirect('admin/employeeplacement');
        }

    }

    public function company1()
    {
        $data['title'] = 'Dashboard RNI Holding';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp1 = $this->db->get_where('user', array('id_company' => 1))->num_rows();
        $data['employeeplacement'] = $comp1;

        $data['directorate'] = $this->admin->dir1();
        $data['division'] = $this->admin->div1();
        $data['sub_division'] = $this->admin->sub_div1();
        
        $data['male'] = $this->admin->male1();
        $data['female'] = $this->admin->female1();

        $data['permanent'] = $this->admin->permanent1();
        $data['nonpermanent'] = $this->admin->nonpermanent1();

        $data['bod'] = $this->admin->consolsatu1();
        $data['bod1'] = $this->admin->consoldua1();
        $data['bod2'] = $this->admin->consoltiga1();
        $data['komisaris'] = $this->admin->consolempat1();
        $data['komite'] = $this->admin->consollima1();
        $data['other'] = $this->admin->consolenam1();

        $data['I'] = $this->admin->gradesatu1();
        $data['II'] = $this->admin->gradedua1();
        $data['III'] = $this->admin->gradetiga1();
        $data['IV'] = $this->admin->gradeempat1();
        $data['IX'] = $this->admin->gradelima1();
        $data['V'] = $this->admin->gradeenam1();
        $data['VI'] = $this->admin->gradetujuh1();
        $data['VIII'] = $this->admin->gradedelapan1();
        $data['X'] = $this->admin->gradesembilan1();
        $data['XI'] = $this->admin->gradesepuluh1();
        $data['XII'] = $this->admin->gradesebelas1();
        $data['XIII'] = $this->admin->gradeduas1();
        $data['XIV'] = $this->admin->gradetigas1();
        $data['XV'] = $this->admin->gradeempats1();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company2()
    {
        $data['title'] = 'Dashboard Rajawali Nusantara Indonesia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp2 = $this->db->get_where('user', array('id_company' => 2))->num_rows();
        $data['employeeplacement'] = $comp2;

        $data['directorate'] = $this->admin->dir2();
        $data['division'] = $this->admin->div2();
        $data['sub_division'] = $this->admin->sub_div2();
        
        $data['male'] = $this->admin->male2();
        $data['female'] = $this->admin->female2();

        $data['permanent'] = $this->admin->permanent2();
        $data['nonpermanent'] = $this->admin->nonpermanent2();

        $data['bod'] = $this->admin->consolsatu2();
        $data['bod1'] = $this->admin->consoldua2();
        $data['bod2'] = $this->admin->consoltiga2();
        $data['komisaris'] = $this->admin->consolempat2();
        $data['komite'] = $this->admin->consollima2();
        $data['other'] = $this->admin->consolenam2();

        $data['I'] = $this->admin->gradesatu2();
        $data['II'] = $this->admin->gradedua2();
        $data['III'] = $this->admin->gradetiga2();
        $data['IV'] = $this->admin->gradeempat2();
        $data['IX'] = $this->admin->gradelima2();
        $data['V'] = $this->admin->gradeenam2();
        $data['VI'] = $this->admin->gradetujuh2();
        $data['VIII'] = $this->admin->gradedelapan2();
        $data['X'] = $this->admin->gradesembilan2();
        $data['XI'] = $this->admin->gradesepuluh2();
        $data['XII'] = $this->admin->gradesebelas2();
        $data['XIII'] = $this->admin->gradeduas2();
        $data['XIV'] = $this->admin->gradetigas2();
        $data['XV'] = $this->admin->gradeempats2();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company3()
    {
        $data['title'] = 'Dashboard PTP MITRA OGAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp3 = $this->db->get_where('user', array('id_company' => 3))->num_rows();
        $data['employeeplacement'] = $comp3;

        $data['directorate'] = $this->admin->dir3();
        $data['division'] = $this->admin->div3();
        $data['sub_division'] = $this->admin->sub_div3();
        
        $data['male'] = $this->admin->male3();
        $data['female'] = $this->admin->female3();

        $data['permanent'] = $this->admin->permanent3();
        $data['nonpermanent'] = $this->admin->nonpermanent3();

        $data['bod'] = $this->admin->consolsatu3();
        $data['bod1'] = $this->admin->consoldua3();
        $data['bod2'] = $this->admin->consoltiga3();
        $data['komisaris'] = $this->admin->consolempat3();
        $data['komite'] = $this->admin->consollima3();
        $data['other'] = $this->admin->consolenam3();

        $data['I'] = $this->admin->gradesatu3();
        $data['II'] = $this->admin->gradedua3();
        $data['III'] = $this->admin->gradetiga3();
        $data['IV'] = $this->admin->gradeempat3();
        $data['IX'] = $this->admin->gradelima3();
        $data['V'] = $this->admin->gradeenam3();
        $data['VI'] = $this->admin->gradetujuh3();
        $data['VIII'] = $this->admin->gradedelapan3();
        $data['X'] = $this->admin->gradesembilan3();
        $data['XI'] = $this->admin->gradesepuluh3();
        $data['XII'] = $this->admin->gradesebelas3();
        $data['XIII'] = $this->admin->gradeduas3();
        $data['XIV'] = $this->admin->gradetigas3();
        $data['XV'] = $this->admin->gradeempats3();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company4()
    {
        $data['title'] = 'Dashboard PT Bhanda Ghara Reksa (Persero)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp4 = $this->db->get_where('user', array('id_company' => 4))->num_rows();
        $data['employeeplacement'] = $comp4;

        $data['directorate'] = $this->admin->dir4();
        $data['division'] = $this->admin->div4();
        $data['sub_division'] = $this->admin->sub_div4();
        
        $data['male'] = $this->admin->male4();
        $data['female'] = $this->admin->female4();

        $data['permanent'] = $this->admin->permanent4();
        $data['nonpermanent'] = $this->admin->nonpermanent4();

        $data['bod'] = $this->admin->consolsatu4();
        $data['bod1'] = $this->admin->consoldua4();
        $data['bod2'] = $this->admin->consoltiga4();
        $data['komisaris'] = $this->admin->consolempat4();
        $data['komite'] = $this->admin->consollima4();
        $data['other'] = $this->admin->consolenam4();

        $data['I'] = $this->admin->gradesatu4();
        $data['II'] = $this->admin->gradedua4();
        $data['III'] = $this->admin->gradetiga4();
        $data['IV'] = $this->admin->gradeempat4();
        $data['IX'] = $this->admin->gradelima4();
        $data['V'] = $this->admin->gradeenam4();
        $data['VI'] = $this->admin->gradetujuh4();
        $data['VIII'] = $this->admin->gradedelapan4();
        $data['X'] = $this->admin->gradesembilan4();
        $data['XI'] = $this->admin->gradesepuluh4();
        $data['XII'] = $this->admin->gradesebelas4();
        $data['XIII'] = $this->admin->gradeduas4();
        $data['XIV'] = $this->admin->gradetigas4();
        $data['XV'] = $this->admin->gradeempats4();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company5()
    {
        $data['title'] = 'Dashboard PT GARAM (PERSERO)';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp5 = $this->db->get_where('user', array('id_company' => 5))->num_rows();
        $data['employeeplacement'] = $comp5;

        $data['directorate'] = $this->admin->dir5();
        $data['division'] = $this->admin->div5();
        $data['sub_division'] = $this->admin->sub_div5();
        
        $data['male'] = $this->admin->male5();
        $data['female'] = $this->admin->female5();

        $data['permanent'] = $this->admin->permanent5();
        $data['nonpermanent'] = $this->admin->nonpermanent5();

        $data['bod'] = $this->admin->consolsatu5();
        $data['bod1'] = $this->admin->consoldua5();
        $data['bod2'] = $this->admin->consoltiga5();
        $data['komisaris'] = $this->admin->consolempat5();
        $data['komite'] = $this->admin->consollima5();
        $data['other'] = $this->admin->consolenam5();

        $data['I'] = $this->admin->gradesatu5();
        $data['II'] = $this->admin->gradedua5();
        $data['III'] = $this->admin->gradetiga5();
        $data['IV'] = $this->admin->gradeempat5();
        $data['IX'] = $this->admin->gradelima5();
        $data['V'] = $this->admin->gradeenam5();
        $data['VI'] = $this->admin->gradetujuh5();
        $data['VIII'] = $this->admin->gradedelapan5();
        $data['X'] = $this->admin->gradesembilan5();
        $data['XI'] = $this->admin->gradesepuluh5();
        $data['XII'] = $this->admin->gradesebelas5();
        $data['XIII'] = $this->admin->gradeduas5();
        $data['XIV'] = $this->admin->gradetigas5();
        $data['XV'] = $this->admin->gradeempats5();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company6()
    {
        $data['title'] = 'Dashboard PG Rajawali I';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp6 = $this->db->get_where('user', array('id_company' => 6))->num_rows();
        $data['employeeplacement'] = $comp6;

        $data['directorate'] = $this->admin->dir6();
        $data['division'] = $this->admin->div6();
        $data['sub_division'] = $this->admin->sub_div6();
        
        $data['male'] = $this->admin->male6();
        $data['female'] = $this->admin->female6();

        $data['permanent'] = $this->admin->permanent6();
        $data['nonpermanent'] = $this->admin->nonpermanent6();

        $data['bod'] = $this->admin->consolsatu6();
        $data['bod1'] = $this->admin->consoldua6();
        $data['bod2'] = $this->admin->consoltiga6();
        $data['komisaris'] = $this->admin->consolempat6();
        $data['komite'] = $this->admin->consollima6();
        $data['other'] = $this->admin->consolenam6();

        $data['I'] = $this->admin->gradesatu6();
        $data['II'] = $this->admin->gradedua6();
        $data['III'] = $this->admin->gradetiga6();
        $data['IV'] = $this->admin->gradeempat6();
        $data['IX'] = $this->admin->gradelima6();
        $data['V'] = $this->admin->gradeenam6();
        $data['VI'] = $this->admin->gradetujuh6();
        $data['VIII'] = $this->admin->gradedelapan6();
        $data['X'] = $this->admin->gradesembilan6();
        $data['XI'] = $this->admin->gradesepuluh6();
        $data['XII'] = $this->admin->gradesebelas6();
        $data['XIII'] = $this->admin->gradeduas6();
        $data['XIV'] = $this->admin->gradetigas6();
        $data['XV'] = $this->admin->gradeempats6();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company7()
    {
        $data['title'] = 'Dashboard PG Rajawali II';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp7 = $this->db->get_where('user', array('id_company' => 7))->num_rows();
        $data['employeeplacement'] = $comp7;

        $data['directorate'] = $this->admin->dir7();
        $data['division'] = $this->admin->div7();
        $data['sub_division'] = $this->admin->sub_div7();
        
        $data['male'] = $this->admin->male7();
        $data['female'] = $this->admin->female7();

        $data['permanent'] = $this->admin->permanent7();
        $data['nonpermanent'] = $this->admin->nonpermanent7();

        $data['bod'] = $this->admin->consolsatu7();
        $data['bod1'] = $this->admin->consoldua7();
        $data['bod2'] = $this->admin->consoltiga7();
        $data['komisaris'] = $this->admin->consolempat7();
        $data['komite'] = $this->admin->consollima7();
        $data['other'] = $this->admin->consolenam7();

        $data['I'] = $this->admin->gradesatu7();
        $data['II'] = $this->admin->gradedua7();
        $data['III'] = $this->admin->gradetiga7();
        $data['IV'] = $this->admin->gradeempat7();
        $data['IX'] = $this->admin->gradelima7();
        $data['V'] = $this->admin->gradeenam7();
        $data['VI'] = $this->admin->gradetujuh7();
        $data['VIII'] = $this->admin->gradedelapan7();
        $data['X'] = $this->admin->gradesembilan7();
        $data['XI'] = $this->admin->gradesepuluh7();
        $data['XII'] = $this->admin->gradesebelas7();
        $data['XIII'] = $this->admin->gradeduas7();
        $data['XIV'] = $this->admin->gradetigas7();
        $data['XV'] = $this->admin->gradeempats7();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company8()
    {
        $data['title'] = 'Dashboard MITRA RAJAWALI BANJARAN';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp8 = $this->db->get_where('user', array('id_company' => 8))->num_rows();
        $data['employeeplacement'] = $comp8;

        $data['directorate'] = $this->admin->dir8();
        $data['division'] = $this->admin->div8();
        $data['sub_division'] = $this->admin->sub_div8();
        
        $data['male'] = $this->admin->male8();
        $data['female'] = $this->admin->female8();

        $data['permanent'] = $this->admin->permanent8();
        $data['nonpermanent'] = $this->admin->nonpermanent8();

        $data['bod'] = $this->admin->consolsatu8();
        $data['bod1'] = $this->admin->consoldua8();
        $data['bod2'] = $this->admin->consoltiga8();
        $data['komisaris'] = $this->admin->consolempat8();
        $data['komite'] = $this->admin->consollima8();
        $data['other'] = $this->admin->consolenam8();

        $data['I'] = $this->admin->gradesatu8();
        $data['II'] = $this->admin->gradedua8();
        $data['III'] = $this->admin->gradetiga8();
        $data['IV'] = $this->admin->gradeempat8();
        $data['IX'] = $this->admin->gradelima8();
        $data['V'] = $this->admin->gradeenam8();
        $data['VI'] = $this->admin->gradetujuh8();
        $data['VIII'] = $this->admin->gradedelapan8();
        $data['X'] = $this->admin->gradesembilan8();
        $data['XI'] = $this->admin->gradesepuluh8();
        $data['XII'] = $this->admin->gradesebelas8();
        $data['XIII'] = $this->admin->gradeduas8();
        $data['XIV'] = $this->admin->gradetigas8();
        $data['XV'] = $this->admin->gradeempats8();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company9()
    {
        $data['title'] = 'Dashboard Perusahaan Perdagangan Indonesia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp9 = $this->db->get_where('user', array('id_company' => 9))->num_rows();
        $data['employeeplacement'] = $comp9;

        $data['directorate'] = $this->admin->dir9();
        $data['division'] = $this->admin->div9();
        $data['sub_division'] = $this->admin->sub_div9();
        
        $data['male'] = $this->admin->male9();
        $data['female'] = $this->admin->female9();

        $data['permanent'] = $this->admin->permanent9();
        $data['nonpermanent'] = $this->admin->nonpermanent9();

        $data['bod'] = $this->admin->consolsatu9();
        $data['bod1'] = $this->admin->consoldua9();
        $data['bod2'] = $this->admin->consoltiga9();
        $data['komisaris'] = $this->admin->consolempat9();
        $data['komite'] = $this->admin->consollima9();
        $data['other'] = $this->admin->consolenam9();

        $data['I'] = $this->admin->gradesatu9();
        $data['II'] = $this->admin->gradedua9();
        $data['III'] = $this->admin->gradetiga9();
        $data['IV'] = $this->admin->gradeempat9();
        $data['IX'] = $this->admin->gradelima9();
        $data['V'] = $this->admin->gradeenam9();
        $data['VI'] = $this->admin->gradetujuh9();
        $data['VIII'] = $this->admin->gradedelapan9();
        $data['X'] = $this->admin->gradesembilan9();
        $data['XI'] = $this->admin->gradesepuluh9();
        $data['XII'] = $this->admin->gradesebelas9();
        $data['XIII'] = $this->admin->gradeduas9();
        $data['XIV'] = $this->admin->gradetigas9();
        $data['XV'] = $this->admin->gradeempats9();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company10()
    {
        $data['title'] = 'Dashboard Laras Astra Kartika';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp10 = $this->db->get_where('user', array('id_company' => 10))->num_rows();
        $data['employeeplacement'] = $comp10;

        $data['directorate'] = $this->admin->dir10();
        $data['division'] = $this->admin->div10();
        $data['sub_division'] = $this->admin->sub_div10();
        
        $data['male'] = $this->admin->male10();
        $data['female'] = $this->admin->female10();

        $data['permanent'] = $this->admin->permanent10();
        $data['nonpermanent'] = $this->admin->nonpermanent10();

        $data['bod'] = $this->admin->consolsatu10();
        $data['bod1'] = $this->admin->consoldua10();
        $data['bod2'] = $this->admin->consoltiga10();
        $data['komisaris'] = $this->admin->consolempat10();
        $data['komite'] = $this->admin->consollima10();
        $data['other'] = $this->admin->consolenam10();

        $data['I'] = $this->admin->gradesatu10();
        $data['II'] = $this->admin->gradedua10();
        $data['III'] = $this->admin->gradetiga10();
        $data['IV'] = $this->admin->gradeempat10();
        $data['IX'] = $this->admin->gradelima10();
        $data['V'] = $this->admin->gradeenam10();
        $data['VI'] = $this->admin->gradetujuh10();
        $data['VIII'] = $this->admin->gradedelapan10();
        $data['X'] = $this->admin->gradesembilan10();
        $data['XI'] = $this->admin->gradesepuluh10();
        $data['XII'] = $this->admin->gradesebelas10();
        $data['XIII'] = $this->admin->gradeduas10();
        $data['XIV'] = $this->admin->gradetigas10();
        $data['XV'] = $this->admin->gradeempats10();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function company11()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model', 'admin');

        $comp11 = $this->db->get_where('user', array('id_company' => 11))->num_rows();
        $data['employeeplacement'] = $comp11;

        $data['directorate'] = $this->admin->dir11();
        $data['division'] = $this->admin->div11();
        $data['sub_division'] = $this->admin->sub_div11();
        
        $data['male'] = $this->admin->male11();
        $data['female'] = $this->admin->female11();

        $data['permanent'] = $this->admin->permanent11();
        $data['nonpermanent'] = $this->admin->nonpermanent11();

        $data['bod'] = $this->admin->consolsatu11();
        $data['bod1'] = $this->admin->consoldua11();
        $data['bod2'] = $this->admin->consoltiga11();
        $data['komisaris'] = $this->admin->consolempat11();
        $data['komite'] = $this->admin->consollima11();
        $data['other'] = $this->admin->consolenam11();

        $data['I'] = $this->admin->gradesatu11();
        $data['II'] = $this->admin->gradedua11();
        $data['III'] = $this->admin->gradetiga11();
        $data['IV'] = $this->admin->gradeempat11();
        $data['IX'] = $this->admin->gradelima11();
        $data['V'] = $this->admin->gradeenam11();
        $data['VI'] = $this->admin->gradetujuh11();
        $data['VIII'] = $this->admin->gradedelapan11();
        $data['X'] = $this->admin->gradesembilan11();
        $data['XI'] = $this->admin->gradesepuluh11();
        $data['XII'] = $this->admin->gradesebelas11();
        $data['XIII'] = $this->admin->gradeduas11();
        $data['XIV'] = $this->admin->gradetigas11();
        $data['XV'] = $this->admin->gradeempats11();
        
        $data['m1'] = $this->admin->get_agem1();
        $data['f1'] = $this->admin->get_agef1();
        $data['m2'] = $this->admin->get_agem2();
        $data['f2'] = $this->admin->get_agef2();
        $data['m3'] = $this->admin->get_agem3();
        $data['f3'] = $this->admin->get_agef3();
        $data['m4'] = $this->admin->get_agem4();
        $data['f4'] = $this->admin->get_agef4();
        $data['m5'] = $this->admin->get_agem5();
        $data['f5'] = $this->admin->get_agef5();
        $data['m6'] = $this->admin->get_agem6();
        $data['f6'] = $this->admin->get_agef6();
        $data['m7'] = $this->admin->get_agem7();
        $data['f7'] = $this->admin->get_agef7();
        $data['m8'] = $this->admin->get_agem8();
        $data['f8'] = $this->admin->get_agef8();

        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function directorate1()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct1();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate2()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct2();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate3()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct3();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate4()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct4();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate5()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct5();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate6()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct6();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate7()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct7();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate8()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct8();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate9()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct9();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate10()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct10();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate11()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct11();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/directorate/directorate', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_directorate' => $this->input->post('id_directorate'), 
            'directorate_name' => $this->input->post('directorate_name'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('directorate', $data);
        redirect('menu/admin');
    }
    }
    public function directorate_add1()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['direct'] = $this->admin->get_direct();
        $data['company'] = $this->admin->get_company1();
        $data['admin'] = $this->db->get('directorate')->result_array();

        $this->form_validation->set_rules('id_directorate', 'Id_directorate', 'required');
        $this->form_validation->set_rules('directorate_name', 'Directorate_name', 'required');
        $this->form_validation->set_rules('id_company', 'Id_company', 'required');
        
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar2', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datamaster/directorate/add', $data);
            $this->load->view('templates/footer');

        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('directorate', $input);
            if ($save) {
                set_pesan('Data added successfully');
                redirect('admin/directorate1');
            } else {
                set_pesan('Data failed to add', false);
                redirect('admin/directorate_add1');
            }
        }
    

    }

    public function division1()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div1();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division2()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div2();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division3()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div3();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division4()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div4();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division5()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div5();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division6()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div6();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division7()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div7();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division8()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div8();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division9()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div9();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division10()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div10();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }
    public function division11()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['division'] = $this->admin->get_div11();
        $data['admin'] = $this->db->get('division')->result_array();

        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        $this->form_validation->set_rules('division_name', 'division_name', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/division/division', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_division' => $this->input->post('id_division'), 
            'division_name' => $this->input->post('division_name'),
            'id_directorate' => $this->input->post('id_directorate')
        ];
        $this->db->insert('division', $data);
        redirect('menu/admin');
    }
    }


    public function subdivision1()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div1();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision2()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div2();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision3()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div3();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision4()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div4();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision5()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div5();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision6()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div6();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision7()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div7();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision8()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div8();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision9()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div9();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision10()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div10();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }
    public function subdivision11()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['subdivision'] = $this->admin->getsub_div11();
        $data['admin'] = $this->db->get('sub_division')->result_array();

        $this->form_validation->set_rules('id_subdivision', 'Id_subdivision', 'required');
        $this->form_validation->set_rules('subdivision_name', 'Subdivision_name', 'required');
        $this->form_validation->set_rules('id_division', 'Id_division', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/subdivision/subdivision', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_subdivision' => $this->input->post('id_subdivision'), 
            'subdivision_name' => $this->input->post('subdivision_name'),
            'id_division' => $this->input->post('id_division'), 
            'is_active' => $this->input->post('is_active')
        ];
        $this->db->insert('sub_division', $data);
        redirect('menu/admin');
    }
    }


    public function unit1()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit1();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit2()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit2();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit3()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit3();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit4()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit4();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit5()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit5();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit6()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit6();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit7()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit7();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit8()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit8();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit9()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit9();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit10()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit10();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }
    public function unit11()
    {
        $data['title'] = 'Master Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['unit'] = $this->admin->get_unit11();
        $data['admin'] = $this->db->get('unit')->result_array();

        $this->form_validation->set_rules('id_unit', 'Id_unit', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamaster/unit/unit', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_unit' => $this->input->post('id_unit'), 
            'unit' => $this->input->post('unit'),
            'id_company' => $this->input->post('id_company')
        ];
        $this->db->insert('unit', $data);
        redirect('menu/admin');
    }
    }

    public function employeeprofile1()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile1();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile2()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile2();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile3()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile3();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile4()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile4();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile5()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile5();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile6()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile6();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile7()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile7();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile8()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile8();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile9()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile9();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile10()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile10();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeprofile11()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeprofile'] = $this->admin->employeeprofile11();
        $data['agama'] = $this->admin->get_agama();
        $data['gender'] = $this->admin->get_gender();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('no_ktp', 'No_ktp', 'required');
        $this->form_validation->set_rules('id_agama', 'ID Agama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required');
        $this->form_validation->set_rules('id_gender', 'ID Gender', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('npwp', 'Npwp', 'required');
        $this->form_validation->set_rules('tgl_masuk_kerja', 'Tgl_masuk_kerja', 'required');
        $this->form_validation->set_rules('tgl_pengangkatan', 'Tgl_pengangkatan', 'required');
        $this->form_validation->set_rules('tgl_pensiun', 'Tgl_pensiun', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/profile/employeeprofile', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'hp' => $this->input->post('hp'),
            'email' => $this->input->post('email'),
            'nik' => $this->input->post('nik'),
            'no_ktp' => $this->input->post('no_ktp'),
            'id_agama' => $this->input->post('id_agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_gender' => $this->input->post('id_gender'),
            'alamat' => $this->input->post('alamat'),
            'npwp' => $this->input->post('npwp'),
            'tgl_masuk_kerja' => $this->input->post('tgl_masuk_kerja'),
            'tgl_pengangkatan' => $this->input->post('tgl_pengangkatan'),
            'tgl_pensiun' => $this->input->post('tgl_pensiun'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }


    public function employeeplacement1()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement1();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement2()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement2();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement3()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement3();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement4()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement4();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement5()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement5();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement6()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement6();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement7()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement7();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement8()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement8();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement9()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement9();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement10()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement10();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }
    public function employeeplacement11()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['employeeplacement'] = $this->admin->employeeplacement11();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_employee', 'Id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_directorate', 'id_directorate', 'required');
        $this->form_validation->set_rules('id_division', 'id_division', 'required');
        $this->form_validation->set_rules('id_subdivision', 'id_subdivision', 'required');
        $this->form_validation->set_rules('id_level', 'ID Level', 'required');
        $this->form_validation->set_rules('id_job', 'id_job', 'required');
        $this->form_validation->set_rules('id_status_jabatan', 'id_status_jabatan', 'required');
        $this->form_validation->set_rules('id_status_employee', 'ID Gender', 'required');
        $this->form_validation->set_rules('id_grade', 'id_grade', 'required');
        $this->form_validation->set_rules('id_unit', 'id_unit', 'required');
        $this->form_validation->set_rules('id_consol', 'id_consol', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/employee/placement/employeeplacement', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'id_company' => $this->input->post('id_company'),
            'id_directorate' => $this->input->post('id_directorate'),
            'id_division' => $this->input->post('id_division'),
            'id_subdivision' => $this->input->post('id_subdivision'),
            'id_level' => $this->input->post('id_level'),
            'id_job' => $this->input->post('id_job'),
            'id_status_jabatan' => $this->input->post('id_status_jabatan'),
            'id_status_employee' => $this->input->post('id_status_employee'),
            'id_grade' => $this->input->post('id_grade'),
            'id_unit' => $this->input->post('id_unit'),
            'id_consol' => $this->input->post('id_consol')
        ];
        $this->db->insert('user', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manageleaves/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }
public function manageleaves_detail()
    {
        $data['title'] = 'Employee';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $id = $this->input->get('id');
        $data['leaves'] = $this->Admin_model->select_manageleaves($id);
        $data['status_leaves'] = $this->Admin_model->get_status_leaves();
        $data['company'] = $this->Admin_model->get_company();
        $data['leave_type'] = $this->Admin_model->get_leave_type();
        $data['admin'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('id_leaves', 'id_leaves');
        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('id_leave_type', 'id_leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('id_status', 'id_status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks');

        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manageleaves/detail', $data);
        $this->load->view('templates/footer');


        } else {
        $id_leaves = $this->input->post('id_leaves');
        $id_company = $this->input->post('id_company');
        $id_employee = $this->input->post('id_employee');
        $id_leave_type = $this->input->post('id_leave_type');
        $leave_reason = $this->input->post('leave_reason');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $id_status = $this->input->post('id_status');
        $remarks = $this->input->post('remarks');

        $this->db->where('id_leaves', $id_leaves);
        $this->db->where('id_company', $id_company);
        $this->db->where('id_employee', $id_employee);
        $this->db->where('id_leave_type', $id_leave_type);
        $this->db->where('leave_reason', $leave_reason);
        $this->db->where('start_date', $start_date);
        $this->db->where('end_date', $end_date);
        $this->db->set('id_status', $id_status);
        $this->db->set('remarks', $remarks);
        $this->db->update('leaves');

        set_pesan('Data changed successfully');
        redirect('admin/manageleaves');
        }
    

    }


    public function manageleaves1()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves1();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }
    public function manageleaves2()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves2();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves3()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves3();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves4()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves4();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves5()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves5();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves6()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves6();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves7()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves7();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves8()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves8();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves9()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves9();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves10()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves10();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }

    public function manageleaves11()
    {
        $data['title'] = 'Manage Leaves';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model', 'admin');

        $data['leaves'] = $this->admin->get_leaves11();
        $data['admin'] = $this->db->get('leaves')->result_array();

        // $data['leaves'] = $this->admin->get_manageleaves();
        $data['status_leaves'] = $this->admin->get_status_leaves();
        $data['admin'] = $this->db->get('leaves')->result_array();

        $this->form_validation->set_rules('id_company', 'id_company', 'required');
        $this->form_validation->set_rules('id_employee', 'id_employee', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('leave_type', 'leave_type', 'required');
        $this->form_validation->set_rules('leave_reason', 'leave_reason', 'required');
        $this->form_validation->set_rules('start_date', 'start_date', 'required');
        $this->form_validation->set_rules('end_date', 'end_date', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('remarks', 'remarks', 'required');
        if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar2', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/branch/manageleaves', $data);
        $this->load->view('templates/footer');

    } else {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_employee' => $this->input->post('id_employee'),
            'name' => $this->input->post('name'),
            'leave_type' => $this->input->post('leave_type'),
            'leave_reason' => $this->input->post('leave_reason'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'status' => $this->input->post('status'),
            'remarks' => $this->input->post('remarks')
        ];
        $this->db->insert('manageleaves', $data);
        redirect('menu/admin');
    }
    }









}