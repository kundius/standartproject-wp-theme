<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <?php get_template_part('partials/header'); ?>

    <section class="page-section">
      <?php if ($background_image = get_field('background_image')): ?>
      <div class="page-section__bg" style="background-image: url('<?php echo $background_image['url'] ?>')"></div>
      <?php else: ?>
      <div class="page-section__bg" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/dist/images/article-bg.jpg')"></div>
      <?php endif; ?>
    
      <div class="ui-container">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php bcn_display() ?>
        </div>

        <div class="article-headline">
          <div class="article-headline__date">
            <div class="article-headline__date-day"><?php echo get_the_date('d') ?></div>
            <div class="article-headline__date-other">/ <?php echo get_the_date('m.Y') ?></div>
          </div>
          <h1 class="article-headline__title"><?php the_title() ?></h1>
        </div>

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

          <div class="article-details__meta">
            <div class="article-meta">
              <div class="article-meta__share">
                <div class="article-meta__share-title">
                  Понравилась статья?<br />
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

        <?php if ($related_articles = get_field('related_articles')): ?>
        <div class="article-also">
          <div class="article-also__title">
            Вам может быть интересно:
          </div>
          <div class="js-article-slider">
            <?php foreach ($related_articles as $item): ?>
            <div>
              <div class="article-tiles-item">
              <div class="article-tiles-item__title"><?php echo get_the_title($item) ?></div>
                <?php if ($thumbnail = get_the_post_thumbnail($item, 'medium')): ?>
                <div class="article-tiles-item__figure">
                  <?php echo $thumbnail ?>
                </div>
                <?php endif; ?>
                <?php if ($excerpt = get_the_excerpt($item)): ?>
                  <div class="article-tiles-item__desc"><?php echo $excerpt ?></div>
                <?php endif; ?>
                <div class="article-tiles-item__more">
                  <a href="<?php the_permalink($item) ?>" class="ui-button-more">читать дальше<span class="ui-button-more__arrow"></span></a>
                </div>
                <div class="article-tiles-item__date">
                  <div class="article-tiles-item__date-day"><?php echo get_the_date('d', $item) ?></div>
                  <div class="article-tiles-item__date-other">/ <?php echo get_the_date('m.Y', $item) ?></div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <?php if (get_field('show_contacts')): get_template_part('partials/contacts', 'services'); endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
