<?php

namespace Tests;

use
    Fyre\Path;

use function
    getcwd;

trait JoinTest
{

    public function testJoinWithFileName(): void
    {
        $this->assertEquals(
            'file.ext',
            Path::join('file.ext')
        );
    }

    public function testJoinWithDir(): void
    {
        $this->assertEquals(
            'dir/file.ext',
            Path::join('dir', 'file.ext')
        );
    }

    public function testJoinWithDirs(): void
    {
        $this->assertEquals(
            'sub/dir/file.ext',
            Path::join('sub', 'dir', 'file.ext')
        );
    }

    public function testJoinWithDeepDir(): void
    {
        $this->assertEquals(
            'sub/dir/file.ext',
            Path::join('sub/dir', 'file.ext')
        );
    }

    public function testJoinWithFullPath(): void
    {
        $this->assertEquals(
            '/sub/dir/file.ext',
            Path::join('/sub', 'dir', 'file.ext')
        );
    }

    public function testJoinWithParentPath(): void
    {
        $this->assertEquals(
            'sub/dir/file.ext',
            Path::join('test', '..', 'sub/dir', 'file.ext')
        );
    }

    public function testJoinWithCurrentPath(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/sub/dir/file.ext',
            Path::join('.', 'sub', 'dir', 'file.ext')
        );
    }

    public function testJoinWithEmptyString(): void
    {
        $this->assertEquals(
            '.',
            Path::join('')
        );
    }

    public function testJoinWithNoArguments(): void
    {
        $this->assertEquals(
            '.',
            Path::join()
        );
    }

}
