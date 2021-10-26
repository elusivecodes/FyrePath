<?php

namespace Tests;

use
    Fyre\Utility\Path;

trait ExtensionTest
{

    public function testExtensionWithFileName(): void
    {
        $this->assertEquals(
            'ext',
            Path::extension('file.ext')
        );
    }

    public function testExtensionWithPath(): void
    {
        $this->assertEquals(
            'ext',
            Path::extension('dir/file.ext')
        );
    }

    public function testExtensionWithDeepPath(): void
    {
        $this->assertEquals(
            'ext',
            Path::extension('sub/dir/file.ext')
        );
    }

    public function testExtensionWithFullPath(): void
    {
        $this->assertEquals(
            'ext',
            Path::extension('/sub/dir/file.ext')
        );
    }

    public function testExtensionWithMultipleExtensions(): void
    {
        $this->assertEquals(
            'ext',
            Path::extension('dir/file.tst.ext')
        );
    }

    public function testExtensionWithNoExtension(): void
    {
        $this->assertEquals(
            '',
            Path::extension('file')
        );
    }

    public function testExtensionWithEmptyString(): void
    {
        $this->assertEquals(
            '',
            Path::extension('')
        );
    }

}
