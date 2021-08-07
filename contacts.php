<?php
/*
Template Name: Контакты
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
      <div class="ui-container">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php bcn_display() ?>
        </div>

        <h1 class="page-title"><?php the_title() ?></h1>

        <div class="contacts-layout">
          <div class="contacts-layout__content">
            <div class="contacts-headline">
              <div class="contacts-headline__title">Офис</div>
              <div class="contacts-headline__desc">Приезжайте, будем рады видеть вас в офисе.</div>
            </div>

            <div class="contacts-content">
              <?php if ($addresses = get_field('addresses')): ?>
              <div class="contacts-content__row contacts-content__row_address">
                <?php foreach ($addresses as $item): ?>
                <div class="contacts-content__cell-half">
                  <div class="contacts-content__address">
                    <?php echo $item['content'] ?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>

              <?php if ($phones = get_field('phones')): ?>
              <div class="contacts-content__row contacts-content__row_phones">
                <?php foreach ($phones as $item): ?>
                <div class="contacts-content__cell-half">
                  <div class="contacts-content__phone">
                    <div class="contacts-content__phone-icon">
                      <?php icon('icon-phone', [20, 20]) ?>
                    </div>
                    <?php echo $item['content'] ?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>

              <?php $email = get_field('email') ?>
              <?php $additional_phone = get_field('additional_phone') ?>
              <?php if ($email || $additional_phone): ?>
              <div class="contacts-content__row contacts-content__row_email">
                <?php if ($email): ?>
                <div class="contacts-content__cell-half">
                  <div class="contacts-content__email">
                    <div class="contacts-content__email-icon">
                      <?php icon('icon-email', [15, 11]) ?>
                    </div>
                    <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                  </div>
                </div>
                <?php endif; ?>
                <?php if ($additional_phone): ?>
                <div class="contacts-content__cell-half">
                  <div class="contacts-content__phone">
                    <?php echo $additional_phone ?>
                  </div>
                </div>
                <?php endif; ?>
              </div>
              <?php endif; ?>

              <?php if ($schedule = get_field('schedule')): ?>
              <div class="contacts-content__row">
                <div class="contacts-content__cell-full">
                  <div class="contacts-content__schedule">
                    <div class="contacts-content__schedule-icon">
                      <?php icon('icon-schedule', [20, 20]) ?>
                    </div>
                    <?php echo $schedule ?>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>

            <?php if ($maps = get_field('maps')): ?>
            <div class="contacts-maps">
              <?php foreach ($maps as $item): ?>
              <div class="contacts-maps__item">
                <?php echo $item['code'] ?>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>

          <div class="contacts-layout__form">
            <div class="contacts-headline contacts-headline_dark">
              <div class="contacts-headline__title">Обратная связь</div>
              <div class="contacts-headline__desc">Возникли вопросы или сложности? Напишите нам.</div>
            </div>

            <div class="contacts-feedback">
              <div class="contacts-feedback__title">
                Обязательно укажите телефон для связи
              </div>
              <?php echo do_shortcode('[contact-form-7 id="149" title="Обратная связь в контактах"]') ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php if (get_field('show_contacts')): get_template_part('partials/contacts', 'services'); endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
