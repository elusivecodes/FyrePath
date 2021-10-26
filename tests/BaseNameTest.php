<?php

namespace Tests;

use
    Fyre\Utility\Path;

trait BaseNameTest
{

    public function testBaseNameWithFileName(): void
    {
        $this->assertEquals(
            'file.ext',
            Path::baseName('file.ext')
        );
    }

    public function testBaseNameWithPath(): void
    {
        $this->assertEquals(
            'file.ext',
            Path::baseName('dir/file.ext')
        );
    }

    public function testBaseNameWithDeepPath(): void
    {
        $this->assertEquals(
            'file.ext',
            Path::baseName('sub/dir/file.ext')
        );
    }

    public function testBaseNameWithFullPath(): void
    {
        $this->assertEquals(
            'file.ext',
            Path::baseName('/sub/dir/file.ext')
        );
    }

    public function testBaseNameWithMultipleExtensions(): void
    {
        $this->assertEquals(
            'file.tst.ext',
            Path::baseName('dir/file.tst.ext')
        );
    }

    public function testBaseNameWithNoExtension(): void
    {
        $this->assertEquals(
            'file',
            Path::baseName('dir/file')
        );
    }

    public function testBaseNameWithEmptyString(): void
    {
        $this->assertEquals(
            '',
            Path::baseName('')
        );
    }

}
