<?php

namespace App\Services;

class GetYear 
{
    public function __invoke() 
    {
        $dt = new \DateTime('now', new \DateTimeZone('America/New_York'));
        $year = $dt->format('Y');
        
        return ($year > 2017) ? "2017 - {$year}" : $year;
    }
}
