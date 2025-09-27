<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function template() {

        $this->load->view('template');
    }
    public function index() {

        $this->load->view('index');
    }
    public function contact() {

        $this->load->view('contact');
    }
    public function about() {

        $this->load->view('about');
    }

}