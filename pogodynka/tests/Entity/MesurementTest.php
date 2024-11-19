<?php

namespace App\Tests\Entity;
use App\Entity\Measurement;
use PHPUnit\Framework\TestCase;

class MesurementTest extends TestCase
{
    public function dataGetFahrenheit(): array
    {
        return [
            ['0', 32.0],
            ['-100', -148.0],
            ['100', 212.0],
            ['0.5', 32.9],
            ['-0.5', 31.1],
            ['37.5', 99.5],
            ['-20', -4.0],
            ['20.3', 68.54],
            ['50.5', 122.9],
            ['10.1', 50.18], 
        ];
    }

    /**
    * @dataProvider dataGetFahrenheit
    */
    public function testGetFahrenheit($celsius, $expectedFahrenheit): void
    {
        $measurement = new Measurement();

        $measurement->setCelsius($celsius);
        $this->assertEquals($expectedFahrenheit, $measurement->getFahrenheit(), "Oczekiwano $expectedFahrenheit Fahrenheit dla $celsius Celsius, otrzymano {$measurement->getFahrenheit()}");

        // // Test 1: 0 stopni Celsjusza
        // $measurement->setCelsius(0);
        // $this->assertEquals(
        //     32.0, 
        //     $measurement->getFahrenheit(), 
        //     '0°C = 32°F'
        // );
        
        // // Test 2: -100 stopni Celsjusza
        // $measurement->setCelsius(-100);
        // $this->assertEquals(
        //     -148.0, 
        //     $measurement->getFahrenheit(), 
        //     '-100°C = -148°F'
        // );
        
        // // Test 3: 100 stopni Celsjusza
        // $measurement->setCelsius(100);
        // $this->assertEquals(
        //     212.0, 
        //     $measurement->getFahrenheit(), 
        //     '100°C = 212°F'
        // );
    }
}
