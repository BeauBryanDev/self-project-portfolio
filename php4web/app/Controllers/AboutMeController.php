<?php 

class AboutMeController {

    public function index() {
        $myTitle = "About Me";
        require __DIR__ . '/../../resources/aboutMe_template.php';
    }

}

/*
$myTitle = "about me";

require __DIR__ . '/../../resources/aboutMe_template.php';


*/



