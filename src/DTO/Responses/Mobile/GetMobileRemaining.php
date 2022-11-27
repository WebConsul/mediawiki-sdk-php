<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetMobileRemaining extends DataTransferObject
{
    /**
     * @var GetMobileSection[]
     */
    #[CastWith(ArrayCaster::class, itemType: GetMobileSection::class)]
    public array $sections;
}
