# FyrePath

**FyrePath** is a free, path library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Methods](#methods)



## Installation

**Using Composer**

```
composer install fyre/path
```

In PHP:

```php
use Fyre\Path;
```


## Methods

**Base Name**

Get the base name from a file path.

- `$path` is the file path.

```php
$baseName = Path::baseName($path);
```

**Dir Name**

Get the directory name from a file path.

- `$path` is the file path.

```php
$dirName = Path::dirName($path);
```

**Extension**

Get the file extension from a file path.

- `$path` is the file path.

```php
$extension = Path::extension($path);
```

**File Name**

Get the file name from a file path.

- `$path` is the file path.

```php
$fileName = Path::fileName($path);
```

**Format**

Format path info as a file path.

- `$pathInfo` is an array containing the path info.

```php
$path = Path::format($pathInfo);
```

**Is Absolute**

Determine if a file path is absolute.

- `$path` is the file path.

```php
$isAbsolute = Path::isAbsolute($path);
```

**Join**

Join path segments.

All arguments supplied will be joined.

```php
$path = Path::join(...$paths);
```

**Normalize**

Normalize a file path.

- `$path` is the file path.

```php
$normalized = Path::normalize($path);
```

**Parse**

Parse a file path.

- `$path` is the file path.

```php
$pathInfo = Path::parse($path);
```

**Resolve**

Resolve a file path from path segments.

All arguments supplied will be resolved.

```php
$path = Path::resolve(...$paths);
```