<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = session();
        $data = [
            'title' => 'Profile | AlltanNotes',
            'username' => $session->get('username'),
            'fullname' => $session->get('fullname'),
        ];
        return view('profile', $data);
    }
}
