<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetMobileRemaining extends DataTransferObject
{
    /**
     * @var GetMobileSections[]
     */
    #[CastWith(ArrayCaster::class, itemType: GetMobileSections::class)]
    public array $sections;
}
