<?php
require_once(__DIR__ . '/includes/acf.php');
require_once(__DIR__ . '/includes/thumbnails.php');
require_once(__DIR__ . '/includes/seo.php');
require_once(__DIR__ . '/includes/editor-blocks.php');

// add_filter('wpcf7_load_js', '__return_false');
// add_filter('wpcf7_load_css', '__return_false');

add_action('after_setup_theme', function() {
  register_nav_menus([
    'mainmenu' => 'Основное меню',
    'footermenu' => 'Меню в подвале',
    'sitemap' => 'Карта сайта'
  ]);
});

add_post_type_support('page', 'excerpt');

function template_part ($atts, $content = null) {
  $tp_atts = shortcode_atts(['path' =>  null], $atts);
  ob_start();
  get_template_part($tp_atts['path']);
  $ret = ob_get_contents();
  ob_end_clean();
  return $ret;
}
add_shortcode('template_part', 'template_part');

add_filter('navigation_markup_template', 'navigation_template', 10, 2);
function navigation_template ($template, $class) {
  return '<nav class="%1$s" role="navigation"><div class="nav-links">%3$s</div></nav>';
}

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');

function is_new_year()
{
  if (date('m') === '12' && date('d') >= '20') {
    return true
  }
  if (date('m') === '01' && date('d') <= '10') {
    return true
  }
  return false
}
