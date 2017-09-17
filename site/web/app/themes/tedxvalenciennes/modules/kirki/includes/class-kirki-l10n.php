<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'kirki';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'grandconference' ),
				'background-image'      => esc_attr__( 'Background Image', 'grandconference' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'grandconference' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'grandconference' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'grandconference' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'grandconference' ),
				'inherit'               => esc_attr__( 'Inherit', 'grandconference' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'grandconference' ),
				'cover'                 => esc_attr__( 'Cover', 'grandconference' ),
				'contain'               => esc_attr__( 'Contain', 'grandconference' ),
				'background-size'       => esc_attr__( 'Background Size', 'grandconference' ),
				'fixed'                 => esc_attr__( 'Fixed', 'grandconference' ),
				'scroll'                => esc_attr__( 'Scroll', 'grandconference' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'grandconference' ),
				'left-top'              => esc_attr__( 'Left Top', 'grandconference' ),
				'left-center'           => esc_attr__( 'Left Center', 'grandconference' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'grandconference' ),
				'right-top'             => esc_attr__( 'Right Top', 'grandconference' ),
				'right-center'          => esc_attr__( 'Right Center', 'grandconference' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'grandconference' ),
				'center-top'            => esc_attr__( 'Center Top', 'grandconference' ),
				'center-center'         => esc_attr__( 'Center Center', 'grandconference' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'grandconference' ),
				'background-position'   => esc_attr__( 'Background Position', 'grandconference' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'grandconference' ),
				'on'                    => esc_attr__( 'ON', 'grandconference' ),
				'off'                   => esc_attr__( 'OFF', 'grandconference' ),
				'all'                   => esc_attr__( 'All', 'grandconference' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'grandconference' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'grandconference' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'grandconference' ),
				'greek'                 => esc_attr__( 'Greek', 'grandconference' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'grandconference' ),
				'khmer'                 => esc_attr__( 'Khmer', 'grandconference' ),
				'latin'                 => esc_attr__( 'Latin', 'grandconference' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'grandconference' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'grandconference' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'grandconference' ),
				'arabic'                => esc_attr__( 'Arabic', 'grandconference' ),
				'bengali'               => esc_attr__( 'Bengali', 'grandconference' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'grandconference' ),
				'tamil'                 => esc_attr__( 'Tamil', 'grandconference' ),
				'telugu'                => esc_attr__( 'Telugu', 'grandconference' ),
				'thai'                  => esc_attr__( 'Thai', 'grandconference' ),
				'serif'                 => _x( 'Serif', 'font style', 'grandconference' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'grandconference' ),
				'monospace'             => _x( 'Monospace', 'font style', 'grandconference' ),
				'font-family'           => esc_attr__( 'Font Family', 'grandconference' ),
				'font-size'             => esc_attr__( 'Font Size', 'grandconference' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'grandconference' ),
				'line-height'           => esc_attr__( 'Line Height', 'grandconference' ),
				'font-style'            => esc_attr__( 'Font Style', 'grandconference' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'grandconference' ),
				'top'                   => esc_attr__( 'Top', 'grandconference' ),
				'bottom'                => esc_attr__( 'Bottom', 'grandconference' ),
				'left'                  => esc_attr__( 'Left', 'grandconference' ),
				'right'                 => esc_attr__( 'Right', 'grandconference' ),
				'center'                => esc_attr__( 'Center', 'grandconference' ),
				'justify'               => esc_attr__( 'Justify', 'grandconference' ),
				'color'                 => esc_attr__( 'Color', 'grandconference' ),
				'add-image'             => esc_attr__( 'Add Image', 'grandconference' ),
				'change-image'          => esc_attr__( 'Change Image', 'grandconference' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'grandconference' ),
				'add-file'              => esc_attr__( 'Add File', 'grandconference' ),
				'change-file'           => esc_attr__( 'Change File', 'grandconference' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'grandconference' ),
				'remove'                => esc_attr__( 'Remove', 'grandconference' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'grandconference' ),
				'variant'               => esc_attr__( 'Variant', 'grandconference' ),
				'subsets'               => esc_attr__( 'Subset', 'grandconference' ),
				'size'                  => esc_attr__( 'Size', 'grandconference' ),
				'height'                => esc_attr__( 'Height', 'grandconference' ),
				'spacing'               => esc_attr__( 'Spacing', 'grandconference' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'grandconference' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'grandconference' ),
				'light'                 => esc_attr__( 'Light 200', 'grandconference' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'grandconference' ),
				'book'                  => esc_attr__( 'Book 300', 'grandconference' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'grandconference' ),
				'regular'               => esc_attr__( 'Normal 400', 'grandconference' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'grandconference' ),
				'medium'                => esc_attr__( 'Medium 500', 'grandconference' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'grandconference' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'grandconference' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'grandconference' ),
				'bold'                  => esc_attr__( 'Bold 700', 'grandconference' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'grandconference' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'grandconference' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'grandconference' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'grandconference' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'grandconference' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'grandconference' ),
				'add-new'           	=> esc_attr__( 'Add new', 'grandconference' ),
				'row'           		=> esc_attr__( 'row', 'grandconference' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'grandconference' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'grandconference' ),
				'back'                  => esc_attr__( 'Back', 'grandconference' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'grandconference' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'grandconference' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'grandconference' ),
				'none'                  => esc_attr__( 'None', 'grandconference' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'grandconference' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'grandconference' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'grandconference' ),
				'initial'               => esc_attr__( 'Initial', 'grandconference' ),
				'select-page'           => esc_attr__( 'Select a Page', 'grandconference' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'grandconference' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'grandconference' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'grandconference' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'grandconference' ),
			);

			// Apply global changes from the kirki/config filter.
			// This is generally to be avoided.
			// It is ONLY provided here for backwards-compatibility reasons.
			// Please use the kirki/{$config_id}/l10n filter instead.
			$config = apply_filters( 'kirki/config', array() );
			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			// Apply l10n changes using the kirki/{$config_id}/l10n filter.
			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}
