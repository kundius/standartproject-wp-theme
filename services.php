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
    <?php get_template_part('partials/header'); ?>

    <section class="page-section">
      <div class="ui-container">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php bcn_display() ?>
        </div>

        <h1 class="page-title"><?php the_title() ?></h1>

        <?php if ($services->have_posts()): ?>
        <div class="services-list">
          <?php $index = 0; while ($services->have_posts()): $services->the_post(); $index++; ?>
            <article class="services-item<?php if ($index % 4 == 0 || $index % 4 == 1): ?> services-item-large<?php endif; ?>">
              <div class="services-item__number"><?php echo $index ?></div>
              <div class="services-item__columns">
                <div class="services-item__info">
                  <div class="services-item__title"><?php the_title() ?></div>
                  <div class="services-item__short-desc"><?php the_excerpt() ?></div>
                  <div class="services-item__separator"></div>
                  <div class="services-item__more"><a href="<?php the_permalink() ?>">Подробнее</a></div>
                  <div class="services-item__separator-alt"></div>
                </div>
                <div class="services-item__long-desc">
                  <?php the_field('detailed_description') ?>
                  <p>
                    <button class="ui-button-primary" data-micromodal-trigger="modal-cause">
                      Вызвать комиссара<span class="ui-button-primary__icon"><?php icon('intro-phone', [18, 21]) ?></span>
                    </button>
                  </p>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
        <?php endif; wp_reset_query(); ?>
      
        <div class="page-content content">
          <?php the_content() ?>
        </div>
      </div>
    </section>

    <?php if (get_field('show_contacts')): get_template_part('partials/contacts', 'services'); endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
