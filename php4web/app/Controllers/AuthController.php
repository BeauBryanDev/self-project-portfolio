<?php 

namespace app\Controllers;
use frmwrk\Authenticate;
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
     
        $login = ( new Authenticate())->login(
            $_POST['email'], $_POST['password']
        );

        if (!$login) {
            
            session()->getFlash('errors', '');
            session()->setFlash('errors', 'invalid email or password');

            back();
        } 
        

        redirect('/login');
      
    } public function logout() {
        // Logic for logging out the user
        (new Authenticate())->logout();
        redirect('/login');
    }

}

