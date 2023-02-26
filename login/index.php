<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && mb_strpos($_REQUEST["backurl"], "/") === 0)
{
	LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Вход на сайт");
?><p>
	 Вы зарегистрированы и успешно авторизовались.
</p>
<p>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:blog.user",
	"",
	Array(
		"BLOG_VAR" => "",
		"DATE_TIME_FORMAT" => "d.m.Y H:i:s",
		"ID" => $id,
		"PAGE_VAR" => "",
		"PATH_TO_BLOG" => "",
		"PATH_TO_SEARCH" => "",
		"PATH_TO_USER" => "",
		"PATH_TO_USER_EDIT" => "",
		"SET_TITLE" => "Y",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USER_PROPERTY" => array(),
		"USER_VAR" => ""
	)
);?><br>
</p>
<p>
 <a href="<?=SITE_DIR?>">Вернуться на главную страницу</a>
</p>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>