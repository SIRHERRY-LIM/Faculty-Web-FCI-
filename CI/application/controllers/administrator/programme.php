<?php

class Programme extends CI_Controller
{
    public function index()
    {
        $data['programme'] = $this->programme_model->show_data('programme')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/programme', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add_programme()
    {
        $data['major'] = $this->programme_model->show_data('major')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/programme_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add_programme_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add_programme();
        } else {
            $code_programme = $this->input->post('code_programme');
            $name_programme = $this->input->post('name_programme');
            $name_major = $this->input->post('name_major');

            $data = array(
                'code_programme' => $code_programme,
                'name_programme' => $name_programme,
                'name_major' => $name_major

            );
            $this->programme_model->insert_data($data, 'programme');
            $this->session->set_flashdata('Notification', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">
            Add Programme Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
            redirect('administrator/programme');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('code_programme', 'code_programme', 'required');
        $this->form_validation->set_rules('name_programme', 'name_programme', 'required');
        $this->form_validation->set_rules('name_major', 'name_major', 'required');
    }

    public function update($id)
    {
        $where = array('id_programme' => $id);
        $data['programme'] = $this->db->query("select * from programme prg, major mjr where
        prg.name_major = mjr.name_major and prg.id_programme='$id' ")->result();

        $data['major'] = $this->programme_model->show_data('major')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/programme_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_action()
    {
        $id = $this->input->post('id_programme');
        $code_programme = $this->input->post('code_programme');
        $name_programme = $this->input->post('name_programme');
        $name_major = $this->input->post('name_major');


        $data = array(
            'code_programme' => $code_programme,
            'name_programme' => $name_programme,
            'name_major' => $name_major
        );
        $where = array(
            'id_programme' => $id
        );
        $this->programme_model->update_data($where, $data, 'programme');
        $this->session->set_flashdata('Notification', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">
            Update Programme Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
        redirect('administrator/programme');
    }
    public function delete($id)
    {
        $where = array('id_programme' => $id);
        $this->major_model->delete_data($where, 'programme');
        $this->session->set_flashdata('Notification', '<div class="alert alert-danger alert-dismissible fade show" 
            role="alert">
            Delete Programme Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
        redirect('administrator/programme');
    }
}
