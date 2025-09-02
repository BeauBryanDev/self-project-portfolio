<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $myTitle ?? "My WebSite " ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <header class="mb-8">
        <?php include __DIR__ . '/navMenu.php'; ?>
    </header>
    <div class="container  p-4 text-white">