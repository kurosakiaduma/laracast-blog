<!doctype html>
<head>
    <title>Personal Blog</title>
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <script src="/js/app.js" type="text/javascript"></script>
</head>

<body>
    <article>
        <h1 class='text-center'>{{ $post->title }}</h1>
        <h4><strong>Author: </strong>{{ $post->author }}</h4>
        <h4><strong>Date Published: </strong>{{ $post->date_published }}</h4>
        <div> {!! $post->body !!}</div>
    </article>
    <a href="/">Home</a>
</body>
