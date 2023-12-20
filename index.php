<?require($_SERVER["DOCUMENT_ROOT"]. "/bitrix/header.php");

CModule::IncludeModule('iblock');

$arFilter = array(
	'IBLOCK_ID' => 5,
	'PROPERTY_PRICE' => '0'
);

$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID','ID'));

while($el = $res->GetNext()):
	$arElementsID[] = $el['ID'];
endwhile;

foreach($arElementsID as $key):
	$ELEMENT_ID = $key;
	$cbe = new CIBlockElement;
	$cbe -> SetPropertyValuesEx($ELEMENT_ID, 5, array('PRICE' => ''));
	if($cbe):
		echo "OK!<br>";
	else:
		echo "Ошибка!<br>";
	endif;
endforeach;

require($_SERVER["DOCUMENT_ROOT"]. "/bitrix/footer.php");?>