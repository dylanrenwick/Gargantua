<?php

class Text
{
    private static $texts;

    public static function get($key, $data = null)
    {
        // if not $key
        if (!$key) {
            return null;
        }

        // load config file (this is only done once per application lifecycle)
        if (!self::$texts) {
            self::$texts = require('../application/config/texts.php');
        }

        // check if array key exists
        if (!array_key_exists($key, self::$texts)) {
            return null;
        }

        $text = self::$texts[$key];

        $matches = array();
        while (preg_match('/{\$([a-zA-Z_]+)}/', $text, $matches)) {
            for ($i = 1; $i < count($matches); $i++) {
                $val = 'null';
                if (isset($data[$matches[$i]])) $val = $data[$matches[$i]];
                $text = preg_replace('/{\$'.$matches[$i].'}/', $val, $text);
            }
        }

        return $text;
    }
}
