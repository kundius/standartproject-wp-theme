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
                    <a href="<?php echo $image['url'] ?>">
                      <img src="<?php echo $image['sizes']['large'] ?>" alt="<?php echo $image['alt'] ?>" class="transition block rounded-xl shadow-md hover:shadow-lg">
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
        </div>
      </section>
    </main>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
