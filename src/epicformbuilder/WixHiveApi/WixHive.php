<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:03 PM
 */
namespace epicformbuilder\WixHiveApi;

use epicformbuilder\Wix\Models\Model;
use epicformbuilder\WixHiveApi\Commands\Command;
use epicformbuilder\WixHiveApi\Commands\Contact\CreateContactNew;
use GuzzleHttp\Exception\ClientException;

/**
 * Class WixHive
 * @package epicformbuilder\WixHiveApi
 */
class WixHive
{
    const API_VERSION_FIRST = "1.0.0";
    const API_VERSION_SECOND = "2.0.0";

    /** @var  string */
    private $applicationId;

    /** @var  string */
    private $secretKey;

    /**
     * @param string $applicationId
     * @param string $secretKey
     */
    public function __construct($applicationId, $secretKey)
    {
        $this->applicationId = $applicationId;
        $this->secretKey = $secretKey;
    }

    /**
     * @param Command $command
     * @param string $userSessionToken
     *
     * @return Model object
     * @throws WixHiveException
     */
    public function execute(Command $command, $instanceId, $userSessionToken=null)
    {
        $date = new \DateTime("now", new \DateTimeZone("UTC"));

        $getParams = ["version" => $this->getAPIVersionForCommand($command)];
        if ($userSessionToken !== null) $getParams['userSessionToken'] = $userSessionToken;

        // prepare the request based on the command
        $headers = [
            "x-wix-application-id" => $this->applicationId,
            "x-wix-instance-id" => $instanceId,
            "x-wix-timestamp" => $date->format(Signature::TIME_FORMAT),
            "x-wix-signature" => Signature::sign($this->applicationId, $this->secretKey, $instanceId, $userSessionToken, Command::WIXHIVE_VERSION, $this->getAPIVersionForCommand($command), $command->getCommand(), $command->getBody(), $command->getHttpMethod(), $date),
            "Content-Type" => "application/json",
            "Expect" => "",
        ];

        try{
            // trigger the request to the WixHive API
            $request = new \GuzzleHttp\Psr7\Request($command->getHttpMethod(), $command->getEndpoint($getParams), $headers, $command->getBody());
            $response = (new \GuzzleHttp\Client(['base_uri' => $command->getBaseUri()]))->send($request);

            // checking response content type
            $contentType = $response->getHeader("Content-Type");
            $contentType = isset($contentType[0]) ? explode(";", $contentType[0]) : false;
            if (!isset($contentType[0]) || $contentType[0] !== "application/json"){
                throw new WixHiveException("Response content type is not supported", "415");
            }

        } catch (ClientException $e){
            throw new WixHiveException($e->getResponse()->getReasonPhrase(), $e->getResponse()->getStatusCode());
        }

        // process received response from WixHive API
        return ResponseProcessor::process($command, $response);
    }

    /**
     * @param Command $command
     *
     * @return string
     */
    protected function getAPIVersionForCommand(Command $command)
    {
        if ($command instanceof CreateContactNew) return self::API_VERSION_SECOND;

        return self::API_VERSION_FIRST;
    }

}
