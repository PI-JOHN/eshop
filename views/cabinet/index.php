<?php include_once __DIR__.'/../layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <?php if (AdminBase::checkAdmin()): ?>
              <a href="/admin"><i class="fa fa-edit"></i> Админпанель</a><br><br>
            <?php endif; ?>
            <h1>Кабинет пользователя</h1>
            <h3>Привет, <?php echo $user['name']; ?></h3>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/cabinet/history">История покупок</a></li>
            </ul>

        </div>
    </div>
</section>
<?php include_once __DIR__.'/../layouts/footer.php'; ?>
