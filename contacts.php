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
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="contacts">
        <div class="container">
          <h1 class="contacts__title">
            <?php the_title() ?>
          </h1>

          <div class="contacts__table">
            <div class="contacts-table">
              <div class="contacts-table__phone">
              <div class="contacts-table__phone-label">
                Телефон:
              </div>
              <div class="contacts-table__phone-value">
                <a href="tel:<?php the_field('phone', 'options') ?>"><?php the_field('phone', 'options') ?></a>
              </div>
              </div>
              <div class="contacts-table__divider">

              </div>
              <div class="contacts-table__email">
                <div class="contacts-table__email-label">
                  Электронная почта:
                </div>
                <div class="contacts-table__email-value">
                  <a href="mailto:<?php the_field('email', 'options') ?>"><?php the_field('email', 'options') ?></a>
                </div>
              </div>
            </div>
          </div>

          <?php if ($adresses = get_field('addresses', 'options')): ?>
          <div class="contacts__title">
            Представительство
          </div>

          <div class="contacts__addresses">
            <div class="contacts-addresses">
              <div class="contacts-addresses__content">
                <?php foreach ($adresses as $key => $address): ?>
                <div class="contacts-addresses__content-item<?php if ($key === 0): echo ' _active'; endif; ?> contacts-addresses__control" data-index="<?php echo $key; ?>">
                  <?php echo $address['content'] ?>
                </div>
                <?php endforeach; ?>
              </div>
              <div class="contacts-addresses__map">
                <?php foreach ($adresses as $key => $address): ?>
                <div class="contacts-addresses__map-item<?php if ($key === 0): echo ' _active'; endif; ?>" data-index="<?php echo $key; ?>">
                  <?php echo $address['map'] ?>
                  <?php if (!empty($adresses[$key - 1])): ?>
                  <button type="button" class="contacts-addresses__prev contacts-addresses__control" data-index="<?php echo $key - 1; ?>"></button>
                  <?php endif; ?>
                  <?php if (!empty($adresses[$key + 1])): ?>
                  <button type="button" class="contacts-addresses__next contacts-addresses__control" data-index="<?php echo $key + 1; ?>"></button>
                  <?php endif; ?>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <div class="contacts__map">
            <?php the_field('yamap', 'options') ?>
          </div>
        </div>
      </section>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
