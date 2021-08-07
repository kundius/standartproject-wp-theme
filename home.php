<?php
/*
Template Name: Главная
*/
$latest_articles = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 3,
  'order' => 'DESC',
  'orderby' => 'date'
]);
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <?php get_template_part('partials/header'); ?>
    
    <section class="intro">
      <div class="ui-container intro__container">
        <div class="intro__content">
          <div class="intro__content-title">
            Попали в ДТП?
          </div>
          <div class="intro__content-subtitle">
            Звоните
            <span class="intro__phone">
              <span class="intro__phone-value">+7 (910) 247-54-65</span>
              <span class="intro__phone-subscribe">Дежурный комиссар</span>
            </span>
          </div>
          <div class="intro__content-time">
            Выезд на место в течение 15 минут
          </div>
          <div class="intro__content-call">
            <button class="ui-button-primary js-call-or-modal" data-tel="+79102475465" data-modal="modal-cause">
              Вызвать комиссара<span class="ui-button-primary__icon"><?php icon('intro-phone', [18, 21]) ?></span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <?php if ($favorite_services = get_field('favorite_services')): ?>
    <section class="section-services">
      <div class="ui-container">
        <div class="js-service-slider">
          <?php foreach ($favorite_services as $key => $item): ?>
            <div>
              <div class="numbered-tiles-item">
                <div class="numbered-tiles-item__number"><?php echo $key + 1 ?></div>
                <a href="<?php the_permalink($item->ID) ?>" class="numbered-tiles-item__title"><?php echo $item->post_title ?></a>
                <div class="numbered-tiles-item__desc"><?php echo $item->post_excerpt ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="section-services__all">
          <a href="<?php the_permalink(13) ?>" class="ui-section-all-link">Все наши услуги</a>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if ($advantages = get_field('advantages')): ?>
    <section class="section-advantages">
      <div class="ui-container">
        <div class="section-headline">
          <div class="section-headline__title">Почему с нами лучше</div>
          <div class="section-headline__desc">опыт успешной работы, прозрачность<br /> и индивидуальный подход к каждому клиенту.</div>
        </div>

        <div class="section-advantages__grid">
          <?php foreach ($advantages as $key => $item): ?>
          <div class="section-advantages__grid-item">
            <div class="numbered-tiles-item">
              <div class="numbered-tiles-item__number"><?php echo $key + 1 ?></div>
              <div class="numbered-tiles-item__title"><?php echo $item['title'] ?></div>
              <div class="numbered-tiles-item__desc"><?php echo $item['description'] ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <section class="section-articles">
      <div class="ui-container">
        <div class="section-headline">
          <div class="section-headline__title">Полезная информация</div>
          <div class="section-headline__desc">Бесплатные руководства по юридическим<br /> вопросам от нашей компании</div>
        </div>

        <div class="js-article-slider">
          <?php foreach ($latest_articles->posts as $key => $item): ?>
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

        <div class="section-articles__all">
          <a href="<?php echo get_term_link(2, 'category') ?>" class="ui-section-all-link">Все материалы</a>
        </div>
      </div>
    </section>

    <section class="section-content">
      <div class="ui-container">
        <?php if ($main_title = get_field('main_title')): ?>
        <h1 class="section-content__title">
          <?php echo $main_title ?>
        </h1>
        <?php endif; ?>
        
        <?php if ($links_before_content = get_field('links_before_content')): ?>
        <div class="simplified-tiles">
          <?php foreach ($links_before_content as $item): ?>
          <div class="simplified-tiles-item">
            <a href="<?php echo $item['link'] ?>" class="simplified-tiles-item__title">
              <?php echo $item['title'] ?>
            </a>
            <div class="simplified-tiles-item__figure">
              <img src="<?php echo $item['image']['url'] ?>" alt="" class="simplified-tiles-item__figure-image" />
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="section-content__body">
          <div class="content">
            <?php the_content() ?>
          </div>
        </div>
      </div>
    </section>

    <?php if (get_field('show_contacts')): get_template_part('partials/contacts', 'services'); endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
