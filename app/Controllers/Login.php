<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        $data = [
            'title' => 'Login | AlltanNotes',
        ];

        if ($session->get('logged_in') === TRUE) {
            return redirect()->to('/notes');
        } else {
            return view('login', $data);
        }
    }

    public function process()
    {
        $users = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'fullname' => $dataUser->fullname,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('notes'));
            } else {
                session()->setFlashdata('error', 'Username atau password salah!');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username atau password salah!');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('/'));
    }
}
