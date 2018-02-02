<?php
namespace Tests\Functional;

class RoutesTest extends BaseTestCase
{
    public function testTodoGet() {
        $this->assertTrue(true);
    } 
    
    public function testGetstuff()
    {
        $response = $this->runApp('GET', '/what/what');

        $this->assertEquals(200, $response->getStatusCode());
        // $this->assertContains('Bob', (string)$response->getBody());
        // $this->assertSame( (string)$response->getBody(), json_encode(['foo' => 'bar']));


    }

    public function testGetEquipment()
    {
        $response = $this->runApp('GET', '/equipment/list');

        $this->assertEquals(201, $response->getStatusCode());
        // $this->assertContains('Bob', (string)$response->getBody());
        // $this->assertSame( (string)$response->getBody(), json_encode(['foo' => 'bar']));


    }
}