<?php


// Add options theme
function theme_admin_options() {
	register_setting( 'theme', 'tag-head' );
	register_setting( 'theme', 'tag-body-footer' );
}
add_action( 'admin_init', 'theme_admin_options' );

// Add menu in admin
function theme_admin_menu() {
	add_theme_page(
		__('Theme Settings','webmat'),
		__('Theme Settings','webmat'),
		'administrator',
		'theme-options',
		'admin_page_theme'
	);
}
add_action( 'admin_menu', 'theme_admin_menu' );



// Add page in admin
function admin_page_theme() {
?>
	<div class="wrap">
		<h2><?php _e('Options','webmat') ?></h2>

		<form method="post" action="options.php">
			<?php settings_fields( 'theme' ); ?>

			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<label for="tag-head"><?php _e('Tag Header','webmat') ?></label>
					</th>
					<td>

						<textarea rows="8" cols="140" id="tag-head" class="widefat" name="tag-head"><?php echo get_option( 'tag-head' ); ?></textarea>

						<p><small><?php esc_html_e('Only HTML code for include just before the end of </head>','webmat') ?></small></p>

					</td>

				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="tag-body-footer"><?php _e('Tag Body','webmat') ?></label>
					</th>
					<td>

						<textarea rows="8" cols="140" id="tag-body-footer" class="widefat" name="tag-body-footer"><?php echo get_option( 'tag-body-footer' ); ?></textarea>

						<p><small><?php esc_html_e('Only HTML code for include just before the end of </body>','webmat') ?></small></p>

					</td>

				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Update','webmat') ?>" />
			</p>
		</form>
	</div>
<?php
}



?>
