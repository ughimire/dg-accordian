<?php
class Accordian_Shortcode{

    protected $atts;

    public function __construct(){

        defined('WPINC') or exit;

        add_shortcode( 'dg_accordian', array( $this, 'dg_accordian' ) );

    }

    public function  filter_args($atts){

        /*WP Query Args*/
        $args = array();

        $this->atts=wp_parse_args($atts, $args);

        return $this->atts;

    }

    public function dg_accordian( $atts, $content = "" ) {

        $args = $this->filter_args($atts);

        $this->template($args);

    }

    public function accordian_args($atts){
        return $this->atts;
    }

    public function template($atts){

        add_filter('dg_accordian_args', [$this, 'accordian_args'], 10, 1);

        $accordian = new Dg_Accordian_Loader();

        $accordian->dg_template_part('public/partials/dg-accordian-public-display.php');

    }

}

new Accordian_Shortcode();
