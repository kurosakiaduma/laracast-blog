<!doctype html>
<head>
    <title>Personal Blog</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <script src="/js/app.js" type="text/javascript"></script>
</head>

<body>

    <?php foreach ($posts as $post) : ?>
        <article>
            <h1><?= $post -> title ?></h1>
            <div>
                <?= $post->body ?>
            </div>
        </article>

    <?php endforeach; ?>

</body>
