<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class PageLanguageObject extends DataTransferObject
{
    /**
     * Language code. For Wikimedia projects, see the site matrix on Meta-Wiki.
     *
     * @see https://meta.wikimedia.org/wiki/Special:SiteMatrix
     */
    public string $code;

    /**
     * Translated language name
     */
    public string $name;

    /**
     * Translated page title in URL-friendly format
     */
    public string $key;

    /**
     * Translated page title in reading-friendly format
     */
    public string $title;
}
