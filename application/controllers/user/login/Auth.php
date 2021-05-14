<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        // this->load->model("modelname");
        $this->load->model('user_model');
        $this->load->model('user_student_model');
        $this->load->model('user_ep_model');
    }
    
    public function login()
    {
        $this->form_validation->set_rules('user_email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('user_password','Password','trim|required');
        
        if($this->form_validation->run() ==false)
        {
            $data['title']='User Login';
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/login/login_view');
            $this->load->view('external/templates/footer');
           }
           else
           {
             $this->_login();
           }     
    }
    
    private function _login()
    {
        $user_email= $this->input->post('user_email');
        $user_password=$this->input->post('user_password');
        $users=$this->user_model->valid_email($user_email);

        // if user exists
        if($users)
        {
            // if user is approved
            if($users['user_approval']==1)
            {
                // verify the password
                if($user_password==$users['user_password'])
                {
                    $data=
                    [
                        'user_email'=>$users['user_email'],
                        'user_role'=>$users['user_role']
                    ];
                    $this->session->set_userdata($data);
                    // check user role is admin
                    if($users['user_role']=="Admin")
                    {
                        redirect('internal/admin_panel/Admin_dashboard');
                    }
                    // check user role is  AC,EA,E,EP
                    else if ($users['user_role']!="Student")
                    {
                       redirect('internal/level_2/Level_2_dashboard/profile_level_2');
                    }
                     // check user role is  student
                    else
                        redirect('external/homepage/profile_level_1');
                }
                // if password is incorrect
                else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('user/login/Auth/login');
                }
            }
            // if account is not approved by admin
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Email has not been activated!</div>');
                redirect('user/login/Auth/login');
            }
        }
        // if user account does not exist
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Account does not exist!</div>');
            redirect('user/login/Auth/login');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('user_fname','First Name', 'required|trim');
        $this->form_validation->set_rules('user_lname','Last Name', 'required|trim');
        $this->form_validation->set_rules('user_email','Email', 'required|trim|valid_email|is_unique[users.user_email]',[
            'is_unique'=>'This email has already registered!'
        ]);

        $this->form_validation->set_rules('user_password','Password', 'required|trim|min_length[3]|matches[user_password2]',[
            'matches'=>'password do not match!',
            'min_length'=> 'Password too short'
        ]);
        $this->form_validation->set_rules('user_password2','Password', 'required|trim|matches[user_password]');
        if($this->form_validation->run()== false)
        {
            $data['title']="User Registration";
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/registration_view');
            $this->load->view('external/templates/footer');
        }
        else
        {
            $data=
            [
                'user_fname'=>htmlspecialchars($this->input->post('user_fname',true)),
                'user_lname'=>htmlspecialchars($this->input->post('user_lname',true)),
                'user_email'=>htmlspecialchars($this->input->post('user_email',true)),
                'user_password'=>htmlspecialchars($this->input->post('user_password',true)),
                'user_role'=>htmlspecialchars($this->input->post('user_role',true)),
                'user_approval'=>0,
            ];
        
            // insert data into database
            $this->user_model->insert($data);
            $user_role=$this->user_model->get_role();
        
            if($user_role=="Student")
            {
                //------------------ change later-------------------(wait for wc)//
                 $this->load->view('user/registration/student_registration_view');
            }
            else if($user_role=="Education Partner")
            {
                 //------------------ change later-------------------(wait for wc)//
                // $this->load->view('user/registration/ep_registration_view');
            }
            else if($user_role=="Academic Couselor")
            {
                 //------------------ change later-------------------(wait for wc)//
                // $this->load->view('user/registration/ac_registration_view');
            }
            else if($user_role=="Education Agent")
            {
                 //------------------ change later-------------------(wait for wc)//
                // $this->load->view('user/registration/ea_registration_view');
            }
            else
            {
                 //------------------ change later-------------------(wait for wc)//
                // $this->load->view('user/registration/e_registration_view');
            }
        }
    }

    public function student_reg()
    {
        $user_id=$this->user_student_model->last_user_id();
        $data=
        [
            'user_id'=>$user_id,
            'student_phonenumber'=>htmlspecialchars($this->input->post('student_phonenumber',true)),
            'student_nationality'=>htmlspecialchars($this->input->post('student_nationality',true)),
            'student_gender'=>htmlspecialchars($this->input->post('student_gender',true)),
            'student_dob'=>htmlspecialchars($this->input->post('student_dob',true)),
            'student_interest'=>htmlspecialchars($this->input->post('student_interest',true)),
            'student_currentlevel'=>htmlspecialchars($this->input->post('student_currentlevel',true)),
        ];

        // insert data into database
        $this->user_student_model->insert($data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>');
        redirect('user/login/Auth/login');
    }

    public function ep_reg()// -----------------change function name in view-------------------//
    {
        $user_id=$this->user_ep_model->last_user_id();
        $data=
        [
            'user_id'=>$user_id,
            'ep_phonenumber'=>htmlspecialchars($this->input->post('ep_phonenumber',true)),
            'ep_businessemail'=>htmlspecialchars($this->input->post('ep_businessemail',true)),
            'ep_nationality'=>htmlspecialchars($this->input->post('ep_nationality',true)),
            'ep_gender'=>htmlspecialchars($this->input->post('ep_gender',true)),
            'ep_dob'=>htmlspecialchars($this->input->post('ep_dob',true)),
            'ep_jobtitle'=>htmlspecialchars($this->input->post('ep_jobtitle',true)),  
        ];

         // insert data into database
        $this->user_ep_model->insert($data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>'); 
        redirect('user/login/login_view');  
    }

    public function logout()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_role');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have been logout</div>');
        redirect('user/login/login_view');
     
    }
}



