<?php
defined('BASEPATH') or exit('No direct script access allowed');
class controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public $parseData = [
        'navbar' => 'inc/navbar',
        'sidebar' => 'inc/sidebar',
        'content' => '',
        'title' => ''
    ];
}