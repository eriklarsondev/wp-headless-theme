<?php
namespace wpdev;

class EditorConfig
{
    public function __construct()
    {
        add_filter('use_block_editor_for_post', '__return_false');
    }
}

new EditorConfig();
