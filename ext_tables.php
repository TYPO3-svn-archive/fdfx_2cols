<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");
if (!defined ('PATH_fdfx_2cols_pi1'))
{
	define('PATH_fdfx_2cols_pi1', t3lib_extMgm::extPath($_EXTKEY));
}

if (!defined ('PATH_fdfx_2cols_pi1_rel'))
{
	define('PATH_fdfx_2cols_pi1_rel', t3lib_extMgm::extRelPath($_EXTKEY));
}
if (!defined('COMPAT_VERSION_fdfx_2cols_p1'))
{
	define('COMPAT_VERSION_fdfx_2cols_p1',t3lib_div::compat_version('4.2.0'));
}

$_EXTCONF = unserialize($_EXTCONF);    // unserializing the configuration so we can use it here:
t3lib_div::loadTCA("tt_content");
$tempColumns = Array (
    "tx_fdfx2cols_height" => Array (
    	"exclude" => 1,
    	"label" => "LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_height",
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
        "label" => "LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_type",
        "config" => Array (
            "type" => "select",
            "items" => Array (
Array("LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_type.I.0", "0"),
Array("LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_type.I.1", "1"),
Array("LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_type.I.2", "2"),
),
)
),
	"tx_fdfx2cols_order" => Array (
        "exclude" => 1,
        "label" => "LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_order",
        "config" => Array (
            "type" => "select",
			'items' => Array(),
)
),
);
#
# Enhancement for TEXTPIC
#
if ($_EXTCONF['textPic'])
{
	$tempColumns['tx_fdfx2cols_order']['config']['items']= Array (
		Array('LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_order.textPic.0', '0',PATH_fdfx_2cols_pi1_rel.'res/text-textpic.png'),
		Array('LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_order.textPic.1', '1',PATH_fdfx_2cols_pi1_rel.'res/textpic-text.png'),
	);
} else {
	$tempColumns['tx_fdfx2cols_order']['config']['items']=Array(
		Array('LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_order.I.0', '0'),
		Array('LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_order.I.1', '1'),
	);
}
$tempColumns['tx_fdfx2cols_leftcolumn']['label']= "LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.tx_fdfx2cols_leftcolumn";
t3lib_extMgm::addTCAcolumns('tt_content',$tempColumns,1);
if ((TYPO3_MODE == 'BE') && COMPAT_VERSION_fdfx_2cols_p1)
{
	// check if fdfx_2cols is set
	if (isset($_REQUEST['edit']['tt_content']))
	{
		list($fdfxItem,$fdfxAction)=each($_REQUEST['edit']['tt_content']);
		if ($fdfxAction=='edit')
		{
			if ($_REQUEST['data']['tt_content'][$fdfxItem]['CType']=='fdfx_2cols_pi1' && $_EXTCONF['tabDividers'])
			{
				$TCA['tt_content']['ctrl']['dividers2tabs']=true;
			}
		}
	}
}
$TCA['tt_content']['ctrl']['typeicons']['fdfx_2cols_pi1'] = PATH_fdfx_2cols_pi1_rel.'ext_icon.gif';
$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]="
	--div--;LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.fdfx_2cols_generalTab,
	CType;;4;button,".(COMPAT_VERSION_fdfx_2cols_p1?'hidden,':'')."1-1-1,
	".(COMPAT_VERSION_fdfx_2cols_p1?'linkToTop,':'')."
    tx_fdfx2cols_height;;;;3-3-3,
	tx_fdfx2cols_type,
	tx_fdfx2cols_order,
	--div--;LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.fdfx_2cols_headerTab,
	header;;3;;2-2-2,
	subheader,
	--div--;LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.fdfx_2cols_columnTab,
	tx_fdfx2cols_leftcolumn;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=css];3-3-3,
	--div--;LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.fdfx_2cols_imageTab,
	--div--;LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.fdfx_2cols_textTab,
	bodytext;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[flag=rte_enabled|mode=css];3-3-3,
	--div--;LLL:EXT:cms/locallang_tca.xml:pages.tabs.access".(COMPAT_VERSION_fdfx_2cols_p1?',starttime,endtime':'');
	;
if ($_EXTCONF['textPic'])
{
	$markerOld='--div--;LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.fdfx_2cols_imageTab,';
	if (COMPAT_VERSION_fdfx_2cols_p1)
	{
		$markerNew='--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media, image;;;;5-5-5, imageorient;;2,
				--palette--;LLL:EXT:cms/locallang_ttc.php:ALT.imgDimensions;13,;;;;6-6-6,
				--palette--;LLL:EXT:cms/locallang_ttc.php:ALT.imgLinks;7,	imagecaption;;5,altText;;;;7-7-7,titleText,longdescURL,;;;;8-8-8,
				--palette--;LLL:EXT:cms/locallang_ttc.php:ALT.imgOptions;11,
			';
	} else {
		$markerNew='--div--, image;;;;4-4-4, imageorient;;2, imagewidth;;13,
				--palette--;LLL:EXT:cms/locallang_ttc.php:ALT.imgLinks;7,
				--palette--;LLL:EXT:cms/locallang_ttc.php:ALT.imgOptions;11,
				imagecaption;;5,
				altText;;;;1-1-1,titleText,longdescURL
		 	';
	}
	$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]=str_replace($markerOld,$markerNew,$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]);
}
if (!$_EXTCONF['divHeight'])
{
	$markerOld="tx_fdfx2cols_height;;;;3-3-3,";
	$markerNew='';
	$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]=str_replace($markerOld,$markerNew,$TCA["tt_content"]["types"][$_EXTKEY."_pi1"]["showitem"]);
}
t3lib_extMgm::addPlugin(Array("LLL:EXT:fdfx_2cols/locallang_db.xml:tt_content.CType_pi1", $_EXTKEY.'_pi1',PATH_fdfx_2cols_pi1_rel.'ext_icon.gif'),'CType');
?>