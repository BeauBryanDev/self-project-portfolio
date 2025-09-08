<?php 

namespace frmwrk\Middleware;

class Guest  implements MiddlewareInterface {
    public function handle(): void {
        //session_start();
        if (isset($_SESSION['user'])) {
            \redirect('/');
            exit;
        }
    }
}
