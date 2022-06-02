<?php

namespace MediawikiSdkPhp\DTO\Requests;

use Ekut\SpatieDtoValidators\Choice;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class GetPageHistoryRequest extends PageRequest
{
    /**
     * Accepts a revision ID. Returns the next 20 revisions older than the given revision ID.
     */
    public ?int $older_than;

    /**
     * Accepts a revision ID. Returns the next 20 revisions newer than the given revision ID.
     */
    public ?int $newer_than;

    /**
     * Filter that returns only revisions with certain tags, one of:
     *   - reverted: Returns only revisions that revert an earlier edit
     *   - anonymous: Returns only revisions made by anonymous users
     *   - bot: Returns only revisions made by bots
     *   - minor: Returns only revisions marked as minor edits
     *
     * The API supports one filter per request.
     */
    #[Choice(['reverted', 'anonymous', 'bot', 'minor'])]
    public ?string $filter;

}
