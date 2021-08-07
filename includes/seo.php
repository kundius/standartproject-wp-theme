<?php

add_filter('style_loader_tag', 'sj_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'sj_remove_type_attr', 10, 2);
function sj_remove_type_attr ($tag) {
  return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

remove_action('wp_head', 'rel_canonical');

function seo_canonical () {
  if (!is_singular())  return;

  $id = get_queried_object_id();

  if (0 === $id) return;

  $url = wp_get_canonical_url($id);

  if (!empty($url)) {
    echo '<link rel="canonical" itemprop="url" href="' . esc_url( $url ) . '" />' . "\n";
  }
}

function seo () {
  $title = '';
  $description = '';
  $keywords = '';

  if (is_archive()) {
    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    if ($term) {
      $title = get_field('seo_title', $term->taxonomy . '_' . $term->term_id);
      if (empty($title)) {
        $title = $term->name;
      }
      $description = get_field('seo_description', $term->taxonomy . '_' . $term->term_id);
      $keywords = get_field('seo_keywords', $term->taxonomy . '_' . $term->term_id);
    } elseif (is_post_type_archive()) {
      $title = get_queried_object()->labels->name;
    } elseif (is_day()) {
      $title = sprintf(__('Daily Archives: %s', 'roots'), get_the_date());
    } elseif (is_month()) {
      $title = sprintf(__('Monthly Archives: %s', 'roots'), get_the_date('F Y'));
    } elseif (is_year()) {
      $title = sprintf(__('Yearly Archives: %s', 'roots'), get_the_date('Y'));
    } elseif (is_author()) {
      $author = get_queried_object();
      $title = sprintf(__('Author Archives: %s', 'roots'), $author->display_name);
    } else {
      $title = single_cat_title('', false);
    }
  } elseif (is_search()) {
    $title = sprintf(__('Search Results for %s', 'roots'), get_search_query());
  } elseif (is_404()) {
    $title = 'Not Found';
  } else {
    $title = get_field('seo_title');
    if (empty($title)) {
      $title = get_the_title();
    }
    $description = get_field('seo_description');
    $keywords = get_field('seo_keywords');
  }

  echo '<title>' . $title . '</title>';
  if (!empty($keywords)) {
    echo '<meta name="keywords" content="' . $keywords . '">';
  }
  if (!empty($description)) {
    echo '<meta name="description" content="' . $description . '">';
  }
}
