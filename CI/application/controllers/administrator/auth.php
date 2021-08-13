<?php

class Auth extends CI_Controller
{

    public function index()
    {

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/footer');
        $this->load->view('administrator/login');
    }

    public function process_login()
    {
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/footer');
            $this->load->view('administrator/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = sha1($password);

            $check = $this->login_model->check_login($user, $pass);
            if ($check->num_rows() > 0) {

                foreach ($check->result() as  $ck) {

                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'admin') {
                    redirect('administrator/dashboard');
                } else {
                    $this->session->set_flashdata('Notification', '<div class="alert alert-danger alert-dismissible fade show" 
                    role="alert">
                    Your Username or Password is wrong!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                    </button>
        </div>');
                    redirect('administrator/auth');
                }
            } else {
                $this->session->set_flashdata('Notification', '<div class="alert alert-danger alert-dismissible fade show" 
                role="alert">
                Your Username or Password is wrong!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
                </button>
    </div>');
                redirect('administrator/auth');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('administrator/auth');
    }
}
