<?php
declare(strict_types=1);

namespace Fyre\Utility;

use function array_filter;
use function array_pop;
use function array_reverse;
use function array_unshift;
use function count;
use function explode;
use function getcwd;
use function implode;
use function pathinfo;

use const DIRECTORY_SEPARATOR;
use const PATHINFO_BASENAME;
use const PATHINFO_DIRNAME;
use const PATHINFO_EXTENSION;
use const PATHINFO_FILENAME;

/**
 * Path
 */
abstract class Path
{
    public const SEPARATOR = DIRECTORY_SEPARATOR;

    /**
     * Get the base name from a file path.
     *
     * @param string $path The file path.
     * @return string The base name.
     */
    public static function baseName(string $path): string
    {
        return pathinfo($path, PATHINFO_BASENAME);
    }

    /**
     * Get the directory name from a file path.
     *
     * @param string $path The file path.
     * @return string The directory name.
     */
    public static function dirName(string $path): string
    {
        return pathinfo($path, PATHINFO_DIRNAME);
    }

    /**
     * Get the file extension from a file path.
     *
     * @param string $path The file path.
     * @return string The file extension.
     */
    public static function extension(string $path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    /**
     * Get the file name from a file path.
     *
     * @param string $path The file path.
     * @return string The file name.
     */
    public static function fileName(string $path): string
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    /**
     * Format path info as a file path.
     *
     * @param array $pathInfo The path info.
     * @return string The file path.
     */
    public static function format(array $pathInfo): string
    {
        return static::join($pathInfo['dirname'] ?? '', $pathInfo['basename'] ?? '');
    }

    /**
     * Determine whether a file path is absolute.
     *
     * @param string $path The file path.
     * @return bool TRUE if the file path is absolute, otherwise FALSE.
     */
    public static function isAbsolute(string $path): bool
    {
        return $path && $path[0] === DIRECTORY_SEPARATOR;
    }

    /**
     * Join path segments.
     *
     * @param string ...$paths The path segments.
     * @param string The file path.
     */
    public static function join(string ...$paths): string
    {
        $paths = array_filter($paths);
        $path = implode(DIRECTORY_SEPARATOR, $paths);

        return static::normalize($path);
    }

    /**
     * Normalize a file path.
     *
     * @param string $path The file path.
     * @return string The normalized path.
     */
    public static function normalize(string $path = ''): string
    {
        if (!$path) {
            return '.';
        }

        $segments = explode(DIRECTORY_SEPARATOR, $path);

        $newPath = [];
        foreach ($segments as $i => $segment) {
            if ($segment === '.') {
                if ($newPath === []) {
                    $dir = getcwd();
                    $newPath = explode(DIRECTORY_SEPARATOR, $dir);
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

            if ($segment === '' && $newPath !== [] && $i < count($segments) - 1) {
                continue;
            }

            $newPath[] = $segment;
        }

        return implode(DIRECTORY_SEPARATOR, $newPath);
    }

    /**
     * Parse a file path.
     *
     * @param string $path The file path.
     * @return array The path info.
     */
    public static function parse(string $path): array
    {
        return pathinfo($path);
    }

    /**
     * Resolve a file path from path segments.
     *
     * @param string ...$paths The path segments.
     * @param string The file path.
     */
    public static function resolve(string ...$paths): string
    {
        if ($paths === []) {
            return getcwd();
        }

        $paths = array_reverse($paths);
        $pathSegments = [];
        foreach ($paths as $path) {
            if (!$path) {
                continue;
            }

            array_unshift($pathSegments, $path);

            if ($path[0] !== DIRECTORY_SEPARATOR) {
                continue;
            }

            return static::join(...$pathSegments);
        }

        array_unshift($pathSegments, '.');

        return static::join(...$pathSegments);
    }
}
