<?php

if (!function_exists('getColorName')) {
    function getColorName($hexCode)
    {
        $colors = [
            //common//
            '#000000' => 'Black',
            '#FFFFFF' => 'White',
            //Red Family//
            '#FF0000' => 'Red',
            '#8B0000' => 'Dark Red',
            '#DC143C' => 'Crimson',
            '#F08080' => 'LightCoral',
            '#E9967A' => 'DarkSalmon',
            '#FFA07A' => 'LightSalmon',
            //Red Family End 😭//

            //Pink Family//
            '#FF1493' => 'Pink',
            '#FFC0CB' => 'LightPink',
            '#FFB6C1' => 'LightPink',
            '#FF69B4' => 'HotPink',
            '#FF1493' => 'DeepPink',
            '#C71585' => 'MediumVioletRed',
            '#DB7093' => 'PaleVioletRed',
            //Pink Family End

            //Green family
            '#217A00' => 'Dark Green',
            '#008000' => 'Green',
            '#00FF00' => 'Lime',
            '#ADFF2F' => 'GreenYellow',
            '#7FFF00' => 'Chartreuse',
            '#7CFC00' => 'LawnGreen',
            '#32CD32' => 'LimeGreen',
            '#98FB98' => 'PaleGreen',
            '#90EE90' => 'LightGreen',
            '#00FA9A' => 'MediumScreenGreen',
            '#00FF7F' => 'SpringGreen',
            '#3CB371' => 'MediumSeaGreen',
            '#2E8B57' => 'SeaGreen',
            '#228B22' => 'ForestGreen',
            '#006400' => 'DarkGreen',
            '#9ACD32' => 'YellowGreen',
            '#6B8E23' => 'OliveDrab',
            '#808000' => 'Olive',
            '#556B2F' => 'DarkOliveGreen',
            '#66CDAA' => 'MediumAquamarine',
            '#8FBC8B' => 'DarkSeaGreen',
            '#20B2AA' => 'LightSeaGreen',
            '#008B8B' => 'DarkCyan',
            '#008080' => 'Teal',
            //Green Family End

            '#0000FF' => 'Blue',
            '#FFFF00' => 'Yellow',
            '#FFA500' => 'Orange',
            '#800080' => 'Purple',
            '#808080' => 'Gray',
            '#A52A2A' => 'Brown',
            '#00CED1' => 'Cyan',
            '#FFD700' => 'Gold',
            '#8B0000' => 'Dark Red',
        ];

        $hexCode = strtoupper($hexCode);

        // exact match
        if (isset($colors[$hexCode])) {
            return $colors[$hexCode];
        }

        // fallback closest match
        $closest = null;
        $minDistance = PHP_INT_MAX;
        foreach ($colors as $code => $name) {
            $distance = colorDistance($hexCode, $code);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closest = $name;
            }
        }

        return $closest ?? 'Unknown';
    }
}

if (!function_exists('colorDistance')) {
    function colorDistance($hex1, $hex2)
    {
        [$r1, $g1, $b1] = sscanf($hex1, "#%02x%02x%02x");
        [$r2, $g2, $b2] = sscanf($hex2, "#%02x%02x%02x");
        return sqrt(pow($r1 - $r2, 2) + pow($g1 - $g2, 2) + pow($b1 - $b2, 2));
    }
}
