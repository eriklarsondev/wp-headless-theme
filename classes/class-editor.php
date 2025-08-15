<?php
namespace wpdev;

class EditorConfig
{
    /**
     * constructor for editor configuration class
     */
    public function __construct()
    {
        // disable gutenberg editor for all post types
        add_filter('use_block_editor_for_post', '__return_false');
    }
}

new EditorConfig();
