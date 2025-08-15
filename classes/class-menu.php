<?php
namespace wpdev;

class MenuLocationConfig extends Base
{
    /**
     * constructor for menu location configuration
     *
     * @param boolean $static
     */
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('init', [$this, 'initMenuLocations']);
        }
    }

    /**
     * initializes default menu locations
     *
     * @return void
     */
    public function initMenuLocations()
    {
        $this->registerMenuLocation('header menu');
        $this->registerMenuLocation('footer menu');
        $this->registerMenuLocation('social media bar');
    }

    /**
     * adds new menu location
     *
     * @param string $menu_name
     *
     * @return void
     */
    private function registerMenuLocation($menu_name)
    {
        $key = parent::formatLabel($menu_name);
        $label = ucwords($menu_name);

        register_nav_menu($key, __($label, $key));
    }

    /**
     * removes existing menu location
     *
     * @param string $menu_name
     *
     * @return void
     */
    private function unregisterMenuLocation($menu_name)
    {
        $key = parent::formatLabel($menu_name);
        unregister_nav_menu($key);
    }

    /**
     * static wrapper for adding new menu location
     *
     * @param string $menu_name
     *
     * @return void
     */
    static function add_menu_location($menu_name)
    {
        $instance = new self(true);
        add_action('init', function () use ($menu_name) {
            $instance->registerMenuLocation($menu_name);
        });
    }

    /**
     * static wrapper for removing existing menu location
     *
     * @param string $menu_name
     *
     * @return void
     */
    static function remove_menu_location($menu_name)
    {
        $instance = new self(true);
        add_action('init', function () use ($menu_name) {
            $instance->unregisterMenuLocation($menu_name);
        });
    }
}

new MenuLocationConfig();
