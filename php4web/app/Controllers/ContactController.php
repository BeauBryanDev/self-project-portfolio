<?php

class ContactController
{

    public function index()
    {
        $myTitle = "Contact";
        $db = new db();
        //$projectLinks = $db->query( "SELECT * FROM links ORDER BY id ASC");
        $myPostBlogs = $db->query("SELECT * FROM itposts ORDER BY date ASC");
        //this table has five fields or columns pid, title, description ,content and date ;
        require __DIR__ . '/../../resources/post_template.php';
    }
}
    
// $myTitle = "Contact";

// require __DIR__ . '/../../resources/contact_template.php';