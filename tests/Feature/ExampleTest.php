<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest() {
        $response = $this->get('/'); // gives us back a larave/framework/src/illuminate/Testing/TestResponse object

        $response->assertStatus(200);
    }
}
