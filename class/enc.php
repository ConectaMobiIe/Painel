<?php

class AESCrypt {
    private static $AES_MODE = 'AES-256-CBC';
    private static $CHARSET = 'UTF-8';
    private static $HASH_ALGORITHM = 'sha256';
    private static $ivBytes = "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0";
    private static function generateKey($password) {
        return hash(self::$HASH_ALGORITHM, $password, true);
    }
    public static function encrypt($password, $plaintext) {
        $key = self::generateKey($password);
        $iv = self::$ivBytes;
        $ciphertext = openssl_encrypt($plaintext, self::$AES_MODE, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($ciphertext);
    }
    public static function decrypt($password, $ciphertext) {
        $key = self::generateKey($password);
        $ciphertext = base64_decode($ciphertext);
        $iv = self::$ivBytes;
        $plaintext = openssl_decrypt($ciphertext, self::$AES_MODE, $key, OPENSSL_RAW_DATA, $iv);
        return $plaintext;
    }
}
$key = "@MatheusBalbo";

?>