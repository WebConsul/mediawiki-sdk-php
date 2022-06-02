<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class PageObject extends DataTransferObject
{
    /**
     * Page identifier
     */
    public int $id;

    /**
     * Page title in URL-friendly format
     */
    public string $key;

    /**
     * Page title in reading-friendly format
     */
    public string $title;


    /**
     * Information about the latest revision
     */
    public ?LatestRevisionOfPage $latest;

    /**
     * Information about the wiki's license
     */
    public ?License $license;

    /**
     * Type of content on the page.
     * See the content handlers reference for content models supported by MediaWiki and extensions.
     * @see https://www.mediawiki.org/wiki/Special:MyLanguage/Content_handlers?tableofcontents=0
     */
    public ?string $content_model;
}
