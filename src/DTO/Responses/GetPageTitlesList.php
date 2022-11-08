<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetPageTitlesList extends DataTransferObject
{
    /**
     * @var array
     */
    #[CastWith(ArrayCaster::class, itemType: PageTitleObject::class)]
    public array $items;
}