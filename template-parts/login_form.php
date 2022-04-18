<?php require_once __DIR__ . "/../handlers/loginhandler.php"; ?>

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
                  <div class="login__email">
                     <input type="text" class="input__form" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="login__paswd">
                     <input type="password" class="input__form" name="pswd" id="pswd" placeholder="Password" required>
                  </div>
                  <div class="submit__button">
                     <input type="submit" class="btn btn__sbm" name="sumbit" id="sumbit" value="Войти">
                  </div>
               </div>
            </form>
            <form action="handlers/loginhandler.php" method="POST">
               <div class="register__stage hidden" id="register__stage">
                  <div class="login__name">
                     <input type="text" class="input__form" name="name" id="email" placeholder="Name" required>
                  </div>
                  <div class="login__nickname">
                     <input type="text" class="input__form" name="nickname" id="email" placeholder="Nickname" required>
                  </div>
                  <div class="login__email">
                     <input type="text" class="input__form" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="login__paswd">
                     <input type="password" class="input__form" name="pswd" id="pswd" placeholder="Password" required>
                  </div>
                  <div class="submit__button">
                     <input type="submit" class="btn btn__sbm" name="sumbit" id="sumbit" value="Регистрация">
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