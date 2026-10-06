<?php
/**
 * Synnovatia Child theme functions.
 *
 * Loads the GeneratePress parent stylesheet, then the child stylesheet
 * (tokens + base type), then the exact Google Fonts used in the mockups.
 * Keep all styling in style.css — nothing inline per page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

add_action( 'wp_enqueue_scripts', 'synnovatia_enqueue_styles' );
function synnovatia_enqueue_styles() {

	// 1. GeneratePress parent stylesheet.
	wp_enqueue_style(
		'generatepress-style',
		get_template_directory_uri() . '/style.css',
		array(),
		filemtime( get_template_directory() . '/style.css' )
	);

	// 2. Child stylesheet (design tokens + base typography + components).
	wp_enqueue_style(
		'synnovatia-child',
		get_stylesheet_uri(),
		array( 'generatepress-style' ),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	// 3. Brand fonts — exact families/weights/axes from the approved mockups.
	//    Fraunces (display) · Barlow (body) · Barlow Condensed (labels).
	wp_enqueue_style(
		'synnovatia-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Barlow+Condensed:wght@500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,700&display=swap',
		array(),
		null
	);
}

// Preconnect to Google Fonts for slightly faster loads.
add_filter( 'wp_resource_hints', 'synnovatia_resource_hints', 10, 2 );
function synnovatia_resource_hints( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $hints;
}

// Force the real site menu ("Main Menu", ID 3) to render wherever the theme
// asks for the "primary" location. On this install the Appearance > Menus
// location-assignment screen accepts the save (correct nonce, correct field)
// but the assignment doesn't persist — wp_get_nav_menu_locations() still
// comes back empty on the next load, so GeneratePress falls back to its
// default page-listing behavior. Rather than chase that further, this
// filter just tells wp_nav_menu() which menu to use directly; an explicit
// 'menu' argument always wins over theme_location lookup, so it works
// regardless of the underlying bug. Fixes the header on every page that
// relies on the theme's native menu output (taxonomy archives, single
// posts, search, 404, etc.) — pages with their own hardcoded nav in their
// content are unaffected either way.
add_filter( 'wp_nav_menu_args', 'synnovatia_force_primary_menu' );
function synnovatia_force_primary_menu( $args ) {
	if ( isset( $args['theme_location'] ) && 'primary' === $args['theme_location'] ) {
		$args['menu'] = 3;
	}
	return $args;
}

// Real Topic Archive template — renders every "topic" taxonomy term
// (Strategy & Planning, Growth & Scaling, etc.) from one place instead of
// the six one-off "Preview: ... Archive" pages built while proving this
// out. Hooks in early and takes over the page output only for topic
// archives; every other page (posts, pages, other archives) is untouched.

// Reuse the Blog Post Card's already-compiled styles (gold label, teal
// button, full-height image) — these classes are shared across every page
// that uses the pattern, this just makes sure the stylesheet is present
// on a taxonomy archive too, which GenerateBlocks doesn't compile one for
// on its own.
add_action( 'wp_enqueue_scripts', 'synnovatia_topic_archive_styles' );
function synnovatia_topic_archive_styles() {
	if ( is_tax( 'topic' ) ) {
		wp_enqueue_style(
			'synnovatia-blog-post-card',
			home_url( '/wp-content/uploads/generateblocks/style-11852.css' ),
			array(),
			null
		);
	}
}

// No sidebar on topic archives — full-width to match the rest of the blog.
add_filter( 'generate_sidebar_layout', 'synnovatia_topic_archive_no_sidebar' );
function synnovatia_topic_archive_no_sidebar( $layout ) {
	if ( is_tax( 'topic' ) ) {
		return 'no-sidebar';
	}
	return $layout;
}

add_action( 'template_redirect', 'synnovatia_render_topic_archive' );
function synnovatia_render_topic_archive() {
	if ( ! is_tax( 'topic' ) ) {
		return;
	}

	$term = get_queried_object();

	get_header();
	?>
	<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<div style="background:#0D1F4E; padding:48px 40px; margin-bottom:32px;">
		<div style="color:#F5C842; font-family:'Barlow Condensed',sans-serif; text-transform:uppercase; letter-spacing:1.5px; font-size:13px; font-weight:600; margin-bottom:12px;">Notes from the Messy Middle &nbsp;/&nbsp; <?php echo esc_html( $term->name ); ?></div>
		<h1 style="color:#ffffff; font-family:'Fraunces',Georgia,serif; font-size:40px; font-weight:700; margin:0 0 16px 0;"><?php echo esc_html( $term->name ); ?></h1>
		<?php if ( $term->description ) : ?>
		<p style="color:#E8ECF5; font-family:'Barlow',Arial,sans-serif; font-size:17px; max-width:640px; margin:0;"><?php echo esc_html( $term->description ); ?></p>
		<?php endif; ?>
	</div>

	<style>
	.gb-loop-item { margin-bottom: 32px !important; }
	.wp-block-group__inner-container { padding-top: 0 !important; padding-bottom: 0 !important; }
	</style>

	<?php
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$topic_query = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 8,
		'paged'          => $paged,
		's'              => isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '',
		'tax_query'      => array( array(
			'taxonomy' => 'topic',
			'terms'    => $term->term_id,
		) ),
	) );

	$pattern_content = get_post_field( 'post_content', 11896 );

	if ( $topic_query->have_posts() ) :
		while ( $topic_query->have_posts() ) : $topic_query->the_post();
			echo '<div class="gb-loop-item">';
			echo do_blocks( $pattern_content );
			echo '</div>';
		endwhile;

		if ( function_exists( 'wp_pagenavi' ) ) {
			wp_pagenavi( array( 'query' => $topic_query ) );
		}

		wp_reset_postdata();
	else :
		echo '<p style="padding:0 40px;">No posts found for this topic yet.</p>';
	endif;
	?>

	</main>
	</div>
	<?php
	get_footer();
	exit;
}

/**
 * Staging Topic Archive template — paste into the Synnovatia Child theme's functions.php
 * (Appearance > Theme File Editor, or via your hosting file manager / SFTP if you prefer not
 * to use the in-admin editor). Mirrors the production build's approach: since the Site
 * Editor here has no Templates screen, a template_redirect hook renders the archive
 * directly, reusing the "Blog Post Card" pattern (post ID 11896) for every post.
 *
 * Safe to append to the end of the file, after existing code.
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
add_action( 'pre_get_posts', function( $query ) {

	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! is_tax( 'topic' ) ) {
		return;
	}

	if ( ! empty( $_GET['s'] ) ) {
		$query->set( 's', sanitize_text_field( wp_unslash( $_GET['s'] ) ) );
	}
} );

add_action( 'generate_after_header', function() {
    if ( is_tax( 'topic' ) ) {
        echo '<a href="/schedule-a-conversation/" class="topic-archive-cta">Schedule a Conversation</a>';
    }
} );

/* ===== Synnovatia: Single Post Template — dynamic pieces (added 2026-08-30) ===== */

