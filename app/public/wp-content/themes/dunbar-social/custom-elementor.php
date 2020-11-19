<?php 
if( ! defined( 'ABSPATH' ) ) exit;

function elementor_widgets_on_widgets_registered(){
    chdir( __DIR__ . '/widgets' );
    $plugin_dirs = array_filter( glob( "*" ), 'is_dir' );

    foreach( $plugin_dirs as $plugin_dir ){
        require __DIR__ . '/widgets/' . $plugin_dir . '/widget.php';
        $plugin_class_name_parts = explode( '-', $plugin_dir );
        $plugin_class_name = '';
        foreach( $plugin_class_name_parts as $plugin_class_name_part ){
            $plugin_class_name .= ucfirst( $plugin_class_name_part );
        }
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new $plugin_class_name() );
    }
}

function elementor_widgets_after_register_scripts() {
    chdir( __DIR__ . '/widgets' );
    $plugin_dirs = array_filter( glob( "*" ), 'is_dir' );
    foreach( $plugin_dirs as $plugin_dir ){
        if( file_exists( __DIR__ . '/widgets/' . $plugin_dir . '/js/script.js' ) ){
            wp_register_script( $plugin_dir, get_template_directory_uri() . '/widgets/' . $plugin_dir . '/js/script.js', ['jquery'], false. true);
            wp_enqueue_script( $plugin_dir );
        }
    }
}

function elementor_widgets_after_register_styles() {
    chdir( __DIR__ . '/widgets' );
    $plugin_dirs = array_filter( glob( "*" ), 'is_dir' );
    foreach( $plugin_dirs as $plugin_dir ){
        if( file_exists( __DIR__ . '/widgets/' . $plugin_dir . '/css/style.css' ) ){
            wp_register_style( $plugin_dir, get_template_directory_uri() . '/widgets/' . $plugin_dir . '/css/style.css' );
            wp_enqueue_style( $plugin_dir );
        }
    }
}

function elementor_widgets_load() {
    //Notice if Elementor is not active
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', 'elementor_widgets_admin_notices');
        return;
    }

    add_action("elementor/widgets/widgets_registered", 'elementor_widgets_on_widgets_registered');
    add_action('elementor/frontend/after_register_scripts', 'elementor_widgets_after_register_scripts');
    add_action('elementor/frontend/after_register_styles', 'elementor_widgets_after_register_styles');
}

function elementor_widgets_admin_notices() {
    if ( current_user_can( 'manage_options' ) && ! is_plugin_active( 'elementor/elementor.php' ) ) :
?>
    <div class="notice notice-error">
        <p>Custom Elementor widgets of the current theme require the Elementor plugin to be active.</p>
    </div>
<?php 
    endif;
}

add_action( 'after_setup_theme', 'elementor_widgets_load' );