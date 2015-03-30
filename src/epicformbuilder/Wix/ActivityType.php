<?php
/**
 * User: EpicFormBuilder
 * Email: support@epicformbuilder.com
 * Date: 3/27/15
 * Time: 5:17 PM
 */
namespace epicformbuilder\Wix;

class ActivityType{

    const AUTH_LOGIN = "auth/login";
    const AUTH_REGISTER = "'auth/register";
    const AUTH_STATUS_CHANGE = "auth/status-change";
    const CONTACT_CONTACT_FORM = "contact/contact-form";
    const CONTACT_SUBSCRIPTION_FORM = "contact/subscription-form";
    const CONTACTS_CREATE = "contacts/create";
    const CONVERSION_COMPLETE = "conversion/complete";
    const ECOMMERCE_PURCHASE = "e_commerce/purchase";
    const HOTELS_CANCEL = "hotels/cancel";
    const HOTELS_CONFIRMATION = "hotels/confirmation";
    const HOTELS_PURCHASE = "hotels/purchase";
    const HOTELS_PURCHASE_FAILED = "hotels/purchase-failed";
    const MESSAGING_SEND = "messaging/send";
    const MUSIC_ALBUM_FAN = "music/album-fan";
    const MUSIC_ALBUM_SHARE = "music/album-share";
    const MUSIC_TRACK_LYRICS = "music/track-lyrics";
    const MUSIC_TRACK_PLAY = "music/track-play";
    const MUSIC_TRACK_PLAYED = "music/track-played";
    const MUSIC_TRACK_SHARE = "music/track-share";
    const MUSIC_TRACK_SKIP = "music/track-skip";
    const SCHEDULER_APPOINTMENT = "scheduler/appointment";

    /**
     * @var array
     */
    private static $allowedTypes = [
        self::AUTH_LOGIN,
        self::AUTH_REGISTER,
        self::AUTH_STATUS_CHANGE,
        self::CONTACT_CONTACT_FORM,
        self::CONTACT_SUBSCRIPTION_FORM,
        self::CONTACTS_CREATE,
        self::CONVERSION_COMPLETE,
        self::ECOMMERCE_PURCHASE,
        self::HOTELS_CANCEL,
        self::HOTELS_CONFIRMATION,
        self::HOTELS_PURCHASE,
        self::HOTELS_PURCHASE_FAILED,
        self::MESSAGING_SEND,
        self::MUSIC_ALBUM_FAN,
        self::MUSIC_ALBUM_SHARE,
        self::MUSIC_TRACK_LYRICS,
        self::MUSIC_TRACK_PLAY,
        self::MUSIC_TRACK_PLAYED,
        self::MUSIC_TRACK_SHARE,
        self::MUSIC_TRACK_SKIP,
        self::SCHEDULER_APPOINTMENT,
    ];

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function isTypeAllowed($type){
        return in_array($type, self::$allowedTypes);
    }

}