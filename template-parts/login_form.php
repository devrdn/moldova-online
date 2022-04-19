<?php 
require_once __DIR__ . "/../handlers/loginhandler.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (in_array(1, $error)) {
      
   }
}
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
            <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">
               <?php if ($_GET['mes'] == 'success') {
                  $err['success'] = '<div class="alert alert-success">Регистрация прошла успешно!</div>';
               } ?>
               <div class="register__stage hidden" id="register__stage">
                  <div class="login__name">
                     <input type="text" class="input__form" name="name" value="<?php echo $_POST['name'] ?>" id="email" placeholder="Name" required>
                     <?php if ($error['name'] == 1) : ?>
                        <small class="text-danger">* Имя должно быть не больше 15 символов</small>
                     <?php endif; ?>
                  </div>
                  <div class="login__surname">
                     <input type="text" class="input__form" name="surname" value="<?php echo $_POST['surname'] ?>" id="email" placeholder="Nickname" required>
                     <?php if ($error['surname'] == 1) : ?>
                        <small class="text-danger">* Фамилия должна быть не больше 15 символов</small>
                     <?php endif; ?>
                  </div>
                  <div class="login__email">
                     <input type="text" class="input__form" name="email" value="<?php echo $_POST['email'] ?>" id="email" placeholder="Email" required>
                     <?php if ($error['surname'] == 1) : ?>
                        <small class="text-danger">* Фамилия должна быть не больше 15 символов</small>
                     <?php endif; ?>
                  </div>
                  <div class="login__paswd">
                     <input type="password" class="input__form" name="pswd" value="<?php echo $_POST['pswd'] ?>" id="pswd" placeholder="Password" required>
                     <?php echo $err['pswd'] ?>
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