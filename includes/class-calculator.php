<?php

namespace Kanzu;
use eftec\bladeone\BladeOne;

class Calculator{

    /**
     * AJAX callback to add submitted numbers
     */
    public function handle_calculator_form_submission(){
        $number_1 = sanitize_text_field( $_POST['number_1'] );
        $number_2 = sanitize_text_field( $_POST['number_2'] );
        $sum = $this->add_numbers( $number_1, $number_2 );
        wp_send_json( $sum );
    }

    public function add_numbers( $number_1, $number_2 ){
        return $number_1 + $number_2;
    }

    /**
     * Register Menu Item for Calculator
     */
    public function register_admin_menu() {
        add_menu_page(__('KC Calculator', 'kz-wp-calculator'), __('KC Calculator', 'kz-wp-calculator'), 'manage_options', 'kz-wp-calculator', [$this, 'render_calculator_page'], 'dashicons-building', 4);
    }

    /**
     * Render the admin page for the calculator
     */
    public function render_calculator_page(){
        $views = KZ_WP_CALCULATOR_PLUGIN_DIR . '/templates/';
        $cache = KZ_WP_CALCULATOR_PLUGIN_DIR . '/templates_cache/';
        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO );

        $data = array();

        echo $blade->run('calculator', $data);
    }
}