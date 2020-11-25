<?php
/**
 * Description Of File
 *
 * @package ${NAMESPACE}
 *
 * @since 1.0.0
 *
 * @author LionHeart Development
 *
 * @link https://lionheartdevs.com/
 *
 * @license GPL-2.0+
 */


namespace LionHeart\CustomProducts\Custom;


function stripe_submenu_settings_setup() {

	add_submenu_page(
		'edit.php?post_type=products',
		__( 'Stripe Settings', 'customproducts' ),
		__( 'Stripe Settings', 'customproducts' ),
		'manage_options',
		'stripe-settings-keys',
		'simple_products_stripe_render_options_page'
	);
}

function simple_products_stripe_render_options_page() {
	global $stripe_options;
	?>
	<div class="wrap">
	<h1><?php _e('Stripe Settings', 'customproducts'); ?></h1>
	<form method="post" action="options.php">

		<?php settings_fields('stripe_settings_group'); ?>

		<table class="form-table">
			<tbody>
			<tr valign="top">
				<th scope="row" valign="top">
					<?php _e('Test Mode', 'customproducts'); ?>
				</th>
				<td>
					<input id="stripe_settings[test_mode]" name="stripe_settings[test_mode]" type="checkbox" value="1" <?php checked(1, $stripe_options['test_mode']); ?> />
					<label class="description" for="stripe_settings[test_mode]"><?php _e('Check this to use the plugin in test mode.', 'customproducts'); ?></label>
				</td>
			</tr>
			</tbody>
		</table>

		<h3 class="title"><?php _e('API Keys', 'customproducts'); ?></h3>
		<table class="form-table">
			<tbody>
			<tr valign="top">
				<th scope="row" valign="top">
					<?php _e('Live Secret', 'customproducts'); ?>
				</th>
				<td>
					<input id="stripe_settings[live_secret_key]" name="stripe_settings[live_secret_key]" type="text" class="regular-text" value="<?php echo $stripe_options['live_secret_key']; ?>"/>
					<label class="description" for="stripe_settings[live_secret_key]"><?php _e('Paste your live secret key.', 'customproducts'); ?></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" valign="top">
					<?php _e('Live Publishable', 'customproducts'); ?>
				</th>
				<td>
					<input id="stripe_settings[live_publishable_key]" name="stripe_settings[live_publishable_key]" type="text" class="regular-text" value="<?php echo $stripe_options['live_publishable_key']; ?>"/>
					<label class="description" for="stripe_settings[live_publishable_key]"><?php _e('Paste your live publishable key.', 'customproducts'); ?></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" valign="top">
					<?php _e('Test Secret', 'customproducts'); ?>
				</th>
				<td>
					<input id="stripe_settings[test_secret_key]" name="stripe_settings[test_secret_key]" type="text" class="regular-text" value="<?php echo $stripe_options['test_secret_key']; ?>"/>
					<label class="description" for="stripe_settings[test_secret_key]"><?php _e('Paste your test secret key.', 'customproducts'); ?></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" valign="top">
					<?php _e('Test Publishable', 'customproducts'); ?>
				</th>
				<td>
					<input id="stripe_settings[test_publishable_key]" name="stripe_settings[test_publishable_key]" class="regular-text" type="text" value="<?php echo $stripe_options['test_publishable_key']; ?>"/>
					<label class="description" for="stripe_settings[test_publishable_key]"><?php _e('Paste your test publishable key.', 'customproducts'); ?></label>
				</td>
			</tr>
			</tbody>
		</table>

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Options', 'customproducts'); ?>" />
		</p>

	</form>
	<?php
}