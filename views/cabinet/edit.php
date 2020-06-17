<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if($result): ?>
                <p>Форма отредактированна!</p>
                <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form">
                    <h2>Редактировать данные</h2>
                    <form action="" method="post">
                        <p>Имя:</p>
                        <input type="text" name="name" placeholder="name" value="<?php echo $name; ?>">
                        <p>Пароль:</p>
                        <input type="password" name="password" placeholder="password" value="<?php echo $password; ?>">
                        <br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>
