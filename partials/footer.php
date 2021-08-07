<footer class="footer">
  <div class="ui-container footer__container">
    <div class="footer__logo">
      <a href="/"><?php the_field('site_name', 'options') ?></a>
    </div>

    <div class="footer__copyright">
      <?php the_field('copyright', 'options') ?>
    </div>

    <?php if ($social_links = get_field('social_links', 'options')): ?>
    <div class="footer__social">
      <?php foreach ($social_links as $item): ?>
        <a href="<?php echo $item['link'] ?>" class="footer__social-vk" target="_blank">
          <?php icon($item['icon'], [24, 24]) ?>
        </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="footer__requisites">
      <?php the_field('requisites', 'options') ?>
    </div>

    <div class="footer__counters">
      <?php the_field('counters', 'options') ?>
    </div>

    <div class="footer__creator">
      <a href="https://domenart-studio.ru/" target="_blank">
        <img src="<?php echo get_bloginfo('template_url') ?>/dist/images/creator.png" alt="" loading="lazy" />
      </a>
    </div>

    <div class="footer__sitemap">
      <a href="<?php the_permalink(58) ?>">Карта сайта</a>
    </div>

    <div class="footer__agreement">
      <a href="<?php the_permalink(55) ?>">Пользовательское соглашение</a>
    </div>

    <div class="footer__policy">
      <a href="<?php the_permalink(3) ?>">Политика конфиденциальности и обработки персональных данных</a>
    </div>
  </div>
</footer>

<div class="modal micromodal-slide" id="modal-feedback" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-feedback-title">
      <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      <div class="modal__title">
        Заказать обратный звонок
      </div>
      <?php echo do_shortcode('[contact-form-7 id="5" title="Заказать обратный звонок"]') ?>
    </div>
  </div>
</div>

<div class="modal micromodal-slide" id="modal-cause" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-cause-title">
      <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      <div class="modal__title">
        Вызвать комиссара
      </div>
      <?php echo do_shortcode('[contact-form-7 id="147" title="Вызвать комиссара"]') ?>
    </div>
  </div>
</div>

<button class="ui-scrolltop"></button>

<script src="<?php echo get_bloginfo('template_url') ?>/dist/scripts/index.js"></script>
<?php wp_footer() ?>
