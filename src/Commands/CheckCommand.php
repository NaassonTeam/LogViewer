<?php

declare(strict_types=1);

namespace Naasson\LogViewer\Commands;

use Naasson\LogViewer\Contracts\Utilities\LogChecker as LogCheckerContract;

/**
 * Class     PublishCommand
 *
 * @package  Naasson\LogViewer\Commands
 * @author   NaassonTeam <info@naasson.com>
 */
class CheckCommand extends Command
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name      = 'log-viewer:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all LogViewer requirements.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log-viewer:check';

    /* -----------------------------------------------------------------
     |  Getter & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the Log Checker instance.
     *
     * @return \Naasson\LogViewer\Contracts\Utilities\LogChecker
     */
    protected function getChecker()
    {
        return $this->laravel[LogCheckerContract::class];
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->displayLogViewer();
        $this->displayRequirements();
        $this->displayMessages();
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Display LogViewer requirements.
     */
    private function displayRequirements()
    {
        $requirements = $this->getChecker()->requirements();

        $this->frame('Application requirements');

        $this->table([
            'Status', 'Message'
        ], [
            [$requirements['status'], $requirements['message']]
        ]);
    }

    /**
     * Display LogViewer messages.
     */
    private function displayMessages()
    {
        $messages = $this->getChecker()->messages();

        $rows = [];
        foreach ($messages['files'] as $file => $message) {
            $rows[] = [$file, $message];
        }

        if ( ! empty($rows)) {
            $this->frame('LogViewer messages');
            $this->table(['File', 'Message'], $rows);
        }
    }
}