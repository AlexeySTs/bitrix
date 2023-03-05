<?
use Bitrix\Main\Loader,
Bitrix\Main,
Bitrix\Iblock;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("test");

Loader::includeModule("iblock");
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","IBLOCK_ID", "PROPERTY_PRICE", "PROPERTY_GARAGES_VALUE", "PROPERTY_PREFERRED_DEAL_VALUE");
$arFilter = Array("IBLOCK_ID" => "5", "PROPERTY_GARAGES_VALUE"=>'YES', "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$arRes = [];
while($ob = $res->GetNextElement())
{
 $arRes[] = $ob->GetFields();
 
}
var_dump($arRes);

?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>