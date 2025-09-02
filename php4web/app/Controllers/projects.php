<?php

$myTitle = "projects";


$projectLinks = $db->query( "SELECT * FROM links ORDER BY id ASC ");

require __DIR__ . '/../../resources/projects_template.php';


