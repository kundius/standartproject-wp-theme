<?php
$referer = '/';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
}
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body class="page-404">
    <?php get_template_part('partials/header'); ?>

    <section class="page-404-section">
      <div class="ui-container">
        <div class="page-404-content">
          <div class="page-404-number">4<span>x</span>4</div>
          <div class="page-404-desc">
            <span>Страница не найдена.</span><br />
            Перейдите на другие страницы<br />
            или вызовите помощь:
          </div>
          <div class="page-404-call">
            <button class="ui-button-primary" data-micromodal-trigger="modal-cause">
              Вызвать комиссара<span class="ui-button-primary__icon"><?php icon('intro-phone', [18, 21]) ?></span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <?php get_template_part('partials/footer') ?>
  </body>
</html>
