<div class="container container-login">
    <div class="content">
        <div class="login">
            <div class="login__form">
                <div class="login__title">
                    <p class="log black-clr" id="log">New post</p>
                </div>
                <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="register__stage" id="register__stage">
                        <div class="login__name input">
                            <input type="text" class="input__form" name="title" value="" id="title" placeholder="Заголовок" required>
                        </div>

                        <div class="login__name input">
                            <input type="text" class="input__form" name="name" value="" id="name" placeholder="Название" required>
                        </div>

                        <div class="login__name input">
                            <textarea type="text" class="input__form" name="text" value="" id="text" placeholder="Текст статьи" required></textarea>
                        </div>

                        <div class="login__name input">
                            <input type="file" class="input__form" name="file" value="" id="file" placeholder="Добавить файл">
                        </div>

                        <div class="submit__button">
                            <input type="submit" onclick="" class="btn btn__sbm" name="sumbit" id="sumbit" value="Добавить пост">
                        </div>
                    </div>

            </div>
            </form>
        </div>

    </div>
</div>