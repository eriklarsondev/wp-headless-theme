<?php
namespace wpdev;

class ThemeSupportConfig extends Base
{
    public function __construct($static = false)
    {
        if (!$static) {
            add_action('after_setup_theme', [$this, 'initThemeSupport']);
        }
    }

    public function initThemeSupport()
    {
        $this->registerThemeSupport('post thumbnails');

        $this->unregisterThemeSupport('widgets block editor');
    }

    private function registerThemeSupport($feature)
    {
        $id = parent::formatLabel($feature, '-', false);
        add_theme_support($id);
    }

    private function unregisterThemeSupport($feature)
    {
        $id = parent::formatLabel($feature, '-', false);
        remove_theme_support($id);
    }

    static function add_theme_support($feature)
    {
        add_action('after_setup_theme', function () use ($feature) {
            (new self(true))->registerThemeSupport($feature);
        });
    }

    static function remove_theme_support($feature)
    {
        add_action('after_setup_theme', function () use ($feature) {
            (new self(true))->unregisterThemeSupportt($feature);
        });
    }
}

new ThemeSupportConfig();
