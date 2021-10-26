<?php

namespace Tests;

use
    Fyre\Utility\Path;

trait ParseTest
{

    public function testParseWithFileName(): void
    {
        $this->assertEquals(
            [
                'dirname' => '.',
                'basename' => 'file.ext',
                'extension' => 'ext',
                'filename' => 'file'
            ],
            Path::parse('file.ext')
        );
    }

    public function testParseWithPath(): void
    {
        $this->assertEquals(
            [
                'dirname' => 'dir',
                'basename' => 'file.ext',
                'extension' => 'ext',
                'filename' => 'file'
            ],
            Path::parse('dir/file.ext')
        );
    }

    public function testParseWithDeepPath(): void
    {
        $this->assertEquals(
            [
                'dirname' => 'sub/dir',
                'basename' => 'file.ext',
                'extension' => 'ext',
                'filename' => 'file'
            ],
            Path::parse('sub/dir/file.ext')
        );
    }

    public function testParseWithFullPath(): void
    {
        $this->assertEquals(
            [
                'dirname' => '/sub/dir',
                'basename' => 'file.ext',
                'extension' => 'ext',
                'filename' => 'file'
            ],
            Path::parse('/sub/dir/file.ext')
        );
    }

    public function testParseWithMultipleExtensions(): void
    {
        $this->assertEquals(
            [
                'dirname' => 'dir',
                'basename' => 'file.tst.ext',
                'extension' => 'ext',
                'filename' => 'file.tst'
            ],
            Path::parse('dir/file.tst.ext')
        );
    }

    public function testParseWithNoExtension(): void
    {
        $this->assertEquals(
            [
                'dirname' => 'dir',
                'basename' => 'file',
                'filename' => 'file'
            ],
            Path::parse('dir/file')
        );
    }

    public function testParseWithEmptyString(): void
    {
        $this->assertEquals(
            [
                'basename' => '',
                'filename' => ''
            ],
            Path::parse('')
        );
    }

}
