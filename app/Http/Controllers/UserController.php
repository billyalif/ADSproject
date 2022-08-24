<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = [
            [
                'name'      => 'John Doe',
                'divisi'     => 'Backend',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Tailor Otwell',
                'divisi'     => 'Backend',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Steve Schoger',
                'divisi'     => 'Frontend',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Nabil',
                'divisi'     => 'Frontend',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Alif',
                'divisi'     => 'Data Analyst',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Raihan',
                'divisi'     => 'Data Analyst',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Roshan',
                'divisi'     => 'UI/UX',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Sabrina',
                'divisi'     => 'UI/UX',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Rizka',
                'divisi'     => 'Technical Writer',
                'kota'   => 'Surabaya'
            ],
            [
                'name'      => 'Fahmi',
                'divisi'     => 'Technical Writer',
                'kota'   => 'Surabaya'
            ],
        ];

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($user){
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
