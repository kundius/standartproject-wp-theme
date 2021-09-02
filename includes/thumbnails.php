<?php

add_theme_support('post-thumbnails', array('post', 'page', 'project'));
add_image_size('w400', 400, 9999, false);
add_image_size('360x240', 360, 240, true);

function srcset($image, $wh) {
  $wh = !empty($wh) ? $wh : ['thumbnail', 'medium', 'large', 'w400', '360x240'];

  $srcset = [];
  foreach ($wh as $size) {
    $srcset[] = $image['sizes'][$size] . ' ' . $image['sizes'][$size . '-width'] . 'w';
  }
  $srcset[] = $image['url'] . ' ' . $image['width'] . 'w';

  $sizes = [];
  foreach ($wh as $size) {
    $sizes[] = '(max-width: ' . $image['sizes'][$size . '-width'] . 'px) ' . $image['sizes'][$size . '-width'] . 'px';
  }
  $sizes[] = $image['width'] . 'px';

  return 'srcset="' . implode(', ', $srcset) . '" ' . 'sizes="' . implode(', ', $sizes) . '"';
}
