<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ApplicationTest extends TestCase
{
    public function testRoot()
    {
        $this->json('GET', '/')->seeJsonEquals([
            'name' => env('APP_NAME', 'icdjohnsson-lumen'), 'verison' => env('VERSION', 'x')
        ]);

    }
}
