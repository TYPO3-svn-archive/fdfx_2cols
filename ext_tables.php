<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
t3lib_div::loadTCA("tt_content");
$tempColumns = Array (
    "tx_fdfx2cols_height" => Array (
    	"exclude" => 1,
    	"label" => "LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_height",
    	"config" => Array (
    		"type" => "input",
    		"size" => "10",
    		"max" => "10",
    		"default" => "100px",
    	),
    ),
    "tx_fdfx2cols_leftcolumn" =>$TCA['tt_content']['columns']['bodytext'],
	"tx_fdfx2cols_type" => Array (
        "exclude" => 1,
        "label" => "LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_type",
        "config" => Array (
            "type" => "select",
            "items" => Array (
                Array("LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_type.I.0", "0"),
                Array("LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_type.I.1", "1"),
                Array("LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_type.I.2", "2"),
            ),
        )
    ),
	"tx_fdfx2cols_order" => Array (
        "exclude" => 1,
        "label" => "LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_order",
        "config" => Array (
            "type" => "select",
            "items" => Array (
                Array("LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_order.I.0", "0"),
                Array("LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_order.I.1", "1"),
            ),
        )
    ),
);

$tempColumns['tx_fdfx2cols_leftcolumn']['label']= "LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.tx_fdfx2cols_leftcolumn";
t3lib_extMgm::addTCAcolumns("tt_content",$tempColumns,1);

t3lib_div::loadTCA("tt_content");
$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]="CType;;4;button;1-1-1,
	header;;3;;2-2-2,
	subheader,
    tx_fdfx2cols_height;;;;3-3-3,
	tx_fdfx2cols_type,
	tx_fdfx2cols_order,
	tx_fdfx2cols_leftcolumn;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=css];3-3-3,
	bodytext;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=css];3-3-3
	";

t3lib_extMgm::addPlugin(Array("LLL:EXT:fdfx_2cols/locallang_db.php:tt_content.CType_pi1", $_EXTKEY."_pi1"),"CType");
?>