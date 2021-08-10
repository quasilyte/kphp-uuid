<?php

use Quasilyte\KPHP\Uuid\UUID;

class UUIDBenchmark {
    public function benchmarkV4() {
        return UUID::v4();
    }

    public function benchmarkV4Fast() {
        return UUID::v4fast();
    }
}
