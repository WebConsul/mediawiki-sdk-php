<?php

namespace MediawikiSdkPhp\Resources;

use MediawikiSdkPhp\Resources\MediaWiki\FileResource;

abstract class AbstractMediaWikiResource extends AbstractResource
{
    const MEDIAWIKI_REST_API = 'w/rest.php/v1/';

    public function getApiRoot(): string
    {
        $apiRoot = get_class($this) === FileResource::class ?
            $_ENV['COMMONS_HOST'] :
            $_ENV['MEDIAWIKI_HOST'];

        $apiRoot .= self::MEDIAWIKI_REST_API;

        return str_replace('{lang}', $this->getLang(), $apiRoot);
    }
}
