<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\DataTransferObject;

class GetMobileSection extends DataTransferObject
{
    public int $id;

    public ?int $toclevel;

    public ?string $anchor;

    public ?string $line;

    public ?string $text;

    public ?bool $isReferenceSection;
}