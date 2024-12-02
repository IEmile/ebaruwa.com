<?php

namespace App\Enum;

enum Audience: string
{
    case Young_Adult = '13-18';
    case New_Adult = '18-25';
    case Adult = '25+';
}