<?php 

class HomeController {

    public function index() {

        $myTitle = "home";
        $db = new db();

        $posts = $db->query( "SELECT * FROM itposts
         ORDER BY date DESC LIMIT 6")->get();

        require __DIR__ . '/../../resources/home_templates.php';
    }



}



//require __DIR__ . '/../../resources/home_templates.php';




