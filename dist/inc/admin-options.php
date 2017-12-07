<?php


// Add options theme
function theme_admin_options() {
	register_setting( 'theme', 'tag-head' );
	register_setting( 'theme', 'tag-body-footer' );
	register_setting( 'theme', 'href_contact' );
	register_setting( 'theme', 'contact' );
	register_setting( 'theme', 'tel' );
	register_setting( 'theme', 'mail' );
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
						<label for="contact"><?php _e('Contact','webmat') ?></label>
					</th>
					<td>
						<input type="text" id="contact" name="contact" size="25" value="<?php echo get_option( 'contact' ); ?>" /> <small><?php _e('example: Contact us','webmat') ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="href_contact"><?php _e('URL Contact','webmat') ?></label>
					</th>
					<td>
						<input type="text" id="href_contact" name="href_contact" size="50" value="<?php echo get_option( 'href_contact' ); ?>" /> <small><?php _e('example: https://exemple.com/contact/','webmat') ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="tel"><?php _e('Phone','webmat') ?></label>
					</th>
					<td>
						<input type="text" id="tel" name="tel" size="20" value="<?php echo get_option( 'tel' ); ?>" /> <small><?php _e('example: 06 00 00 00 00','webmat') ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="mail"><?php _e('Mail','webmat') ?></label>
					</th>
					<td>
						<input type="email" id="mail" name="mail" size="50" value="<?php echo get_option( 'mail' ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="tag-head"><?php _e('Tag Header','webmat') ?></label>
					</th>
					<td>

						<textarea rows="8" cols="140" id="tag-head" class="widefat" name="tag-head"><?php echo get_option( 'tag-head' ); ?></textarea>

						<p><small><?php esc_html_e('Only HTML code for include it in <head></head>','webmat') ?></small></p>

					</td>

				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="tag-body-footer"><?php _e('Tag Footer','webmat') ?></label>
					</th>
					<td>

						<textarea rows="8" cols="140" id="tag-body-footer" class="widefat" name="tag-body-footer"><?php echo get_option( 'tag-body-footer' ); ?></textarea>

						<p><small><?php esc_html_e('Only HTML code for include it in <footer></footer>','webmat') ?></small></p>

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
