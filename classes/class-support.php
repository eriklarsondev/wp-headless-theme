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
        $this->addThemeSupport('post thumbnails');
        $this->addThemeSupport('title tag');

        $this->removeThemeSupport('widgets block editor');
    }

    private function addThemeSupport($feature)
    {
        $key = parent::formatLabel($feature, '-', false);
        if (function_exists('add_theme_support')) {
            add_theme_support($key);
        }
    }

    private function removeThemeSupport($feature)
    {
        $key = parent::formatLabel($feature, '-', false);
        if (function_exists('remove_theme_support')) {
            remove_theme_support($key);
        }
    }

    static function add_theme_support($feature)
    {
        add_action('after_setup_theme', function () use ($feature) {
            (new self(true))->addThemeSupport($feature);
        });
    }

    static function remove_theme_support($feature)
    {
        add_action('after_setup_theme', function () use ($feature) {
            (new self(true))->removeThemeSupport($feature);
        });
    }
}

new ThemeSupportConfig();
