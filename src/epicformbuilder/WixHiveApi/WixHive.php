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

class WixHive{

    const API_VERSION = "1.0.0";

    /** @var  string */
    private $applicationId;

    /** @var  string */
    private $secretKey;

    /** @var  string */
    private $instanceId ;

    /**
     * @param string $applicationId
     * @param string $secretKey
     * @param string $instanceId
     */
    public function __construct($applicationId, $secretKey, $instanceId){
        $this->applicationId = $applicationId;
        $this->secretKey = $secretKey;
        $this->instanceId = $instanceId;
    }

    /**
     * @param Command $command
     * @param string $userSessionToken
     *
     * @return Model object
     * @throws WixHiveException
     */
    public function execute(Command $command, $userSessionToken=null){

        $date = new \DateTime("now", new \DateTimeZone("UTC"));

        $getParams = ["version" => self::API_VERSION];
        if ($userSessionToken !== null) $getParams['userSessionToken'] = $userSessionToken;

        // prepare the request based on the command
        $headers = [
            "x-wix-application-id" => $this->applicationId,
            "x-wix-instance-id" => $this->instanceId,
            "x-wix-timestamp" => $date->format(Signature::TIME_FORMAT),
            "x-wix-signature" => Signature::sign($this->applicationId, $this->secretKey, $this->instanceId, $userSessionToken, Command::WIXHIVE_VERSION, self::API_VERSION, $command->getCommand(), $command->getBody(), $command->getHttpMethod(), $date),
            "Content-Type" => "application/json",
            "Expect" => "",
        ];
        $wixHiveRequest = new Request($command->getEndpointUrl($getParams), $command->getHttpMethod(), $headers, $command->getBody());

        // trigger the request to the WixHive API
        $response = (new Connector)->execute($wixHiveRequest);

        // process received response from WixHive API
        return ResponseProcessor::process($command, $response);
    }


}