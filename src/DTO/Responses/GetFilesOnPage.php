<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetFilesOnPage extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: FileObject::class)]
    public array $files;
}
