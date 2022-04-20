<div class="container container-cabinet">
    <div class="personal__account">
        <div class="leftpart__cabinet">
            <div class="cabinet__menu">
                <ul class="menu__list">
                    <li class="profile">
                        <a href="#">Профиль</a>
                    </li>
                    <li class="tickets">
                        <a href="#">Билеты</a>
                    </li>
                    <li class="purchase__history">
                        <a href="#">История покупок</a>
                    </li>
                    <li class="exit">
                        <form method="post" action="handlers/exithandler.php">
                            <button type="submit" name="ext-btn" value="Выйти"></button>
                        </form>
                    </li>
                </ul>
            </div>
            <img src="content/walk.svg" alt="">
        </div>
        <div class="personal__data">
            <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="persdata__header">
                    <legend>
                        <div class="persdata__name main__block">
                            <span>Личные данные</span>
                        </div>
                    </legend>
                </div>
                <div class="persdata__block">
                    <div class="name__block">

                        <label class="persdata__question" for="name">Имя</label>
                        <div class="persdata__answer">
                            <input type="text" name="name" id="name" value="<?= $_SESSION["user"]["name"] ?>" required>
                        </div>

                    </div>

                    <div class="surname__block">
                        <label class="persdata__question" for="surname">Фамилия</label>
                        <div class="persdata__answer">
                            <input type="text" name="surname" id="surname" value="<?= $_SESSION["user"]["surname"] ?>" required>
                        </div>
                    </div>
                    <div class="reg__block">
                        <label class="persdata__question" for="reg_date">Дата регистрации</label>
                        <div class="persdata__answer">
                            <input id="reg_date" type="text" name="reg_date" readonly="readonly" value="<?= date("d M Y", strtotime($_SESSION["user"]["reg_date"])); ?>" required />
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="sex__block">
                        <label class="persdata__question" for="sex">Пол</label>
                        <div class="persdata__answer">
                            <input type="radio" id="male" name="sex" value="Мужской" <?php if ($_SESSION["user"]["sex"] == 1) : ?> checked <?php endif; ?>>
                            <label for="male">Мужской</label><br>
                            <input type="radio" id="female" name="sex" value="Женский" <?php if ($_SESSION["user"]["sex"] == 0) : ?> checked <?php endif; ?>>
                            <label for="female">Женский</label><br>
                        </div>
                    </div>

                    <div class="email__block">
                        <label class="persdata__question" for="email">Email</label>
                        <div class="persdata__answer">
                            <input type="email" name="email" id="email" value="<?= $_SESSION["user"]["email"] ?>" required>
                        </div>
                    </div>
                    <div class="phone__block">
                        <label class="persdata__question" for="phone">Телефон</label>
                        <div class="persdata__answer">
                            <input id="phone" type="number" name="phone" value="<?= $_SESSION["user"]["phone"] ?>" required />
                        </div>
                    </div>

                    <div class="persdata__button">
                        <input type="submit" name="submit" class="persdata__submit" value="Сохранить изменения">
                    </div>
                </div>
            </form>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") :
                foreach ($errormsg as $key => $param) :
                    if ($error[$key] == 1) : ?>
                        <small class="text-danger"><?php echo $errormsg[$key]; ?></small>
            <?php endif;
                endforeach;
            endif; ?>
        </div>
    </div>
</div>