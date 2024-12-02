<?php

namespace App\Enum;

enum License: int
{
    case All_Rights_Resurved = 1;
    case Public_Domain = 2;
    case Creative_Commons = 3;

    
    /**
     * Get the text label for a license.
     */
    public function getLabel(): string
    {
        return match ($this) {
            self::All_Rights_Resurved => 'All Rights Resurved',
            self::Public_Domain => 'Public Domain',
            self::Creative_Commons => 'Creative Commons',
        };
    }
}
