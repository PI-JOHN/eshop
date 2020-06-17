<?php include_once __DIR__.'/../layouts/header.php';?>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 padding-right">
            <?php if ($result): ?>
            <p>Сообщение отправлено! Мы ответим вам на указанный Email.</p>
            <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error):  ?>
                <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <div class="signup-form">
                <h2>Обратная Связь</h2>
                <h5>Есть вопрос? Напишите нам!</h5>
                <br>
                <form action="" method="post">
                    <p>Ваша почта</p>
                    <input type="email" name="userEmail" placeholder="E-mail" value="<?php $userEmail; ?>">
                    <p>Сообщение</p>
                    <input type="text" name="userText" placeholder="Сообщение" value="<?php $userText; ?>">
                    <input type="submit" name="submit" class="btm btn-default" value="Отправить">
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include_once __DIR__.'/../layouts/footer.php';?>