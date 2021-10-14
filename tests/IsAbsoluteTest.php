<?php

namespace Tests;

use
    Fyre\Path;

trait IsAbsoluteTest
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
