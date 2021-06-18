<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_dashboard extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model(['user_e_model', 'employer_projects_model', 'emp_applicants_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
        
        if ($this->session->userdata('has_login') != 0 && $this->session->userdata('user_role') != "Employer"){
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {   
        $data['title'] = 'iJEES | Dashboard';
        $data['include_js'] = 'employer_dashboard';

        $e_details = $this->user_e_model->e_details($this->session->userdata('user_id'));

        // Total EMPs Posted
        $data['num_emps'] = count($this->employer_projects_model->get_emps_from_employer($e_details['e_id']));

        // Total Approved EMPs
        $approve_condition = array (
            'e_id' => $e_details['e_id'],
            'emp_approval' => 1
        ); 
        $data['num_approved_emps'] = count($this->employer_projects_model->select_condition($approve_condition));

         // Total Pending EMPs
        $pending_condition = array (
            'e_id' => $e_details['e_id'],
            'emp_approval' => 0
        );
        $data['num_pending_emps'] = count($this->employer_projects_model->select_condition($pending_condition));
        
        // Total EMP Applicants
        $data['num_emp_applicants'] = count($this->emp_applicants_model->get_applicants_from_emps($e_details['e_id']));

        // For Bar Graph: Total EMP Applicants by Nationality
        $data['total_applicants'] = $this->emp_applicants_model->applicants_per_nationality($e_details['e_id']);

        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/employer/employer_dashboard_view');
        $this->load->view('internal/templates/footer');
    }
}

?>