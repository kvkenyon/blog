<!DOCTYPE html>
<html>
    <head>
        <link href="/app.css" rel="stylesheet"/>
    </head>
    <title>My Blog</title>
    <body>
        <?php foreach ($posts as $post): ?> 
            <article>
                <h1><a href="/posts/<?= $post->slug ?>"><?= $post->title ?></a></h1>
                <?= $post->excerpt . "..." ?>
            </article>
        <?php endforeach; ?> 
    </body>
</html>
