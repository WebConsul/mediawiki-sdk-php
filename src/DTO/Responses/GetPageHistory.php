<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetPageHistory extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: RevisionObject::class)]
    public array $revisions;
}
