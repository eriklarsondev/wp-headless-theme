<?php
namespace wpdev;

class AdminConfig
{
    public function __construct()
    {
        // disable file editor
        define('DISALLOW_FILE_EDIT', true);

        // disable auto updates for plugins and themes
        add_filter('auto_update_plugin', '__return_false');
        add_filter('auto_update_theme', '__return_false');
    }
}

new AdminConfig();
