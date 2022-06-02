<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class GetPageHistoryCounts extends DataTransferObject
{
    /**
     * The value of the data point up to the type's limit.
     * If the value exceeds the limit, the API returns the limit as the value of count and sets the limit property to true.
     */
    public int $count;

    /**
     * Returns true if the data point exceeds the type's limit.
     */
    public bool $limit;
}
