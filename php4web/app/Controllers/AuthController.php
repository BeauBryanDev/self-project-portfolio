<?php 

namespace app\Controllers;
use frmwrk\db;
use frmwrk\validator;


class AuthController {
    public function login() {
        // Logic for displaying the login form
        view('login');
    }


    public function authenticate()  {

        $validator = new validator($_POST, [
            'email'=> 'required|email',
            'password'=> 'required|min:6',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            // Handle validation errors (e.g., redirect back with errors)
            view('login', ['errors' => $errors]);
            return;
        }
        $db = new db();
        if ( $validator->wentThrough()) {

            $user = $db->query("SELECT * FROM users WHERE email = :email", [
                'email' => $_POST['email']
            ])->first();

            if ($user && password_verify($_POST['password'], $user['password'])) {
                // If authentication is successful, set user session and redirect
                $_SESSION['user'] = [
                    'uid' => $user['uid'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ];
                redirect('/');
            } else {
                // Authentication failed
                view('login', ['error' => $validator->errors()]);
                return;
            }
        }
       
    }

    public function logout() {
        // Logic for logging out the user
        unset($_SESSION['user']);
        session_destroy();
        redirect('/login');
    }
}

