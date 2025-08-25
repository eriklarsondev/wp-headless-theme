<?php
namespace wpdev;

class CustomPostTypeConfig extends Base
{
    /**
     * constructor for custom post type configuration
     *
     * @param boolean $static
     */
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('init', [$this, 'initCustomPostTypes']);
        }
    }

    /**
     * initializes default custom post types
     *
     * @return void
     */
    public function initCustomPostTypes() {}
}

new CustomPostTypeConfig();
