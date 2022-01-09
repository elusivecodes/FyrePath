<?php

namespace Tests;

use
    Fyre\Utility\Path;

trait DirNameTest
{

    public function testDirNameWithFileName(): void
    {
        $this->assertSame(
            '.',
            Path::dirname('file.ext')
        );
    }

    public function testDirNameWithPath(): void
    {
        $this->assertSame(
            'dir',
            Path::dirname('dir/file.ext')
        );
    }

    public function testDirNameWithDeepPath(): void
    {
        $this->assertSame(
            'sub/dir',
            Path::dirname('sub/dir/file.ext')
        );
    }

    public function testDirNameWithFullPath(): void
    {
        $this->assertSame(
            '/sub/dir',
            Path::dirname('/sub/dir/file.ext')
        );
    }

    public function testDirNameWithMultipleExtensions(): void
    {
        $this->assertSame(
            'dir',
            Path::dirname('dir/file.tst.ext')
        );
    }

    public function testDirNameWithNoExtension(): void
    {
        $this->assertSame(
            'dir',
            Path::dirname('dir/file')
        );
    }

    public function testDirNameWithEmptyString(): void
    {
        $this->assertSame(
            '',
            Path::dirname('')
        );
    }

}
