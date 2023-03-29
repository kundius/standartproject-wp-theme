<?php
$categories = get_the_category($post->ID);
$category_ids = [];
foreach ($categories as $individual_category) {
  $category_ids[] = $individual_category->term_id;
}
$args = [
  'category__in' => $category_ids,
  'post__not_in' => [$post->ID],
  'showposts'=> -1,
  'orderby'=> 'rand',
  'caller_get_posts'=> 1
];
$see_also = new wp_query($args);
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <?php get_template_part('partials/header'); ?>

    <div class="wrapper">

      <section class="article">
        <div class="container">
          <h1 class="article__title"><?php the_title() ?></h1>

          <div class="article__date">
            <?php echo get_the_date('d.m.Y') ?>
          </div>

          <div class="article__content content">
            <?php the_content() ?>
          </div>

          <?php if ($see_also->have_posts()): ?>
          <div class="article__related">
            <div class="article-related">
              <div class="article-related__title">ДРУГИЕ НОВОСТИ</div>
              <div class="article-related__body">
                <div class="carousel">
                  <div class="swiper article-related-swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($see_also->posts as $item): ?>
                      <div class="swiper-slide">
                        <article class="news-item">
                          <div class="news-item__headline">
                            <?php $categories = get_the_category($item->ID); ?>
                            <?php if (!empty($categories)): ?>
                              <a class="news-item__category" href="<?php echo esc_url(get_category_link($categories[0]->term_id)) ?>"><?php echo esc_html($categories[0]->name) ?></a>
                            <?php endif; ?>
                            <div class="news-item__date"><?php echo get_the_date('d.m.Y', $item) ?></div>
                          </div>
                          <div class="news-item__title"><a href="<?php the_permalink($item) ?>"><?php echo get_the_title($item) ?></a></div>
                          <div class="news-item__desc"><?php echo get_the_excerpt($item); ?></div>
                        </article>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="carousel__next article-related-swiper-next"></div>
                  <div class="carousel__prev article-related-swiper-prev"></div>
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
