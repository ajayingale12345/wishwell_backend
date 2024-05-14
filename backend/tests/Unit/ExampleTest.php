<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
    
    /**
     * Test that false is false.
     */
    public function test_that_false_is_false(): void
    {
        $this->assertFalse(false);
    }
    
    /**
     * Test that a string is not empty.
     */
    public function test_that_string_is_not_empty(): void
    {
        $string = "Hello, World!";
        $this->assertNotEmpty($string);
    }
    
    /**
     * Test that an array contains a specific value.
     */
    public function test_that_array_contains_value(): void
    {
        $array = [1, 2, 3, 4, 5];
        $this->assertContains(3, $array);
    }
    
    /**
     * Test that two values are equal.
     */
    public function test_that_values_are_equal(): void
    {
        $value1 = 10;
        $value2 = 10;
        $this->assertEquals($value1, $value2);
    }
}
