<?php

namespace Tests;

use
    Fyre\Path;

trait FormatTest
{

    public function testFormat(): void
    {
        $this->assertEquals(
            'sub/dir/file.ext',
            Path::format(['dirname' => 'sub/dir', 'basename' => 'file.ext'])
        );
    }

    public function testFormatEmptyDirName(): void
    {
        $this->assertEquals(
            'file.ext',
            Path::format(['basename' => 'file.ext'])
        );
    }

    public function testFormatEmptyFileName(): void
    {
        $this->assertEquals(
            'sub/dir',
            Path::format(['dirname' => 'sub/dir'])
        );
    }

}
