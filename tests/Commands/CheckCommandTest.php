<?php

declare(strict_types=1);

namespace NaassonTeam\LogViewer\Tests\Commands;

use NaassonTeam\LogViewer\Tests\TestCase;

/**
 * Class     CheckCommandTest
 *
 * @package  NaassonTeam\LogViewer\Tests\Commands
 * @author   NaassonTeam <info@naasson.com>
 */
class CheckCommandTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_check(): void
    {
        $this->artisan('log-viewer:check')
             ->assertExitCode(0);
    }
}
