<?php
/*
Template Name: Услуга
*/
$parentID = wp_get_post_parent_id(get_the_ID());
$pagelist = get_pages('sort_column=menu_order&sort_order=asc&parent=' . $parentID);
$pages = array();
foreach ($pagelist as $page) {
   $pages[] += $page->ID;
}

$current = array_search(get_the_ID(), $pages);
$prevID = !empty($pages[$current-1]) ? $pages[$current-1] : null;
$nextID = !empty($pages[$current+1]) ? $pages[$current+1] : null;
?>
<!DOCTYPE html>
<html lang="ru" itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head'); ?>
  </head>
  <body>
    <div class="wrapper">
      <?php get_template_part('partials/header'); ?>

      <section class="service">
        <div class="container">
          <div class="service__nav-start">
            <div class="service-nav">
              <a href="<?php echo get_permalink($parentID) ?>" class="service-nav__parent">Назад</a>
              <?php if (!empty($nextID)): ?>
              <a href="<?php echo get_permalink($nextID) ?>" class="service-nav__next"><?php echo get_the_title($nextID) ?></a>
              <?php endif; ?>
            </div>
          </div>

          <h1 class="service__title"><?php the_title() ?></h1>

          <div class="service__content content">
            <?php the_content() ?>
          </div>

          <div class="service__nav-end">
            <div class="service-nav">
              <div class="service-nav__parent">
                <a href="<?php echo get_permalink($parentID) ?>">Назад</a>
              </div>
              <?php if (!empty($nextID)): ?>
              <div class="service-nav__next">
                <a href="<?php echo get_permalink($nextID) ?>"><?php echo get_the_title($nextID) ?></a>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </section>

      <?php get_template_part('partials/footer'); ?>
    </div>
  </body>
</html>
