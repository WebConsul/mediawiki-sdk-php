<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class SearchResults extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: SearchResultObject::class)]
    public array $pages;
}
