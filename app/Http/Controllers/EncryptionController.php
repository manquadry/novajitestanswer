<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    private $key;
    private $iv;

    public function __construct()
    {
        // Set a 256-bit key and initialization vector (IV)
        $this->key = hex2bin('0123456789abcdef0123456789abcdef0123456789abcdef0123456789abcdef');
        $this->iv = random_bytes(16);
    }

    public function encrypt($text)
    {
        // Encrypt the data
        $ciphertext = openssl_encrypt($text, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $this->iv);

        // Combine IV and ciphertext for storage
        $ciphertext = $this->iv . $ciphertext;

        // Convert to hex format
        return bin2hex($ciphertext);
    }

    public function decrypt($ciphertextHex)
    {
        // Convert hex to binary
        $ciphertext = hex2bin($ciphertextHex);

        // Extract the IV and ciphertext
        $iv = substr($ciphertext, 0, 16);
        $ciphertext = substr($ciphertext, 16);

        // Decrypt the data
        return openssl_decrypt($ciphertext, 'aes-256-cbc', $this->key, OPENSSL_RAW_DATA, $iv);
    }

    public function showForm()
    {
        return view('encryption');
    }

    public function handleEncrypt(Request $request)
    {
        $text = $request->input('text');
        $encrypted = $this->encrypt($text);

        return view('encryption', ['encrypted' => $encrypted]);
    }

    public function handleDecrypt(Request $request)
    {
        $ciphertext = $request->input('ciphertext');
        $decrypted = $this->decrypt($ciphertext);

        return view('encryption', ['decrypted' => $decrypted, 'encrypted' => $ciphertext]);
    }
}
