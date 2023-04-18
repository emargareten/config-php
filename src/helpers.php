<?php

use Emargareten\Config\Config;

if (! function_exists('config')) {

    /**
     * @return Config|mixed
     */
    function config(string $key = null, mixed $default = null): mixed
    {
        $config = new Config();

        if (is_null($key)) {
            return $config;
        }

        return $config->get($key, $default);
    }
}
