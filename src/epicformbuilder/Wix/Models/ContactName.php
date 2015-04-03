<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:10 PM
 */
namespace epicformbuilder\Wix\Models;

class ContactName extends Model
{
    /** @var  string */
    public $prefix;

    /** @var  string */
    public $first;

    /** @var  string */
    public $middle;

    /** @var  string */
    public $last;

    /** @var  string */
    public $suffix;

    /**
     * @param string $prefix
     * @param string $first
     * @param string $middle
     * @param string $last
     * @param string $suffix
     */
    public function __construct($prefix=null, $first=null, $middle=null, $last=null, $suffix=null)
    {
        $this->prefix = $prefix;
        $this->first = $first;
        $this->middle = $middle;
        $this->last = $last;
        $this->suffix = $suffix;
    }

}