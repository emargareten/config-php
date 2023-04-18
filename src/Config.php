<?php

namespace Emargareten\Config;

class Config
{
    protected static array $config;

    protected static string $path;

    public function __construct(string $path = null)
    {
        if ($path) {
            static::setPath($path);
        }

        if (! isset(static::$path) && ! isset(static::$config)) {
            throw new MissingConfigPathException();
        }

        static::$config ??= require static::$path;
    }

    public static function setPath(string $path): static
    {
        static::$path = $path;

        return new static();
    }

    public static function getPath(): string
    {
        return static::$path;
    }

    public static function setValues(array $values): static
    {
        static::$config = $values;

        return new static();
    }

    public static function get(string $key, $default = null): mixed
    {
        return static::$config[$key] ?? $default;
    }

    public static function all(): array
    {
        return static::$config;
    }

    public static function has(string $key): bool
    {
        return isset(static::$config[$key]);
    }

    public static function set(string $key, mixed $value): void
    {
        static::$config[$key] = $value;
    }

    public static function forget(string $key): void
    {
        unset(static::$config[$key]);
    }

    public static function clear(): void
    {
        static::$config = [];
    }

    public static function setMany(array $values): void
    {
        static::$config = array_merge(static::$config, $values);
    }

    public static function reset(): static
    {
        if (! isset(static::$path)) {
            throw new MissingConfigPathException();
        }

        static::$config = require static::$path;

        return new static();
    }
}
