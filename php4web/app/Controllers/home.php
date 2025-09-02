<?php 

$posts = $db->query( "SELECT * FROM itposts ORDER BY date DESC LIMIT 6")->get();
require __DIR__ . '/../../resources/home_templates.php';

//it is ok the path, 



