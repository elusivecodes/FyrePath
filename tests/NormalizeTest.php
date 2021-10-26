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
        $this->assertEquals(
            'file.ext',
            Path::normalize('file.ext')
        );
    }

    public function testNormalizeWithPath(): void
    {
        $this->assertEquals(
            'dir/file.ext',
            Path::normalize('dir/file.ext')
        );
    }

    public function testNormalizeWithDeepPath(): void
    {
        $this->assertEquals(
            'sub/dir/file.ext',
            Path::normalize('sub/dir/file.ext')
        );
    }

    public function testNormalizeWithFullPath(): void
    {
        $this->assertEquals(
            '/sub/dir/file.ext',
            Path::normalize('/sub/dir/file.ext')
        );
    }

    public function testNormalizeWithParentPath(): void
    {
        $this->assertEquals(
            'sub/dir/file.ext',
            Path::normalize('test/../sub/dir/file.ext')
        );
    }

    public function testNormalizeWithCurrentPath(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/sub/dir/file.ext',
            Path::normalize('./sub/dir/file.ext')
        );
    }

    public function testNormalizeWithEmptyString(): void
    {
        $this->assertEquals(
            '.',
            Path::normalize('')
        );
    }

    public function testNormalizeWithNoArguments(): void
    {
        $this->assertEquals(
            '.',
            Path::normalize()
        );
    }

}
