<?php

declare(strict_types=1);

namespace NaassonTeam\LogViewer\Tests\Providers;

use NaassonTeam\LogViewer\Contracts;
use NaassonTeam\LogViewer\Providers\DeferredServicesProvider;
use NaassonTeam\LogViewer\Tests\TestCase;

/**
 * Class     DeferredServicesProviderTest
 *
 * @package  NaassonTeam\LogViewer\Tests\Providers
 * @author   NaassonTeam <info@naasson.com>
 */
class DeferredServicesProviderTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /** @var  \NaassonTeam\LogViewer\Providers\DeferredServicesProvider */
    private $provider;

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    protected function setUp(): void
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(DeferredServicesProvider::class);
    }

    protected function tearDown(): void
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */

    public function it_can_be_instantiated(): void
    {
        $expectations = [
            \Illuminate\Support\ServiceProvider::class,
            \Illuminate\Contracts\Support\DeferrableProvider::class,
            \Arcanedev\Support\Providers\ServiceProvider::class,
            DeferredServicesProvider::class,
        ];

        foreach ($expectations as $expected) {
            static::assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides(): void
    {
        $expected = [
            Contracts\LogViewer::class,
            Contracts\Utilities\LogLevels::class,
            Contracts\Utilities\LogStyler::class,
            Contracts\Utilities\LogMenu::class,
            Contracts\Utilities\Filesystem::class,
            Contracts\Utilities\Factory::class,
            Contracts\Utilities\LogChecker::class,
        ];

        static::assertSame($expected, $this->provider->provides());
    }
}