// Full custom nav on single blog posts, matching the rest of the site exactly.
// The theme's own header is hidden via CSS for body.single-post (see Customizer Additional CSS) —
// this replaces it with the same real <nav> markup every other page on the site uses.
add_action( 'wp_body_open', function() {
	if ( ! ( is_single() && get_post_type() === 'post' ) ) {
		return;
	}
	echo '<nav class="spt-nav">';
echo '<a href="/" class="spt-nav-logo"><img src="https://www.synnovatia.com/wp-content/uploads/2026/08/synnovatia-logo-nav-e1787756796460.png" alt="Synnovatia"></a>';
	echo '<ul class="spt-nav-links">';
	echo '<li><a href="/about/">About</a></li>';
	echo '<li><a href="/the-messy-middle/">The Messy Middle</a></li>';
	echo '<li class="spt-has-dropdown"><a href="/work-with-me/">Work Together</a><ul class="spt-nav-dropdown">';
	echo '<li><a href="/work-with-me/">One-to-One Coaching</a></li>';
	echo '<li><a href="/mastermind-for-the-messy-middle/">Mastermind for the Messy Middle</a></li>';
	echo '<li><a href="/seven-figure-forum/">Seven Figure Forum</a></li>';
	echo '</ul></li>';
	echo '<li><a href="/business-coaching-blog/" class="spt-active" aria-current="page">Perspective</a></li>';
	echo '</ul>';
	echo '<a href="/schedule-a-conversation/" class="spt-nav-cta">Schedule a Conversation</a>';
	echo '</nav>';
} );

// Real site footer on single blog posts — same markup/style as every other page (About,
// Work With Me, etc.), since the theme's own footer only shows a bare "Built with GeneratePress"
// credit line that we're already hiding via CSS.
add_action( 'wp_footer', function() {
	if ( ! ( ( is_single() && get_post_type() === 'post' ) || is_page( array( 11921, 11924 ) ) ) ) {
		return;
	}
	echo '<footer class="site-footer">';
	echo '<div class="footer-logo"><img src="https://www.synnovatia.com/wp-content/uploads/2026/08/synnovatia-logo-footer-e1787756917923.png" alt="Synnovatia"></div>';
	echo '<div class="footer-copy">&copy; Synnovatia 2026 &middot; Strategic Business Coaching &middot; 310.519.1947 &middot; info@synnovatia.com</div>';
	echo '</footer>';
} );

