<?php

namespace MediawikiSdkPhp\DTO\Requests;

class PageHtmlRequest extends PageRequest
{
    /**
     * Requests for redirect pages return HTTP 302 with a redirect target in Location header and content in the body.
     * To get a 200 response instead, supply false to the redirect parameter.
     *
     * @var bool|null
     */
    public ?bool $redirect;

    /**
     * Whether to temporary stash data-parsoid in order to support transforming the modified content later.
     * If this parameter is set, requests are rate-limited on a per-client basis (max 5 requests per second per client)
     *
     * @var bool|null
     */
    public ?bool $stash;
}