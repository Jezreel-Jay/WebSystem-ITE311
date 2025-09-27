<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function getMessage($page) {
        $messages = [
            'home'    => "This is the homepage content loaded from the model.",
            'about'   => "This is the about page content loaded from the model.",
            'contact' => "This is the contact page content loaded from the model."
        ];
        return $messages[$page] ?? "No message available.";
    }
}
