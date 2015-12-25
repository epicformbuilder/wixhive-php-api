<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 11:51 PM
 */
namespace epicformbuilder\WixHiveApi;

/**
 * Class Signature
 *
 * @package epicformbuilder\WixHiveApi
 */
class Signature
{
    const TIME_FORMAT = "Y-m-d\TH:i:s.000\Z";

    /**
     * @param string    $applicationId
     * @param string    $secretKey
     * @param string    $instanceId
     * @param string    $userSessionToken
     * @param string    $apiVersion
     * @param string    $apiVersionInGetParam
     * @param string    $command
     * @param string    $body
     * @param string    $httpMethod
     * @param \DateTime $date
     *
     * @return string
     */
    public static function sign($applicationId, $secretKey, $instanceId, $userSessionToken, $apiVersion, $apiVersionInGetParam, $command, $body, $httpMethod, \DateTime $date)
    {

        $queryData = [
            "x-wix-application-id" => $applicationId,
            "x-wix-instance-id" => $instanceId,
            "x-wix-timestamp" => $date->format(self::TIME_FORMAT),
            "version" => $apiVersionInGetParam,
        ];
        if ($userSessionToken !== null) $queryData['userSessionToken'] = $userSessionToken;

        ksort($queryData);

        $signData = [
            $httpMethod,
            "/".$apiVersion.$command,
            implode("\n", array_values($queryData)),
            trim($body)
        ];

        $tmp = strtr(base64_encode(hash_hmac("sha256", trim(implode("\n", $signData)), $secretKey, true)), "+/", "-_");
        $tmp = str_replace("=", "", $tmp);

        return $tmp;
    }
}