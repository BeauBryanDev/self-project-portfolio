<?php 

class BlogController {

    public function index() {
        $myTitle = "blog";
        $db = new db();
        //$projectLinks = $db->query( "SELECT * FROM links ORDER BY id ASC");
        $myPostBlogs = $db->query("SELECT * FROM itposts ORDER BY date ASC");
        //this table has five fields or columns pid, title, description ,content and date ;
        require __DIR__ . '/../../resources/blog_template.php';
    }


}

