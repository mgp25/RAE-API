<?php

namespace RAE;

class Utils
{
    public static function formatBytes(
        $bytes,
        $precision = 2)
    {
        $units = ['B', 'kB', 'mB', 'gB', 'tB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision).''.$units[$pow];
    }

    public static function colouredString(
        $string,
        $colour)
    {
        $colours['black'] = '0;30';
        $colours['dark_gray'] = '1;30';
        $colours['blue'] = '0;34';
        $colours['light_blue'] = '1;34';
        $colours['green'] = '0;32';
        $colours['light_green'] = '1;32';
        $colours['cyan'] = '0;36';
        $colours['light_cyan'] = '1;36';
        $colours['red'] = '0;31';
        $colours['light_red'] = '1;31';
        $colours['purple'] = '0;35';
        $colours['light_purple'] = '1;35';
        $colours['brown'] = '0;33';
        $colours['yellow'] = '1;33';
        $colours['light_gray'] = '0;37';
        $colours['white'] = '1;37';

        $colored_string = '';

        if (isset($colours[$colour])) {
            $colored_string .= "\033[".$colours[$colour].'m';
        }

        $colored_string .= $string."\033[0m";

        return $colored_string;
    }

    public static function find_between(
        $string,
        $start,
        $end)
    {
        $string = ' '.$string;
        $ini = strpos($string, $start);
        if ($ini == 0) {
            return '';
        }
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
    }

    public static function get_definitions(
        $html)
    {
        $text = strip_tags($html);
        $text = str_replace('U.', '', $text);
        $text = str_replace('Era u.', '', $text);
        $text = str_replace('p. us.', '', $text);
        $text = str_replace('desus.', '', $text);
        $text = str_replace('m.', '', $text);
        $text = str_replace('f.', '', $text);
        $text = str_replace('t. repetida', '', $text);
        $text = str_replace(' interj.', 'interj.', $text);

        $first = self::find_between($text, '1.', '.2');
        if ($first == '') {
            $first = self::find_between($text, '1.', '.');
        }

        $defs = [$first, self::find_between($text, '2.', '.3')];

        $definitions = [];
        foreach ($defs as $def) {
            $data = explode('.', $def);
            $definitions[] =
            [
                'type'          => $data[0],
                'definition'    => rtrim(ltrim($data[1])),
            ];
        }
        $body =
        [
            'definitions' => $definitions,
        ];

        return $body;
    }
}
