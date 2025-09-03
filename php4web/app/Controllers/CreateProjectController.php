<?php

$myTitle = "Create a new Project";

if ( $_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $description = $_POST['description'] ?? '';
    $content = $_POST['content'] ?? '';
    $date = date('Y-m-d');


    $validator =  new validator ( $_POST , [
        'title' => 'required|min:3|max:255',
        'url' => 'required|url|min:5|max:255',
        'description' => 'required|min:10|max:1000',
        'content' => 'required|min:10|max:2048',
        /*'date' => 'required|date' */
    ]);


    if ($validator->wentThrough()) {
        $db->query("INSERT INTO itposts (title, description, content, date, url) VALUES 
        (:title,  :description, :content, :date, :url)", [
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'date' => $date,
            'url' => $url
        ]);

        header('Location: /projects');
        exit;
    }
    else {

        $errors = $validator->errors();
    }
}

require __DIR__ . '/../../resources/create_project_template.php';


