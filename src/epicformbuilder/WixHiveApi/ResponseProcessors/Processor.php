<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 1:07 PM
 */
namespace epicformbuilder\WixHiveApi\ResponseProcessors;

interface Processor
{
    public function process(\stdClass $responseDataData);
}