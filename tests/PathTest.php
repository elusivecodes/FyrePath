<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

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

}
