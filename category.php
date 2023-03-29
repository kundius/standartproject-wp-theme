<?php
$category = get_queried_object();
// $parent = get_category($category->parent, 'ARRAY_A');
$query_params = [
  'post_type' => 'post',
  'posts_per_page' => 12,
  'order' => 'DESC',
  'orderby' => 'date',
  'paged' => get_query_var('paged') ?: 1,
  'tax_query' => [
    'relation' => 'OR',
    [
			'taxonomy' => $category->taxonomy,
			'field' => 'id',
			'terms' => [$category->term_id]
    ]
  ]
];
$query = new WP_Query($query_params);
$parent_id = $category->parent === 0 ? $category->term_id : $category->parent;
$nav = get_term_children($parent_id, 'category');
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <?php get_template_part('partials/header'); ?>
      
    <div class="wrapper">

      <section class="projects">
        <div class="container">
          <h1 class="projects__title"><?php single_cat_title() ?></h1>

          <div class="projects__nav">
            <div class="projects-nav">
              <a href="<?php echo get_term_link($parent_id) ?>" class="projects-nav__item<?php if ($category->term_id === $parent_id): echo ' _active'; endif; ?>">
                Все
              </a>
              <?php foreach ($nav as $child): $term = get_term_by('id', $child, 'category'); ?>
              <a href="<?php echo get_term_link($term) ?>" class="projects-nav__item<?php if ($category->term_id === $child): echo ' _active'; endif; ?>">
                <?php echo esc_html($term->name) ?>
              </a>
              <?php endforeach; ?>
            </div>
          </div>

          <?php if ($query->have_posts()): ?>
          <?php if ($parent_id === 14): ?>
          <div class="projects__list">
            <div class="projects-list">
              <?php foreach ($query->posts as $item): ?>
              <div class="projects-list__cell">
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
          <div class="projects__pagenavi">
            <?php wp_pagenavi(['query' => $query]) ?>
          </div>
          <?php else: ?>
          <div class="articles__list">
            <div class="articles-list">
              <?php foreach ($query->posts as $item): ?>
              <div class="articles-list__cell">
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
          <div class="articles__pagenavi">
            <?php wp_pagenavi(['query' => $query]) ?>
          </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </section>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
