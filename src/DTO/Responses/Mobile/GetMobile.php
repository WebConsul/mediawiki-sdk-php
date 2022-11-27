<?php

namespace MediawikiSdkPhp\DTO\Responses\Mobile;

use Spatie\DataTransferObject\DataTransferObject;

class GetMobile extends DataTransferObject
{
    public GetMobileLead $lead;

    public GetMobileRemaining $remaining;
}
