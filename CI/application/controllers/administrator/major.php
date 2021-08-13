<?php

class Major extends CI_Controller
{

    public function index()
    {
        $data['major'] = $this->major_model->show_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/major', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function input()
    {
        $data = array(
            'id_major' => set_value('id_major'),
            'code_major' => set_value('code_major'),
            'name_major' => set_value('name_major')
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/major_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function input_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->input();
        } else {
            $data = array(
                'code_major' => $this->input->post('code_major', TRUE),
                'name_major' => $this->input->post('name_major', TRUE),
            );
            $this->major_model->input_data($data);
            $this->session->set_flashdata('Notification', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">
            Add Major Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
            redirect('administrator/major');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('code_major', 'code_major', 'required');
        $this->form_validation->set_rules('name_major', 'name_major', 'required');
    }

    public function update($id)
    {
        $where = array('id_major' => $id);
        $data['major'] = $this->major_model->edit_data($where, 'major')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/major_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_action()
    {
        $id = $this->input->post('id_major');
        $code_major = $this->input->post('code_major');
        $name_major = $this->input->post('name_major');

        $data = array(
            'code_major' => $code_major,
            'name_major' => $name_major
        );
        $where = array(
            'id_major' => $id
        );
        $this->major_model->update_data($where, $data, 'major');
        $this->session->set_flashdata('Notification', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">
            Update Major Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
        redirect('administrator/major');
    }
    public function delete($id)
    {
        $where = array('id_major' => $id);
        $this->major_model->delete_data($where, 'major');
        $this->session->set_flashdata('Notification', '<div class="alert alert-danger alert-dismissible fade show" 
            role="alert">
            Delete Major Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
        redirect('administrator/major');
    }
}
