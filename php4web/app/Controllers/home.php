<?php 

$posts = $db->query( "SELECT * FROM posts ORDER BY id DESC LIMIT 6");
require __DIR__ . '/../../resources/home_templates.php';

//it is ok the path, 



