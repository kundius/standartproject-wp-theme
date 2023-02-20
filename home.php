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
  'posts_per_page' => 3,
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
  <body>
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="section-market-time">
        <div class="container">
          <div class="section-market-time__circle">
            15
          </div>
          <div class="section-market-time__description">
            “ Мы создаем проекты, выходящие за рамки, новые форматы и нестандартные направления. ”
          </div>
          <div class="section-market-time__button">
            <a href="<?php the_permalink(8) ?>" class="button-primary">ПОДРОБНЕЕ О КОМПАНИИ</a>
          </div>
        </div>
      </section>

      <section class="section-more-foundation">
        <div class="container">
          <div class="section-more-foundation__title">
            <div class="section-more-foundation__title-text" data-aos="fade-right">
              НАДЕЖНОЕ <span>ОСНОВАНИЕ</span><br />
              ВАШЕГО БИЗНЕСА!
            </div>
            <div class="section-more-foundation__title-image"></div>
          </div>
          <div class="section-more-foundation__image-large" data-aos="fade-up">
            <img src="<?php bloginfo('template_url') ?>/dist/images/more-foundation.jpg" alt="" />
          </div>
          <div class="section-more-foundation__image-small" data-aos="fade-up">
            <img src="<?php bloginfo('template_url') ?>/dist/images/foundation-small.jpg" alt="" />
          </div>
        </div>
      </section>

      <section class="section-more-projects">
        <div class="container">
          <div class="section-more-projects__title" data-aos="fade-right">
            <span>БОЛЕЕ 50</span><br />
            РЕАЛИЗОВАННЫХ ПРОЕКТОВ ПО ВСЕЙ РОССИИ
          </div>
          <div class="section-more-projects__description" data-aos="fade-up">
            Мы активно внедряем новые технологии на всех этапах взаимодействия с заказчиками, что позволяет нам выполнять поставленные задачи в оговоренные сроки и утвержденным бюджетом.
          </div>
          <div class="section-more-projects__button" data-aos="fade-right">
            <a href="<?php echo esc_url(get_category_link(14)) ?>" class="button-primary">ОТКРЫТЬ ПРОЕКТЫ</a>
          </div>
          <div class="section-more-projects__image">
            <img src="<?php bloginfo('template_url') ?>/dist/images/more-projects.jpg" alt="" data-aos="fade-left" />
          </div>
        </div>
      </section>

      <section class="section-more-specialists">
        <div class="container">
          <div class="section-more-specialists__title" data-aos="fade-right">
            <span>БОЛЕЕ 50</span><br />
            квалифицированных Специалистов
          </div>
          <div class="section-more-specialists__body">
            <div class="section-more-specialists__inner">
              <div class="section-more-specialists__description" data-aos="fade-left">
                Команда с широкой компетенцией.
              </div>
              <div class="section-more-specialists__button" data-aos="fade-left">
                <a href="<?php the_permalink(1065) ?>" class="button-primary">ПОДРОБНЕЕ О КОМАНДЕ</a>
              </div>
            </div>
            <div class="section-more-specialists__image-first" data-aos="fade-right">
              <img src="<?php bloginfo('template_url') ?>/dist/images/more-specialists-first.jpg" alt="" />
            </div>
            <div class="section-more-specialists__image-second" data-aos="fade-right">
              <img src="<?php bloginfo('template_url') ?>/dist/images/more-specialists-second.jpg" alt="" />
            </div>
          </div>
        </div>
      </section>

      <section class="section-partners">
        <div class="container section-partners__container">
          <div class="section-partners__title">
            НАШИ ПАРТНЕРЫ
          </div>
          <div class="section-partners__list">
            <div class="partners-list">
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-1.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-2.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-3.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-4.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-5.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-6.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-7.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-8.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-9.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-10.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-11.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-12.jpg" alt="">
                </div>
              </div>
              <div class="partners-list__item">
                <div class="section-partners__item">
                  <img src="<?php bloginfo('template_url') ?>/dist/images/partner-13.jpg" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="section-partners__description">
            Клиенты — это наши <span>партнёры и друзья</span>!<br />
            Мы ценим каждого партнёра и&nbsp;стараемся ежедневно улучшать качество предоставляемых услуг.
          </div>
        </div>
      </section>

      <div class="container">
        <section class="section-presscenter">
          <div class="section-presscenter__title">
            ПРЕСС ЦЕНТР
            <a href="<?php echo esc_url(get_category_link(34)) ?>"></a>
          </div>
          <div class="presscenter-list">
            <?php foreach ($news->posts as $item): ?>
            <div class="presscenter-list__item">
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
        </section>
      </div>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
