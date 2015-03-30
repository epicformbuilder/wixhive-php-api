<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 11:04 PM
 */
namespace epicformbuilder\WixHiveApi;

class Connector{

    /**
     * @param Request $wixHiveRequest
     *
     * @return Response
     */
    public function execute(Request $wixHiveRequest){


        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $wixHiveRequest->endpoint );

        $this->setHttpMethod($resource, $wixHiveRequest);
        if ($this->isBodyRequired($wixHiveRequest->httpMethod)) {
            $this->setRequestBody($resource, $wixHiveRequest);
        }

        if (!empty($wixHiveRequest->headers)){
            $headers = [];
            foreach($wixHiveRequest->headers as $key => $value){
                $headers[] = "$key: $value";
            }
            curl_setopt($resource, CURLOPT_HTTPHEADER, $headers);

        }
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($resource, CURLOPT_VERBOSE, 1);
        curl_setopt($resource, CURLOPT_HEADER, 1);

        $result = curl_exec($resource);
        curl_close($resource);

        //TODO process the case when there is no response from the service
        if (false === $result) {
        }

        $response = http_parse_message($result);

        return new Response(json_decode($response->body));
    }

    private function setHttpMethod($resource, Request $wixHiveRequest) {
        switch ($wixHiveRequest->httpMethod) {
            case "POST":
                curl_setopt($resource, CURLOPT_POST, 1);
                break;
            case "PUT":
            case "DELETE":
                curl_setopt($resource, CURLOPT_CUSTOMREQUEST, $wixHiveRequest->httpMethod);
                break;
            case "GET":
            default:
                // nothing by default
        }
    }

    private function isBodyRequired($httpMethod) {
        return $httpMethod === "POST" || $httpMethod === "PUT";
    }

    private function setRequestBody($resource, Request $wixHiveRequest) {
        curl_setopt($resource, CURLOPT_POSTFIELDS, $wixHiveRequest->body);
    }



}