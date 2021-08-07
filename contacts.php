<?php
/*
Template Name: Контакты
*/
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <?php get_template_part('partials/header'); ?>

    <main class="main">
      <section class="page-section">
        <div class="ui-container">
          <h1 class="page-title"><?php the_title() ?></h1>
  
          <div class="page-content content">
            <?php the_content() ?>
          </div>
  
          <div class="grid sm:grid-cols-2 gap-12">
            <div>
              <p class="text-2xl">
                <a href="tel:+7 (499) 677-23-57">+7 (499) 677-23-57</a>
              </p>
              <div class="text-3xl font-semibold mt-8">Москва</div>
              <p class="mt-4">
                г. Москва, Волоколамское шоссе, дом 1, строение 1
              </p>
              <div class="mt-8">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A0ea0fe3f239630579e6d9e290388821d258483c0c18b103375e6a6ef93c53e42&width=100%25&height=400&lang=ru_RU&scroll=true"></script>
              </div>
            </div>
            <div>
              <div class="text-2xl">
                <a href="tel:info@standartproject.ru">info@standartproject.ru</a>
              </div>
              <div class="text-3xl font-semibold mt-8">Воронеж</div>
              <p class="mt-4">
                Ул. Порт-артурская 11а, офис 8, 2 этаж
              </p>
              <div class="mt-8">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aabf0b35e85e48a2735143faa474926a0af457d531e25aa9aafb2c24cc71a3268&width=100%&height=400&lang=ru_RU&scroll=true"></script>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
