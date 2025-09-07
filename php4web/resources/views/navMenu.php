
    <nav class="bg-gray-800 text-center p-4 text-white">
        <div class="mx-auto max-w-7xl flex h-16 items-center justify-center">
            <div class="flex gap-4">
                <a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">Home</a>
                <a href="/post" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">Post</a>
                <a href="./login" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">Login</a>
                <a href="./aboutMe" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">About Me</a>
                <a href="./contact" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">Contact Me</a>
                <a href="./projects" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">Projects</a>
                <a href="./blog" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium hover:text-yellow-300 transition duration-300">My Blog</a>
                <?php if (isAuthenticated()): ?>
                <form action="/logout" method="POST">                
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium cursor-pointer">
                        Log Out 
                    </button>
                </form>
                <?php else: ?>
                <a href="/login" class="<?= requestIs('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Log In</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

<?php

$selected_class = 'bg-gray-900 text-white';
$unselected_class = 'hover:bg-gray-700 hover:text-white text-gray-300';
$options = [
    ['name' => 'Home', 'url' => '/'],
    ['name' => 'Login', 'url' => '/login'],
    ['name' => 'Post', 'url' => '/post'],
    ['name' => 'About Me', 'url' => '/aboutMe'],
    ['name' => 'Projects', 'url' => '/projects'],
    ['name' => 'My Blog', 'url' => '/blog'],
    ['name' => 'Contact Me', 'url' => '/contact'],
];
?>
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl flex h-16 items-center justify-center">
        <div class="flex gap-4">
            <?php foreach ($options as $key => $option): ?>
                <?php  $nav_item_class = $_SERVER['REQUEST_URI'] == $option['url'] ? $selected_class : $unselected_class;?>
                <a href="<?= $option['url'] ?>" class="<?= $nav_item_class ?> rounded-md px-3 py-2 text-sm font-medium">
                    <?= $option['name'] ?>
                </a>
            <?php endforeach; ?>
            <?php if (isAuthenticated()): ?>
                <form action="/logout" method="POST">                
                    <button type="submit" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium cursor-pointer">
                        Log Out 
                    </button>
                </form>
                <?php else: ?>
                <a href="/login" class="<?= requestIs('login') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' ?> rounded-md px-3 py-2 text-sm font-medium">Log In</a>
                <?php endif; ?>
        </div>
    </div>
</nav>