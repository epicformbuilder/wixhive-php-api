<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 10:34 PM
 */

use epicformbuilder\WixHiveApi\Response;
use epicformbuilder\WixHiveApi\ResponseProcessors\PagingContactsResult;
use epicformbuilder\Wix\Models\PagingContactsResult as PagingContactsResultModel;

class PagingContactsResultTest extends PHPUnit_Framework_TestCase
{
    use Givens;

    public function testProcessShouldReturnExpectedPagingContactsResultModel()
    {
        $total = "100";
        $pageSize = "25";
        $previousCursor = "prevCursor";
        $nextCursor = "next cursor";
        $contact = $this->givenAContactModel();

        $expectedPagingContactResultModel = new PagingContactsResultModel($total, $pageSize, $previousCursor, $nextCursor, [$contact]);

        $contactObject = $this->givenAContactModelAsObject($contact);

        $data = new stdClass();
        $data->total = $total;
        $data->pageSize = $pageSize;
        $data->previousCursor = $previousCursor;
        $data->nextCursor = $nextCursor;
        $data->results = [$contactObject];

        $pagingContactResultModel = (new PagingContactsResult())->process(new Response($data));

        $this->assertEquals($expectedPagingContactResultModel, $pagingContactResultModel);

    }


}