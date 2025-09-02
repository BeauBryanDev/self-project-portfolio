<?php require __DIR__ . '/views/header.php'; ?>


    <h1>
        Welcome to my website
    </h1>
    <h2>this is my Post Page</h2>

    <div class="border-b border-gray-200 pb-8 mb-8">
        <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl">
            <?= htmlspecialchars($itposts['title']) ?>
        </h2>

        <p class="text-lg text-gray-600 w-full max-w-4xl">
            <?= htmlspecialchars($itposts['description']) ?>
        </p>    
</div>

<div>
    <p class="text-sm text-gray-600">
        <?= htmlspecialchars($itposts['content']) ?>
    </p>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>