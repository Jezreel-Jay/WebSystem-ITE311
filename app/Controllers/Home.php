<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index', [
            'page' => 'home',
            'title' => 'Home - MyCIApp'
        ]);
    }

    public function about()
    {
        return view('about', [
            'page' => 'about',
            'title' => 'About - MyCIApp'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'page' => 'contact',
            'title' => 'Contact - MyCIApp'
        ]);
    }
}
