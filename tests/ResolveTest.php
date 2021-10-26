<?php

namespace Tests;

use
    Fyre\Utility\Path;

use function
    getcwd;

trait ResolveTest
{

    public function testResolveWithFileName(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/file.ext',
            Path::resolve('file.ext')
        );
    }

    public function testResolveWithDir(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/dir/file.ext',
            Path::resolve('dir', 'file.ext')
        );
    }

    public function testResolveWithDirs(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/sub/dir/file.ext',
            Path::resolve('sub', 'dir', 'file.ext')
        );
    }

    public function testResolveWithDeepDir(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/sub/dir/file.ext',
            Path::resolve('sub/dir', 'file.ext')
        );
    }

    public function testResolveWithFullPath(): void
    {
        $this->assertEquals(
            '/sub/dir/file.ext',
            Path::resolve('/sub', 'dir', 'file.ext')
        );
    }

    public function testResolveWithFullPaths(): void
    {
        $this->assertEquals(
            '/dir/file.ext',
            Path::resolve('/sub', '/dir', 'file.ext')
        );
    }

    public function testResolveWithParentPath(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/sub/dir/file.ext',
            Path::resolve('test', '..', 'sub/dir', 'file.ext')
        );
    }

    public function testResolveWithCurrentPath(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd.'/sub/dir/file.ext',
            Path::resolve('.', 'sub', 'dir', 'file.ext')
        );
    }

    public function testResolveWithEmptyString(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd,
            Path::resolve('')
        );
    }

    public function testResolveWithNoArguments(): void
    {
        $cwd = getcwd();

        $this->assertEquals(
            $cwd,
            Path::resolve()
        );
    }

}
