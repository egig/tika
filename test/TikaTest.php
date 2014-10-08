<?php

use Egig\Tika;

class TikaTest extends PHPUnit_Framework_TestCase
{

    function testTranlateDate()
    {
        $date = (new Tika('first day of October 2014', 'Asia/Jakarta'));
        
        $this->assertEquals('Rabu', $date->format('l'));
        $this->assertEquals('Rab', $date->format('D'));
        $this->assertEquals('Oktober', $date->format('F'));
        $this->assertEquals('Okt', $date->format('M'));
        $this->assertEquals('Rabu, 01 Oktober 2014', $date->format('l, d F Y'));
    }

    function testNoLanguagepack()
    {
    	$date = (new Tika('first day of October 2014', 'Asia/Jakarta'));
    	$date->setLocale('de');
        $this->assertEquals('Wednesday', $date->format('l'));
    }
}

?>