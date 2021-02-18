<?php

class PHPUnitTest extends PHPUnit\Framework\TestCase {

    public function testAssertions() {
        $this->assertTrue(true);
        $this->assertFalse(false);
        $this->assertNull(null);
        // $this->assertNotNull(null); // trigger a failure
        $this->assertNotNull("dude"); // trigger a failure
    }
}