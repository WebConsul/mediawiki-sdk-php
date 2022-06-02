<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GetLanguages extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: PageLanguageObject::class)]
    public array $languages;

    /**
     * @throws UnknownProperties
     */
    public function __construct($args)
    {
        parent::__construct(['languages' => $args]);
    }
}
