<?php

add_action('enqueue_block_editor_assets', 'blocks_assets');
function blocks_assets () {
  wp_enqueue_script(
    'block-button-with-arrow-script',
    get_template_directory_uri() . '/blocks/button-with-arrow.js',
    array('wp-blocks', 'wp-element'),
    filemtime(dirname(dirname(__FILE__)) . '/blocks/button-with-arrow.js')
  );

  wp_enqueue_style(
    'block-button-with-arrow-style',
    get_template_directory_uri() . '/blocks/button-with-arrow.css',
    array('wp-edit-blocks'),
    filemtime(dirname(dirname(__FILE__)) . '/blocks/button-with-arrow.css')
  );
}
