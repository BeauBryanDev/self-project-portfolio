<?php 

use frmwrk\db as Database; 
use \frmwrk\SessionMngr as SessionMngr;

if ( !function_exists('root_path'))  {
    
    function root_path(string $path): string
    {
        // return __DIR__ . '/../';
        return dirname(__DIR__) . '/' . normalize_path($path);
    }
}

if (!function_exists('normalize_path')) {
    function normalize_path(string $path): string
    {
        return trim($path, '/');
    }
}

if (!function_exists("view")) {

    function view($viewName, $data = []) {
        extract($data);
        //require root_path() . "/resources/{$viewName}_template.php";
        require __DIR__ . '/../resources/' . ltrim($viewName, '/') . '_template.php';
    }
}

if (!function_exists("redirect")) {

    function redirect($path) {
        header("Location: /" . normalize_path($path));
        exit;
    }
}

if (!function_exists("asset")) {

    function asset($assetPath) {
        return root_path($assetPath) . "/public/" . ltrim($assetPath, '/');
    }
}
if (!function_exists('current_url')) {

    function current_url() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domain = $_SERVER['HTTP_HOST'];
        $requestUri = $_SERVER['REQUEST_URI'];
        return $protocol . $domain . $requestUri;
    }
}

if ( ! function_exists('old')) {

    function old($field, $default = '') {
        static $session = null;

        if ($session === null) {
            $session = new SessionMngr();
        }
        
        $oldData = $session->getFlash('old');

        return $oldData[$field] ?? $default;
    }
}

if (! function_exists('requestIs'))  {

    function requestIs( string $url  ) {

        return $_SERVER['REQUEST_URI'] === $url;

    }

}

if ( !function_exists('config')) {

    function config($key, $default = null) {
        $config = include __DIR__ . '/../config/app.php';
        return $config[$key] ?? $default;
    }

}   

if (!function_exists('db')) {
    function db(): Database
    {
        static $db = null;

        if ($db === null) {
            $db = new Database();
        }

        return $db;
    }
}


if (!function_exists('isAuthenticated')) {
    function isAuthenticated(): bool
    {
        return (bool) ($_SESSION['user'] ?? false);
    }

}

if (!function_exists('back')) {

    function back()  {

        $previousURL = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: " . $previousURL);
        exit;
    }
}

if (!function_exists('session') )  {

    function session () : SessionMngr {

        static $session = null ;

        if ( $session === null ) {

            $session = new SessionMngr();
        }

        return $session;
        
    }

}

if (!function_exists('erros')) {

    function showErrors() : string {

        $erros = session()->getFlash('errors', []) ?? [];

        if ( empty($erros) ) {
            return '';
        }


        if (!is_array($erros) )  {

            $erros = [ $erros];
        }


        $htmlerrors = '<ul class="mt-4 text-red-500">';

      foreach ($erros as $error ) {

        $htmlerrors .= "<li class='text-xs'>* {$error}</li>";

    }

    $htmlerrors .= '</uñ>';

    return $htmlerrors;

    }

}