// Topic breadcrumb + topic tag + related posts + Browse by Topic + closing CTA
add_filter( 'the_content', function( $content ) {
	static $rendering = false;
	if ( $rendering ) {
		return $content;
	}
	if ( ! ( is_single() && is_main_query() && in_the_loop() && get_post_type() === 'post' ) ) {
		return $content;
	}
	$rendering = true;

	$post_id   = get_the_ID();
	$terms     = get_the_terms( $post_id, 'topic' );
	$topic_ids = array();
	$crumb     = '';
	$tag_row   = '';
	$after     = '';

	if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
		$crumb_links = array();
		foreach ( $terms as $term ) {
			$topic_ids[]   = $term->term_id;
			$crumb_links[] = '<a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a>';
		}
		$crumb = '<div class="spt-crumb"><a href="/business-coaching-blog/">Notes from the Messy Middle</a> &nbsp;/&nbsp; ' . implode( ', ', $crumb_links ) . '</div>';

		$tag_row = '<div class="spt-tag-row">';
		foreach ( $terms as $term ) {
			$tag_row .= '<a class="spt-tag" href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a> ';
		}
		$tag_row .= '</div>';
	}

	// Related posts — same topic, excluding the current post, via the existing "Blog Post Card" pattern (post ID 11896)
	if ( ! empty( $topic_ids ) ) {
		$related = new WP_Query( array(
			'post_type'      => 'post',
			'post__not_in'   => array( $post_id ),
			'posts_per_page' => 3,
			'orderby'        => 'date',
			'order'          => 'DESC',
			'no_found_rows'  => true,
			'tax_query'      => array( array(
				'taxonomy' => 'topic',
				'field'    => 'term_id',
				'terms'    => array( $terms[0]->term_id ),
			) ),

		) );

if ( $related->have_posts() ) {
			$after .= '<section class="spt-related"><div class="spt-related-inner">';
			$after .= '<h2 class="spt-related-head">More From ' . esc_html( $terms[0]->name ) . '</h2>';
			$after .= '<div class="spt-related-grid">';
			while ( $related->have_posts() ) {
				$related->the_post();
				$r_terms = get_the_terms( get_the_ID(), 'topic' );
				$r_label = ( ! is_wp_error( $r_terms ) && ! empty( $r_terms ) ) ? implode( ', ', wp_list_pluck( $r_terms, 'name' ) ) : '';
				$r_img   = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

				$after .= '<div class="spt-r-card">';
				if ( $r_img ) {
					$after .= '<img class="spt-r-img" src="' . esc_url( $r_img ) . '" alt="' . esc_attr( get_the_title() ) . '">';
				}
				if ( $r_label ) {
					$after .= '<div class="spt-r-label">' . esc_html( $r_label ) . '</div>';
				}
				$after .= '<h3 class="spt-r-title"><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h3>';
				$after .= '<p class="spt-r-excerpt">' . esc_html( wp_trim_words( get_the_excerpt(), 22 ) ) . '</p>';
				$after .= '<a class="spt-r-link" href="' . esc_url( get_permalink() ) . '">Read the full story &rarr;</a>';
				$after .= '</div>';
			}
			$after .= '</div></div></section>';
			wp_reset_postdata();
		}
	}

	// Browse by Topic band
	$topics = array(
		'strategy-planning'          => 'Strategy &amp; Planning',
		'growth-scaling'             => 'Growth &amp; Scaling',
		'sales-marketing'            => 'Sales &amp; Marketing',
		'people-partnerships'        => 'People &amp; Partnerships',
		'mindset-resilience'         => 'Mindset &amp; Resilience',
		'ownership-entrepreneurship' => 'Ownership &amp; Entrepreneurship',
	);
	$after .= '<section class="spt-topics"><div class="spt-topics-eyebrow">Browse by Topic</div>';
	foreach ( array_chunk( $topics, 3, true ) as $row ) {
		$parts = array();
		foreach ( $row as $slug => $name ) {
			$parts[] = '<a class="spt-topic" href="/topic/' . $slug . '/">' . $name . '</a>';
		}
		$after .= '<div class="spt-topics-row">' . implode( '<span class="spt-topic-dot">&bull;</span>', $parts ) . '</div>';
	}
	$after .= '</section>';

	// Closing CTA
	$after .= '<section class="spt-cta">';
	$after .= '<h2 class="spt-cta-h2">Stuck somewhere in the Middle?</h2>';
	$after .= '<p class="spt-cta-sub">Strategy is easier with someone who has seen this stretch before. Let&rsquo;s talk about where your business is headed.</p>';
	$after .= '<a class="spt-cta-btn" href="/schedule-a-conversation/">Start the Conversation</a>';
	$after .= '</section>';

	$rendering = false;
	return '<div class="spt-article">' . $crumb . $content . $tag_row . '</div>' . $after;
}, 20 );

add_action( 'init', function () {
    if ( ! taxonomy_exists( 'topic' ) ) { return; }
    $rules = get_option( 'rewrite_rules' );
    if ( ! is_array( $rules ) ) { return; }
    foreach ( array_keys( $rules ) as $pattern ) {
        if ( strpos( $pattern, 'topic/' ) === 0 ) { return; }
    }
    flush_rewrite_rules( false );
}, 99 );
