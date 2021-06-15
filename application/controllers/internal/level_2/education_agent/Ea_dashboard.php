<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ea_dashboard extends CI_Controller 
{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model(['user_model','course_applicants_model','universities_model','courses_model']);
        // Checks if session is set and if user is signed in as Level 2 user (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || !$this->session->userdata('user_role')){  
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {
        $data['title'] = 'iJEES | Dashboard';
        $user_details = $this->user_model->get_user_details($this->session->userdata('user_id'));
        // var_dump( $user_details);
        // die;

        // Total Student
       $data['total_students']= count($this->course_applicants_model->get_total_students($user_details['user_id']));

       //Total Female
       

        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/education_agent/ea_dashboard_view');
        $this->load->view('internal/templates/footer');
    }

   
}
?>