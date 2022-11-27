<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Ekut\SpatieDtoValidators\Choice;
use Spatie\DataTransferObject\DataTransferObject;

class GetI18nRequest extends DataTransferObject
{
    #[Choice(['pcs'])]
    public string $type;
}
