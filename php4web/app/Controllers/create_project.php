<?php

$myTitle = "Create a new Project";

if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $url = $_POST['url'] ?? '';
    $description = $_POST['description'] ?? '';
    $content = $_POST['content'] ?? '';
    $date = date('Y-m-d');

    $errors = [];

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors[] = "The URL is not valid.";
    }

    if (!$title) {
        $errors[] = "The title is required.";
    }

    if (!$description) {
        $errors[] = "The description is required.";
    }

    if (!$content) {
        $errors[] = "The content is required.";
    }

    if (empty($errors)) {
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
}

require __DIR__ . '/../../resources/create_project_template.php';


