<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class FromToObject extends DataTransferObject
{
    /**
     * Revision identifier
     */
    public int $id;

    /**
     * Area of the page being compared, usually main
     */
    public string $slot_role;

    #[CastWith(ArrayCaster::class, itemType: Section::class)]
    public array $sections;
}
