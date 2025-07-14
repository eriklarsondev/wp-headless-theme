<?php
namespace wpdev;

class RequiredPluginConfig extends Base
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'initRequiredPlugins']);
    }

    public function initRequiredPlugins()
    {
        $this->checkForPlugin('advanced custom fields', 'ACF');
    }

    private function checkForPlugin($plugin_name, $class_name)
    {
        if (!class_exists($class_name)) {
            $this->notify($plugin_name);
            return false;
        }
        return true;
    }

    private function notify($plugin_name)
    {
        $label = ucwords($plugin_name);
        $url = $this->getSearchQuery($plugin_name);

        add_action('admin_notices', function () use ($label, $url) {
            ?>
            <div class="notice notice-error">
                <p>
                    <strong><?php echo $label; ?></strong> was not found.
                    Click <a href="<?php echo $url; ?>">here</a> to install or activate this plugin.
                </p>
            </div>
            <?php
        });
    }

    private function getSearchQuery($plugin_name)
    {
        $query = parent::formatLabel($plugin_name, '%20', false);

        $url = admin_url('plugin-install.php') . "?s=$query";
        $url .= '&tab=search&type=term';

        return $url;
    }
}

new RequiredPluginConfig();
