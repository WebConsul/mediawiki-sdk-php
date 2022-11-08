<?php
/**
 * Author:         ISOMAIN
 * Create date:    08.11.2022/21:36
 * Project:        mediawiki-sdk-php
 * File:           GetPageCheck.php
 */

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class GetPageCheck extends DataTransferObject
{
    public array $items = [
        "data-parsoid",
        "html",
        "lint",
        "media-list",
        "mobile-html",
        "mobile-html-offline-resources",
        "mobile-sections",
        "mobile-sections-lead",
        "mobile-sections-remaining",
        "pdf",
        "random",
        "related",
        "segments",
        "summary",
        "talk",
        "title",
        "wikitext"
    ];
}