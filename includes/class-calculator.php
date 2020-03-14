<?php

use eftec\bladeone\BladeOne;

class Calculator{

    public function handle_submit_inputs(){
        $number_1 = sanitize_text_field( $_POST['number_1'] );
        $number_2 = sanitize_text_field( $_POST['number_2'] );

        echo $this->add_numbers( $number_1, $number_2 );
    }

    public function add_numbers( $number_1, $number_2 ){
        return $number_1 + $number_2;
    }

    /**
     * Register Menu Item for Email Templates
     */
    public function register_menu() {
        add_menu_page(__('KC Calculator', 'kc-calucaltor'), __('KC Calculator', 'calculator'), 'manage_options', 'kc-calculator', [$this, 'kc_load_calculator_page'], 'dashicons-cart', null);
    }

    public function kc_load_calculator_page(){
        $views = KZ_WP_CALCULATOR_PLUGIN_DIR . '/templates/';
        $cache = KZ_WP_CALCULATOR_PLUGIN_DIR . '/templates_cache/';
        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO );

        $data = array();

        echo $blade->run('calculator', $data);
    }
}