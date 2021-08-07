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

    <main class="main">
      <section class="page-section">
        <div class="ui-container">
          <h1 class="page-title"><?php the_title() ?></h1>
        
          <div class="page-content content">
            <?php the_content() ?>
          </div>
        </div>
      </section>

      <section class="section-advantages">
        <div class="ui-container">
          <?php get_template_part('partials/advantages'); ?>
        </div>
      </section>
    </main>

    <?php get_template_part('partials/footer'); ?>
  </body>
</html>
