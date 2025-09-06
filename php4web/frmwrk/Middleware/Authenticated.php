<?php 

namespace frmwrk\Middleware;

class Authenticated  implements MiddlewareInterface {
    public function handle(): void {
        //session_start();
        if (!isset($_SESSION['user'])) {
            \redirect('/login');
            exit;
        }
    }
}
