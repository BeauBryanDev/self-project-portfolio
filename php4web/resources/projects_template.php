
<?php require __DIR__ . '/views/header.php'; ?>


    <h1>
        Welcome to my website
    </h1>
    <h2>this is my Projects Page</h2>

    <div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">Mis proyectos recientes</h2>

    <p class="text-lg text-gray-600 w-full max-w-4xl">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque suscipit qui necessitatibus officiis soluta voluptatum numquam a aperiam quasi nemo quas ullam eaque, optio modi nam ut odit dolore. Impedit.
    </p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-x-8 gap-y-16">

    <?php foreach ($projectLinks as $link): ?>

        <article>
            <h3 class="text-lg font-semibold text-gray-900 hover:text-gray-600">
                <a href=" <?= $link['url'] ?>" target="_blank" rel="noopener noreferrer">
                    <?= $link['title'] ?>
                </a>
            </h3>

            <p style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"class="mt-2 text-sm text-gray-600"><?= $link['description'] ?></p>

            <div>
                <form action="/projects/delete" method="POST" onsubmit="return confirm('Are You Sure you want to delete this posts?');">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $link['id'] ?>">

                    <button type="submit" class="mt-2 text-xs font-semibold text-red-600 hover:text-red-800 cursor-pointer">
                        Delete 
                    </button>
                    <a href="/projects/edit?id=<?= $link['id'] ?>" class="text-xs font-semibold text-gray-900 hover:text-gray-600">
                        Edit &rarr;
                    </a>
                </form>
                
            </div>
        </article>

    <?php endforeach; ?>

</div>
<div class="my-16">
    <a href="/projects/create" class="text-sm font-semibold text-gray-900 hover:text-gray-600">
        <strong>Register a New Project</strong>
    </a>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>