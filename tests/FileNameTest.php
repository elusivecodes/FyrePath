<?php

namespace Tests;

use
    Fyre\Path;

trait FileNameTest
{

    public function testFileNameWithFileName(): void
    {
        $this->assertEquals(
            'file',
            Path::fileName('file.ext')
        );
    }

    public function testFileNameWithPath(): void
    {
        $this->assertEquals(
            'file',
            Path::fileName('dir/file.ext')
        );
    }

    public function testFileNameWithDeepPath(): void
    {
        $this->assertEquals(
            'file',
            Path::fileName('sub/dir/file.ext')
        );
    }

    public function testFileNameWithFullPath(): void
    {
        $this->assertEquals(
            'file',
            Path::fileName('/sub/dir/file.ext')
        );
    }

    public function testFileNameWithMultipleExtensions(): void
    {
        $this->assertEquals(
            'file.tst',
            Path::fileName('dir/file.tst.ext')
        );
    }

    public function testFileNameWithNoExtension(): void
    {
        $this->assertEquals(
            'file',
            Path::fileName('dir/file')
        );
    }

    public function testFileNameWithEmptyString(): void
    {
        $this->assertEquals(
            '',
            Path::fileName('')
        );
    }

}
