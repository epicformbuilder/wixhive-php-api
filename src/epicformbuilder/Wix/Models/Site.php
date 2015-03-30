<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 4:08 PM
 */
namespace epicformbuilder\Wix\Models;

class Site extends Model{

    /** @var  string */
    public $url;

    /** @var  string */
    public $status;

    /**
     * @param string $url
     * @param string $status
     */
    public function __construct($url, $status){
        $this->url = $url;
        $this->status = $status;
    }

}