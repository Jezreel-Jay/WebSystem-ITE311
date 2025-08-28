<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DashboardModel;

class Auth extends BaseController
{
    public function register()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name'     => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();

                $userModel->save([
                    'name'     => $this->request->getPost('name'),
                    'email'    => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role'     => 'user',
                ]);

                return redirect()->to('/login')->with('success', 'Registered successfully. Please login.');
            }
        }

        return view('auth/register');
    }

    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $userModel = new UserModel();
            $user = $userModel->where('email', $this->request->getPost('email'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'name'    => $user['name'],
                    'email'   => $user['email'],
                    'role'    => $user['role'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid login credentials.');
            }
        }

        return view('auth/login');
    }

    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $dashboardModel = new DashboardModel();
        $dashboard = $dashboardModel->where('user_id', $session->get('user_id'))->first();

        return view('auth/dashboard', ['dashboard' => $dashboard, 'user' => $session->get()]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
