<footer class="footer">
  <div class="ui-container">
    <div class="grid sm:grid-cols-3 gap-8 lg:gap-16 pt-16 sm:pt-24 pb-12">
      <div>
        <a href="<?php the_permalink(6) ?>" class="footer__logo">
          <img
            src="<?php bloginfo('template_url') ?>/dist/images/logo.png"
            width="220"
            height="55"
          />
        </a>
        <div class="footer__about" style="margin-bottom: 20px;">
          <p>Проектно-строительная компания «Стандарт» <br><a href="<?php the_permalink(386) ?>">Проектирование складских, оптово-распределительных и логистических комплексов</a>, заводов, торговых центров (ТЦ), офисов, административных зданий,  овощехранилищ в Москве и в других городах России.</p>
        </div>
        <div style="margin-bottom: 20px;">
          <a href="https://indparks.ru/" target="_blank"><img src="/wp-content/uploads/2021/08/aip-logo-member-ru-e1630059740556.png" width="80" height="87" /></a>
        </div>
        <ul class="footer__menu">
          <li class="menu-item"><a href="<?php the_permalink(632) ?>">Пользовательское соглашение</a></li>
          <li class="menu-item"><a href="<?php the_permalink(3) ?>">Политика конфиденциальности</a></li>
        </ul>
        <?php the_field('counters', 'options') ?>
      </div>
      <div>
        <div class="footer__title">Контакты</div>
        <div class="footer__phone">
          <a href="tel:<?php the_field('phone', 'options') ?>"><?php the_field('phone', 'options') ?></a>
        </div>
        <div class="footer__email">
          <p>Если у вас есть вопросы, обращайтесь по адресу <a href="mailto:<?php the_field('email', 'options') ?>"><?php the_field('email', 'options') ?></a></p>
        </div>
        <div class="footer__address">
          <?php the_field('address', 'options') ?>
        </div>
      </div>
      <div>
        <div class="footer__title">Услуги</div>
        
        <?php wp_nav_menu([
          'theme_location' => 'footermenu',
          'container' => false,
          'menu_class' => 'footer__menu'
        ]); ?>
      </div>
    </div>
    <div class="flex items-center justify-between gap-8 md:gap-24 pb-4 pt-4 border-t">
      <div class="footer__copyright">
        <?php the_field('copyright', 'options') ?>
      </div>
      <a href="http://domenart-studio.ru/" class="footer__creator" target="_blank">
        <img src="<?php bloginfo('template_url') ?>/dist/images/creator.png" width="98" height="27" />
      </a>
    </div>
  </div>
</footer>

<?php get_template_part('partials/modals'); ?>

<button class="ui-scrolltop"></button>

<script src="<?php echo get_bloginfo('template_url') ?>/dist/main.js"></script>
<?php wp_footer() ?>
