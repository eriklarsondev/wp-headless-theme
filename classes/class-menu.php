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
        $this->registerMenuLocation('header menu');
        $this->registerMenuLocation('footer menu');
        $this->registerMenuLocation('social media bar');
    }

    private function registerMenuLocation($menu_name)
    {
        $id = parent::formatLabel($menu_name);
        $label = ucwords($menu_name);

        register_nav_menu($id, __($label, $id));
    }

    private function unregisterMenuLocation($menu_name)
    {
        $id = parent::formatLabel($menu_name);
        unregister_nav_menu($menu_name);
    }

    static function add_menu_location($menu_name)
    {
        add_action('init', function () use ($menu_name) {
            (new self(true))->registerMenuLocation($menu_name);
        });
    }

    static function remove_menu_location($menu_name)
    {
        add_action('init', function () use ($menu_name) {
            (new self(true))->unregisterMenuLocation($menu_name);
        });
    }
}

new MenuLocationConfig();
