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

 <div class="site-section site-section-sm bg-light">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12">
				<div class="site-section-title">
					<h2> <?= GetMessage('NEW_ADS') ?></h2>
				</div>		
			</div>
		</div>
			<div class="row mb-5">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		
			<div class="col-md-6 col-lg-4 mb-4">
			<div id = <?= $this->GetEditAreaId($arItem['ID']); ?> >
				<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="prop-entry d-block"> 
					<figure> 
						<img alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>" 
						src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" class="img-fluid"> 
					</figure>
					<div class="prop-text">
						<div class="inner">
							<span class="price rounded">$<?= $arItem['PROPERTY_PRICE_VALUE']?></span>
							<h3 class="title"><?= $arItem['NAME']?></h3>
							<p class="location">
							<?= $arItem['PROPERTY_ADDRESS_VALUE']?>
							</p>
						</div>
						<div class="prop-more-info">
							<div class="inner d-flex">
								<div class="col">
									<?= GetMessage('AREA')?>: <strong><?= $arItem['PROPERTY_SQUARE_VALUE']?>m<sup>2</sup></strong>
								</div>
								<div class="col">
									<?= GetMessage('BEDS')?>: <strong><?= $arItem['PROPERTY_COUNT_BEDS_VALUE']?></strong>
								</div>
								<div class="col">
									<?= GetMessage('BATHS')?>: <strong><?= $arItem['PROPERTY_COUNT_BATHS_VALUE']?></strong>
								</div>
								<?if(isset($arItem['PROPERTY_GARAGES_VALUE'])):?>
									<div class="col">
										<?= GetMessage('GARAGES')?>: <strong><?= $arItem['PROPERTY_COUNT_GARAGES_VALUE']?></strong>
									</div>
								<?endif?>
							</div>
						</div>
					</div>
				</a>
				</div>
			</div>
		
		
	<?endforeach;?>
		</div>
	</div>
</div>
