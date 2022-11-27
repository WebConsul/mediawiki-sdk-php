<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class PageRequestWithRevision extends DataTransferObject
{
    public string $title;

    public int $revision;
}
