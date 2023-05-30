<?php

namespace Sudhaus7\Ticketform\Services;

use Sudhaus7\Ticketform\Drivers\RedmineDriver;
use Sudhaus7\Ticketform\Interfaces\DriverInterface;

class TicketSystemFactory
{
    public static function getDriver():DriverInterface
    {
        return new RedmineDriver();
    }

}
