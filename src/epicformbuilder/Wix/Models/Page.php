<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:21 PM
 */
namespace epicformbuilder\Wix\Models;

class Page extends Model
{
    /** @var  string */
    public $path;

    /** @var  string */
    public $wixPageId;

    /** @var  string */
    public $appPageId;

    /**
     * @param $path
     * @param $wixPageId
     * @param $appPageId
     */
    public function __construct($path=null, $wixPageId=null, $appPageId=null)
    {
        $this->path = $path;
        $this->wixPageId = $wixPageId;
        $this->appPageId = $appPageId;
    }


}