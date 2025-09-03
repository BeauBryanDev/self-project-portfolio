<?php

class ProjectsController  {

    public function index() {

        $myTitle = "Projects";
        $db = new db();

        $projectLinks = $db->query( "SELECT * FROM links ORDER BY id ASC")->get();
        require __DIR__ . '/../../resources/projects_template.php';

    }

    public function create()  {

        $myTitle = "Create a new Project";

        require __DIR__ . '/../../resources/create_project_template.php';

    }

    public function store()  {

        $myTitle = "Create a new Project";
        
        $validator = new validator($_POST, [

            'title' => 'required|min:3|max:255',
            'url' => 'required|url|min:5|max:255',
            'description' => 'required|min:10|max:1000',
            'content' => 'required|min:10|max:2048',
            
        ]);

        if ($validator->wentThrough( ) )  {
            $db = new db();

            $db->query("INSERT INTO itposts (title, description, content, date, url ) VALUES (:title, :description, :content, :date, :url)", [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
                'url' => $_POST['url'],
                'date' => date('Y-m-d')
            ]);
            header("Location: /projects");
            exit;
        }

        $errors = $validator->errors();

        $title = 'Register a project';

        require __DIR__ . '/../../resources/create_project_template.php';
    }

}



// $myTitle = "projects";


// $projectLinks = $db->query( "SELECT * FROM links ORDER BY id ASC")->get();

// require __DIR__ . '/../../resources/projects_template.php';


