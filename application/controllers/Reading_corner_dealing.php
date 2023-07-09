<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reading_corner_dealing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('reading_corner_model');

        // If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')) {
            redirect('user/auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dementia App | Reading Corner';

        $data['read_data'] = $this->reading_corner_model->get_reading_dealing_details($this->session->userdata('user_id'));

        $data['include_js'] = 'read_in_progress_dealing';

        $this->load->view('templates/header', $data);
        $this->load->view('reading_corner_view_dealing.php');
        $this->load->view('templates/footer');
    }

    public function read($read_num = 0)
    {
        $data['title'] = 'Dementia App | Reading Corner';
        $data['include_js'] = 'read_in_progress_dealing';

        if ($read_num == 3) {
            $data['read_data'] = $this->reading_corner_model->get_reading_dealing_details($this->session->userdata('user_id'));
        } else {
            redirect('reading_corner');
        }

        // Load the progress and last open content from the database
        $user_id = $this->session->userdata('user_id');
        $data['reading_progress_data'] = $this->reading_corner_model->get_progress_row_dealing($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('read_in_progress_view_dealing.php');
        $this->load->view('templates/footer');
    }

    public function save_progress()
    {
        $stat = $this->input->post('stat');
        $progress = $this->input->post('progress');
        $user_id = $this->session->userdata('user_id');

        // Update the progress in the database
        $this->reading_corner_model->update_progress_dealing($user_id, $progress, $stat);

        // Return a response
        $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'success']));
    }

    public function save_dealing_last()
    {
        $last_progress = $this->input->post('last_progress');
        $user_id = $this->session->userdata('user_id');

        // Update the progress in the database
        $this->reading_corner_model->update_dealing_last($user_id, $last_progress);

        // Return a response
        $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'success']));
    }

    public function get_progress()
    {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('reading_corner_model');
        $progress = $this->reading_corner_model->get_progress_dealing($user_id);

        // Return the progress as JSON response
        $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'success', 'data' => $progress]));
    }

    public function get_saved_progress()
    {
        $user_id = $this->session->userdata('user_id');
        // Retrieve the saved progress from the database
        $saved_progress = $this->reading_corner_model->get_progress_dealing($user_id);
        // Return the saved progress as a response
        $this->output->set_content_type('application/json')->set_output(json_encode(['progress' => $saved_progress]));
    }
}
