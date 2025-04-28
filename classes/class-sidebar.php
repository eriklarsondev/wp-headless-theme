<?php
namespace wpdev;

class SidebarLocationConfig extends Base
{
    public function __construct()
    {
        add_action('init', [$this, 'initSidebarLocations']);
    }

    public function initSidebarLocations()
    {
        $this->addSidebarLocation('sidebar left');
        $this->addSidebarLocation('sidebar right');
    }

    private function addSidebarLocation($name, $description = '')
    {
        $key = parent::formatLabel($name);

        $args = [
            'name' => ucwords($name),
            'id' => $key,
            'description' => $description
        ];
        if (function_exists('register_sidebar')) {
            register_sidebar($args);
        }
    }

    private function removeSidebarLocation($name)
    {
        $key = parent::formatLabel($name);
        if (function_exists('unregister_sidebar')) {
            unregister_sidebar($key);
        }
    }
}

new SidebarLocationConfig();
