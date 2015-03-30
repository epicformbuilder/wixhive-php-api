<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/18/15
 * Time: 9:24 PM
 */
namespace epicformbuilder\Wix\Models;

class ContactUrl extends Model
{
    /** @var  int - The id of this information within the Contact, */
    public $id;

    /** @var  string - The context tag associated with this url, */
    public $tag;

    /** @var  string - A url associated with this contact */
    public $url;

    /**
     * @param string|null $id
     * @param string $tag
     * @param string $url
     */
    public function __construct($id=null, $tag="", $url="")
    {
        $this->id = $id;
        $this->tag = $tag;
        $this->url = $url;
    }
}
