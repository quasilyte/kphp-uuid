<?php

use Quasilyte\KPHP\Uuid\UUID;

class BenchmarkUUID {
    public function benchmarkV4() {
        return UUID::v4();
    }

    public function benchmarkV4nosprintf() {
        return UUID::v4nosprintf();
    }
}
