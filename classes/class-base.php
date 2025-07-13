<?php
namespace wpdev;

class Base
{
    public function __construct() {}

    protected function formatLabel($label, $divider = '_', $prefix = true)
    {
        $str = trim(strtolower($label));
        $str = preg_replace('/\s+/', $divider, $str);

        if ($prefix && substr($str, 0, 5) !== 'wpdev') {
            return 'wpdev' . $divider . $str;
        }
        return $str;
    }
}
