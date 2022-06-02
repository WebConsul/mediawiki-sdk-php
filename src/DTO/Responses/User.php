<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * For anonymous users, the name contains the originating IP address, and the id is null.
 */
class User extends DataTransferObject
{
    public ?int $id;

    public string $name;
}
