<?php

namespace Sudhaus7\Ticketform\Interfaces;

use Sudhaus7\Ticketform\Domain\Model\FormdataDTO;

interface DriverInterface
{
    public function getCategories():array;
    public function generateTicket(FormdataDTO $dto):int|string|null;

}
