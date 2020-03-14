<?php
/**
 * Plugin Name:       Kanzu Calculator
 * Plugin URI:        https://kanzucode.com
 * Description:       A sample WordPress plugin to illustrate automated testing using Codeception
 * Version:           1.0.0
 * Author:            Kanzu Code
 * Author URI:        https://kanzucode.com
 * Requires PHP:      7.0
 * Text Domain:       kz-wp-calculator
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */


if (! defined('ABSPATH')) {
    exit;
} // End if().

if (! class_exists('Kanzu_WP_Calculator')) {
    final class Kanzu_WP_Calculator
    {


        /**
         * Reference to plugin version
         *
         * @var string
         */
        public $version = '1.0.0';


        /**
         * Variable that holds the one and only instance of the calculator
         *
         * @var Kanzu_WP_Calculator
         */
        private static $_instance = null;
 

        /**
         * Load the global Calculator instance
         *
         * @return Kanzu_WP_Calculator
         */
        public static function get_instance()
        {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Cloning is forbidden.
         *
         * @since 1.8.0
         */
        public function __clone()
        {
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'kz-wp-starter-plugin'), $this->version);
        }

        /**
         * Unserializing instances of this class is forbidden.
         *
         * @since 1.8.0
         */
        public function __wakeup()
        {
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'kz-wp-starter-plugin'), $this->version);
        }

        public function __construct()
        {
            $this->define_constants();
            $this->includes();

        }

        private function define_constants()
        {
            $this->define('KZ_WP_CALCULATOR_PLUGIN_VERSION', $this->version);
            $this->define('KZ_WP_CALCULATOR_PLUGIN_DIR', plugin_dir_path(__FILE__));
            $this->define('KZ_WP_CALCULATOR_PLUGIN_URL', plugin_dir_url(__FILE__));
            $this->define('KZ_WP_CALCULATOR_PLUGIN_PLUGIN_FILE', __FILE__);
        }

        /**
         * Define constant if not already set.
         *
         * @param  string      $name
         * @param  string|bool $value
         */
        private function define($name, $value)
        {
            if (! defined($name)) {
                define($name, $value);
            }
        }

        private function includes()
        {
            require_once KZ_WP_CALCULATOR_PLUGIN_DIR . '/vendor/autoload.php';
            require_once ( KZ_WP_CALCULATOR_PLUGIN_DIR . '/includes/class-scripts.php');
            require_once ( KZ_WP_CALCULATOR_PLUGIN_DIR . '/includes/class-calculator.php');
            require_once ( KZ_WP_CALCULATOR_PLUGIN_DIR . '/includes/class-hook-registry.php');
        }
    }

    function Kanzu_WP_Calculator()
    {
        return Kanzu_WP_Calculator::get_instance();
    }

    Kanzu_WP_Calculator();
}// End if().
