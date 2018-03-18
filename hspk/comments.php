<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HSPK
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="post-comments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'hspk' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3><!-- .comments-title -->


		<ul class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ul', 'short_ping' => true, 'callback' => 'h2_comments' ) ); ?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'hspk' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'hspk' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'hspk' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'hspk' ); ?></p>
	<?php endif; ?>

</div><!-- #comments -->

<div class="post-comment-respond">
<?php 
$comment_args = array( 

	'title_reply'=>'Leave a Comment' ,

	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="row"><div class="column width-4 comment-form-author">' . '<input id="author" name="author" type="text" class="form-name form-element" placeholder="Name*" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . '></div>',   
		'email'  => '<div class="column width-4 comment-form-email">' . '<input id="email" name="email" type="email" class="form-email form-element" placeholder="Email*" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . '></div>',
		'url'  => '<div class="column width-4 comment-form-url">' . '<input id="url" name="url" type="text" class="form-website form-element" placeholder="Website" value="' . esc_attr(  $commenter['comment_author_url'] ) . '"' . $aria_req . '></div></div>',
	) ),

    'comment_field' => '<div class="row mb-50"><div class="column width-12">' . '<textarea id="comment" name="comment" class="form-message form-element" placeholder="Message*" aria-required="true"></textarea>' . '</div></div>',
    'comment_notes_after' => '',
);

comment_form($comment_args); ?>
</div>