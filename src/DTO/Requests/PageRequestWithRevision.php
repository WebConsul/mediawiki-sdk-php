<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class PageRequestWithRevision extends PageRequest
{
    public int $revision;
}
