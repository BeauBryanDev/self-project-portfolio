<?php

namespace app\Controllers;
use frmwrk\db;
use frmwrk\validator;

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
        
       validator::make($_POST, [

            'title' => 'required|min:3|max:255',
            'url' => 'required|url|min:5|max:255',
            'description' => 'required|min:10|max:1000',
            'content' => 'required|min:10|max:2048',
            
        ]);

        
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
        

        //$errors = $validator->errors();
        // $title = 'Register a project';
        // require __DIR__ . '/../../resources/create_project_template.php';
    }

    public function edit() {

        $title = 'Edit Project';

        $db = new db();

        $project = $db->query("SELECT * FROM links WHERE id = :id", [
            'id' => $_GET['id'] ?? null
        ])->firstOrFail();

        if (!$project) {
            header("Location: /projects");
            exit;
        }

        require __DIR__ . '/../../resources/edit_project_template.php';

    }

    public function update() {

        validator::make($_POST, [

            'title' => 'required|min:3|max:255',
            'url' => 'required|url|min:5|max:255',
            'description' => 'required|min:10|max:1000',
            //'content' => 'required|min:10|max:2048',

        ]);

        $db = new db();

        $project = $db->query("SELECT * FROM links WHERE id = :id", [
            'id' => $_GET['id'] ?? null,
        ])->firstOrFail();

        

        $db->query("UPDATE links SET title = :title ,  url = :url , description = :description WHERE id = :id", [
            'id'          => $project['id'] ?? null,
            'title'       => $_POST['title'] ?? null,
            'url'        => $_POST['url'] ?? null,
            'description' => $_POST['description'] ?? null,
            // 'content' => $_POST['content'] ?? null,
            
        ]);

        header("Location: /projects");
        exit;

        
        // $errors = $validator->errors();
        // $title = 'Edit Project';
        // require __DIR__ . '/../../resources/edit_project_template.php';

    }

    public function destroy() {

        $db = new db();

        $db->query("DELETE FROM links WHERE id = :id", [
            'id' => $_POST['id'] ?? null
        ]);

        header("Location: /projects");
        exit;
    }

}



// $myTitle = "projects";


// $projectLinks = $db->query( "SELECT * FROM links ORDER BY id ASC")->get();

// require __DIR__ . '/../../resources/projects_template.php';


