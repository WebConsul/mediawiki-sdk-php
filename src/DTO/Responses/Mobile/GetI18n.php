<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetI18n extends DataTransferObject
{
    public string $locale;

    /**
     * @var GetI18nMessage[]
     */
    #[CastWith(ArrayCaster::class, itemType: GetI18nMessage::class)]
    public array $messages;
}
