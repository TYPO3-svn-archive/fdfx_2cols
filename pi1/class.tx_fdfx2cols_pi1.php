<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2004 Peter Russ (peter.russ@4dfx.de)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * Plugin '2 Column (4D f/x)' for the 'fdfx_2cols' extension.
 *
 * @author	Peter Russ <peter.russ@4many.net>
 * @version $Id: class.tx_fdfx2cols_pi1.php,v 1.6 2005/07/19 15:52:26 pruss Exp $
 *
 */


require_once(PATH_tslib."class.tslib_pibase.php");
require_once (PATH_t3lib.'class.t3lib_parsehtml_proc.php');


class tx_fdfx2cols_pi1 extends tslib_pibase {
	var $prefixId = "tx_fdfx2cols_pi1";		// Same as class name
	var $scriptRelPath = "pi1/class.tx_fdfx2cols_pi1.php";	// Path to this script relative to the extension dir.
	var $extKey = "fdfx_2cols";	// The extension key.

	var $conf;
    var $templateCode;
	var $fd_rte = null;

	/**
	 * Main entry point
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();

		// get the template
        $this->templateCode = $this->cObj->fileResource($this->conf["templateFile"]);

		// get the specified layout out of the template
		$templateMarker = '###TEMPLATE_'.$this->cObj->data['tx_fdfx2cols_type'].'###';
        $template = $this->cObj->getSubpart($this->templateCode, $templateMarker);

		// create the content by replacing the marker in the template
        $subpartArray = array();
        $subpartArray["###SUBHEADER###"]     = $this->cObj->data['subheader'];
        //PRS+ 19.07.2005
		$subpartArray["###SUBHEADER###"] = $this->pi_getEditIcon($subpartArray["###SUBHEADER###"],"subheader,layout","Edit item",$this->cObj->data,'tt_content');
        $subpartArray["###HEADER###"]     = $this->cObj->data['header'];
		$subpartArray["###HEADER###"] = $this->pi_getEditIcon($subpartArray["###HEADER###"],"header,layout","Edit item",$this->cObj->data,'tt_content');
		//PRS- 19.07.2005
		$order = $this->cObj->data['tx_fdfx2cols_order'];
		switch ($order)
		{
			case 1 : // left <-> middle
				$content_first = "###CONTENT_MIDDLE###";
				$content_second= "###CONTENT_LEFT###";
				break;
			default : // normal
				$content_first="###CONTENT_LEFT###";
				$content_second="###CONTENT_MIDDLE###";
				break;
		}
		$fd_rte=t3lib_div::makeInstance('t3lib_parsehtml_proc');
        $subpartArray[$content_first] = $this->_parse('tx_fdfx2cols_leftcolumn');
		//PRS+ 19.07.2005
		//added EditIcon
		$subpartArray[$content_first] = $this->pi_getEditIcon($subpartArray[$content_first],"tx_fdfx2cols_height,tx_fdfx2cols_leftcolumn","Edit item",$this->cObj->data,'tt_content');
		//PRS- 19.07.2005

        $subpartArray[$content_second] = $this->_parse('bodytext');
		//PRS+ 19.07.2005
		//added EditIcon
		$subpartArray[$content_second] = $this->pi_getEditIcon($subpartArray[$content_second],"tx_fdfx2cols_height,bodytext","Edit item",$this->cObj->data,'tt_content');
		//PRS- 19.07.2005

        //PRS+ 04.03.2005
		#added support for <div> handling instead of <table>
		if (isset($this->conf["divHeight"]))
		{
			$subpartArray[$this->conf["divHeight"]]=$this->cObj->data['tx_fdfx2cols_height'];
		}
		//PRS- 04.03.2005
        $content = $this->cObj->substituteMarkerArrayCached($template, $subpartArray, array(), array());
        // finally return the content
        return $this->pi_wrapInBaseClass($content);
	}

	function _parse($obj)
	{
		if ($this->fd_rte==null)
		{
			$this->fd_rte=t3lib_div::makeInstance('t3lib_parsehtml_proc');
		}
		$content=$this->cObj->parseFunc($this->cObj->data[$obj],$this->conf['parser.'],$this->conf["parser"]);
		return $content;
	}
}



if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/fdfx_2cols/pi1/class.tx_fdfx2cols_pi1.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/fdfx_2cols/pi1/class.tx_fdfx2cols_pi1.php"]);
}

?>