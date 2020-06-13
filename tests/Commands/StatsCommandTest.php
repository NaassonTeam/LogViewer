<?php

declare(strict_types=1);

namespace Naasson\LogViewer\Tests\Commands;

use Naasson\LogViewer\Tests\TestCase;

/**
 * Class     StatsCommandTest
 *
 * @package  Naasson\LogViewer\Tests\Commands
 * @author   NaassonTeam <info@naasson.com>
 */
class StatsCommandTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_display_stats(): void
    {
        $this->artisan('log-viewer:stats')
             ->assertExitCode(0);
    }
}
