<?php
/**
* BA Clotheirs Options Page
*/

/**
 * Adding submenu item
 */	
function bac_add_submenu() {
<<<<<<< Updated upstream

		$page = add_submenu_page( 'themes.php', 'BA Clotheirs Options Page', 'BAC Theme Options', 'manage_options', 'theme_options', 'bac_theme_options_page');

	}
add_action( 'admin_menu' . $page, 'bac_add_submenu' );

		

=======
		add_submenu_page( 'themes.php', 'BA Clotheirs Options Page', 'BAC Theme Options', 'manage_options', 'theme_options', 'bac_theme_options_page');
	     }
      add_action( 'admin_menu', 'bac_add_submenu' );
	
/**
 * Creating and registering the settings.
 */
>>>>>>> Stashed changes
function bac_settings_init() { 
	     register_setting( 'BAC_theme_options', 'bac_options_settings' );
	
/**
 * Adding settings section
 */	
	add_settings_section('bac_options_page_section','Feel free to customize the theme','bac_options_page_section_callback','BAC_theme_options');
	
	
	/**
 * Description of the section.
 */
	function bac_options_page_section_callback() { 
		echo 'Enjoy trying different colors and change daily greetings.';
	     }
	
	
/**
 * The code below is for changing the background color of the theme. 
 */
	add_settings_field('bac_radio_field', 'Change Background Color', 'bac_radio_field_render', 'BAC_theme_options', 'bac_options_page_section' );
	
/**
 * For changing background color.
 */	
	
	add_settings_field('bac_select_field', 'Choose Font Color','bac_select_field_render','BAC_theme_options','bac_options_page_section' );


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


/**
 * The code below is for entering daily greeting or promotions on the website.
 */
	add_settings_field('bac_text_field','Enter Daily Greetings/Promotions', 'bac_text_field_render', 'BAC_theme_options', 'bac_options_page_section');


/**
 * To enter daily greeting text.
 */
	function bac_text_field_render() { 
		$options = get_option( 'bac_options_settings' );
		?>
		<input type="text" name="bac_options_settings[bac_text_field]" value="<?php if (isset($options['bac_text_field'])) echo $options['bac_text_field']; ?>" />
		<?php
	}


/**
 * This code below, allows user to change the color of the font from thre given colors.
 */	
	add_settings_field('bac_select_field', 'Choose Font Color','bac_select_field_render','BAC_theme_options','bac_options_page_section' );


/**
 * Adding Font Color Change option
 */
	function bac_select_field_render() { 
		$options = get_option( 'bac_options_settings' );
		?>
		<select name="bac_options_settings[bac_select_field]">
			<option value="1" <?php if (isset($options['bac_select_field'])) selected( $options['bac_select_field'], 1 ); ?>>Red</option>
			<option value="2" <?php if (isset($options['bac_select_field'])) selected( $options['bac_select_field'], 2 ); ?>>Dark Grey</option>
			<option value="3" <?php if (isset($options['bac_select_field'])) selected( $options['bac_select_field'], 3 ); ?>>Navy</option>
		</select>
	<?php
	}


/**
 * Creating the options page.
 */	
	function bac_theme_options_page(){ 
		?>
		
		<?php settings_errors (); ?>
		
		<form action="options.php" method="post">
			<h2>BAC Options Page</h2>
			<?php
			settings_fields( 'BAC_theme_options' );
			do_settings_sections( 'BAC_theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}

}



/**
 * For activating the plugin.
 */
add_action( 'admin_init', 'bac_settings_init' );
