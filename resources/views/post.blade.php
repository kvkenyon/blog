<!DOCTYPE html>
<html>
    <head>
        <link href="/app.css" rel="stylesheet"/>
    </head>
    <title>My Blog</title>
    <body>
        <h1><?= $post->title; ?></h1>
        <div>
            <?= $post->body; ?>
        </div>
        <a href="/">Go back</a>
    </body>
</html>
