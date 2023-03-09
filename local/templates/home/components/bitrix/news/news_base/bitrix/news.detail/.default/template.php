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
<!--
	<div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 order-md-2" data-aos="fade-up" data-aos-delay="100">
            <img src="images/hero_bg_4.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 mr-auto order-md-1"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title mb-3">
              <h2>Our Office</h2>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in cum odio.</p>
            <p>Illum repudiandae ratione facere explicabo. Consequatur dolor optio iusto, quos autem voluptate ea? Sunt laudantium fugiat, mollitia voluptate? Modi blanditiis veniam nesciunt architecto odit voluptatum tempore impedit magnam itaque natus!</p>
          </div>
        </div>
      </div>
    </div>
-->
<div class="site-section">
	<div class="container">
        <div class="row align-items-center">
			<?$checkImage = $arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"]);?>
			<?if($checkImage):?>
				<div class="col-md-6 order-md-2" data-aos="fade-up" data-aos-delay="100">
					<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" class="img-fluid">
				</div>
				<div class="col-md-5 mr-auto order-md-1"  data-aos="fade-up" data-aos-delay="200">
				<div class="site-section-title mb-3">
			<?endif?>
					<h2><?=$arResult["NAME"]?></h2>
				</div>
            	<p><?=$arResult["DETAIL_TEXT"]?></p>
			<?if($checkImage):?>
				</div>
		</div>
			<?endif?>
	</div>
</div>
