<?php 

namespace frmwrk\Middleware;

use frmwrk\Middleware\MiddlewareInterface;

class Middleware {

    public static function run(MiddlewareInterface $middleware) {
        
        $middleware->handle();
        
    }

}
