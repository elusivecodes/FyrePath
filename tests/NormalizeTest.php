<?php

namespace Tests;

use
    Fyre\Utility\Path;

use function
    getcwd;

trait NormalizeTest
{

    public function testNormalizeWithFileName(): void
    {
        $this->assertSame(
            'file.ext',
            Path::normalize('file.ext')
        );
    }

    public function testNormalizeWithPath(): void
    {
        $this->assertSame(
            'dir/file.ext',
            Path::normalize('dir/file.ext')
        );
    }

    public function testNormalizeWithDeepPath(): void
    {
        $this->assertSame(
            'sub/dir/file.ext',
            Path::normalize('sub/dir/file.ext')
        );
    }

    public function testNormalizeWithFullPath(): void
    {
        $this->assertSame(
            '/sub/dir/file.ext',
            Path::normalize('/sub/dir/file.ext')
        );
    }

    public function testNormalizeWithParentPath(): void
    {
        $this->assertSame(
            'sub/dir/file.ext',
            Path::normalize('test/../sub/dir/file.ext')
        );
    }

    public function testNormalizeWithCurrentPath(): void
    {
        $cwd = getcwd();

        $this->assertSame(
            $cwd.'/sub/dir/file.ext',
            Path::normalize('./sub/dir/file.ext')
        );
    }

    public function testNormalizeWithEmptyString(): void
    {
        $this->assertSame(
            '.',
            Path::normalize('')
        );
    }

    public function testNormalizeWithNoArguments(): void
    {
        $this->assertSame(
            '.',
            Path::normalize()
        );
    }

}
