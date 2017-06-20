<?php

/*
 *  cc - console color
 *  Function from www.if-not-true-then-false.com
 */
if (!function_exists('cc')) {
    function cc($string, $foreground_color = null, $background_color = null, $escapeJson = false)
    {
        $escapeCharacter = $escapeJson ? "\033" : "\033";
        $foreground_colors = array(
            'black'        => '0;30','dark_gray'    => '1;30',
            'blue'         => '0;34','light_blue'   => '1;34',
            'green'        => '0;32','light_green'  => '1;32',
            'cyan'         => '0;36','light_cyan'   => '1;36',
            'red'          => '0;31','light_red'    => '1;31',
            'purple'       => '0;35','light_purple' => '1;35',
            'brown'        => '0;33','yellow'       => '1;33',
            'light_gray'   => '0;37','white'        => '1;37'
        );
        $background_colors = array(
            'black'      => '40', 'red'        => '41',
            'green'      => '42', 'yellow'     => '43',
            'blue'       => '44', 'magenta'    => '45',
            'light_gray' => '47', 'cyan'       => '46',
        );
        $colored_string = "";
        // Check if given foreground color found
        if (isset($foreground_colors[$foreground_color])) {
            $colored_string .= $escapeCharacter. "[" . $foreground_colors[$foreground_color] . "m";
        }
        // Check if given background color found
        if (isset($background_colors[$background_color])) {
            $colored_string .= $escapeCharacter . "[" . $background_colors[$background_color] . "m";
        }
        // Add string and end coloring
        $colored_string .=  $string . $escapeCharacter . "[0m";
        return $colored_string;
    }
}

/*
 *  EJECT = Echo JSON Encoded Colored Text
 * by Halpdesk
 */
if (!function_exists('eject')) {
    function eject(array $arr, $fgKeyColor = 'blue', $fgValueColor = 'brown', $bgColor = null)
    {
        // Anonymous recursive function
        $f = function ($array) use (&$f, $fgKeyColor, $fgValueColor, $bgColor) {
            if (!is_array($array)) {
                return;
            }
            $helper = array();
            foreach ($array as $key => $value) {
                if (!is_array($value)) {
                    $value = cc($value, $fgValueColor, $bgColor, true);
                }
                if (!is_int($key)) {
                    $key = cc($key, $fgKeyColor, $bgColor, true);
                }
                $helper[$key] = is_array($value) ? $f($value) : $value;
            }
            return $helper;
        };
        $coloredArr = $f($arr);

        $json = json_encode($coloredArr, JSON_PRETTY_PRINT);
        $json = str_replace("    ", "-tab1-tab2-tag3-tag4", $json);
        $json = str_replace("-tab1-tab2-tag3-tag4", "  ", $json);
        $json = str_replace("\u001b", "\033", $json);
        echo $json . "\n";
    }
}
/*
 *  jdd - json encode, dump and die (works to console)
 *  by Halpdesk
 */
if (!function_exists('jdd')) {
    function jdd($arr)
    {
        header('Content-Type', 'application/json');
        if ($arr instanceof Illuminate\Support\Collection) {
            $arr = $arr->toArray();
        }
        /*
        foreach ($arr as $key => $val) {
            $arr[$key] = cc($val, 'light_blue');
        }
        */
        $response = new Illuminate\Http\Response($arr);
        $response->header('Content-Type', 'application/json; charset=utf-8');
        $content = json_encode($arr, JSON_PRETTY_PRINT, 4);
        $response->setContent($content);
        $response->throwResponse();
        die();
    }
}
