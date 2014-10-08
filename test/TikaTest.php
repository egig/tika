<?php

use Egig\Tika;

class TikaTest extends PHPUnit_Framework_TestCase
{

    protected $tika;

    protected function setUp()
    {
        $this->tika = new Tika;
    }

    public function testTranlateDate()
    {
        $day = (new Tika('first day of October 2014', 'Asia/Jakarta'))->format('l');
        $this->assertEquals('Rabu', $day);
    }
}

?>