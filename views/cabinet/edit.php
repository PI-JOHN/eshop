<?php include_once __DIR__.'/../layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
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
                        <input type="text" name="name" placeholder="name" value="<?php echo $result['name']; ?>">
                        <input type="email" name="email" placeholder="email" value="<?php echo $result['email']; ?>">
                        <input type="password" name="password" placeholder="password" value="<?php echo $result['password']; ?>">
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__.'/../layouts/footer.php'; ?>
