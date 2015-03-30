<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 11:07 AM
 */
namespace epicformbuilder\Wix\Models;

class PagingActivitiesResult extends Model
{
    /** @var  string */
    public $pageSize;

    /** @var  string */
    public $previousCursor;

    /** @var  string */
    public $nextCursor;

    /** @var array  */
    public $results=[];

    /**
     * @param string $pageSize
     * @param string $previousCursor
     * @param string $nextCursor
     * @param array  $results
     */
    public function __construct($pageSize="", $previousCursor="", $nextCursor="", array $results=[])
    {

        $this->pageSize = $pageSize;
        $this->previousCursor = $previousCursor;
        $this->nextCursor = $nextCursor;
        $this->results = $results;

    }

}