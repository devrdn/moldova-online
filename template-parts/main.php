<div class="container">
   <div class="hero">
      <div class="title">
         <div class="title__name">
            <h1>Culture Moldova</h1>
         </div>
         <div class="subtitle__name">
            <h2>быстрый доступ к любому досугу </h2>
         </div>
      </div>
      <div class="title__image">
         <img src="content/logo_park.svg" alt="">
      </div>
   </div>
   <section class="about section">
      <div class="section__title">
         <span>Билеты</span>
      </div>
      <div class="grid__info">
         <div class="info__box">
            <img src="content/cinema.svg" alt="">
            <span>Кинотеатры</span>
         </div>
         <div class="info__box">
            <img src="content/theater.svg" alt="">
            <span>Театры</span>
         </div>
         <div class="info__box">
            <img src="content/museum.svg" alt="">
            <span>Музей</span>
         </div>
         <div class="info__box">
            <img src="content/park.svg" alt="">
            <span>Парк</span>
         </div>
         <div class="info__box">
            <img src="content/zoo.svg" alt="">
            <span>Зоопарк</span>
         </div>
         <div class="info__box">
            <img src="content/other.svg" alt="">
            <span>Другие развлечения</span>
         </div>
      </div>
   </section>

   <section class="latets__news section">
      <div class="section__title">
         <span> Последние новости </span>

      </div>

      <div class="grid__info news">
         <?php thePost(); ?>
      </div>

   </section>

</div>