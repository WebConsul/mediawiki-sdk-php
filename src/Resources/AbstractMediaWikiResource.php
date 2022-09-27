<?php

namespace MediawikiSdkPhp\Resources;

abstract class AbstractMediaWikiResource extends AbstractResource
{
    const MEDIAWIKI_REST_API = 'w/rest.php/v1/';

    public function getApiRoot(): string
    {
        $apiRoot = get_class($this) === FileResource::class ?
            $_ENV['COMMONS_HOST'] :
            $_ENV['MEDIAWIKI_HOST'];

        $apiRoot .= self::MEDIAWIKI_REST_API;

        return $apiRoot;
    }
}
