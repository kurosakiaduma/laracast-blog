<!doctype html>
<head>
    <title>Personal Blog</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <script src="/js/app.js" type="text/javascript"></script>
</head>

<body>

    <?php foreach ($posts as $post) : ?>
        <article>
            <a href="/posts/<?=$post -> slug ?>">
                <h1><?= $post -> title; ?></h1>
            </a>
            <div>
                <?= $post->excerpt; ?>
            </div>
        </article>

    <?php endforeach; ?>

</body>
