<?php

namespace MediawikiSdkPhp\DTO\Responses;

use Spatie\DataTransferObject\DataTransferObject;

class PageTitleObject extends DataTransferObject
{
    /**
     * @var string
     */
    public string $title;

    /**
     * @var int
     */
    public int $page_id;

    /**
     * @var int
     */
    public int $rev;

    /**
     * @var string
     */
    public string $tid;

    /**
     * @var int
     */
    public int $namespace;

    /**
     * @var int
     */
    public int $user_id;

    /**
     * @var string
     */
    public string $user_text;

    /**
     * @var string
     */
    public string $timestamp;

    /**
     * @var string
     */
    public string $comment;

    /**
     * @var array
     */
    public array $tags;

    /**
     * @var array
     */
    public array $restrictions;

    /**
     * @var string
     */
    public string $page_language;

    /**
     * @var bool
     */
    public bool $redirect;
}