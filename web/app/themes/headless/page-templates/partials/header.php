<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- meta name="robots" content="NOINDEX,NOFOLLOW" / -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<?php wp_head(); ?>
<?php // get_header(); ?>
<?php
  $post = get_post($post_id);
  $title = $post->post_title;
  $posttype = $post->post_type;
  $permalink = get_permalink($post_id);
  $user = wp_get_current_user();
?>
