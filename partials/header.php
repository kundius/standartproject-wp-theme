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
