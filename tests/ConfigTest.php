<?php

namespace Emargareten\Config\Test;

use Emargareten\Config\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function setUp(): void
    {
        Config::setPath(getcwd().'/tests/config.php');
    }

    protected function tearDown(): void
    {
        Config::reset();
    }

    public function testSetPath()
    {
        $this->assertEquals(getcwd().'/tests/config.php', Config::getPath());
        $this->assertEquals(['name' => 'John', 'age' => 30], Config::all());
    }

    public function testSetValues()
    {
        $values = [
            'foo' => 'bar',
        ];

        Config::setValues($values);

        $this->assertEquals(Config::all(), $values);
    }

    public function testGet()
    {
        $this->assertEquals('John', config('name'));
        $this->assertEquals('unknown', config('gender', 'unknown'));
    }

    public function testAll()
    {
        $this->assertEquals([
            'name' => 'John',
            'age' => 30,
        ], Config::all());
    }

    public function testHas()
    {
        $this->assertTrue(Config::has('name'));
        $this->assertFalse(Config::has('gender'));
    }

    public function testSet()
    {
        Config::set('name', 'Jane');
        $this->assertEquals('Jane', config('name'));
    }

    public function testForget()
    {
        Config::forget('name');
        $this->assertFalse(Config::has('name'));
    }

    public function testClear()
    {
        Config::clear();

        $this->assertEmpty(Config::all());
    }

    public function testSetMany()
    {
        $values = [
            'gender' => 'male',
            'address' => '123 Main St',
        ];

        Config::setMany($values);

        $this->assertEquals([
            'name' => 'John',
            'age' => 30,
            'gender' => 'male',
            'address' => '123 Main St',
        ], Config::all());
    }
}
