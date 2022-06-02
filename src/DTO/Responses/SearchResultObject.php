<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class SearchResultObject extends DataTransferObject
{
    /**
     * SearchResultObject identifier
     */
    public int $id;

    /**
     * SearchResultObject title in URL-friendly format
     */
    public string $key;

    /**
     * SearchResultObject title in reading-friendly format
     */
    public string $title;

    /**
     * For search pages endpoint:
     * A few lines giving a sample of page content with search terms highlighted with <span class=\"searchmatch\"> tags
     *
     * For autocomplete page title endpoint:
     * SearchResultObject title in reading-friendly format
     */
    public string $excerpt;

    /**
     * The title of the page redirected from, if the search term originally matched a redirect page or
     * null if search term did not match a redirect page.
     */
    public ?string $matched_title = null;

    /**
     * Short summary of the page topic based on the corresponding entry on Wikidata or null if no entry exists
     */
    public ?string $description = null;

    /**
     * Information about the thumbnail image for the page or null if no thumbnail exists.
     */
    public ?Thumbnail $thumbnail = null;
}
