<?php

class Subject extends CI_Controller
{

    public function index()
    {
        $data['subject'] = $this->subject_model->show_data('subject')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/subject', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function  add_subject()
    {
        $data['programme'] = $this->subject_model->show_data('programme')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/subject_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function add_subject_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add_subject();
        } else {
            $code_subject = $this->input->post('code_subject');
            $name_subject = $this->input->post('name_subject');
            $credit_hour = $this->input->post('credit_hour');
            $semester = $this->input->post('semester');
            $name_programme = $this->input->post('name_programme');

            $data = array(
                'code_subject' => $code_subject,
                'name_programme' => $name_programme,
                'name_subject' => $name_subject,
                'credit_hour' => $credit_hour,
                'semester' => $semester
            );
            $this->subject_model->insert_data($data, 'subject');
            $this->session->set_flashdata('Notification', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">
            Add subject Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
            redirect('administrator/subject');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('code_subject', 'code_subject', 'required');
        $this->form_validation->set_rules('name_programme', 'name_programme', 'required');
        $this->form_validation->set_rules('name_subject', 'name_subject', 'required');
        $this->form_validation->set_rules('credit_hour', 'credit_hour', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
    }

    public function detail($code)
    {
        $data['detail'] = $this->subject_model->get_code_subject($code);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/subject_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update($id)
    {
        $where = array('code_subject' => $id);
        $data['subject'] = $this->db->query("select * from subject st, programme prg where
        st.name_programme=prg.name_programme and st.code_subject ='$id' ")->result();

        $data['programme'] = $this->subject_model->show_data('programme')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/subject_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_action()
    {
        $id = $this->input->post('code_subject');
        $code_subject = $this->input->post('code_subject');
        $name_subject = $this->input->post('name_subject');
        $credit_hour = $this->input->post('credit_hour');
        $semester = $this->input->post('semester');
        $name_programme = $this->input->post('name_programme');


        $data = array(
            'code_subject' => $code_subject,
            'name_programme' => $name_programme,
            'name_subject' => $name_subject,
            'credit_hour' => $credit_hour,
            'semester' => $semester
        );
        $where = array(
            'code_subject' => $id
        );
        $this->subject_model->update_data($where, $data, 'subject');
        $this->session->set_flashdata('Notification', '<div class="alert alert-success alert-dismissible fade show" 
            role="alert">
            Update Subject Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
        redirect('administrator/subject');
    }

    public function delete($id)
    {
        $where = array('code_subject' => $id);
        $this->subject_model->delete_data($where, 'subject');
        $this->session->set_flashdata('Notification', '<div class="alert alert-danger alert-dismissible fade show" 
            role="alert">
            Delete Subject Data is Success!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
</div>');
        redirect('administrator/subject');
    }
}
