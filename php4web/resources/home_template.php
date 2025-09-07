<?php require __DIR__ . '/views/header.php'; ?>


    <h1>
        Welcome to my website
    </h1>
    <h2>this is my Home Page</h2>

    <div class="border-b border-gray-200 pb-8 mb-8">
        
        <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">My IT Posts</h2>

        <p class="text-lg text-gray-600 w-full max-w-4xl">
            These are some of mhy few IT related Posts about GNU/Linux, Programming and Web Development.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-16">

        <?php foreach ( $posts as $post ): ?>
 
            <article>
                <h3 class="text-lg font-semibold text-gray-900 hover:text-gray-600">
                    <a href="/post?id=<?= $post['pid'] ?>" target="_blank" rel="noopener noreferrer">
                        <?= $post['title'] ?>
                    </a>
                </h3>

                <div class="container">
                    <h5 class="text-sm  text-gray-900"><?= $post['description'] ?></h5>
                    <p style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" class="mt-2 text-sm text-gray-600"><?= $post['content'] ?></p>
                </div>
                <div>
                <?php if ( isAuthenticated()): ?>
                <form action="/home/delete" method="POST" onsubmit="return confirm('Are You Sure you want to delete this posts?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $post['pid'] ?>">

                    <button type="submit" class="mt-2 text-xs font-semibold text-red-600 hover:text-red-800 cursor-pointer">
                        Delete 
                    </button>
                    <a href="/home/edit?id=<?= $post['pid'] ?>" class="text-xs font-semibold text-gray-900 hover:text-gray-600">
                        Edit &rarr;
                    </a>
                </form>
                <?php endif; ?>
            </div>
            </article>

        <?php endforeach; ?>
        <?php if ( isAuthenticated()): ?>
        <div class="my-16">
            <a href="/projects/create" class="text-sm font-semibold text-gray-900 hover:text-gray-600">
                <strong>Register a New Project</strong>
            </a>
        </div>
        <?php endif; ?>

    </div>




<?php require __DIR__ . '/views/footer.php'; ?>

