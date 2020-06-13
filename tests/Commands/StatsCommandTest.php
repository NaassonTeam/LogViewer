<?php

declare(strict_types=1);

namespace NaassonTeam\LogViewer\Tests\Commands;

use NaassonTeam\LogViewer\Tests\TestCase;

/**
 * Class     StatsCommandTest
 *
 * @package  NaassonTeam\LogViewer\Tests\Commands
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
