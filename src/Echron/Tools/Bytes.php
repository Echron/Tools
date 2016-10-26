<?php
declare(strict_types = 1);

namespace Echron\Tools;


class Bytes
{


    function readable(float $bytes, int $decimals = 4):string
    {
        $size = [
            'B',
            'kB',
            'MB',
            'GB',
            'TB',
            'PB',
            'EB',
            'ZB',
            'YB',
        ];
        $factor = (int)floor((strlen($bytes . '') - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $size[$factor];
    }
}