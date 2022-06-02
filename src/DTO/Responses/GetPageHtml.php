<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class GetPageHtml extends DataTransferObject
{
    public string $html;
}
