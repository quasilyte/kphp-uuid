![Build Status](https://github.com/quasilyte/kphp-uuid/workflows/PHP/badge.svg)

## KPHP UUID demo library

> **WARNING**: this is not a real UUID library.
> It's just an example project for my KPHP testing/benchmarking article.

Installation via composer:

```bash
$ composer require quasilyte/kphp-uuid:dev-master
```

Usage:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Quasilyte\KPHP\Uuid\UUID;

var_dump(UUID::v4());
```

Running tests and benchmarks:

```bash
# Running tests in PHP mode (PHPUnit)
$ phpunit --bootstrap ./vendor/autoload.php tests

# Run tests in KPHP mode (KPHPUnit)
$ ktest phpunit tests

# Run KPHP benchmarks
$ ktest bench ./benchmarks/UUIDBenchmark.php
```

This repository includes a `Makefile` for convenience:

```bash
# Run all tests (PHP + KPHP)
$ make test
```
