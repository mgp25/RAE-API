<?php

namespace RAE\Response;

use RAE\AutoPropertyHandler;

class SearchWordResponse extends AutoPropertyHandler
{
    public $approx;
    /**
     * @var Model\Res[]
     */
    public $res;
}
