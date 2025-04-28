<?php
namespace wpdev;

class Base
{
    public function __construct() {}

    protected function formatLabel($label, $divider = '_', $prefix = true)
    {
        $formatted = trim(strtolower($label));
        $formatted = preg_replace('/\s+/', $divider, $formatted);

        if ($prefix && substr($formatted, 0, 3) !== 'dev') {
            $formatted = 'dev' . $divider . $formatted;
        }
        return $formatted;
    }
}
