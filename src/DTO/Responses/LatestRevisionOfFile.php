<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class LatestRevisionOfFile extends DataTransferObject
{
    public string $timestamp;

    public User $user;
}
