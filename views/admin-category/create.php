<?php require_once __DIR__.'/../layouts/admin-header.php'; ?>
<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>


            <h4>Добавить новую категорию</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" >

                        <p>Название категории</p>
                        <input type="text" name="name" placeholder="" value="">

                        <p>Сортировочный номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">


                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected" >Отображается</option>
                            <option value="0" >Скрыт</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<?php require_once __DIR__.'/../layouts/admin-footer.php'; ?>
