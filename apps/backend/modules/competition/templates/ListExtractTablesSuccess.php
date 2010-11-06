<?php use_helper('I18N', 'Date') ?>
<?php include_partial('competition/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Competitions', array(), 'messages') ?></h1>

  <?php include_partial('competition/flashes') ?>

  <div id="sf_admin_header">
  </div>

  <div id="sf_admin_content">

    <?php include_partial('extracted_data_table', array('groups' => $groups, 'values' => $values, 'table_class' => 'statistics')) ?>

    <div class="sf_admin_form">
      <?php echo form_tag_for($extracted_tables_form, 'competition/listExtractTables') ?>

        <ul class="sf_admin_actions">
          <?php echo $helper->linkToSave($extracted_tables_form->getObject(), array('params' => array(),
                                                                                     'class_suffix' => 'save',
                                                                                     'label' => 'Execute',)) ?>
        </ul>
      
        <?php echo $extracted_tables_form->renderHiddenFields() ?>

        <?php if ($extracted_tables_form->hasGlobalErrors()): ?>
          <?php echo $extracted_tables_form->renderGlobalErrors() ?>
        <?php endif; ?>
        <?php echo $extracted_tables_form ?>
      </form>
    </div>
  </div>

  <div id="sf_admin_footer">
  </div>
</div>
