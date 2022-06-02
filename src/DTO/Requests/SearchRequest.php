<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Ekut\SpatieDtoValidators\GreaterThan;
use Ekut\SpatieDtoValidators\LessThanOrEqual;
use Spatie\DataTransferObject\Attributes\Strict;
use Spatie\DataTransferObject\DataTransferObject;

#[Strict]
class SearchRequest extends DataTransferObject
{
    public string $q;

    #[GreaterThan(0)]
    #[LessThanOrEqual(100)]
    public ?int $limit = 50;
}
