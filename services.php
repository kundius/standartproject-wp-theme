<?php
/*
Template Name: Услуги
*/
$services = new WP_Query([
  'post_type' => 'page',
  'post_parent' => get_the_ID(),
  'posts_per_page' => -1,
  'orderby' => ['menu_order' => 'ASC']
]);
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="services">
        <div class="container">
          <h1 class="services__title"><?php the_title() ?></h1>

          <?php if ($services->have_posts()): ?>
          <div class="services-list">
            <?php $index = 0; while ($services->have_posts()): $services->the_post(); $index++; ?>
              <div class="services-item">
                <h3 class="services-item__title">
                  <a href="<?php the_permalink() ?>">
                    <?php the_title() ?>
                  </a>
                </h3>
                <div class="services-item__more">
                  <div class="services-item__more-text">подробнее</div>
                  <div class="services-item__more-arrow"></div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
          <?php endif; wp_reset_query(); ?>

          <div class="services__important">
            <div class="services-important">
              <div class="services-important__image">
                <img src="<?php bloginfo('template_url') ?>/dist/images/logo-pattern.svg" alt="">
              </div>
              <div class="services-important__table">
                Мы можем предложить нашим клиентам и партнерам проектные решения, отвечающие самым высоким стандартам качества.
              </div>
            </div>
          </div>

          <div class="services__content">
            <?php the_content() ?>
          </div>
        </div>
      </section>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
