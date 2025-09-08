<?php 

namespace frmwrk;

class SessionMngr {

    public static function start_session()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function set( string $key , mixed $value ) : void {
        $_SESSION[$key] = $value;
    }

    public function get( string $key, mixed $default = null  ) : mixed {
        return $_SESSION[$key] ??  $default;
    }

    public function remove( string $key ) : void {
        unset( $_SESSION[$key] );

    }

    public function has( string $key ) : bool {
        return isset( $_SESSION[$key] );
    }

    public function setFlash( string $key , mixed $value = null )  : void {

        $this->set('flash_'. $key, $value );

    }
    public function getFlash( string $key , $default = null) : mixed {

        $value = $this->get('flash_'. $key, $default );
        $this->remove('flash_'. $key );
        return $value;
    }
}