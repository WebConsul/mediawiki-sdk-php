<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class Offset extends DataTransferObject
{
    /**
     * The first byte of the line in the from revision.
     * A null value indicates that the line doesn't exist in the from revision.
     */
    public ?int $from;

    /**
     * The first byte of the line in the to revision.
     * A null value indicates that the line doesn't exist in the to revision.
     */
    public ?int $to;
}
