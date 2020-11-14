<?php
/**
 * Template Name: Sign
 *
 */

 
defined( 'ABSPATH' ) || die( "Can't access directly" );

$grid_gap = get_theme_mod( 'sidebar_gap', 'medium' );

get_header();

?>

<div id="content">

	<?php do_action( 'wpbf_content_open' ); ?>

	<?php wpbf_inner_content(); ?>

		<?php do_action( 'wpbf_inner_content_open' ); ?>

		<div class="wpbf-grid wpbf-main-grid wpbf-grid-<?php echo esc_attr( $grid_gap ); ?>">

			<?php do_action( 'wpbf_sidebar_left' ); ?>

			<main id="main" class="wpbf-main wpbf-medium-2-3<?php echo wpbf_singular_class(); ?>">

				<?php do_action( 'wpbf_main_content_open' ); ?>

				<?php wpbf_title(); ?>

				<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="entry-content" itemprop="text">

					<?php do_action( 'wpbf_entry_content_open' ); ?>

                    <div class="wpbf-grid">
                        <div class="wpbf-1-2">
							<?php
								$redirect_to = '';
								if ( !is_user_logged_in() ) {
							?>
							<form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
								<p>Username: <input id="user_login" type="text" size="20" value="" name="log"></p>
								<p>Password: <input id="user_pass" type="password" size="20" value="" name="pwd"></p>
								<p><input id="rememberme" type="checkbox" value="forever" name="rememberme"></p>

								<p><input id="wp-submit" type="submit" value="Login" name="wp-submit"></p>

								<input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
								<input type="hidden" value="1" name="testcookie">
							</form>
							<?php } else {
								echo 'You are loggedin';
							}
							?>
                        </div>

                        <div class="wpbf-1-2">
                            <?php the_content(); ?>
                        </div>
                    </div>

					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'page-builder-framework' ),
						'after'  => '</div>',
					) );
					?>

					<?php do_action( 'wpbf_entry_content_close' ); ?>

				</div>

				<?php endwhile; endif; ?>

				<?php comments_template(); ?>

				<?php do_action( 'wpbf_main_content_close' ); ?>

			</main>

			<?php do_action( 'wpbf_sidebar_right' ); ?>

		</div>

		<?php do_action( 'wpbf_inner_content_close' ); ?>

	<?php wpbf_inner_content_close(); ?>

	<?php do_action( 'wpbf_content_close' ); ?>

</div>

<?php get_footer(); ?>