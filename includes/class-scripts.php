<?php

class Scripts{

    public function register_scripts(){
        $this->enqueue_styles();
        $this->enqueue_scripts();
        $this->localise_data();
    }

    public function enqueue_styles(){
        wp_enqueue_style('kc-shopping-css', KZ_WP_CALCULATOR_PLUGIN_PLUGIN_URL.'/assets/css/styles.css' );
    }

    public function enqueue_scripts(){
        wp_enqueue_script('kc-shopping-js', KZ_WP_CALCULATOR_PLUGIN_PLUGIN_URL.'/assets/js/scripts.js' );
    }
    
    public function localise_data(){
        wp_localize_script('kc-shopping-js', 'links',  array( 'ajax_url' => admin_url( 'admin-post.php' ) ) );
    }
}