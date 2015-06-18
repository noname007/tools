<?php

/**
 * Verifies a response from the Sevenga In-App Billing server.
 *
 * @category   Sevenga Payment
 * @package    Sevenga_Licensing
 */
class TuiTuiOrderValidator  {

    const SIGNATURE_ALGORITHM = OPENSSL_ALGO_SHA1;

    const KEY_PREFIX = "-----BEGIN PUBLIC KEY-----\n";
    const KEY_SUFFIX = '-----END PUBLIC KEY-----';

    /**
     * OpenSSL public key
     *
     * @var resource
     */
    protected $_publicKey;


    /**
     *
     * @param string $publicKey   Base64-encoded representation of your public key
     * 
     */
    public function __construct($publicKey)
    {        
        $key = self::KEY_PREFIX . chunk_split($publicKey, 64, "\n") . self::KEY_SUFFIX;
        $key = openssl_get_publickey($key);
        if (false === $key) {
            throw new Exception(
                    'Please pass a Base64-encoded public key from Sevenga');
        }
        $this->_publicKey   = $key;
    }

    /**
     * Verifies that the response was signed with the given signature
     * 
     * @param  SevengaOrderData|string $responseData, e.g.: app_id=10009&channel_id=1&user_id=123&product_id=diamond100&amount=1.99
     * @param  string $signature, e.g.: T0fb8wixOLbwaooBHNDiWF4kDoHYXLCs+5J3z1ud9Q==
     * @return bool
     */
    public function verify($responseData, $signature)
    {
        $result = openssl_verify($responseData, base64_decode($signature),
                                 $this->_publicKey, self::SIGNATURE_ALGORITHM);

        //openssl_verify returns 1 for a valid signature
        if (1 === $result) {
            return true;
        } else if (1 !== $result) {
            return false;
        }
    }

}
