<?php include_once __DIR__.'/../layouts/header.php'; ?>

<section><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                <p>Вы зарегистрированы!</p>
                <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Зарегестрироваться прямо сейчас</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" placeholder="Name" value="<?php echo $userName; ?>"/>
                        <input type="email" name="email" placeholder="Email Address" value="<?php echo $userEmail; ?>"/>
                        <input type="password" name="password" placeholder="Password" value="<?php echo $userPassword; ?>"/>
                        <input type="submit" name="submit" class="btn btn-success" value="Регистрация" />
                    </form>
                </div><!--/sign up form-->
                <?php endif; ?>

        </div>
    </div>
    </div>
</section><!--/form-->
<?php include_once __DIR__.'/../layouts/footer.php'; ?>
