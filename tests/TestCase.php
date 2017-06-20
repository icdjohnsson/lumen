<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function dump()
    {
        echo cc('HTTP-status: '.$this->response->status()."\n", 'green');
        eject(json_decode($this->response->content(), true), 'light_gray', 'dark_gray');
        die();
    }
}
