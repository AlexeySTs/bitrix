<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>






<div class="col-lg-4 mb-5 mb-lg-0"> 
    <div class="row mb-5">
        <div class="col-md-12">
            <h3 class="footer-heading mb-4"><?=GetMessage('NAVI')?></h3>
        </div>
		<div class="col-md-6 col-lg-6">
			<ul class="list-unstyled">
				<?$delimiter = round(count($arResult)/2) + 1;
				$count = 0;
				foreach($arResult as $arItem):
					$count++;
					if($count == $delimiter):?>
			</ul>
		</div>
		<div class="col-md-6 col-lg-6">
			<ul class="list-unstyled">
					<?endif?>

					<li><a href="<?=$arItem["LINK"]?>"> <?=$arItem["TEXT"]?></a></li>

				<?endforeach?>
			</ul>
		</div>
	</div>
</div>


</ul>
<?endif?>
<? unset($count, $delimiter) ?>