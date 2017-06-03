<?php 

function codexin_comment_function($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment; ?>
 <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div id="comment-<?php comment_ID(); ?>">

    <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='48',$default='http://www.surgeenterprise.com/wp-content/uploads/2017/04/user-avatar.png' ); ?>
    </div>

    <div class="comment-info">

      <?php printf(__('<span class="fn">%s</span>'), get_comment_author_link()) ?>

      <div class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?> -- </div>

      <div class="reply">
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>

    </div>


   <?php if ($comment->comment_approved == '0') : ?>
     <em><?php _e('Your comment is awaiting moderation.') ?></em>
     <br />
   <?php endif; ?>
  
  <div class="comment-text">
    <?php comment_text() ?>
  </div>

   
 </div>
 <?php
}