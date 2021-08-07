<?php
/*
Template Name: Услуга
*/
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <?php get_template_part('partials/header'); ?>

    <section class="page-section">
      <div class="page-section__bg" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/dist/images/intro.jpg'); opacity: 0.2"></div>

      <div class="ui-container">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php bcn_display() ?>
        </div>

        <h1 class="page-title page-title_tall"><?php the_title() ?></h1>

        <div class="service-layout">
          <div class="service-layout__content">
            <div class="service-layout__content-details">
              <div class="service-details">
                <div class="service-details__number">1</div>
                <div class="service-details__columns">
                  <div class="service-details__info">
                    <div class="service-details__title"><?php the_title() ?></div>
                    <div class="service-details__separator"></div>
                  </div>
                  <div class="service-details__content">
                    <?php the_field('detailed_description') ?>
                  </div>
                </div>
                <div class="service-details__order">
                  <button class="ui-button-primary" data-micromodal-trigger="modal-cause">
                    Вызвать комиссара<span class="ui-button-primary__icon"><svg class="ui-icon" width="18" height="21"><use href="<?php echo get_bloginfo('template_url') ?>/dist/images/sprite.svg#intro-phone"></use></svg></span>
                  </button>
                </div>
              </div>
            </div>

            <div class="service-layout__content-callback">
              <div class="service-callback">
                <div class="service-callback__title">Наберите телефон аварийного комиссара<br /> в Воронеже  или оставьте заявку в форме ниже</div>
                <?php echo do_shortcode('[contact-form-7 id="150" title="Обратный звонок с услуги"]') ?>
              </div>
            </div>
          </div>

          <div class="service-layout__advantages">
            <div class="service-layout__advantages-item">
              <div class="service-advantages-item">
                <div class="service-advantages-item__image">
                  <img src="<?php echo get_bloginfo('template_url') ?>/dist/images/services-advantage-1.svg" alt="">
                </div>
                <div class="service-advantages-item__title">Выезжаем на место ДТП в&nbsp;течении 15&nbsp;минут</div>
              </div>
            </div>
            <div class="service-layout__advantages-item">
              <div class="service-advantages-item">
                <div class="service-advantages-item__image">
                  <img src="<?php echo get_bloginfo('template_url') ?>/dist/images/services-advantage-2.svg" alt="">
                </div>
                <div class="service-advantages-item__title">Проводим осмотр места аварии, делаем фото</div>
              </div>
            </div>
            <div class="service-layout__advantages-item">
              <div class="service-advantages-item">
                <div class="service-advantages-item__image">
                  <img src="<?php echo get_bloginfo('template_url') ?>/dist/images/services-advantage-3.svg" alt="">
                </div>
                <div class="service-advantages-item__title">Оформляем документы и&nbsp;оказываем юридическую помощь</div>
              </div>
            </div>
            <div class="service-layout__advantages-item">
              <div class="service-advantages-item">
                <div class="service-advantages-item__image">
                  <img src="<?php echo get_bloginfo('template_url') ?>/dist/images/services-advantage-4.svg" alt="">
                </div>
                <div class="service-advantages-item__title">Возможность компенсации в&nbsp;день обращения</div>
              </div>
            </div>
          </div>
        </div>

        <div class="page-content content">
          <?php the_content() ?>
        </div>
      </div>
    </section>

    <?php if (get_field('show_contacts')): get_template_part('partials/contacts', 'services'); endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
