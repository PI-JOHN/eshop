<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/views/templateNews/css/styleNews.css">
    <title>Document</title>
</head>
<body>
<header class="header">
    <h1>Последние новости</h1>
    <h2><a href="/">
            Вернуться в магазин
        </a>
    </h2>
</header>
<div class="columns">
    <div class="column main-column">
        <article class="article">
            <main class="main columns">
                <section class="column main-column">
                    <a class="article first-article" href="#">
                        <figure class="article-image is-4by3">
                            <img src="/images/news_images/<?php echo $newsItem['id']; ?>.jpg" alt="">

                        </figure>
                        <div class="article-body">
                            <h2 class="article-title">
                                <?php echo $newsItem['title']; ?>
                            </h2>
                            <p class="article-content">
                                <?php echo $newsItem['content']; ?>
                            </p>
                            <footer class="article-info">
                                <span><?php echo $newsItem['author_name']; ?></span>
                                <span><?php echo $newsItem['date']; ?></span>
                            </footer>
                        </div>
                    </a>
                </section>
            </main>
        </article>

    </div>
</body>
</html>
