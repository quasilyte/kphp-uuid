<?php

use PHPUnit\Framework\TestCase;
use Quasilyte\KPHP\Uuid\UUID;

class UUIDTest extends TestCase {
    public function testUnique() {
        $set = [];
        $set2 = [];
        $n = 10;
        for ($i = 0; $i < $n; $i++) {
            $set[UUID::v4()] = true;
            $set2[UUID::v4nosprintf()] = true;
        }
        $this->assertSame(count($set), $n);
        $this->assertSame(count($set2), $n);
    }

    public function testLength() {
        $this->assertSame(strlen(UUID::v4()), 36);
        $this->assertSame(strlen(UUID::v4nosprintf()), 36);
    }

    public function testValid() {
        $example = 'f37ac10b-58cc-4372-a567-0e02b2c3d170';
        $this->assertTrue(self::isValid($example));
        $this->assertFalse(self::isValid('foo'));
        for ($i = 0; $i < 100; $i++) {
            $this->assertTrue(self::isValid(UUID::v4()));
            $this->assertTrue(self::isValid(UUID::v4nosprintf()));
        }
    }

    private static function isValid(string $uuid): bool {
        $w = '[0-9a-f]';
        return preg_match("/^$w{8}-$w{4}-4$w{3}-[89ab]$w{3}-$w{12}$/", $uuid) === 1;
    }
}
