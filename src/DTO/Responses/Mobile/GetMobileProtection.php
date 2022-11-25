<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\DataTransferObject;

class GetMobileProtection extends DataTransferObject
{
    public ?array $edit;

    public ?array $move;
}
