<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

final class PathTest extends TestCase
{

    use
        BaseNameTest,
        DirNameTest,
        ExtensionTest,
        FileNameTest,
        FormatTest,
        IsAbsoluteTest,
        JoinTest,
        NormalizeTest,
        ParseTest,
        ResolveTest;

}
