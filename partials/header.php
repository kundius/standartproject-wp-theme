<header class="header">
  <div class="ui-container header__container">

    <div class="drawer js-drawer">
      <div class="drawer-screen drawer-screen_opened" data-parent="root">
        <div class="drawer-screen__list">
          <div class="drawer-screen__list-item">
            <a href="/" class="drawer-screen__link">
              <span class="drawer-screen__link-icon">
                <svg role="img">
                  <use href="<?php echo get_bloginfo('template_url') ?>/dist/images/sprite.svg#menu-about"></use>
                </svg>
              </span>
              <span class="drawer-screen__link-title">Главная</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
          <div class="drawer-screen__list-item">
            <a href="<?php the_permalink(13) ?>" class="drawer-screen__link">
              <span class="drawer-screen__link-icon">
                <svg role="img">
                  <use href="<?php echo get_bloginfo('template_url') ?>/dist/images/sprite.svg#menu-services"></use>
                </svg>
              </span>
              <span class="drawer-screen__link-title">Услуги</span>
            </a>
            <span class="drawer-screen__list-item-arrow">
              <button class="drawer-screen__arrowNext" data-next="services"></button>
            </span>
          </div>
          <div class="drawer-screen__list-item">
            <a href="<?php echo get_term_link(2, 'category') ?>" class="drawer-screen__link">
              <span class="drawer-screen__link-icon">
                <svg role="img">
                  <use href="<?php echo get_bloginfo('template_url') ?>/dist/images/sprite.svg#menu-articles"></use>
                </svg>
              </span>
              <span class="drawer-screen__link-title">Статьи</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
          <div class="drawer-screen__list-item">
            <a href="<?php the_permalink(15) ?>" class="drawer-screen__link">
              <span class="drawer-screen__link-icon">
                <svg role="img">
                  <use href="<?php echo get_bloginfo('template_url') ?>/dist/images/sprite.svg#menu-contacts"></use>
                </svg>
              </span>
              <span class="drawer-screen__link-title">Контакты</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
        </div>
        <div class="drawer-screen__text">
          <p>Наши адреса:</p>
          <p>г.&nbsp;Воронеж, Плехановская,&nbsp;52</p>
          <p>г.&nbsp;Воронеж, п.&nbsp;Отрадное, пер-к&nbsp;Тамбовский,&nbsp;25</p>
        </div>
      </div>
      <div class="drawer-screen drawer-screen_deep" data-parent="services">
        <div class="drawer-screen__list">
          <div class="drawer-screen__list-item">
            <a class="drawer-screen__link" data-next="root">
              <span class="drawer-screen__link-icon">
                <button class="drawer-screen__arrow-previous"></button>
              </span>
              <span class="drawer-screen__link-title">Назад</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
          <div class="drawer-screen__list-item">
            <a href="<?php the_permalink(24) ?>" class="drawer-screen__link">
              <span class="drawer-screen__link-icon"></span>
              <span class="drawer-screen__link-title">Выезд на место ДТП</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
          <div class="drawer-screen__list-item">
            <a href="<?php the_permalink(26) ?>" class="drawer-screen__link">
              <span class="drawer-screen__link-icon"></span>
              <span class="drawer-screen__link-title">Оформление документов</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
          <div class="drawer-screen__list-item">
            <a href="<?php the_permalink(28) ?>" class="drawer-screen__link">
              <span class="drawer-screen__link-icon"></span>
              <span class="drawer-screen__link-title">Выплаты в день обращения</span>
            </a>
            <span class="drawer-screen__list-item-arrow"></span>
          </div>
        </div>
      </div>
    </div>

    <button class="header__toggle js-drawer-toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <a href="/" class="header__logo">
      <span class="header__logo-name"><?php the_field('site_name', 'options') ?></span>
      <span class="header__logo-desc"><?php the_field('site_description', 'options') ?></span>
    </a>

    <nav class="header-nav">
      <?php wp_nav_menu([
        'theme_location' => 'mainmenu',
        'container' => false
      ]); ?>
      <div class="header-nav__target"></div>
    </nav>

    <?php if ($main_phone = get_field('main_phone', 'options')): ?>
    <a href="tel:<?php echo $main_phone['number'] ?>" class="header__phone">
      <span class="header__phone-value"><?php echo $main_phone['number'] ?></span>
      <span class="header__phone-desc"><?php echo $main_phone['description'] ?></span>
    </a>
    <?php endif; ?>

    <button class="header__callback js-call-or-modal" data-tel="+74732949777" data-modal="modal-feedback">
      <?php icon('header-phone', [16, 17]) ?>
    </button>
  </div>
</header>
