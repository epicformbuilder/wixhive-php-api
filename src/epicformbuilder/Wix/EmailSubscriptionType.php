<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/29/15
 * Time: 1:18 PM
 */
namespace epicformbuilder\Wix;


class EmailSubscriptionType
{
    const OPT_OUT = "optOut";
    const TRANSACTIONAL = "Transactional";
    const RECURRING = "Recurring";

    private static $allowedTypes = [self::OPT_OUT, self::TRANSACTIONAL, self::RECURRING];

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function isTypeAllowed($type){
        return in_array($type, self::$allowedTypes);
    }


}