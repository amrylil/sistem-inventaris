<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? "App" ?></title>
    <style>
        body { font-family: Arial; padding: 20px; }
        header { margin-bottom: 20px; }
        footer { margin-top: 40px; font-size: 12px; color: #777; }
    </style>
</head>
<body>

<header>
    <a href="/">Home</a> | 
    <a href="/post">Posts</a>
</header>

<main>
    <?= $content ?>
</main>

<footer>
    © <?= date("Y") ?> - Simple MVC
</footer>

</body>
</html>
