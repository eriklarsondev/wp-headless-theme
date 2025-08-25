<?php
namespace wpdev;

class RequiredPluginConfig extends Base
{
    /**
     * constructor for required plugin configuration
     *
     * @param boolean $static
     */
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('admin_init', [$this, 'initRequiredPlugins']);
        }
    }

    /**
     * initializes required plugins and ensure plugins are installed and activated
     *
     * @return void
     */
    public function initRequiredPlugins() {}
}

new RequiredPluginConfig();
