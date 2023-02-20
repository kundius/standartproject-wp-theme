<?php
/*
Template Name: Команда
*/
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="team">
        <div class="container">
          <h1 class="team__title"><?php the_title() ?></h1>

          <?php if ($team = get_field('team')): ?>
          <div class="team__list">
            <div class="carousel">
              <div class="swiper team-swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($team as $item): ?>
                  <div class="swiper-slide">
                    <article class="team-item">
                      <div class="team-item__image">
                        <img src="<?php echo $item['image']['url'] ?>">
                      </div>
                      <div class="team-item__name">
                        <?php echo $item['name'] ?>
                      </div>
                      <div class="team-item__desc">
                        <?php echo $item['desc'] ?>
                      </div>
                    </article>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="carousel__next team-swiper-next"></div>
              <div class="carousel__prev team-swiper-next"></div>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($leadership = get_field('leadership')): ?>
          <div class="team__leadership">
            <div class="team-leadership">
              <div class="team-leadership__title">РУКОВОДСТВО</div>
              <div class="team-leadership__carousel">
                <div class="leadership-list">
                  <?php foreach ($leadership as $item): ?>
                  <div class="leadership-list__item">
                    <article class="leadership-item">
                      <div class="leadership-item__figure">
                        <div class="leadership-item__image">
                          <img src="<?php echo $item['image']['url'] ?>">
                        </div>
                        <div class="leadership-item__content">
                          <?php echo $item['content'] ?>
                        </div>
                        <?php if (!empty($item['content'])): ?>
                        <button class="leadership-item__show">
                          ОБРАЩЕНИЕ К КЛИЕНТАМ
                        </button>
                        <?php endif; ?>
                      </div>
                      <div class="leadership-item__name">
                        <?php echo $item['name'] ?>
                      </div>
                      <div class="leadership-item__desc">
                        <?php echo $item['desc'] ?>
                      </div>
                    </article>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </section>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
