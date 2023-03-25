<section class="banner-section">
  <div class="container">
    <div class="banner">
      <button type="button" name="button" class="banner__close"></button>
      <div class="banner__headline">
        <div class="banner__date">
          17 - 19<br />
          апреля 2023
        </div>
        <div class="banner__desc">
          27-ая Международная выставка<br />
          транспортно-логистических услуг,<br />
          складского оборудования и технологий TransRussia.
        </div>
        <div class="banner__logos">
          <div class="banner__logo">
            <img src="<?php bloginfo('template_url') ?>/dist/images/skladtech.png" alt="" width="206" height="40">
          </div>
          <div class="banner__logo">
            <img src="<?php bloginfo('template_url') ?>/dist/images/transrussia.png" alt="" width="180" height="31">
          </div>
        </div>
      </div>
      <div class="banner__body">
        <div class="banner__title">
          Будем рады встрече на выставке <span>TransRussia 2023!</span>
        </div>
        <a href="#" class="button-primary">ПОДРОБНЕЕ</a>
      </div>
    </div>
  </div>
</section>

<section class="header">
  <div class="container header__container">
    <a href="/" class="header__logo">
      <img src="<?php bloginfo('template_url') ?>/dist/images/logo.svg" alt="" />
    </a>
    <button class="header__toggle" type="button">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <nav class="header__nav">
      <?php wp_nav_menu([
        'theme_location' => 'mainmenu',
        'container' => false
      ]) ?>
    </nav>
  </div>
</section>

<div class="header-placeholder"></div>
