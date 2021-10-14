<?php

namespace Tests;

use
    Fyre\Path;

trait DirNameTest
{

    public function testDirNameWithFileName(): void
    {
        $this->assertEquals(
            '.',
            Path::dirname('file.ext')
        );
    }

    public function testDirNameWithPath(): void
    {
        $this->assertEquals(
            'dir',
            Path::dirname('dir/file.ext')
        );
    }

    public function testDirNameWithDeepPath(): void
    {
        $this->assertEquals(
            'sub/dir',
            Path::dirname('sub/dir/file.ext')
        );
    }

    public function testDirNameWithFullPath(): void
    {
        $this->assertEquals(
            '/sub/dir',
            Path::dirname('/sub/dir/file.ext')
        );
    }

    public function testDirNameWithMultipleExtensions(): void
    {
        $this->assertEquals(
            'dir',
            Path::dirname('dir/file.tst.ext')
        );
    }

    public function testDirNameWithNoExtension(): void
    {
        $this->assertEquals(
            'dir',
            Path::dirname('dir/file')
        );
    }

    public function testDirNameWithEmptyString(): void
    {
        $this->assertEquals(
            '',
            Path::dirname('')
        );
    }

}
