<?php

namespace Tests;

use EXACTSports\FedEx\FedExProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    protected function getPackageProviders($app)
    {
        return [
            FedExProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('app.key', 'base64:r0w0xC+mYYqjbZhHZ3uk1oH63VadA3RKrMW52OlIDzI=');
        $app['config']->set('fedex.apiBaseUrl', 'https://api.test.office.fedex.com');
        $app['config']->set('fedex.clientId', 'l76638a185084740e98e277ea5d1ea7a65');
        $app['config']->set('fedex.clientSecret', 'bd407582c87c426d8667aaba3bd3af7b');
    }
}
