<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class PageRequest extends DataTransferObject
{
    public string $title;
}
