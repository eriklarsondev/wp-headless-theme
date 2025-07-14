<?php
namespace wpdev;

class SidebarLocationConfig extends Base
{
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('init', [$this, 'initSidebarLocations']);
        }
    }

    public function initSidebarLocations()
    {
        $this->registerSidebarLocation('sidebar left');
        $this->registerSidebarLocation('sidebar right');
    }

    private function registerSidebarLocation($sidebar_name, $description = '')
    {
        $id = parent::formatLabel($sidebar_name);
        $label = ucwords($sidebar_name);

        $args = [
            'name' => $label,
            'id' => $id,
            'description' => $description
        ];
        register_sidebar($args);
    }

    private function unregisterSidebarLocation($sidebar_name)
    {
        $id = parent::formatLabel($sidebar_name);
        unregister_sidebar($id);
    }

    static function add_sidebar_location($sidebar_name, $description = '')
    {
        add_action('init', function () use ($sidebar_name, $description) {
            (new self(true))->registerSidebarLocation($sidebar_name, $description);
        });
    }

    static function remove_sidebar_location($sidebar_name)
    {
        add_action('init', function () use ($sidebar_name) {
            (new self(true))->unregisterSidebarLocation($sidebar_name);
        });
    }
}

new SidebarLocationConfig();
