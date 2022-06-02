<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class CompareRevisionsRequest extends DataTransferObject
{
    /**
     * Revision identifier to use as the base for comparison
     */
    public int $from;

    /**
     * Revision identifier to compare to the base
     */
    public int $to;
}
