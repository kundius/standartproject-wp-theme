<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php the_field('head', 'options') ?>
<?php seo() ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" />
<?php wp_head() ?>
<?php seo_canonical() ?>
<meta itemprop="name" content="<?php bloginfo('blogname') ?>" />
<meta itemprop="description" content="<?php bloginfo('description') ?>" />
