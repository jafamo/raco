<?php

/**
 * @file plugins/blocks/certificados/CertificadosBlockPlugin.inc.php
 *
 * Copyright (c) 2018 jfarinos from CSUC
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class CertificadosBlockPlugin
 * @ingroup plugins_blocks_languageToggle
 *
 * @brief Class for language selector block plugin
 */

import('lib.pkp.classes.plugins.BlockPlugin');

class CertificadosBlockPlugin extends BlockPlugin {
	/**
	 * Determine whether the plugin is enabled. Overrides parent so that
	 * the plugin will be displayed during install.
	 *
	 * @param $contextId int Context ID (journal/press)
	 * @return boolean
	 */
	function getEnabled($contextId = null) {
		if (!Config::getVar('general', 'installed')) return true;
		return parent::getEnabled($contextId);
	}

	/**
	 * Install default settings on system install.
	 * @return string
	 */
	function getInstallSitePluginSettingsFile() {
		return $this->getPluginPath() . '/settings.xml';
	}

	/**
	 * Install default settings on journal creation.
	 * @return string
	 */
	function getContextSpecificPluginSettingsFile() {
		return $this->getPluginPath() . '/settings.xml';
	}

	/**
	 * Get the block context. Overrides parent so that the plugin will be
	 * displayed during install.
	 *
	 * @param $contextId int Context ID (journal/press)
	 * @return int
	 */
	function getBlockContext($contextId = null) {
		if (!Config::getVar('general', 'installed')) return BLOCK_CONTEXT_SIDEBAR;
		return parent::getBlockContext($contextId);
	}

	/**
	 * Determine the plugin sequence. Overrides parent so that
	 * the plugin will be displayed during install.
	 *
	 * @param $contextId int Context ID (journal/press)
	 */
	function getSeq($contextId = null) {
		if (!Config::getVar('general', 'installed')) return 2;
		return parent::getSeq($contextId);
	}

	/**
	 * Get the display name of this plugin.
	 * @return String
	 */
	function getDisplayName() {
		return __('plugins.block.certificados.displayName');
	}

	/**
	 * Get a description of the plugin.
	 */
	function getDescription() {
		return __('plugins.block.certificados.description');
	}

	/**
	 * AQUI viene el codigo a utilizar
	 * Get the HTML contents for this block.
	 * @param $templateMgr object
	 * @param $request PKPRequest
	 */
	function getContents($templateMgr, $request = null) {
            $journal = $request->getJournal();
            if(!$journal) return '';
            
            //$fecyt = DAORegistry::getDAO('FecytDAO');
            
            
            
		$templateMgr->assign('isPostRequest', $request->isPost());
	//	$journal = $request->getJournal();

		$templateMgr->assign('carhus', $journal->getSetting('carhus'));
                $templateMgr->assign('fecyt', $journal->getSetting('fecyt'));
                $templateMgr->assign('jcr', $journal->getSetting('jcr'));



		/*
		if (!defined('SESSION_DISABLE_INIT')) {
			$journal = $request->getJournal();
			if (isset($journal)) {
				$locales = $journal->getSupportedLocaleNames();

			} else {
				$site = $request->getSite();
				$locales = $site->getSupportedLocaleNames();
			}
		} else {
			$locales = AppLocale::getAllLocales();
			$templateMgr->assign('languageToggleNoUser', true);
		}

		if (isset($locales) && count($locales) > 1) {
			$templateMgr->assign('enableLanguageToggle', true);
			$templateMgr->assign('languageToggleLocales', $locales);
		}
*/

		return parent::getContents($templateMgr, $request);
	}
}

?>
