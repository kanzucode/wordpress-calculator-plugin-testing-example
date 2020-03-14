<?php
namespace Kanzu;
class Scripts{

    public function register_scripts(){
        $this->enqueue_styles();
        $this->register_admin_scripts();
        $this->localise_data();
    }

    public function enqueue_styles(){
        wp_enqueue_style('kc-wp-calculator-css', KZ_WP_CALCULATOR_PLUGIN_URL.'/assets/css/wp-calculator-admin.css' );
    }

    public function register_admin_scripts(){
        wp_enqueue_script('kc-wp-calculator-js', KZ_WP_CALCULATOR_PLUGIN_URL.'/assets/js/wp-calculator-admin.js',['jquery'] );
    }
    
    public function localise_data(){
        wp_localize_script('kc-wp-calculator-js', 'links',  array( 'ajax_url' => admin_url( 'admin-post.php' ) ) );
    }
}