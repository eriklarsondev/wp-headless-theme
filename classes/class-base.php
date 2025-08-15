<?php
namespace wpdev;

class Base
{
    /**
     * constuctor for base class
     */
    public function __construct() {}

    /**
     * formats label and prepends custom prefix to label if applicable
     *
     * @param string $label
     * @param string $divider
     * @param boolean $prefix
     *
     * @return string
     */
    protected function formatLabel($label, $divider = '_', $prefix = true)
    {
        $formattedLabel = trim(strtolower($label));
        $formattedLabel = preg_replace('/\s+/', $divider, $formattedLabel);

        if ($prefix && substr($formattedLabel, 0, 5) !== 'wpdev') {
            $formattedLabel = 'wpdev' . $divider . $formattedLabel;
            // return formatted label with prefix
            return $formattedLabel;
        }
        // return formatted label without prefix
        return $formattedLabel;
    }
}
