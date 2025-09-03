<?php 

class HomeController {

    public function index() {

        $myTitle = "home";
        $db = new db();

        $posts = $db->query( "SELECT * FROM itposts
         ORDER BY date DESC LIMIT 6")->get();

        require __DIR__ . '/../../resources/home_templates.php';

    }
    
    public function edit() {

        $title = 'Edit Post';

        $db = new db();

        $post = $db->query("SELECT * FROM itposts WHERE pid = :pid", [
            'pid' => $_GET['id'] ?? null
        ])->firstOrFail();

        if (!$post) {
            header("Location: /");
            exit;
        }

        require __DIR__ . '/../../resources/edit_post_template.php';

    }

    public function update() {

        $validator = new validator($_POST, [

            'title' => 'required|min:3|max:255',
            'url' => 'required|url|min:5|max:255',
            'description' => 'required|min:10|max:1000',
            'content' => 'required|min:10|max:2048',

        ]);

        $db = new db();

        $post = $db->query("SELECT * FROM itposts WHERE pid = :pid", [
            'pid' => $_GET['id'] ?? null
        ])->firstOrFail();

        if ( $validator->wentThrough() ) {

            $db->query("UPDATE itposts SET title = :title , description = :description , 
            content = :content, date = :date, url = :url  WHERE pid = :pid", [

                'pid'         => $post['pid'] ?? null,
                'title'       => $_POST['title'] ?? null,
                'description' => $_POST['description'] ?? null,
                'content'     => $_POST['content'] ?? null,
                'date'       => date('Y-m-d'),
                'url'        => $_POST['url'] ?? null
                
                
            ]);

            header("Location: /");
            exit;

        }

        $errors = $validator->errors();

        $title = 'Edit Post';

        require __DIR__ . '/../../resources/edit_post_template.php';

    }

}
//require __DIR__ . '/../../resources/home_templates.php';




