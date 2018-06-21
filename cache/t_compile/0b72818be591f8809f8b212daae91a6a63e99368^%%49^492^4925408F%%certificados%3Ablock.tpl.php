<?php /* Smarty version 2.6.25-dev, created on 2018-06-21 15:40:19
         compiled from plugins/plugins/blocks/certificados/blocks/certificados:block.tpl */ ?>

 
  
  <div class="pkp_block">
     <!--
     Llamar a fecytDao para obtener todas las journals para pasarlas a la pages/fecyt
     -->
            
                 <h1><?php echo @constant(""); ?>
</h1>
                 <a href="<?php echo $this->_tpl_vars['baseUrl']; ?>
/index.php/index/carhus">
                    <p>Carhus</p></a>
            <p>Nivell: <?php echo $this->_tpl_vars['currentJournal']->getSetting('carhus'); ?>
</p>
            
           
            <?php if ($this->_tpl_vars['currentJournal']->getSetting('fecyt') != 0): ?>
                <h1><?php echo @constant(""); ?>

                 <a href="<?php echo $this->_tpl_vars['baseUrl']; ?>
/index.php/index/fecyt">
                
                     <p>fecyt</p></a>
            <?php echo $this->_tpl_vars['currentJournal']->getSetting('fecyt'); ?>

            <?php endif; ?>

            <?php if ($this->_tpl_vars['currentJournal']->getSetting('jcr') != 0): ?>
             <span class="title"><a href="<?php echo $this->_tpl_vars['baseUrl']; ?>
/index.php/index/jcr"> jcr</a>   
             </span>
            <?php echo $this->_tpl_vars['currentJournal']->getSetting('jcr'); ?>

            <?php endif; ?>
        </div>
 