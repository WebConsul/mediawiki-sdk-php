<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class License extends DataTransferObject
{
    /**
     * URL of the applicable license
     */
    public string $url;

    /**
     * Name of the applicable license
     */
    public string $title;
}
