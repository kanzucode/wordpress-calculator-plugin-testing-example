<?php


class Hook_Registry{

    function __construct(){
        $this->register_hooks();
    }

    function register_hooks(){
        $scripts = new Kanzu\Scripts();
        $calculator = new Kanzu\Calculator();

        //Enqueue Styles and Scripts
        add_action( 'admin_enqueue_scripts', [ $scripts, 'register_admin_scripts' ] );

        //Register an admin menu item for the calculator
        add_action ( 'admin_menu', [ $calculator, 'register_admin_menu' ] );

        //Handle calculator form submission
        add_action( 'wp_ajax_kc_wp_cal_calculate_sum', [ $calculator, 'handle_calculator_form_submission' ] );
    }
}

new Hook_Registry();
