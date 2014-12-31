<?php

use Egig\Tika;
use Carbon\Carbon;

class TikaTest extends PHPUnit_Framework_TestCase
{

    function testTranlateDate()
    {
        $date = (new Tika('first day of October 2014', 'Asia/Jakarta', 'Indonesian'));
        
        $this->assertEquals('Rab', $date->format('D'));
        $this->assertEquals('Rabu', $date->format('l'));
        $this->assertEquals('Rabu, 01 Oktober 2014', $date->format('l, d F Y'));        
        $this->assertEquals('Oktober', $date->format('F'));
        $this->assertEquals('Okt', $date->format('M'));
    }
}

?>