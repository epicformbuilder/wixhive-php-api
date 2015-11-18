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

    /** @var  string */
    private $instanceId ;

    /**
     * @param string $applicationId
     * @param string $secretKey
     * @param string $instanceId
     */
    public function __construct($applicationId, $secretKey, $instanceId)
    {
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
    public function execute(Command $command, $userSessionToken=null)
    {

        $date = new \DateTime("now", new \DateTimeZone("UTC"));

        $getParams = ["version" => $this->getAPIVersionForCommand($command)];
        if ($userSessionToken !== null) $getParams['userSessionToken'] = $userSessionToken;

        // prepare the request based on the command
        $headers = [
            "x-wix-application-id" => $this->applicationId,
            "x-wix-instance-id" => $this->instanceId,
            "x-wix-timestamp" => $date->format(Signature::TIME_FORMAT),
            "x-wix-signature" => Signature::sign($this->applicationId, $this->secretKey, $this->instanceId, $userSessionToken, Command::WIXHIVE_VERSION, $this->getAPIVersionForCommand($command), $command->getCommand(), $command->getBody(), $command->getHttpMethod(), $date),
            "Content-Type" => "application/json",
            "Expect" => "",
        ];
        $wixHiveRequest = new Request($command->getEndpointUrl($getParams), $command->getHttpMethod(), $headers, $command->getBody());

        // trigger the request to the WixHive API
        $response = (new Connector)->execute($wixHiveRequest);

        // process received response from WixHive API
        return ResponseProcessor::process($command, $response);
    }

    /**
     * @param Command $command
     *
     * @return string
     */
    protected function getAPIVersionForCommand(Command $command){
        if ($command instanceof CreateContactNew) return self::API_VERSION_SECOND;

        return self::API_VERSION_FIRST;
    }

}