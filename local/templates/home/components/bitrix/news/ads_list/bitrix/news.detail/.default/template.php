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
	<div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
            <h1 class="mb-2">625 S. Berendo St</h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">$1,000,500</strong></p>
          </div>
        </div>
      </div>
    </div>

	<div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" style="margin-top: -150px;">
            <div class="mb-5">
              <div class="slide-one-item home-slider owl-carousel">
                <div><img src="images/img_1.jpg" alt="Image" class="img-fluid"></div>
                <div><img src="images/img_2.jpg" alt="Image" class="img-fluid"></div>
                <div><img src="images/img_3.jpg" alt="Image" class="img-fluid"></div>
              </div>
			  </div>
            <div class="bg-white">
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">$1,000,500</strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Beds</span>
                    <span class="property-specs-number">2 <sup>+</sup></span>
                    
                  </li>
                  <li>
                    <span class="property-specs">Baths</span>
                    <span class="property-specs-number">2</span>
                    
                  </li>
                  <li>
                    <span class="property-specs">SQ FT</span>
                    <span class="property-specs-number">7,000</span>
                    
                  </li>
                </ul>
                </div>
              </div>
-->
<?//var_dump($arResult["DISPLAY_PROPERTIES"]["ADDITIONAL_MATERIALS"]["VALUE"]);?>
<div class="site-blocks-cover overlay" style="background-image: url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>)" data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage("INFO")?></span>
            <h1 class="mb-2"><?=$arResult["NAME"]?></h1>
            <p class="mb-5"><strong class="h2 text-success font-weight-bold">$<?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></strong></p>
          </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-8" style="margin-top: -150px;">
        <div class="mb-5">
          <div class="slide-one-item home-slider owl-carousel">
				<?if (count($arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["VALUE"]) == 1):?>
					<div><img src="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["SRC"]?>" 
							alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["DESCRIPTION"]?>" class="img-fluid"></div>
				<?else:?>
					<?$count = 1;?>
					<?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"] as $image):?>
						<div><img src="<?=$image["SRC"]?>" alt="<?=$image["DESCRIPTION"]?>" class="img-fluid"></div>
						<?if(++$count == 3) break;?>
					<?endforeach?>
				
				<?endif?>
          </div>
			  </div>
        <div class="bg-white">
          <div class="row mb-5">
            <div class="col-md-6">
              <strong class="text-success h1 mb-3">$<?=$arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></strong>
            </div>
            <div class="col-md-6">
              <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                <li>
                  <span class="property-specs"><?=GetMessage("UPDATE_DATE")?></span>
                  <span class="property-specs-number"><?=ConvertDateTime($arResult["TIMESTAMP_X"],'YYYY-MM-DD')?></span>
                </li>
                <li>
                  <span class="property-specs"><?=GetMessage("FLOOR")?></span>
                  <span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]["FLOOR_COUNT"]["VALUE"]?></span>
                </li>
                <li>
                  <span class="property-specs"><?=GetMessage("AREA")?></span>
                  <span class="property-specs-number"><?=$arResult["DISPLAY_PROPERTIES"]["SQUARE"]["VALUE"]?></span>
                </li>
              </ul>
            </div>
          </div>
				<div class="row mb-5">
					<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
						<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("BATHS")?></span>
						<strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]["COUNT_BATHS"]["VALUE"]?></strong>
					</div>
					<?if($arResult["DISPLAY_PROPERTIES"]["GARAGES"]["VALUE"] == "YES"):?>
						<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
							<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage("GARAGES")?></span>
							<strong class="d-block"><?=$arResult["DISPLAY_PROPERTIES"]["COUNT_GARAGES"]["VALUE"]?></strong>
						</div>
					<?endif?>
		
        </div>
			  <h2 class="h4 text-black"><?=GetMessage("MORE")?></h2>
          <p><?=$arResult['DETAIL_TEXT']?></p>
            <div class="row mt-5">
              <div class="col-12">
                <h2 class="h4 text-black mb-3"><?=GetMessage("GALLERY")?></h2>
              </div>
              <?if (count($arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["VALUE"]) == 1):?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["SRC"]?>" class="image-popup gal-item">
                  <img src="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["SRC"]?>" alt="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["DESCRIPTION"]?>" class="img-fluid"></a>
                </div>
				      <?else:?>
                <?foreach ($arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"] as $image):?>
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <a href="<?=$image["SRC"]?>" class="image-popup gal-item">
                    <img src="<?=$image["SRC"]?>" alt="<?=$image["DESCRIPTION"]?>" class="img-fluid"></a>
                  </div>
                <?endforeach?>
				      <?endif?>
            </div>
              <?if($arResult["DISPLAY_PROPERTIES"]["ADDITIONAL_MATERIALS"]["VALUE"]):?>
                
                    <h2 class="h4 text-black mb-3"><?=GetMessage("MATERIALS")?></h2>
                
                <?if (count($arResult["DISPLAY_PROPERTIES"]["ADDITIONAL_MATERIALS"]["VALUE"]) == 1):?>
                    <a href="<?=$arResult["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["SRC"]?>"><?=["DISPLAY_PROPERTIES"]["PHOTOGALLERY"]["FILE_VALUE"]["DESCRIPTION"]?></a>
                <?else:?>
                  <?foreach ($arResult["DISPLAY_PROPERTIES"]["ADDITIONAL_MATERIALS"]["FILE_VALUE"] as $elem):?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                      <a href="<?=$elem["SRC"]?>"><?=$elem["DESCRIPTION"]?></a>
                    </div>
                  <?endforeach?>
                <?endif?>
              <?endif?>

              <?if($arResult["DISPLAY_PROPERTIES"]["OTHER_LINKS"]):?>
                
                  <h2 class="h4 text-black mb-3"><?=GetMessage("LINKS")?></h2>
                
                <?foreach ($arResult["DISPLAY_PROPERTIES"]["OTHER_LINKS"]["VALUE"] as $key=>$elem):?>
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <a href="<?=$elem?>"><?=$arResult["DISPLAY_PROPERTIES"]["OTHER_LINKS"]["DESCRIPTION"][$key]?></a>
                  </div> 
                <?endforeach?>
              <?endif?>

            </div>
          </div>
          <div class="col-lg-4 pl-md-5">

            <div class="bg-white widget border rounded">

              <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
              <form action="" class="form-contact-agent">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="phone" class="form-control">
                </div>
                <div class="form-group">
                  <input type="submit" id="phone" class="btn btn-primary" value="Send Message">
                </div>
              </form>
            </div>

            <div class="bg-white widget border rounded">
              <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
            </div>

          </div>
          
        </div>
      </div>
    </div>
	
	