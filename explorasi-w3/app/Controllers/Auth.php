<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function loginIndex()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/home');
        }


        return view('login');
    }

    public function registerIndex()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/home');
        }

        return view('register');
    }

    public function registerAction()
    {
        $model = new Admin();

        if ($this->request->getPost('password') == $this->request->getPost('confirm_password')) {
            $password_hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $model->save([
                'username' => $this->request->getPost('username'),
                'password' => $password_hash
            ]);

            return redirect()->to('/');
        } else {
            return redirect()->to('/register');
        }
    }

    public function loginAction()
    {
        $model = new Admin();


        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set([
                    'id'        => $user['id'],
                    'username'  => $user['username'],
                    'logged_in' => true
                ]);

                return redirect()->to('/home');
            } else {

                return redirect()->to('/');
            }
        } else {

            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
