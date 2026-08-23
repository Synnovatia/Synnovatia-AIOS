/**
 * Staging Topic Archive template — paste into the Synnovatia Child theme's functions.php
 * (Appearance > Theme File Editor, or via your hosting file manager / SFTP if you prefer not
 * to use the in-admin editor). Mirrors the production build's approach: since the Site
 * Editor here has no Templates screen, a template_redirect hook renders the archive
 * directly, reusing the "Blog Post Card" pattern (post ID 11896) for every post.
 *
 * IMPORTANT: do NOT include a "<?php" opening tag when you paste this — the file is
 * already inside PHP mode from its own opening tag at the very top, so a second one
 * here is a syntax error. Paste starting from the comment block below.
 * Safe to append to the very end of the file, after all existing code.
 */

add_action( 'template_redirect', function() {

	if ( ! is_tax( 'topic' ) ) {
		return;
	}

	$term = get_queried_object();

	get_header();
	?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section style="background:#0D1F4E; padding:64px 24px; text-align:center;">
				<div style="color:#F5C842; font-family:'Barlow Condensed',sans-serif; text-transform:uppercase; letter-spacing:1.5px; font-size:13px; margin-bottom:12px;">
					Notes from the Messy Middle
				</div>
				<h1 style="color:#fff; font-family:'Fraunces',Georgia,serif; font-size:36px; margin:0 0 16px;">
					<?php echo esc_html( $term->name ); ?>
				</h1>
				<?php if ( ! empty( $term->description ) ) : ?>
					<p style="color:#EDEDED; font-family:'Barlow',sans-serif; font-size:16px; max-width:640px; margin:0 auto;">
						<?php echo esc_html( $term->description ); ?>
					</p>
				<?php endif; ?>
			</section>

			<div style="max-width:800px; margin:0 auto; padding:48px 24px;">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<div style="margin-bottom:32px;">
							<?php echo do_blocks( get_post_field( 'post_content', 11896 ) ); ?>
						</div>
					<?php endwhile; ?>

					<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>
						<?php wp_pagenavi(); ?>
					<?php endif; ?>

				<?php else : ?>
					<p>No posts found for this topic yet.</p>
				<?php endif; ?>

			</div>

		</main>
	</div>

	<?php
	get_footer();
	exit;
} );
