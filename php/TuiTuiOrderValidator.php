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
        echo $signature;
        //openssl_verify returns 1 for a valid signature
        if (1 === $result) {
            return true;
        } else if (1 !== $result) {
            return false;
        }
    }

}

    function generateServerRSASignUrl($params, $rsa_private_key)
    {
        if(strlen($rsa_private_key) > 450){
            $KEY_PREFIX = "-----BEGIN PRIVATE KEY-----\n";
            $KEY_SUFFIX = '-----END PRIVATE KEY-----';
        }else{
            $KEY_PREFIX = "-----BEGIN RSA PRIVATE KEY-----\n";
            $KEY_SUFFIX = '-----END RSA PRIVATE KEY-----';
        }
        $ENCRYPT_METHOD = "sha1WithRSAEncryption";
        $pkey = $KEY_PREFIX . chunk_split($rsa_private_key, 64, "\n") . $KEY_SUFFIX;
        $data = http_build_query($params);
        openssl_sign($data, $signature, $pkey, $ENCRYPT_METHOD);
        $sign = base64_encode($signature);
        return $data . '&sign=' . urlencode($sign);
    }
$params = 'app_id=10016&channel_id=1&user_id=6144&product_id=com.sevenga.iron.gp.gold6&sevenga_order_id=0000006144010016201506062058240321975493&amount=99.99&server_id=1000&game_extra=97f3e98ce33043c7b5b3523bd97ea101&purchase_at=1433595534';
$sign = 'K60PxMMRUj6xeIxd4Xyo13aoiznN6mQe%2FksfI0kJ0Bpxmn64Lgfv%2BbmOnTrJBdmpnm0swZ4LfL9eWbo%2F%2FfWj%2Bw%3D%3D';

$rsa_public_key = 'MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAJda3H2n9+IjfJEcE/7doW9wKBMIf5EK+scBKrLQurl58BQB0YMC5UfwBP7FGzx3fk1BGSqzlKMAXSue0fSHgScCAwEAAQ==';
$t = new TuiTuiOrderValidator($rsa_public_key);
// echo urldecode($l);
// 

$rsa_private_key = 'MIIBVAIBADANBgkqhkiG9w0BAQEFAASCAT4wggE6AgEAAkEAl1rcfaf34iN8kRwT/t2hb3AoEwh/kQr6xwEqstC6uXnwFAHRgwLlR/AE/sUbPHd+TUEZKrOUowBdK57R9IeBJwIDAQABAkAC3IXknkNSdCdLuwMpw1jk+XLYgUWgIVwCXSRIgye0j/EnfrPduvQJw7HaJ3DYLBhfaCS+YuZEAp/7LiWgveHxAiEAxy2aVrSb3e9oMOsLC3+XEGLDEvjixzHkqzrujThkELkCIQDCiKENNYrSTaKPt7idjtAzVtw2BUKDsqD3MpLDAGxw3wIhAME+HV/CGvdYL15GrJCbWZUsPNdLYbqhTZpTst6Qt4UBAiBC8C6y0+Sz3uD8IRTWqmi78byOnhq4JIQ861sS3Jdz8wIgEcUGdw1rsungfVgvWCswd3l8OB8qzEKW4rrPTdNrBjQ=';

var_dump($t->verify(urldecode($params),urldecode($sign)));



