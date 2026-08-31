/**
 * Staging Topic Archive search — paste into the Synnovatia Child theme's functions.php,
 * right after the template_redirect block from 2026-08-21-staging-topic-archive-template.php.
 *
 * IMPORTANT: do NOT include a "<?php" opening tag when you paste this — same rule as the
 * template snippet, the file is already inside PHP mode. Paste starting from the comment
 * block below, appended to the very end of the file.
 *
 * What this does: the "Search This Topic" box already built into each archive's hero
 * submits a real GET request to the same page with ?s=<query> (name="s", method="get",
 * action=""), but nothing was reading that parameter — search box looked live, did
 * nothing. This hooks the topic archive's main query and, when ?s is present, adds it
 * as a real WordPress search on top of the existing topic filter — so submitting the
 * box narrows the same post list to ones matching both the topic AND the search term.
 */

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
