<?php

namespace FaceitApi\Service;

use FaceitApi\FaceitClient;

interface ServiceInterface
{
    public function __construct(FaceitClient $faceitClient);
}