<?php // php4web/resources/login_template.php 
 require __DIR__ . '/views/header.php'
?>

<div class="border-b border-gray-200 pb-8 mb-8">
    <h2 class="text-4xl font-semibold text-gray-900 sm:text-5xl text-center">Login Page </h2>
</div>

<div class="w-full max-w-xl mx-auto">
    <form action="/login" method="POST">
        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Email</label>
            <div class="mt-2">
                <input 
                    type="text" 
                    name="email" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900" 
                    value="email">
            </div>
        </div>

        <div class="mb-4">
            <label class="text-sm font-semibold text-gray-900">Password</label>
            <div class="mt-2">
                <input 
                    type="password" 
                    name="password" 
                    class="w-full outline-1 outline-gray-300 rounded-md px-3 py-2 text-gray-900">
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="w-full rounded-md bg-indigo-600 hover:bg-indigo-500 text-white px-3 py-2 text-center text-sm font-semibold">
                Login &rarr;
            </button>
        </div>
    </form>

    <?php if (!empty($errors)): ?>
        <ul class="mt-4 text-red-500">
            <?php foreach ($errors as $error): ?>
            <li class="text-xs"> <?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <!-- endif -->
</div>

<?php require __DIR__ . '/views/footer.php'; ?>

