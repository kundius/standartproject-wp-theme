<?php

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'Параметры',
    'menu_title' => 'Параметры',
    'menu_slug' => 'acf-options',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}
