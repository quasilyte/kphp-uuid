<?php

namespace Quasilyte\KPHP\Uuid;

class UUID {
    /**
     * This implementation is kindly borrowed from:
     * https://www.php.net/manual/en/function.uniqid.php#94959
     * This code is originally written by Andrew Moore.
     */
    public static function v4(): string {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,
            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function v4nosprintf(): string {
        $hex_fmt = fn (int $val) => str_pad(dechex($val), 4, '0');
        return implode('', [
            $hex_fmt(mt_rand(0, 0xffff)),
            $hex_fmt(mt_rand(0, 0xffff)),
            '-',
            $hex_fmt(mt_rand(0, 0xffff)),
            '-',
            $hex_fmt(mt_rand(0, 0x0fff) | 0x4000),
            '-',
            $hex_fmt(mt_rand(0, 0x3fff) | 0x8000),
            '-',
            $hex_fmt(mt_rand(0, 0xffff)),
            $hex_fmt(mt_rand(0, 0xffff)),
            $hex_fmt(mt_rand(0, 0xffff)),
        ]);
    }
}
