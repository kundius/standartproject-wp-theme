<?php
$categories = get_the_category($post->ID);
$category_ids = [];
foreach ($categories as $individual_category) {
  $category_ids[] = $individual_category->term_id;
}
$args = [
  'category__in' => $category_ids,
  'post__not_in' => [$post->ID],
  'showposts'=> 3,
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

    <main class="main">
      <section class="page-section">
        <div class="ui-container">
          <h1 class="page-title"><?php the_title() ?></h1>

          <div class="article-details">
            <div class="article-details__content content">
              <?php the_content() ?>
            </div>

            <?php $tags = get_the_terms(get_the_ID(), 'post_tag') ?>
            <?php if (is_array($tags)): ?>
            <div class="article-details__tags">
              <?php foreach($tags as $tag): ?>
              <a href="<?php echo get_term_link($tag->term_id, $tag->taxonomy) ?>">#<?php echo $tag->name ?></a>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <?php if ($gallery = get_field('gallery')): ?>
              <div id="gallery" class="grid grid-cols-2 gap-2 sm:gap-8 mt-12">
                <?php foreach ($gallery as $image): ?>
                  <figure>
                    <a href="<?php echo $image['url'] ?>" class="gallery-item">
                      <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>">
                    </a>
                  </figure>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="article-details__meta">
              <div class="article-meta">
                <div class="article-meta__share">
                  <div class="article-meta__share-title">
                    Понравилось?<br />
                    Поделись с друзьями:
                  </div>
                  <div class="article-meta__share-buttons">
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,pinterest"></div>
                  </div>
                </div>
                <div class="article-meta__neighbors">
                  <?php previous_post_link('%link', 'Предыдущая') ?>
                  <?php next_post_link('%link', 'Следующая') ?>
                </div>
              </div>
            </div>
          </div>

          <?php if ($see_also->have_posts()): ?>
            <div class="mt-24">
              <div class="text-3xl mb-8">Похожие записи</div>
              <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <?php foreach ($see_also->posts as $item): ?>
                <article class="articles-item">
                  <?php if ($thumbnail = get_the_post_thumbnail($item, 'w400')): ?>
                  <div class="articles-item__image">
                    <?php echo $thumbnail ?>
                  </div>
                  <?php endif; ?>
                  <div class="articles-item__date"><?php echo get_the_date('d.m.Y', $item) ?></div>
                  <div class="articles-item__title"><a href="<?php the_permalink($item) ?>"><?php echo get_the_title($item) ?></a></div>
                  <?php if ($excerpt = get_the_excerpt($item)): ?>
                    <div class="articles-item__desc"><?php echo wp_trim_words($excerpt, 20, '...') ?></div>
                  <?php endif; ?>
                </article>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </section>
    </main>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
