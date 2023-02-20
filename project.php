<?php
/*
Template Name: Проект
Template post type: post
*/
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
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="project">
        <div class="container">
          <h1 class="project__title"><?php the_title() ?></h1>

          <div class="project__nav">
            <div class="project-nav">
              <?php foreach ($category_ids as $category_id): $term = get_term_by('id', $category_id, 'category'); ?>
              <a href="<?php echo get_term_link($term) ?>" class="project-nav__item">
                <?php echo esc_html($term->name) ?>
              </a>
              <?php endforeach; ?>
            </div>
          </div>

          <?php if ($gallery = get_field('gallery')): ?>
          <div class="project__gallery">
            <div class="project-gallery">
              <div class="swiper project-swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($gallery as $image): ?>
                  <div class="swiper-slide">
                    <img src="<?php echo $image['url'] ?>" title="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="project-gallery__prev"></div>
              <div class="project-gallery__next"></div>
            </div>
          </div>
          <?php endif; ?>

          <div class="project__content">
            <div class="project-content">
              <div class="project-content__title">
                ОПИСАНИЕ ПРОЕКТА
              </div>
              <div class="project-content__body">
                <?php the_content() ?>
              </div>
              <div class="project-content__figure"></div>
            </div>
          </div>

          <?php if ($params = get_field('params')): ?>
          <div class="project__params">
            <div class="project-params">
              <?php foreach ($params as $param): ?>
              <div class="project-params__item">
                <div class="project-params__item-label">
                  <?php echo $param['label'] ?>
                </div>
                <div class="project-params__item-value">
                  <?php echo $param['value'] ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($map = get_field('map')): ?>
          <div class="project__map">
            <div class="project-map">
              <div class="project-map__title">
                МЕСТОПОЛОЖЕНИЕ
              </div>
              <div class="project-map__body">
                <?php echo $map ?>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if ($see_also->have_posts()): ?>
          <div class="project__related">
            <div class="project-related">
              <div class="project-related__title">Другие проекты</div>
              <div class="project-related__body">
                <div class="carousel">
                  <div class="swiper project-related-swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($see_also->posts as $item): ?>
                      <div class="swiper-slide">
                        <article class="projects-item">
                          <?php if ($thumbnail = get_the_post_thumbnail($item, 'medium')): ?>
                          <div class="projects-item__image">
                            <?php echo $thumbnail ?>
                            <div class="projects-item__image-label">
                              СМОТРЕТЬ ПРОЕКТ
                            </div>
                          </div>
                          <?php endif; ?>
                          <div class="projects-item__body">
                            <div class="projects-item__title">
                              <a href="<?php the_permalink($item) ?>"><?php echo get_the_title($item) ?></a>
                            </div>
                            <?php if ($section = get_field('section', $item)): ?>
                            <div class="projects-item__desc"><?php echo $section ?></div>
                            <?php endif; ?>
                          </div>
                        </article>
                      </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="carousel__prev project-related-swiper-prev"></div>
                  <div class="carousel__next project-related-swiper-next"></div>
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
