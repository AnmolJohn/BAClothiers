<?php
/**
* BA Clotheirs Options Page
*/

	
function bac_add_submenu() {
		add_submenu_page( 'themes.php', 'BA Clotheirs Options Page', 'BAC Theme Options', 'manage_options', 'theme_options', 'bac_theme_options_page');
	}
add_action( 'admin_menu', 'bac_add_submenu' );
	

function bac_settings_init() { 
	register_setting( 'BAC_theme_options', 'bac_options_settings' );
	
	add_settings_section(
		'bac_options_page_section', 
		'This page will allow the users to change few things directly from the BA Clotheirs options page', 
		'bac_options_page_section_callback', 
		'BAC_theme_options'
	);
	
	function bac_options_page_section_callback() { 
		echo 'A description and detail about the section.';
	}
	
/**
 * To enter greeting text.
 */
	add_settings_field( 
		'bac_text_field', 
		'Enter your text', 
		'bac_text_field_render', 
		'BAC_theme_options', 
		'bac_options_page_section' 
	);

	add_settings_field( 
		'cd_font_field', 
		'Change Font color', 
		'cd_font_field_render', 
		'cd_theme_options', 
		'cd_options_page_section'  
	);

/**
 * For changing background color.
 */
	add_settings_field( 
		'bac_radio_field', 
		'Change Background Color', 
		'bac_radio_field_render', 
		'BAC_theme_options', 
		'bac_options_page_section'  
	);
	
	add_settings_field( 
		'cd_sitewidth_field', 
		'Enter content in the textarea', 
		'cd_sitewidth_field_render', 
		'theme_options', 
		'cd_options_page_section'  
	);

/**
 * Adding Font Color Change option
 */	
	add_settings_field( 
		'bac_select_field', 
		'Choose Font Color from the dropdown', 
		'bac_select_field_render', 
		'BAC_theme_options', 
		'bac_options_page_section'  
	);

/**
 * To enter greeting text.
 */
	function bac_text_field_render() { 
		$options = get_option( 'bac_options_settings' );
		?>
		<input type="text" name="bac_options_settings[bac_text_field]" value="<?php if (isset($options['bac_text_field'])) echo $options['bac_text_field']; ?>" />
		<?php
	}

/**
 * Adding Font Color Change option
 */
	function bac_select_field_render() { 
		$options = get_option( 'bac_options_settings' );
		?>
		<select name="bac_options_settings[bac_select_field]">
			<option value="1" <?php if (isset($options['bac_select_field'])) selected( $options['bac_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['bac_select_field'])) selected( $options['bac_select_field'], 2 ); ?>>Option 2</option>
			<option value="3" <?php if (isset($options['bac_select_field'])) selected( $options['bac_select_field'], 3 ); ?>>Option 3</option>
		</select>
	<?php
	}

/**
 * For changing background color.
 */	
	function bac_radio_field_render() { 
		$options = get_option( 'bac_options_settings' );
		?>
		<input type="radio" name="bac_options_settings[bac_radio_field]" <?php if (isset($options['bac_radio_field'])) checked( $options['bac_radio_field'], 1 ); ?> value="1" /> <label>Color One</label><br />
		<input type="radio" name="bac_options_settings[bac_radio_field]" <?php if (isset($options['bac_radio_field'])) checked( $options['bac_radio_field'], 2 ); ?> value="2" /> <label>Color Two</label><br />
		<input type="radio" name="bac_options_settings[bac_radio_field]" <?php if (isset($options['bac_radio_field'])) checked( $options['bac_radio_field'], 3 ); ?> value="3" /> <label>Color Three</label>
		<?php
	}
	
	function bac_sitewidth_field_render() { 
		$options = get_option( 'bac_options_settings' );
		?>
		<textarea cols="40" rows="5" name="bac_options_settings[bac_sitewidth_field]"><?php if (isset($options['bac_sitewidth_field'])) echo $options['bac_sitewidth_field']; ?></textarea>
		<?php
	}

	function cd_select_field_render() { 
		$options = get_option( 'cd_options_settings' );
		?>
		<select name="cd_options_settings[cd_select_field]">
			<option value="1" <?php if (isset($options['cd_select_field'])) selected( $options['cd_select_field'], 1 ); ?>>Option 1</option>
			<option value="2" <?php if (isset($options['cd_select_field'])) selected( $options['cd_select_field'], 2 ); ?>>Option 2</option>
		</select>
	<?php
	}
	
	function bac_theme_options_page(){ 
		?>
		<form action="options.php" method="post">
			<h2>BA Clotheirs Options Page</h2>
			<?php
			settings_fields( 'BAC_theme_options' );
			do_settings_sections( 'BAC_theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}

add_action( 'admin_init', 'bac_settings_init' );
