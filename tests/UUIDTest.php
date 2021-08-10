<?php

use PHPUnit\Framework\TestCase;
use Quasilyte\KPHP\Uuid\UUID;

#ifndef KPHP
define('kphp', 0);
if (false)
#endif
  define('kphp', 1);

class UUIDTest extends TestCase {
    public function testUnique() {
        for ($i = 0; $i < 10; $i++) {
            $this->assertNotSame(UUID::v4(), UUID::v4());
            $this->assertNotSame(UUID::v4fast(), UUID::v4fast());
        }
    }

    public function testLength() {
        $this->assertSame(strlen(UUID::v4()), 36);
        $this->assertSame(strlen(UUID::v4fast()), 36);
    }

    public function testSeeded() {
        mt_srand(1349);
        if (kphp === 1) {
            $this->assertSame(UUID::v4(),     '202e62fd-707b-428a-9a22-4a6b8ab6dfe6');
            $this->assertSame(UUID::v4fast(), '21155721-a9e6-4b39-92f0-a08159c1c869');
        } else {
            $this->assertSame(UUID::v4(),     'eb12137e-7711-4aa4-b7c2-3ca6e0e3e59b');
            $this->assertSame(UUID::v4fast(), 'b00214ff-5735-4fb7-b6b6-a42702813b7e');
        }
    }
}
