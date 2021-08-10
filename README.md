## KPHP UUID demo library

> **WARNING**: this is not a real UUID library.
> It's just an example project for my KPHP testing/benchmarking article.

```bash
# Running tests in PHP mode (PHPUnit)
$ phpunit --bootstrap ./vendor/autoload.php tests

# Run tests in KPHP mode (KPHPUnit)
$ ktest phpunit tests

# Run KPHP benchmarks
$ ktest bench ./benchmarks/UUIDBenchmark.php
```
