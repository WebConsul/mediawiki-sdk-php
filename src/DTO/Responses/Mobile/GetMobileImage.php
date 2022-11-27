<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\DataTransferObject;

class GetMobileImage extends DataTransferObject
{
    public ?string $file;

    public ?array $urls;
}
