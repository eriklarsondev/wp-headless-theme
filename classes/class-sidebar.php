<?php
namespace wpdev;

class SidebarLocationConfig extends Base
{
    /**
     * constructor for sidebar location configuration
     *
     * @param boolean $static
     */
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('widgets_init', [$this, 'initSidebarLocations']);
        }
    }

    /**
     * initializes default sidebar locations
     *
     * @return void
     */
    public function initSidebarLocations()
    {
        $this->registerSidebarLocation('sidebar left');
        $this->registerSidebarLocation('sidebar right');
    }

    /**
     * adds new sidebar location
     *
     * @param string $sidebar_name
     * @param string $description
     *
     * @return void
     */
    private function registerSidebarLocation($sidebar_name, $description = '')
    {
        $key = parent::formatLabel($sidebar_name);
        $label = ucwords($sidebar_name);

        $args = [
            'name' => $label,
            'id' => $key,
            'description' => $description
        ];
        register_sidebar($args);
    }

    /**
     * removes existing sidebar location
     *
     * @param string $sidebar_name
     *
     * @return void
     */
    private function unregisterSidebarLocation($sidebar_name)
    {
        $key = parent::formatLabel($sidebar_name);
        unregister_sidebar($key);
    }

    /**
     * static wrapper for adding new sidebar location
     *
     * @param string $sidebar_name
     * @param string $description
     *
     * @return void
     */
    static function add_sidebar_location($sidebar_name, $description = '')
    {
        $instance = new self(true);
        add_action('widgets_init', function () use ($sidebar_name, $description) {
            $instance->registerSidebarLocation($sidebar_name, $description);
        });
    }

    /**
     * static wrapper for removing existing sidebar location
     *
     * @param string $sidebar_name
     *
     * @return void
     */
    static function remove_sidebar_location($sidebar_name)
    {
        $instance = new self(true);
        add_action('widgets_init', function () use ($sidebar_name) {
            $instance->unregisterSidebarLocation($sidebar_name);
        });
    }
}

new SidebarLocationConfig();
