<?php /* Smarty version 2.6.25-dev, created on 2018-06-21 15:40:24
         compiled from common/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'common/footer.tpl', 31, false),array('modifier', 'assign', 'common/footer.tpl', 31, false),)), $this); ?>
 
<?php $this->assign('brandImage', "templates/images/ojs_brand.png"); ?>
<?php $this->assign('packageKey', "common.openJournalSystems"); ?>
<?php $this->assign('pkpLink', "http://pkp.sfu.ca/ojs"); ?>

<?php echo ''; ?><?php if ($this->_tpl_vars['pageFooter'] == ''): ?><?php echo '<div class="issn">'; ?><?php echo $this->_tpl_vars['currentJournal']->getSetting('onlineIssn'); ?><?php echo '</div>'; ?><?php if ($this->_tpl_vars['currentJournal'] && $this->_tpl_vars['currentJournal']->getSetting('onlineIssn')): ?><?php echo ''; ?><?php $this->assign('issn', $this->_tpl_vars['currentJournal']->getSetting('onlineIssn')); ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['currentJournal'] && $this->_tpl_vars['currentJournal']->getSetting('printIssn')): ?><?php echo ''; ?><?php $this->assign('issn', $this->_tpl_vars['currentJournal']->getSetting('printIssn')); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['issn']): ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "journal.issn"), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'issnText') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'issnText'));?><?php echo ''; ?><?php $this->assign('pageFooter', ($this->_tpl_vars['issnText']).": ".($this->_tpl_vars['issn'])); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "core:common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

    
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "core:common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>