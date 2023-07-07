<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function rules()
    {
        return [
            [
                'field' => 'username_',
                'label' => 'username_',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'pass_',
                'label' => 'pass_',
                'rules' => 'required|trim'
            ]
        ];
    }
    function validate($username, $password)
    {
        $this->db->where('username_adm', $username);
        $this->db->where('pass_adm', $password);
        $result = $this->db->get('admin_', 1);
        return $result;
    }
    function validate_usr($username, $password)
    {
        $this->db->where('username_', $username);
        $this->db->where('pass_', $password);
        $result = $this->db->get('user_', 1);
        return $result;
    }
}