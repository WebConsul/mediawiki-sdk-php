<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Ekut\SpatieDtoValidators\GreaterThanOrEqual;
use Ekut\SpatieDtoValidators\LessThanOrEqual;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Diff extends DataTransferObject
{
    /**
     * The type of change represented by the diff object, either:
     * 0: A line with the same content in both revisions, included to provide context when viewing the diff. The API returns up to two context lines around each change.
     * 1: A line included in the to revision but not in the from revision.
     * 2: A line included in the from revision but not in the to revision.
     * 3: A line containing text that differs between the two revisions. (For changes to paragraph location as well as content, see type 5.)
     * 4: When a paragraph's location differs between the two revisions, a type 4 object represents the location in the from revision.
     * 5: When a paragraph's location differs between the two revisions, a type 5 object represents the location in the to revision. This type can also include word-level differences between the two revisions.
     */
    #[GreaterThanOrEqual(0)]
    #[LessThanOrEqual(5)]
    public int $type;

    /**
     * The line number of the change based on the to revision.
     */
    public ?int $lineNumber;

    /**
     * The text of the line, including content from both revisions.
     * For a line containing text that differs between the two revisions,
     * you can use highlightRanges to visually indicate added and removed text.
     * For a line containing a new line, the API returns the text as "" (empty string).
     */
    public string $text;

    /**
     * An array of objects that indicate where and in what style text should be highlighted to visually represent changes.
     */
    #[CastWith(ArrayCaster::class, itemType: HighlightRange::class)]
    public ?array $highlightRanges;
}
