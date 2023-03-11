<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
$userId = $GLOBALS['USER']->GetID();
$checkUrl = $APPLICATION->GetCurPage(false) == '/profile_seller/my-ads/';

if($APPLICATION->GetCurPage(false) == '/profile_seller/my-ads/') {
  
  foreach($arResult["ITEMS"] as $key=>$arItem) {
    if($GLOBALS['USER']->GetID() != $arItem['CREATED_BY']) {
      unset($arResult["ITEMS"][$key]);
    }         
  }  

}
?>
<div class="site-section site-section-sm bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <div class="site-section-title">
              <?if($checkUrl):?>
                <h2><?= GetMessage('YOUR_ADS')?></h2>
              <?else:?>
                <h2><?= GetMessage('NEW_ADS')?></h2>
              <?endif?>
            </div>
          </div>
        </div>
        <div class="row mb-5">

<?if(count($arResult["ITEMS"]) == 0): ?>
  <p><?=GetMessage('NO_ADS')?></p>
<?endif?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div id="<?=$this->GetEditAreaId($arItem['ID']);?>"></div>
		<div class="col-md-6 col-lg-4 mb-4">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prop-entry d-block">
              <figure>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded">$<?=$arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></span>
                  <h3 class="title"><?=$arItem["NAME"]?></h3>
                  <p class="location"><?=$arItem["DISPLAY_PROPERTIES"]["ADDRESS"]["VALUE"]?></p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span><?= GetMessage('AREA')?>:</span>
                      <strong><?=$arItem["DISPLAY_PROPERTIES"]["SQUARE"]["VALUE"]?>m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span><?= GetMessage('BEDS')?>:</span>
                      <strong><?=$arItem["DISPLAY_PROPERTIES"]["COUNT_BEDS"]["VALUE"]?></strong>
                    </div>
                    <div class="col">
                      <span><?= GetMessage('BATHS')?>:</span>
                      <strong><?=$arItem["DISPLAY_PROPERTIES"]["COUNT_BATHS"]["VALUE"]?></strong>
                    </div>
					<?if(isset($arItem["DISPLAY_PROPERTIES"]["GARAGES"]["VALUE"])):?>
						<div class="col">
							<span><?= GetMessage('GARAGES')?>:</span>
							<strong><?=$arItem["DISPLAY_PROPERTIES"]["COUNT_GARAGES"]["VALUE"]?></strong>
						</div>
					<?endif?>
                    
                  </div>
                </div>
              </div>
            </a>
          </div>	
        		
<?endforeach;?>
</div>	
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
