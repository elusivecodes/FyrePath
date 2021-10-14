<?php
declare(strict_types=1);

namespace Fyre;

use const
    PATHINFO_DIRNAME,
    PATHINFO_BASENAME,
    PATHINFO_FILENAME,
    PATHINFO_EXTENSION;

use function
    array_map,
    array_pop,
    array_reverse,
    array_unshift,
    getcwd,
    explode,
    implode,
    pathinfo,
    rtrim;

/**
 * Path
 */
abstract class Path
{

    public const SEPARATOR = DIRECTORY_SEPARATOR;

    /**
     * Get the base name from a file path.
     * @param string $path The file path.
     * @return string The base name.
     */
    public static function baseName(string $path): string
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    /**
     * Get the directory name from a file path.
     * @param string $path The file path.
     * @return string The directory name.
     */
    public static function dirName(string $path): string
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    /**
     * Get the file extension from a file path.
     * @param string $path The file path.
     * @return string The file extension.
     */
    public static function extension(string $path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * Get the file name from a file path.
     * @param string $path The file path.
     * @return string The file name.
     */
    public static function fileName(string $path): string
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    /**
     * Format path info as a file path.
     * @param array $pathInfo The path info.
     * @return string The file path.
     */
    public static function format(array $pathInfo): string
    {
        return static::join($pathInfo['dirname'] ?? '', $pathInfo['basename'] ?? '');
    }

    /**
     * Determine if a file path is absolute.
     * @param string $path The file path.
     * @return bool TRUE if the file path is absolute, otherwise FALSE.
     */
    public static function isAbsolute(string $path): bool
    {
        return $path && $path[0] === static::SEPARATOR;
    }

    /**
     * Join path segments.
     * @param string ...$paths The path segments.
     * @param string The file path.
     */
    public static function join(string ...$paths): string
    {
        $paths = array_map(
            fn($path) => rtrim($path, static::SEPARATOR),
            array_filter($paths)
        );
        $path = implode(static::SEPARATOR, $paths);

        return static::normalize($path);
    }

    /**
     * Normalize a file path.
     * @param string $path The file path.
     * @return string The normalized path.
     */
    public static function normalize(string $path = ''): string
    {
        if (!$path) {
            return '.';
        }

        $segments = explode(static::SEPARATOR, $path);
        $newPath  = [];
        foreach ($segments as $segment) {
            if ($segment === '.') {
                if ($newPath === []) {
                    $dir = getcwd();
                    $newPath = explode(static::SEPARATOR, $dir);
                }

                continue;
            }

            if ($segment === '..' && $newPath !== []) {
                $lastPath = array_pop($newPath);
                if ($lastPath !== '..') {
                    continue;
                }

                $newPath[] = $lastPath;
            }

            $newPath[] = $segment;
        }

        return implode(static::SEPARATOR, $newPath);
    }

    /**
     * Parse a file path.
     * @param string $path The file path.
     * @return array The path info.
     */
    public static function parse(string $path): array
    {
        return pathinfo($path);
    }

    /**
     * Resolve a file path from path segments.
     * @param string ...$paths The path segments.
     * @param string The file path.
     */
    public static function resolve(string ...$paths): string
    {
        if ($paths === []) {
            return getcwd();
        }

        $paths = array_reverse($paths);
        $newPath = [];
        foreach ($paths as $path) {
            array_unshift($newPath, $path);
            $testPath = static::join(...$newPath);
            if (static::isAbsolute($testPath)) {
                return $testPath;
            }
        }

        array_unshift($newPath, '.');

        return static::join(...$newPath);
    }

}
