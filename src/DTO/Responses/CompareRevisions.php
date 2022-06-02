<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CompareRevisions extends DataTransferObject
{
    /**
     * Information about the base revision used in the comparison
     */
    public FromToObject $from;

    /**
     * Information about the revision being compared to the base revision
     */
    public FromToObject $to;

    /**
     * Each object in the diff array represents a line in a visual, line-by-line comparison between the two revisions.
     */
    #[CastWith(ArrayCaster::class, itemType: Diff::class)]
    public ?array $diff;

    /**
     * Visual indicators to use when a paragraph's location differs between the two revisions.
     * moveInfo objects occur in pairs within the diff.
     */
    #[CastWith(ArrayCaster::class, itemType: MoveInfo::class)]
    public ?array $moveInfo;

    /**
     * The location of the line in bytes from the beginning of the page
     */
    #[CastWith(ArrayCaster::class, itemType: Offset::class)]
    public ?array $offset;
}
