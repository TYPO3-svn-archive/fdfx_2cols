<?php

########################################################################
# Extension Manager/Repository config file for ext: "fdfx_2cols"
#
# Auto generated 09-04-2008 20:43
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => '2 Columns',
	'description' => '###NOW SUPPORT FOR CSS_STYLED OUTPUT with <div>###
Add a left column to existing regular text column. Got inspired by xinit_twocolumn BUT adding only required staff to reduce overhead. Additional
order item to change left
column and bodytext, which
normally displays in the middle. Now it can stay at the right w/o need of coping the columns! NOW:: This is css-approved.
If you need more check for http://typo3.org/extensions/repository/search/fdfx_3cols/',
	'category' => 'fe',
	'shy' => 0,
	'version' => '3.0.0',
	'dependencies' => 'cms,css_styled_content',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => 'tt_content',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Peter Russ',
	'author_email' => 'peter.russ@4many.net',
	'author_company' => '4Many Services',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'cms' => '',
			'css_styled_content' => '',
			'typo3' => '4.1.0-',
		),
		'conflicts' => array(
			'fdfx_3cols' =>'-2.3.0',
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:13:{s:12:"ext_icon.gif";s:4:"f9a3";s:17:"ext_localconf.php";s:4:"4506";s:14:"ext_tables.php";s:4:"1963";s:14:"ext_tables.sql";s:4:"c41c";s:28:"ext_typoscript_constants.txt";s:4:"6edf";s:24:"ext_typoscript_setup.txt";s:4:"2d2c";s:16:"locallang_db.xml";s:4:"71e3";s:20:"tpl.2column.div.html";s:4:"bb35";s:16:"tpl.2column.html";s:4:"5ad3";s:14:"doc/manual.sxw";s:4:"b361";s:19:"doc/wizard_form.dat";s:4:"24f5";s:20:"doc/wizard_form.html";s:4:"ec44";s:30:"pi1/class.tx_fdfx2cols_pi1.php";s:4:"9ced";}',
	'suggests' => array(
	),
);

?>