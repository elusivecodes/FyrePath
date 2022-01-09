<?php

namespace Tests;

use
    Fyre\Utility\Path;

trait FileNameTest
{

    public function testFileNameWithFileName(): void
    {
        $this->assertSame(
            'file',
            Path::fileName('file.ext')
        );
    }

    public function testFileNameWithPath(): void
    {
        $this->assertSame(
            'file',
            Path::fileName('dir/file.ext')
        );
    }

    public function testFileNameWithDeepPath(): void
    {
        $this->assertSame(
            'file',
            Path::fileName('sub/dir/file.ext')
        );
    }

    public function testFileNameWithFullPath(): void
    {
        $this->assertSame(
            'file',
            Path::fileName('/sub/dir/file.ext')
        );
    }

    public function testFileNameWithMultipleExtensions(): void
    {
        $this->assertSame(
            'file.tst',
            Path::fileName('dir/file.tst.ext')
        );
    }

    public function testFileNameWithNoExtension(): void
    {
        $this->assertSame(
            'file',
            Path::fileName('dir/file')
        );
    }

    public function testFileNameWithEmptyString(): void
    {
        $this->assertSame(
            '',
            Path::fileName('')
        );
    }

}
