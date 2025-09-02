<?php

$myTitle = "post";

$itposts = $db->query( "SELECT * FROM itposts WHERE pid = :pid", ['pid' => $_GET['id']] ??  null )->firstOrFail();

require __DIR__ . '/../../resources/post_template.php';
    