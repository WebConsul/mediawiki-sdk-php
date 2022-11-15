<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class GetPageSummary extends DataTransferObject
{
    public array $titles;

    public int $pageid;

    public string $extract;

    public string $extract_html;

    public array $thumbnail;

    public array $originalimage;

    public string $lang;

    public string $dir;

    public string $timestamp;

    public string $description;
}
