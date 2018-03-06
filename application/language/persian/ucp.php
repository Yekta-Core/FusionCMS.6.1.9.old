<?php

/**
 * Note to module developers:
 * 	Keeping a module specific language file like this
 *	in this external folder is not a good practise for
 *	portability - I do not advice you to do this for
 *	your own modules since they are non-default.
 *	Instead, simply put your language files in
 *	application/modules/yourModule/language/
 *	You do not need to change any code, the system
 *	will automatically look in that folder too.
 */

// UCP
$lang['user_panel'] = "پنل کاربری";
$lang['nickname'] = "نام کوچک";
$lang['location'] = "محل";
$lang['expansion'] = "چ";
$lang['account_rank'] = "سطح اکانت";
$lang['voting_points'] = "امتیاز";
$lang['donation_points'] = "Donation points";
$lang['account_status'] = "وضعیت اکانت";
$lang['member_since'] = "عضو شده از";

// Avatar
$lang['change_avatar'] = "تغییر آواتار";
$lang['upload_avatar'] = "آپلود آواتار";

// Settings
$lang['settings'] = "تنظیمات اکانت";

$lang['nickname_error'] = "نام مستعار باید بین 4 تا 14 کاراکتر طول داشته باشد و فقط شامل حروف و اعداد باشد";
$lang['location_error'] = "موقعیت مکانی فقط تا 32 کاراکتر طول می کشد و ممکن است فقط شامل حروف باشد";
$lang['pw_doesnt_match'] = "گذرواژهها مطابقت ندارند!";
$lang['changes_saved'] = "تغییرات با موفقیت ذخیره شد!";
$lang['invalid_pw'] = "رمز عبور نادرست است!";
$lang['nickname_taken'] = "نام مستعار قبلا گرفته شده است";
$lang['invalid_language'] = "زبان نامعتبر است";

// Change expansion
$lang['change_expansion'] = "تغییر پچ";
$lang['expansion_changed'] = "پچ شما با موفقیت تغییر یافت";
$lang['back_to_ucp'] = "برای بازگشت به پنل کاربری اینجا کلیک کنید";
$lang['invalid_expansion'] = "پچ انتخابی شما وجود ندارد";
$lang['expansion'] = "پچ";
$lang['none'] = "هیچ کدام";

/**
 * Only translate these if World of Warcraft does it themselves,
 * otherwise you'll confuse people who expect to see them in English
 */
$lang['tbc'] = "The Burning Crusade";
$lang['wotlk'] = "Wrath of The Lich King";
$lang['cata'] = "Cataclysm";
$lang['mop'] = "Mists of Pandaria";
$lang['wod'] = "Warlords of Draenor";
$lang['legion'] = "Legion";