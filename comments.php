<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
      return;
}
?>

<div id="comments" class="comments-area">

      <?php if (have_comments()) : ?>
            <h2 class="comments-title">
                  <?php
                        printf(
                              _nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'tailpress'),
                              number_format_i18n(get_comments_number()),
                              get_the_title()
                        );
                        ?>
            </h2>

            <ol class="comment-list">
                  <?php
                        wp_list_comments(array(
                              'style'      => 'ol',
                              'short_ping' => true,
                              'avatar_size' => 56,
                        ));
                        ?>
            </ol>

      <?php endif; // Check for have_comments(). 
      ?>

      <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through. 
            ?>

            <nav class="comment-navigation" id="comment-nav-above">

                  <h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'tailpress'); ?></h1>

                  <?php if (get_previous_comments_link()) { ?>
                        <div class="nav-previous">
                              <?php previous_comments_link(__('&larr; Older Comments', 'tailpress')); ?>
                        </div>
                  <?php } ?>

                  <?php if (get_next_comments_link()) { ?>
                        <div class="nav-next">
                              <?php next_comments_link(__('Newer Comments &rarr;', 'tailpress')); ?>
                        </div>
                  <?php } ?>

            </nav><!-- #comment-nav-above -->

      <?php endif; // check for comment navigation. 
      ?>

      <?php
      // If comments are closed and there are comments, let's leave a little note, shall we?
      if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'tailpress'); ?></p>
      <?php endif; ?>

      <?php 
            comment_form(array(
                  'class_submit' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4',
                  'comment_field' => '<textarea id="comment" name="comment" class="bg-gray-200 w-full py-2 px-3" aria-required="true"></textarea>',
            )); 
      ?>

</div>