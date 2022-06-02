<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class LatestRevisionOfPage extends DataTransferObject
{
    /**
     * Revision identifier for the latest revision
     */
    public int $id;

    /**
     * Timestamp of the latest revision in ISO 8601 format
     */
    public string $timestamp;
}
