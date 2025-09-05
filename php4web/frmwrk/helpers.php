<?php 

if ( !function_exists('root_path'))  {
    
    function root_path() {
        //return rtrim(str_replace($_SERVER['DOCUMENT_ROOT'], '', __DIR__), '/');
        return dirname( __DIR__) . '/' . normalize_path($_SERVER['DOCUMENT_ROOT'], true);
    }
}

if ( function_exists("root_path")) {

    function normalize_path($path, $isDir = false) {
        $normalizedPath = str_replace(['\\', '//'], '/', $path);
        if ($isDir) {
            $normalizedPath = rtrim($normalizedPath, '/') . '/';
        }
        return $normalizedPath;
    }
}

if ( function_exists("root_path")) {

    function view($viewName, $data = []) {
        extract($data);
        //require root_path() . "/resources/{$viewName}_template.php";
        require __DIR__ . '/../resources/' . ltrim($viewName, '/') . '_template.php';
    }
}

if ( function_exists("root_path")) {

    function redirect($path) {
        header("Location: " . root_path() . $path);
        exit;
    }
}

if ( function_exists("root_path")) {

    function asset($assetPath) {
        return root_path() . "/public/" . ltrim($assetPath, '/');
    }
}   
if ( function_exists('root_path')) {

    function current_url() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domain = $_SERVER['HTTP_HOST'];
        $requestUri = $_SERVER['REQUEST_URI'];
        return $protocol . $domain . $requestUri;
    }
}

if ( ! function_exists('old')) {

    function old($field, $default = '') {
        return $_POST[$field] ?? $default;
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