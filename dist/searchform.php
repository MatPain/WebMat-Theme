<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'webmat' ); ?>">

		<button class="button btn  btn-primary"><i class="fa fa-search"></i></button>
	</div>
</form>