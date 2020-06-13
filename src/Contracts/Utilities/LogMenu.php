<?php

declare(strict_types=1);

namespace Naasson\LogViewer\Contracts\Utilities;

use Naasson\LogViewer\Entities\Log;
use Illuminate\Contracts\Config\Repository as ConfigContract;

/**
 * Interface  LogMenu
 *
 * @package   Naasson\LogViewer\Contracts\Utilities
 * @author    NaassonTeam <info@naasson.com>
 */
interface LogMenu
{
    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Set the config instance.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     *
     * @return self
     */
    public function setConfig(ConfigContract $config);

    /**
     * Set the log styler instance.
     *
     * @param  \Naasson\LogViewer\Contracts\Utilities\LogStyler  $styler
     *
     * @return self
     */
    public function setLogStyler(LogStyler $styler);

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Make log menu.
     *
     * @param  \Naasson\LogViewer\Entities\Log  $log
     * @param  bool                               $trans
     *
     * @return array
     */
    public function make(Log $log, $trans = true);
}
