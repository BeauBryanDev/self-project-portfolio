<?php 

namespace app\Controllers;

class AboutMeController {

    public function index() {

        $myTitle = "About Me";

        //require __DIR__ . '/../../resources/aboutMe_template.php';

        // Render the view

        \view('/aboutMe', ['title' => $myTitle]);
    }

}

/*
$myTitle = "about me";

require __DIR__ . '/../../resources/aboutMe_template.php';


*/



