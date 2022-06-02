<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');

        } else {
            //validasinya sukses
            $this->_login();
        }
    }
    
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //dari database tabel user yang field nya email (di mysqlnya) sama dengan $email di codingan ini
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        

        //jika usernya ada
        if($user) {
            //jika usernya aktif
            if($user['is_active'] == 1){
                //cek password (menyamakan, apakah $password yg diambil dari input private function _login sama dengan password yg di tabel user)
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_employee' => $user['id_employee'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] <= 1){
                        redirect('admin');
                    } else {
                        redirect('user');
                }

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect('auth');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');
            redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not register</div>');
            redirect('auth');
        }
    
    }

    





    public function registration()
    {
        if($this->session->userdata('email')) {
            redirect('user');
        }
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if( $this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');

        } else {
            $email = $this->input->post('email', true);
            $id_employee = $this->input->post('id_employee', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'id_employee' => htmlspecialchars($id_employee),
                'email' => htmlspecialchars($email),
                'image' => 'user.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'id_role_admin' => 2,
                'is_active' => 0,
                'date_created' => time()


            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email, 
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil dibuat, Silahkan hubungin Admin untuk mengaktifkan akun anda</div>');
            
            redirect('auth');
            
            
        }
        
    }
    

    private function _sendEmail($token)
	{
		$config = [
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_user' => 'putrmeilani@gmail.com',
		'smtp_pass' => 'putr1234', 
		'smtp_port' => 587,
		'mailtype' => 'html',
		'charset' => 'utf-8',
		'newline' => "\r\n"
		];
		
		// $this->load->initialize($config);
		$this->load->initialize($config);

		$this->email->from('putrmeilani@gmail.com', 'Putri Meilani');
		$this->email->to($this->input->post('email'));

		
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

        
		
		
		if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
	}


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
		
		if($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];
			
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token, 'forgot');
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div');
			
			redirect('auth/forgotpassword');				
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
				redirect('auth/forgotpassword');
			}
		}
    }



    public function resetPassword() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		
	$user = $this->db->get_where('user', ['email' => $email])->row_array();
	
	if($user) {
		$user_token = $this->db->get_where('user_token', ['token'=>$token])->row_array();
		if($user_token) {
			$this->session->set_userdata('reset_email', $email);
			$this->changePassword();
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
			redirect('auth');
		}
	} else {
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('auth/');
	}
	}
    public function changePassword(){
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1','Password', 'trim|required|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2','Password', 'trim|required|min_length[6]|matches[password1]');
		if ($this->form_validation->run()==false){
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');
			
			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
			
			$this->session->unset_userdata('reset_email');
			
		$this->db->delete('user_token', ['email' => $email]);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login</div>');
			redirect('auth');
		}
	}
 







    
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}