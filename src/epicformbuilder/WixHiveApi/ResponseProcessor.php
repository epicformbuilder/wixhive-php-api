<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/19/15
 * Time: 12:12 AM
 */
namespace epicformbuilder\WixHiveApi;

use epicformbuilder\WixHiveApi\Commands\Command;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ResponseProcessor
 *
 * @package epicformbuilder\WixHiveApi
 */
class ResponseProcessor
{
    /**
     * @param Command           $command
     * @param ResponseInterface $response
     *
     * @return mixed
     * @throws WixHiveException
     */
    public static function process(Command $command, ResponseInterface $response)
    {
        $responseData = json_decode((string)$response->getBody());

        if (isset($responseData->errorCode)){
            $message = isset($responseData->message) ? $responseData->message : "No message";
            throw new WixHiveException($message, $responseData->errorCode);
        }

        return $command->getResponseProcessor()->process($responseData);
    }
}

