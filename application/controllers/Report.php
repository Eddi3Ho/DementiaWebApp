<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('quiz_model');
		$this->load->model('report_model');

		// If user is not login bring them back to login page
		if (!$this->session->has_userdata('has_login')) {
			redirect('user/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Report';

		// $usersLessThanScore = $this->report_model->score_less_than($userScore, $database);
		// $totalUsers = $this->report_model->total_user_count($database);
		// $scorePercentage = $this->report_model->count_percentage($userScore, $database);

		// $data = array(
		// 	'user_score' => $userScore,
		// 	'users_less_than_score' => $usersLessThanScore,
		// 	'total_users' => $totalUsers,
		// 	'score_percentage' => $scorePercentage
		// );



		$this->load->view('templates/header', $data);
		$this->load->view('report_view.php');
		$this->load->view('templates/footer');
	}
	//

	// public function get_report()
	// {
	// 	$user_id = $this->session->userdata('user_id');
	// 	$this->load->model('report_model');
	// 	$progress = $this->report_model->get_report($user_id);

	// 	// Return the progress as JSON response
	// 	$this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'success', 'data' => $progress]));
	// }


	// public function generateReport()
	// {
	// 	$userScore = 80; // Replace with the user's actual score
	// 	$database = 'users'; // Replace with the name of your database table

	// 	// Load quiz_model

	// 	// Get quiz data
	// 	$quizData = $this->quiz_model->get_selected_quiz_details($, $database);

	// 	// Extract score from quiz data
	// 	$userScore = $quizData->score;

	// 	// Use the score to generate the report


	// 	$this->load->view('report_view', $data);
	// }
	// 	public function index()
	//     {
	//         $data['percentage'] = $this->report_model->count_percentage($user_score, $database); // Replace $user_score and $database with your actual values

	//         // Generate data for pie chart
	//         $data['pieChartLabels'] = []; // Replace with your pie chart labels
	//         $data['pieChartData'] = []; // Replace with your pie chart data
	//         $data['pieChartColors'] = []; // Replace with your pie chart colors

	//         // Generate data for bar chart
	//         $data['barChartLabels'] = []; // Replace with your bar chart labels
	//         $data['barChartData'] = []; // Replace with your bar chart data
	//         $data['barChartColors'] = []; // Replace with your bar chart colors

	//         $this->load->view('report_view', $data);
	// }
}
