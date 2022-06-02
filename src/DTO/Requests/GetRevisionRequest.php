<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class GetRevisionRequest extends DataTransferObject
{
    /**
     * Revision ID
     */
    public int $id;
}
