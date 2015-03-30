<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 10:24 PM
 */
namespace epicformbuilder\Wix\Models;

class PagingContactsResult extends Model
{
    /** @var  string - The total number of Contacts that can be returned */
    public $total;

    /** @var  string - The number of results returned per cursor */
    public $pageSize;

    /** @var  string - The cursor used to access the previous set of contacts. null will be returned if there are no previous results */
    public $previousCursor;

    /** @var  string - The cursor used to access the next set of contacts. null will be returned if there are no more results. */
    public $nextCursor;

    /** @var  array - an array of Contact items */
    public $results;

    /**
     * @param string $total
     * @param string $pageSize
     * @param string $previousCursor
     * @param string $nextCursor
     * @param array  $results
     */
    public function __construct($total="", $pageSize="", $previousCursor="", $nextCursor="", array $results=null)
    {
        $this->total = $total;
        $this->pageSize = $pageSize;
        $this->previousCursor = $previousCursor;
        $this->nextCursor = $nextCursor;
        $this->results = $results;
    }

}