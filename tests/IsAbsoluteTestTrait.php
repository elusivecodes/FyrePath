<?php

namespace Tests;

use Fyre\Utility\Path;

trait IsAbsoluteTestTrait
{

    public function testIsAbsolute(): void
    {
        $this->assertTrue(
            Path::isAbsolute('/path/to/file')
        );
    }

    public function testIsAbsoluteWithRelative(): void
    {
        $this->assertFalse(
            Path::isAbsolute('path/to/file')
        );
    }

}
