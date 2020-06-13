<?php

declare(strict_types=1);

namespace Naasson\LogViewer\Http\Routes;

use Naasson\Support\Routing\RouteRegistrar;

/**
 * Class     LogViewerRoute
 *
 * @package  Naasson\LogViewer\Http\Routes
 * @author   NaassonTeam <info@naasson.com>
 *
 * @codeCoverageIgnore
 */
class LogViewerRoute extends RouteRegistrar
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Map all routes.
     */
    public function map(): void
    {
        $attributes = array_merge(config('log-viewer.route.attributes', []), [
            'namespace' => 'Arcanedev\\LogViewer\\Http\\Controllers',
        ]);

        $this->group($attributes, function() {
            $this->name('log-viewer::')->group(function () {
                // log-viewer::dashboard
                $this->get('/', 'LogViewerController@index')->name('dashboard');

                $this->mapLogsRoutes();
            });
        });
    }

    /**
     * Map the logs routes.
     */
    private function mapLogsRoutes(): void
    {
        $this->prefix('logs-{type}')->name('logs.')->group(function() {
            $this->get('/', 'LogViewerController@listLogs')
                ->name('list'); // log-viewer::logs.list

            $this->delete('delete', 'LogViewerController@delete')
                ->name('delete'); // log-viewer::logs.delete

            $this->prefix('{date}')->group(function() {
                $this->get('/', 'LogViewerController@show')
                    ->name('show'); // log-viewer::logs.show

                $this->get('download', 'LogViewerController@download')
                    ->name('download'); // log-viewer::logs.download

                $this->get('{level}', 'LogViewerController@showByLevel')
                    ->name('filter'); // log-viewer::logs.filter

                $this->get('{level}/search', 'LogViewerController@search')
                    ->name('search'); // log-viewer::logs.search
            });
        });
    }
}
