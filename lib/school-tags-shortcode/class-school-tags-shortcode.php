<?php

class School_Tags_Shortcode
{

    public function __construct()
    {
        $this->register_shortcodes();
    }

    public function register_shortcodes()
    {
        add_shortcode('skol_taggar', [$this, 'output']);
    }


    public function output($atts = null)
    {
        $tags = get_tags();
        
        ob_start();

        include('shortcode-template.php');
        $output = ob_get_contents();

        ob_end_clean();

        return $output;
    }


}