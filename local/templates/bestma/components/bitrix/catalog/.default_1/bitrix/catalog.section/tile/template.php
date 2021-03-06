<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br />
<? endif; ?>
<? /*
  echo "<pre>";
  print_r($arResult);
  echo "</pre>";
  // */
?>
<ul class="prod_tile items_pic">
    <? foreach ($arResult["ITEMS"] as $cell => $arElement): ?>
        <?
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li id="<?= $this->GetEditAreaId($arElement['ID']); ?>" class="prod_parent_block_8dfd71c72ba4339630bf25e7445cf49a">
            <div class="name class_title_9364da414e1da2f6f7c9c67387176b1a">
                <a href="<?= $arElement['DETAIL_PAGE_URL']; ?>"><?= $arElement['NAME']; ?></a>
            </div>
            <? if (isset($arElement["CATALOG_QUANTITY"]) && $arElement["CATALOG_QUANTITY"] > 0): ?>
                <div class="in_stock"></div>
            <? endif; ?>
            <? if (is_array($arElement["PREVIEW_PICTURE"])): ?>
                <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>" class="img" style="background-image: url('<?= $arElement["PREVIEW_PICTURE"]["SRC"] ?>');"></a>
                <img class="class_img_item_0620e44395b9ad45e489d15b3615c972" src="<?= $arElement["PREVIEW_PICTURE"]["SRC"] ?>" style="display: none;" alt="" />
            <? elseif (is_array($arElement["DETAIL_PICTURE"])): ?>
                <a href="<?= $arElement["DETAIL_PAGE_URL"] ?>" class="img" style="background-image: url('<?= $arElement["DETAIL_PICTURE"]["SRC"] ?>');"></a>   
                <img class="class_img_item_0620e44395b9ad45e489d15b3615c972" src="<?= $arElement["DETAIL_PICTURE"]["SRC"] ?>" style="display: none;" alt="" />
            <? endif ?>

            <div class="inf">
                <div class="article">Арт. <?= $arElement["DISPLAY_PROPERTIES"]["ARTICLE"]["DISPLAY_VALUE"]; ?></div>
                <div class="prices">

                    <?
                    $count = count($arElement["PRICES"]);
                    ?> 
                    <?
                    if (isset($count) && $count >= 0):
                        foreach ($arElement["PRICES"] as $price_name => $price):
                            $i++;
                            ?>
                            <div <? if ($i === $count): ?>class="end"<? endif; ?>> <span class="price"><?= $price["VALUE"] . "р." ?></span> <span><?= $arResult["PRICES"]["$price_name"]["TITLE"]; ?></span> </div>
                            <?
                        endforeach;
                        unset($i);
                    endif;
                    ?> 
                </div>

                <div class="description"><a href="<?= $arElement["DETAIL_PAGE_URL"] ?>">описание товара</a></div>
                <form method="post" action="">
                    <input class="button_buy_f97668b00ffded31ba0e36016cf2ad1f" type="submit" name="actionADD2BASKET" value="" />
                    <input type="hidden" name="id" value="<?= $arElement["ID"] ?>" />
                    <input type="hidden" name="action" value="BUY" />
                    <label>
                        <input name="quantity" type="text" value="1" />
                        <span>шт.</span> 

                    </label>
                </form>
            </div>
        </li>
    <? endforeach; // foreach($arResult["ITEMS"] as $arElement):  ?>
</ul>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
