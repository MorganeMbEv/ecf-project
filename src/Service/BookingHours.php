<?php

namespace App\Service;
use App\Entity\OpeningHours;
use Doctrine\Persistence\ManagerRegistry;

class BookingHours {

    public function getLunchOpening(ManagerRegistry $doctrine) 
    {
        $repository = $doctrine->getRepository(OpeningHours::class);
        $lunchOpening = $repository->findall();

        $open_time = strtotime("");
        $close_time = strtotime("23:59");
        $now = time();
        $output = "";
        for( $i=$open_time; $i<$close_time; $i+=300) {
            if( $i < $now) continue;
            $output .= "<option>".date("l - H:i",$i)."</option>";
        }
        return $output;   
    }
}