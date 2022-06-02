<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class RevisionObject extends DataTransferObject
{
    /**
     * Revision identifier
     */
    public int $id;

    /**
     * Object containing information about the user that made the edit, including:
     *   - name (string): Username
     *   - id (integer): User identifier
     *
     * For anonymous users, the name contains the originating IP address, and the id is null.
     */
    public User $user;

    /**
     * Time of the edit in ISO 8601 format
     */
    public string $timestamp;

    /**
     * Comment or edit summary written by the editor. For revisions without a comment, the API returns null or "".
     */
    public ?string $comment;

    /**
     * Size of the revision in bytes
     */
    public int $size;

    /**
     * Number of bytes changed, positive or negative, between a revision and the preceding revision (example: -20).
     * If the preceding revision is unavailable, the API returns null.
     */
    public ?int $delta;

    /**
     * Set to true for edits marked as minor
     */
    public bool $minor;
}
