<?php
/*
Template Name: Главная
*/
$services = new WP_Query([
  'post_type' => 'page',
  'post_parent' => 335,
  'posts_per_page' => -1,
  'orderby' => ['menu_order' => 'ASC']
]);

$news = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 4,
  'order' => 'DESC',
  'orderby' => 'date',
  'tax_query' => [
    'relation' => 'OR',
    [
			'taxonomy' => 'category',
			'field' => 'id',
			'terms' => [15]
    ]
  ]
]);

?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body class="page-home">
    <?php get_template_part('partials/header'); ?>

    <section class="intro">
      <div class="ui-container intro__container">
        <div class="intro__content">
          <h1 class="intro__content-title">Проектно-строительная компания</h1>
          <div class="intro__content-subtitle">
            Комплексное проектирование и строительство
          </div>
          <div class="intro__content-contact">
            <button class="ui-button-primary" data-micromodal-trigger="modal-feedback">
              Связаться с нами
            </button>
          </div>
        </div>
      </div>
    </section>

    <section class="section-services">
      <div class="ui-container">
        <h2 class="section-services__title">Комплексное проектирование</h2>
        
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
    
    <section>
      <div class="ui-container">
      	<div class="grid sm:grid-cols-3 gap-12 align-start">
	<?php foreach ($news->posts as $item): ?>
	<div>
	  <article class="articles-item-large">
	    <?php if ($thumbnail = get_the_post_thumbnail($item, 'medium')): ?>
	    <div class="articles-item-large__image">
	      <?php echo $thumbnail ?>
	    </div>
	    <?php endif; ?>
	    <div class="articles-item-large__date"><?php echo get_the_date('d.m.Y', $item) ?></div>
	    <div class="articles-item-large__title"><?php echo get_the_title($item) ?></div>
	    <?php if ($excerpt = get_the_excerpt($item)): ?>
	      <div class="articles-item-large__desc"><?php echo wp_trim_words($excerpt, 12, '...') ?></div>
	    <?php endif; ?>
	    <div class="articles-item-large__more">
	      <a href="<?php the_permalink($item) ?>" class="ui-button-more-alt">читать дальше<span class="ui-button-more-alt__arrow"></span></a>
	    </div>
	  </article>
	</div>
	<?php endforeach; ?>
	</div>
      </div>
    </section>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
