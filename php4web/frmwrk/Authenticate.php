<?php

namespace frmwrk;
use frmwrk\db;

class Authenticate {

    public static function isAuthenticated(): bool {
        session_start();
        return isset($_SESSION['user_id']);
    }

    public static function requireAuth(): void {
        if (!self::isAuthenticated()) {
            header('Location: /login');
            exit;
        }
    }

    public function login( string $email, string $password): bool  {

        $db = new db();

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
                'email' => $email,
            ])->first();

            if ($user && password_verify($_POST['password'], $user['password'])) {
                // If authentication is successful, set user session and redirect
                $_SESSION['user'] = [
                    'uid' => $user['uid'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ];
                
                return true;
            }

            return false;
    }

    public function logout() {
        // Logic for logging out the user
        unset($_SESSION['user']);
        session_destroy();
        
    }

}