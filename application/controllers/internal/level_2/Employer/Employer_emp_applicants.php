<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employer_emp_applicants extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model(['user_e_model', 'emp_applicants_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
        
        // Checks if session is set and if user is signed in as Employer (authorised access). If not, deny his/her access.
        // if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Employer"){  
        //     redirect('user/login/Auth/login');
        // }

        if ($this->session->userdata('has_login') != 0 && $this->session->userdata('user_role') != "Employer"){
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {   
        $data['title'] = 'iJEES | EP Applicants';
        $data['include_js'] = 'employer_emp_applicants_list';

        $e_details = $this->user_e_model->e_details($this->session->userdata('user_id'));
        $data['emp_applicants'] = $this->emp_applicants_model->get_applicants_from_emps($e_details['e_id']);

        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/employer/employer_emp_app_list_view');
        $this->load->view('internal/templates/footer');
    }

    function emp_applicants_list()
    {
        // Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $e_details = $this->user_e_model->e_details($this->session->userdata('user_id'));
        $emp_applicants = $this->emp_applicants_model->get_applicants_from_emps($e_details['e_id']);

        $counter = 1;

		$data = array();
		$base_url = base_url();

        foreach($emp_applicants as $emp_app) {
            
			$view = '<span><button type="button" onclick="view_emp_applicant('.$emp_app['emp_applicant_id'].')" class="btn icon-btn btn-xs btn-info waves-effect waves-light" data-toggle="modal" data-target="#view_emp_applicant"><span class="fas fa-eye"></span></button></span>';
            $chat = '<span class = "px-1 "><a type="button" onclick="chat_with_emp_applicant(\''.str_replace("'", "\\'", $emp_app['user_id']).'\', \''.str_replace("'", "\\'", $emp_app['user_fname']).'\', \''.str_replace("'", "\\'", $emp_app['user_lname']).'\');")" id="'.$emp_app['user_id'].'" title="'.$emp_app['user_fname'].' '.$emp_app['user_lname'].'" class="btn icon-btn btn-xs btn-success waves-effect waves-light"><span class="fas fa-comment"></span></a></span>';
            
            $function = $view.$chat;

			$data [] = [ 
				$counter,
				$emp_app['user_fname'], // from users table
				$emp_app['user_lname'],
				$emp_app['student_nationality'], // from students table
				$emp_app['emp_title'], // from employer_projects table
                $emp_app['emp_app_submitdate'], // from emp_applicants table
                $function,
            ];

            $counter++;
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => count($emp_applicants),
			"recordsFiltered" =>count($emp_applicants),
			"data" => $data
		);

		echo json_encode($output);
		exit();
    }

    function view_emp_applicant()
    {
        $emp_applicant_details = $this->emp_applicants_model->emp_applicant_details($this->input->post('emp_applicant_id'));

        $output ='
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th scope="row">Date Submitted</th>
                    <td>'.$emp_applicant_details['emp_app_submitdate'].'</td>
                </tr>
                <tr>
                    <th scope="row">Employer Project Title</th>
                    <td>'.$emp_applicant_details['emp_title'].'</td>
                </tr>
                <tr>
                    <th scope="row">First Name</th>
                    <td>'.$emp_applicant_details['user_fname'].'</td>
                </tr>
                <tr>
                    <th scope="row">Last Name</th>
                    <td>'.$emp_applicant_details['user_lname'].'</td>
                </tr>
                <tr>
                    <th scope="row">Nationality</th>
                    <td>'.$emp_applicant_details['student_nationality'].'</td>
                </tr>
                <tr>
                    <th scope="row">Interest</th>
                    <td>'.$emp_applicant_details['student_interest'].'</td>
                </tr>
                <tr>
                    <th scope="row">Level</th>
                    <td>'.$emp_applicant_details['student_currentlevel'].'</td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                    <td>'.$emp_applicant_details['student_gender'].'</td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>'.$emp_applicant_details['user_email'].'</td>
                </tr>
                <tr>
                    <th scope="row">Phone Number</th>
                    <td>'.$emp_applicant_details['student_phonenumber'].'</td>
                </tr>
            </tbody>
        </table>
        
        ';

        echo $output;
    }

}

?>