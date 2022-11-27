<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class PageWithRevisionRequest extends PageRequest
{
    public int $revision;
}
