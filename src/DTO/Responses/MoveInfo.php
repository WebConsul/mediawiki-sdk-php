<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Ekut\SpatieDtoValidators\Choice;
use Spatie\DataTransferObject\DataTransferObject;

class MoveInfo extends DataTransferObject
{
    /**
     * The ID of the paragraph described by the diff object.
     */
    public string $id;

    /**
     * The ID of the corresponding paragraph.
     * for type 4 diff objects, linkId represents the location in the to revision.
     * for type 5 diff objects, linkId represents the location in the from revision.
     */
    public string $linkId;

    /**
     * A visual indicator of the relationship between the two locations. You can
     * use this property to display an arrow icon within the diff.
     * 0 indicates that the linkId paragraph is lower on the page than the id paragraph.
     * 1 indicates that the linkId paragraph is higher on the page than the id paragraph.
     */
    #[Choice([0, 1])]
    public int $linkDirection;
}
