<section class="footer">
  <div class="footer-primary">
    <div class="container">
      <div class="footer-layout">
        <div class="footer-layout__address">
          <div class="footer-address">
            <div class="footer-address__title">
              Наши представительства
            </div>
            <div class="footer-address__content">
              <?php if ($adresses = get_field('addresses', 'options')): ?>
              <?php foreach ($adresses as $address): ?>
              <p>
                <?php echo $address['content'] ?>
              </p>
              <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="footer-layout__logo">
          <img src="<?php bloginfo('template_url') ?>/dist/images/logo-footer.svg" alt="">
        </div>
        <div class="footer-layout__contacts">
          <div class="footer-contacts">
            <div class="footer-contacts__title">
              Контакты
            </div>
            <div class="footer-contacts__phone">
              <div class="footer-contacts__phone-label">
                Телефон:
              </div>
              <div class="footer-contacts__phone-value">
                <a href="tel:<?php the_field('phone', 'options') ?>"><?php the_field('phone', 'options') ?></a>
              </div>
            </div>
            <div class="footer-contacts__email">
              <div class="footer-contacts__email-label">
                Электронная почта:
              </div>
              <div class="footer-contacts__email-value">
                <a href="mailto:<?php the_field('email', 'options') ?>"><?php the_field('email', 'options') ?></a>
              </div>
            </div>
            <?php if ($social = get_field('social', 'options')): ?>
            <div class="footer-contacts__social">
              <div class="footer-contacts__social-label">
              Социальные сети:
              </div>
              <div class="footer-contacts__social-value">
                <div class="social-list">
                  <?php foreach ($social as $item): ?>
                  <a href="<?php echo $item['link'] ?>" class="social-list__item"><?php echo $item['icon'] ?></a>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-secondary">
    <div class="container">
      <div class="footer-secondary__layout">
        <div class="footer-secondary__layout-copyright">
          <div class="footer-secondary__copyright">
            <?php the_field('copyright', 'options') ?>
          </div>
        </div>
        <div class="footer-secondary__layout-rules">
          <div class="footer-secondary__rules">
            <a href="<?php the_permalink(632) ?>">Пользовательское соглашение</a>
          </div>
        </div>
        <div class="footer-secondary__layout-privacy">
          <div class="footer-secondary__privacy">
            <a href="<?php the_permalink(3) ?>">Политика конфиденциальности</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php wp_footer() ?>
