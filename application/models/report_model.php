<?php

class report_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function score_less_than($user_score, $database)
    {
        $this->db->select('COUNT()');
        $this->db->where('score' . '<=', $user_score);
        $this->db->where('first_attempt_score' . '!=', 0);

        return $this->db->get($database)->row();
    }

    function total_user_count($database)
    {
        $this->db->select('COUNT(*)');
        $this->db->where('first_attempt_score' . '!=', 0);

        return $this->db->get($database)->row();
    }

    function count_percentage($user_score, $database)
    {
        $users_less_than_score = $this->score_less_than($user_score, $database);
        $count1 = $users_less_than_score->COUNT;

        $total_users = $this->total_user_count($database);
        $count2 = $total_users->COUNT;

        $percentage = ($count1 / $count2) * 100;
        return round($percentage, 2);
    }

    public function get_reportsymtom($user_id)
    {
        $this->db->select('score');
        $this->db->where('user_id', $user_id);
        return $this->db->get('quiz_symptom')->row('score');
    }



    //
    // public function get_reporttips($user_id)
    // {
    //     $this->db->select('score');
    //     $this->db->where('user_id', $user_id);
    //     return $this->db->get('quiz_tips')->row('score');
    // }

    // public function get_reportdealing($user_id)
    // {
    //     $this->db->select('score');
    //     $this->db->where('user_id', $user_id);
    //     return $this->db->get('quiz_dealing')->row('score');
    // }
}
