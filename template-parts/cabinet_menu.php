<div class="container">
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
                        <button value="Выйти">Выйти</button>
                    </li>
                </ul>
            </div>
            <img src="content/walk.svg" alt="">
        </div>
        <div class="personal__data">
            <form action="" method="post">
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
                            <input type="text" name="name" id="name">
                        </div>
                    </div>
                    <div class="surname__block">
                        <label class="persdata__question" for="surname">Фамилия</label>
                        <div class="persdata__answer">
                            <input type="text" name="surname" id="surname">
                        </div>
                    </div>
                    <div class="sex__block">
                        <label class="persdata__question" for="sex">Пол</label>
                        <div class="persdata__answer">
                            <input type="radio" id="male" name="sex">
                            <label for="male">Мужской</label><br>
                            <input type="radio" id="female" name="sex">
                            <label for="female">Женский</label><br>
                        </div>
                    </div>
                    <div class="bdate__block">
                        <label class="persdata__question" for="bdate">Дата рождения</label>
                        <div class="persdata__answer">
                            <input id="bdate" type="date" name="bdate" required />
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="email__block">
                        <label class="persdata__question" for="email">Email</label>
                        <div class="persdata__answer">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="phone__block">
                        <label class="persdata__question" for="phone">Телефон</label>
                        <div class="persdata__answer">
                            <input id="phone" type="number" name="phone" required />
                        </div>
                    </div>
                    <div class="persdata__button">
                        <input type="submit" name="submit" class="persdata__submit" value="Сохранить изменения">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>