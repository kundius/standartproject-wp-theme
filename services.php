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

    <main class="main">
      <section class="page-section">
        <div class="ui-container">
          <h1 class="page-title"><?php the_title() ?></h1>

          <?php if ($services->have_posts()): ?>
          <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12 sm:gap-20">
            <?php $index = 0; while ($services->have_posts()): $services->the_post(); $index++; ?>
              <div class="services-item">
                <figure class="services-item__image">
                  <?php if (has_post_thumbnail()): the_post_thumbnail($post->ID, 'medium'); endif; ?>
                </figure>
                <h3 class="services-item__title">
                  <a href="<?php the_permalink() ?>">
                    <?php the_title() ?>
                  </a>
                </h3>
              </div>
            <?php endwhile; ?>
          </div>
          <?php endif; wp_reset_query(); ?>
        
          <div class="page-content content">
            <?php the_content() ?>
          </div>
        </div>
      </section>

      <section class="section-about">
        <div class="ui-container">
          <?php get_template_part('partials/short-about'); ?>
        </div>
      </section>

      <section class="section-advantages">
        <div class="ui-container">
          <?php get_template_part('partials/advantages'); ?>
        </div>
      </section>
    </main>

    <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
