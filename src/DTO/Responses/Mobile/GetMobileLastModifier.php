<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\DataTransferObject;

class GetMobileLastModifier extends DataTransferObject
{
    public string $user;

    public string $gender;
}
