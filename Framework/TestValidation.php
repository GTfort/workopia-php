<?php

namespace Tests\Framework;

use Framework\Validation;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    public function testStringValidation()
    {
        $this->assertTrue(Validation::string('hello', 3, 10));
        $this->assertFalse(Validation::string('hello', 11, 15));
        $this->assertFalse(Validation::string('hello'));
        $this->assertFalse(Validation::string(123));
    }

    public function testEmailValidation()
    {
        $this->assertEquals('test@example.com', Validation::email('test@example.com'));
        $this->assertFalse(Validation::email('invalid-email'));
        $this->assertFalse(Validation::email(null));
    }

    public function testMatchFunction()
    {
        $this->assertTrue(Validation::match('hello', 'hello'));
        $this->assertFalse(Validation::match('hello', 'world'));
        $this->assertFalse(Validation::match('', 'hello'));
        $this->assertFalse(Validation::match(null, 'hello'));
    }

    public function testInvalidInputHandling()
    {
        $this->assertFalse(Validation::string(123, 1, 10));
        $this->assertFalse(Validation::email(123));
        $this->assertFalse(Validation::match(123, 'hello'));
    }
}
