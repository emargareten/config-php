<?php

namespace Emargareten\Config;

use Exception;

class MissingConfigPathException extends Exception
{
    public function __construct()
    {
        parent::__construct('Please set the path to the config file.');
    }
}
