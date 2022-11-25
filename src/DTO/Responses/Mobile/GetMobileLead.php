<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetMobileLead extends DataTransferObject
{
    public int $ns;

    public int $id;

    public string $revision;

    public string $lastmodified;

    public GetMobileLastModifier $lastmodifier;

    public string $displaytitle;

    public string $normalizedtitle;

    public string $wikibase_item;

    public string $description;

    public string $description_source;

    public GetMobileProtection $protection;

    public bool $editable;

    public int $languagecount;

    public ?GetMobileImage $image;

    public ?GetMobilePronunciation $pronunciation;

    public ?GetMobileSpoken $spoken;

    public ?array $hatnotes;

    /**
     * @var GetMobileSections[]
     */
    #[CastWith(ArrayCaster::class, itemType: GetMobileSections::class)]
    public ?array $sections;
}
