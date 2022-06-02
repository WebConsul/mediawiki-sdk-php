<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Ekut\SpatieDtoValidators\Choice;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class GetPageHistoryCountsRequest extends PageRequest
{
    /**
     * Type of count, one of:
     *   - anonymous: Edits made by anonymous users. Limit: 10,000
     *   - bot: Edits made by bots. Limit: 10,000
     *   - editors: Users or bots that have edited a page. Limit: 25,000
     *   - edits: Any change to page content. Limit: 30,000
     *   - minor: Edits marked as minor. If the minor edit count exceeds 2,000, the API returns a 500 error. Limit: 1,000
     *   - reverted: Edits that revert an earlier edit. Limit: 30,000
     */
    #[Choice(['anonymous', 'bot', 'editors', 'edits', 'minor', 'reverted'])]
    public string $type;

    /**
     * For edits and editors types only
     * Restricts the count to between two revisions, specified by revision ID.
     * The from and to query parameters must be used as a pair.
     * The result excludes the edits or editors represented by the from and to revisions.
     */
    public ?int $from;

    /**
     * For edits and editors types only
     * Restricts the count to between two revisions, specified by revision ID.
     * The from and to query parameters must be used as a pair.
     * The result excludes the edits or editors represented by the from and to revisions.
     */
    public ?int $to;
}
