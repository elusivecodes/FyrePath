<?php

declare(strict_types=1);

namespace Tests;

use Fyre\Utility\Path;
use Fyre\Utility\Traits\MacroTrait;
use PHPUnit\Framework\TestCase;

use function class_uses;

final class PathTest extends TestCase
{
    use BaseNameTestTrait;
    use DirNameTestTrait;
    use ExtensionTestTrait;
    use FileNameTestTrait;
    use FormatTestTrait;
    use IsAbsoluteTestTrait;
    use JoinTestTrait;
    use NormalizeTestTrait;
    use ParseTestTrait;
    use ResolveTestTrait;

    public function testMacroable(): void
    {
        $this->assertContains(
            MacroTrait::class,
            class_uses(Path::class)
        );
    }
}
