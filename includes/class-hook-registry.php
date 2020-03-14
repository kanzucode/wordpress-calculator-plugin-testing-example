<?php

use calculator;

class Hook_Registry{

    function __construct(){
        $this->register_hooks();
    }

    function register_hooks(){
        $scripts = new Scripts();
        $calculator = new Calculator();


        //Enqueue Styles and Scripts
        add_action( 'admin_enqueue_scripts', [ $scripts, 'register_scripts' ] );

        //Register Espresso Menu for [EE Email Templates]
        add_action ( 'admin_menu', [ $calculator, 'register_menu' ] );

        //Handle calculator form submission
        add_action( 'admin_post_submit_cal_inputs', [ $calculator, 'handle_submit_inputs' ] );
    }
}

new Hook_Registry();
