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
                        <a class="article first-article" href="/news/<?php echo $lastArticle['id']; ?>">
                            <figure class="article-image is-4by3">
                                <img src="/images/news_images/<?php echo $lastArticle['id']; ?>.jpg" alt="">
                            </figure>
                            <div class="article-body">
                                <h2 class="article-title">
                                    <?php echo $lastArticle['title']; ?>
                                </h2>
                                <p class="article-content">
                                    <?php echo $lastArticle['content']; ?>
                                </p>
                                <footer class="article-info">
                                    <span><?php echo $lastArticle['author_name']; ?></span>
                                    <span><?php echo $lastArticle['date']; ?></span>
                                </footer>
                            </div>
                        </a>

                        <div class="columns">
                            <div class="column nested-column">
                                <a class="article" href="/news/<?php echo $preLastArticle['id']; ?>">
                                    <figure class="article-image is-16by9">
                                        <img src="/images/news_images/<?php echo $preLastArticle['id']; ?>.jpg" alt="">
                                    </figure>
                                    <div class="article-body">
                                        <h2 class="article-title">
                                            <?php echo $preLastArticle['title'];?>
                                        </h2>
                                        <p class="article-content">
                                            <?php echo $preLastArticle['content'];?>
                                        </p>
                                        <footer class="article-info">
                                            <span><?php echo $preLastArticle['author_name'];?></span>
                                            <span><?php echo $preLastArticle['date'];?></span>
                                        </footer>
                                    </div>
                                </a>
                            </div>

                            <div class="column">
                                <?php foreach ($middleNews as $articleMiddle): ?>
                                <?php if ($articleMiddle['author_name'] == 'Prigozhin'): ?>

                                <a class="article" href="/news/<?php echo $articleMiddle['id']; ?>">
                                    <figure class="article-image is-16by9">
                                        <img src="/images/news_images/<?php echo $articleMiddle['id']; ?>.jpg" alt="">
                                    </figure>
                                    <div class="article-body">
                                        <h2 class="article-title">
                                            <?php echo $articleMiddle['title'];?>
                                        </h2>
                                        <p class="article-content">
                                            <?php echo $articleMiddle['short_content'];?>
                                        </p>
                                        <footer class="article-info">
                                            <span><?php echo $articleMiddle['author_name'];?></span>
                                            <span><?php echo $articleMiddle['date'];?></span>
                                        </footer>
                                    </div>
                                </a>
                                <?php else: ?>
                                <a class="article" href="/news/<?php echo $articleMiddle['id']; ?>">
                                    <div class="article-body">
                                        <h2 class="article-title">
                                            <?php echo $articleMiddle['title'];?>
                                        </h2>
                                        <p class="article-content">
                                            <?php echo $articleMiddle['short_content'];?>
                                        </p>
                                        <footer class="article-info">
                                            <span><?php echo $articleMiddle['author_name'];?></span>
                                            <span><?php echo $articleMiddle['date'];?></span>
                                        </footer>
                                    </div>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>

                    <section class="column">
                        <?php foreach ($oldNews as $oldArticle): ?>
                            <?php if ($oldArticle['author_name'] == 'RBK'): ?>
                        <a class="article" href="/news/<?php echo $oldArticle['id']; ?>">
                            <figure class="article-image is-3by2">
                                <img src="/images/news_images/<?php echo $oldArticle['id']; ?>.jpg" alt="">
                            </figure>
                            <div class="article-body">
                                <h2 class="article-title">
                                    <?php echo $oldArticle['title']; ?>
                                </h2>
                                <p class="article-content">
                                    <?php echo $oldArticle['short_content']; ?>
                                </p>
                                <footer class="article-info">
                                    <span><?php echo $oldArticle['author_name']; ?></span>
                                    <span><?php echo $oldArticle['date']; ?></span>
                                </footer>
                            </div>
                        </a>
                        <?php else: ?>
                        <a class="article" href="/news/<?php echo $oldArticle['id']; ?>">

                            <div class="article-body">
                                <h2 class="article-title">
                                    <?php echo $oldArticle['title']; ?>
                                </h2>
                                <p class="article-content">
                                    <?php echo $oldArticle['short_content']; ?>
                                </p>
                                <footer class="article-info">
                                    <span><?php echo $oldArticle['author_name']; ?></span>
                                    <span><?php echo $oldArticle['date']; ?></span>
                                </footer>
                            </div>
                        </a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </section>
                </main>
            </article>
            <article class="article">
                Hello World
            </article>
        </div>
</body>
</html>