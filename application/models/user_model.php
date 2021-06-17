<?php

class user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        // select from  users table
        return $this->db->get('users');
    }

    function insert($data)
    {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deletedata($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_approve($id, $data)
    {
        $this->db->where('user_id', $id);
        return $this->db->update('users', $data);
    }

    public function  approvedata($condition)
    {
        $this->db->where('user_approval', $condition);
        return $this->db->get('users')->result_array();
    }

    public function  pendingdata($condition)
    {
        $this->db->where('user_approval', $condition);
        return $this->db->get('users')->result_array();
    }

    public function getuserid()
    {
        return $this->db->get('users')->result_array();
    }

    public function search_email()
    {
        return $this->db->get_where('users', ['user_email' => $this->session->userdata('user_email')])->row_array();
    }

    public function search_id($id)
    {
        return $this->db->get_where('users', ['user_id' => $id])->row_array();
    }

    public function valid_email($user_email)
    {
        return $this->db->get_where('users', ['user_email' => $user_email])->row_array();
    }

    public function reg_id()
    {
        return $this->db->get('users')->row;
    }

    public function checkemail($user_email)
    {
        return $this->db->get_where('users', ['user_email' => $user_email, 'user_approval' => 1])->row_array();
    }

    public function updatepassword($tokan, $user_email)
    {
        return $this->db->query("update users set user_password='" . $tokan . "'where user_email='" . $user_email . "'");
    }

    public function changepassword($data)
    {
        $this->db->query("update users set user_password='" . $data['user_password'] . "'where user_password='" . $_SESSION['tokan'] . "'");
    }

    // Wait for Yee Peng to finalise her codes //
    // *-----------------------------------* //

    // ---- WORK IN PROGRESS ---- //

    function employers_list() // join 'users' table + 'user_e' table to get info from both tables
    {
        $this->db->select('users.user_id, user_fname, user_lname, c_name, c_logo, e_jobtitle')
            ->from('users')
            ->join('user_e', 'user_e.user_id = users.user_id')
            ->join('company', 'company.c_id = user_e.c_id')
            ->where('users.user_role', 'Employer')
            ->where('users.user_approval', '1');
        return $this->db->get()->result_array();
    }

    function students_list()
    {
        $this->db->select('users.user_id, user_email, user_fname, user_lname, student_interest, student_currentlevel')
            ->from('users')
            ->join('user_student', 'user_student.user_id = users.user_id')
            ->where('users.user_role', 'Student');
        return $this->db->get()->result_array();
    }

    function counsellors_list() // join users table + user_ac table to get info from both tables
    {
        $this->db->select('users.user_id, user_email, user_fname, user_lname, ac_university, uni_logo') // uni_logo
            ->from('users')
            ->join('user_ac', 'user_ac.user_id = users.user_id')
            ->join('universities', 'universities.uni_name = user_ac.ac_university')
            ->where('user_role', 'Academic Counsellor')
            ->where('users.user_approval', '1');
        return $this->db->get()->result_array();
    }

    function get_user_data()
    {
        // $id = $this->session->userdata['user_id'];
        $this->db->select('user_id, user_email, user_fname, user_lname, user_role, user_password')
            ->where('user_id', $this->session->userdata['user_id']);
        $this->db->limit(1);
        return $this->db->get('users')->row_array(); // row() || result () won't work.. why? array of objects. row_array returns a single result row. an object!! check with var_dump
    }

    function get_name($id)
    {
        $this->db->select('user_id,user_fname');

        $this->db->from('users');

        $this->db->where("user_id", $id);

        $this->db->limit(1);

        $query = $this->db->get();

        $res = $query->row_array();

        return $res['user_fname'];
    }

    function update($id, $data)
    {
        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_monthly_user($date1, $date2, $table, $attribute)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.user_id = ' . $table . '.user_id');
        $this->db->where('users.user_approval', 1);
        $this->db->where($table . "." . $attribute . " BETWEEN '" . $date1 . " 00:00:00' AND '" . $date2 . " 23:59:59' ");
        return $this->db->count_all_results($table);
    }
}
