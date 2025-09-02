<?php require __DIR__ . '/views/header.php'; ?>


    <div>
        <h1>
        Welcome to my website
        </h1>
        <h2>this is my Blog Page</h2>
    </div>

        <?php if ($myPostBlogs): ?>
        <ul>
            <?php foreach ($myPostBlogs as $post): ?>
                <li>
                    <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                    <p><?php echo htmlspecialchars($post['description']); ?></p>
                    <a href="post.php?id=<?php echo $post['pid']; ?>">Read more</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>