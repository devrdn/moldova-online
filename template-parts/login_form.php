<?php 
require_once __DIR__ . "/../handlers/loginhandler.php";
?>

<div class="container container-login">
   <div class="content">
      <div class="login">
         <div class="login__form">
            <?php
            add_script("https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js");
            add_script("script/formselector.js");
            ?>
            <div class="login__title">
               <button class="log black-clr" id="log">Login</button>
               <button class="reg gray-clr" id="reg">Register</button>
            </div>
            <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
               <div class="login__stage" id="login__stage">
                  <div class="login__email input">
                     <input type="text" class="input__form" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="login__paswd input">
                     <input type="password" class="input__form" name="pswd" id="pswd" placeholder="Password" required>
                  </div>
                  <div class="submit__button">
                     <input type="submit" class="btn btn__sbm" name="sumbit" id="sumbit" value="Войти">
                  </div>
               </div>
            </form>
            <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
               <div class="register__stage hidden" id="register__stage">
                  <div class="login__name input">
                     <input type="text" class="input__form" name="name" value="<?php echo $_POST['name'] ?>" id="email" placeholder="Name" required>
                     <?php if ($error['name'] == 1) : ?>
                        <small class="text-danger">* Неверно введено имя пользователя</ы>
                     <?php endif; ?>
                  </div>
                  <div class="login__surname input">
                     <input type="text" class="input__form" name="surname" value="<?php echo $_POST['surname'] ?>" id="email" placeholder="Nickname" required>
                     <?php if ($error['surname'] == 1) : ?>
                        <small class="text-danger">* Фамилия должна быть не больше 15 символов</small>
                     <?php endif; ?>
                  </div>
                  <div class="login__email input">
                     <input type="text" class="input__form" name="email" value="<?php echo $_POST['email'] ?>" id="email" placeholder="Email" required>
                     <?php if ($error['email'] == 1) : ?>
                        <small class="text-danger">* Неверно введен E-mail</small>
                     <?php endif; ?>
                  </div>
                  <div class="login__paswd input">
                     <input type="password" class="input__form" name="pswd" value="<?php echo $_POST['pswd'] ?>" id="pswd" placeholder="Password" required>
                     <?php if ($error['pswd'] == 1) : ?>
                        <small class="text-danger">* Неправильный формат пароля</small>
                     <?php endif; ?>
                  </div>
                  <div class="submit__button">
                     <input type="submit" onclick="" class="btn btn__sbm" name="sumbit" id="sumbit" value="Регистрация">
                  </div>
               </div>
         </div>
         </form>
      </div>
      <div class="media">
         <img src="content/login_art.svg" alt="Moldova-Culture-Art" class="login__art">
      </div>
   </div>
</div>