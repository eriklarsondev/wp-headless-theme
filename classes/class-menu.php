<?php
namespace wpdev;

class MenuLocationConfig extends Base
{
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('init', [$this, 'initMenuLocations']);
        }
    }

    public function initMenuLocations()
    {
        $this->addMenuLocation('header menu');
        $this->addMenuLocation('footer menu');
        $this->addMenuLocation('social media bar');
    }

    private function addMenuLocation($menu_name)
    {
        $key = parent::formatLabel($menu_name);
        if (function_exists('register_nav_menu')) {
            register_nav_menu($key, __(ucwords($menu_name), $key));
        }
    }

    private function removeMenuLocation($menu_name)
    {
        $key = parent::formatLabel($menu_name);
        if (function_exists('unregister_nav_menu')) {
            unregister_nav_menu($key);
        }
    }

    static function add_menu_location($menu_name)
    {
        add_action('init', function () use ($menu_name) {
            (new self(true))->addMenuLocation($menu_name);
        });
    }

    static function remove_menu_location($menu_name)
    {
        add_action('init', function () use ($menu_name) {
            (new self(true))->removeMenuLocation($menu_name);
        });
    }
}

new MenuLocationConfig();
