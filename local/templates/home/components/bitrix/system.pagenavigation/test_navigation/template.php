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
// var_dump($arResult);
if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>
<!-- 
	<div class="row">
          <div class="col-md-12 text-center">
            <div class="site-pagination">
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a>
            </div>
          </div>  
        </div>
-->
<div class="row">
    <div class="col-md-12 text-center">
        <div class="site-pagination">
<?

$navSelect = $arResult['NavPageNomer'];
$navCount = $arResult['NavPageCount'];

// Формирование ссылки 
$pageUrl = $arResult['sUrlPath'];
if (!empty($arResult['NavQueryString'])) {
    $pageUrl = $pageUrl.'?'.$arResult['NavQueryString'].'&PAGEN_'.$arResult['NavNum'].'=';
} else {
    $pageUrl = $pageUrl.'?PAGEN_'.$arResult['NavNum'].'=';
}

// Если кол-во страниц меньше 5 просто вывести список
if ($navCount <= 5):?>
	<?for($elem = 1; $elem <= $navCount; $elem++):?>
		<?if($elem == $navSelect):?>
			<a href="<?=$pageUrl.$elem?>" class="active"><?=$elem?></a>
		<?else:?> 
			<a href="<?=$pageUrl.$elem?>"><?=$elem?></a>
		<?endif;
	endfor;
else:
	if($navSelect > 4):?>
    	<a href="<?=$pageUrl.$elem?>">1<a>
		<span>...</span>
		<a href="<?=$pageUrl.$elem?>"><?=$navSelect-2?></a>
		<a href="<?=$pageUrl.$elem?>"><?=$navSelect-1?></a>
		<a href="<?=$pageUrl.$elem?>" class="active"><?=$navSelect?></a>
	<?else:?>
	    <?for($elem = 1; $elem <= $navSelect; $elem++):?>
	    
    		<?if($elem == $navSelect):?>
    			<a href="<?=$pageUrl.$elem?>" class="active"><?=$elem?></a>
    		<?else:?> 
    			<a href="<?=$pageUrl.$elem?>"><?=$elem?></a>
    		<?endif;
	    endfor?>
	<?endif;
	
	// Формирование списка ссылок после активной страницы
	if(($navCount-$navSelect) > 4):?>
		
		<a href="<?=$pageUrl.$elem?>"><?=$navSelect+1?></a>
		<a href="<?=$pageUrl.$elem?>"><?=$navSelect+2?></a>
        <span>...</span>
        <a href="<?=$elem?>"><?=$navCount?></a>
	<?else:?>
	    
	    <?for($elem = $navSelect+1; $elem <= $navCount; $elem++):?>
    		<a href="<?=$pageUrl.$elem?>"><?=$elem?></a>
	    <?endfor;?>
	<?endif;
endif ?>
		</div>
	</div>
</div>