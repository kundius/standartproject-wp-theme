<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="page-section">
        <div class="container">
          <h1 class="page-section__title"><?php the_title() ?></h1>

          <div class="page-section__content content">
            <?php the_content() ?>
          </div>
        </div>
      </section>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
