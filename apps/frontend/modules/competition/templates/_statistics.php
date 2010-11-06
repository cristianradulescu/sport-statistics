<table id='statistics' cellpadding="0" cellspacing="0" style="padding: 0">

  <tr class="header">
    <?php foreach ($groups as $group_name => $group_data): ?>
      <td class="group" colspan="<?php echo count($group_data['columns']) ?>">
        <?php echo __($group_data['label']); ?>
      </td>
    <?php endforeach; ?>
  </tr>

 <tr class="header">
    <?php foreach ($groups as $group_name => $group_data): ?>
      <?php foreach ($group_data['columns'] as $column => $column_data): ?>
        <td class="subgroup" style="text-align: center">
          <?php echo __($column_data['label']); ?>
        </td>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </tr>

<?php for ($i = 0; $i < count ($values); $i++): ?>
  <tr>
    <?php foreach ($groups as $group_name => $group_data): ?>
      <?php foreach ($group_data['columns'] as $column => $column_data): ?>
          <?php $td_class = isset($column_data['css']) ? strtolower($column_data['css']) : strtolower($column_data['label']); ?>
          <td class="column_<?php echo $td_class; ?>">
            <?php echo $values[$i][$column]; ?>
          </td>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </tr>
<?php endfor; ?>

</table>

<p></p>

<?php if (!empty($fixtures)): ?>
  <table id='fixtures' cellpadding="0" cellspacing="0" style="padding: 0" width="286">
    <?php $header_counter = 0 ?>
    <?php foreach ($fixtures as $round => $fixtures_array): ?>
      <tr class="header">
        <td class="column_game"<?php if ($header_counter == 0): ?>style="border-top: 1px solid #000000"<?php endif ?>><?php echo __('Round').' '.$round ?></td>
        <td class="column_points"<?php if ($header_counter == 0): ?>style="border-top: 1px solid #000000"<?php endif ?>><?php echo __('FT') ?></td>
        <td class="column_points"<?php if ($header_counter == 0): ?>style="border-top: 1px solid #000000"<?php endif ?>><?php echo __('HT') ?></td>
      </tr>
      <?php $header_counter++ ?>
      
      <?php foreach ($fixtures_array as $fixture): ?>
        <tr>
          <td class="column_game"><?php echo $fixture->getGame() ?></td>
          <td><?php echo $fixture->getFinalTime() ?></td>
          <td><?php echo $fixture->gethalfTime() ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </table>
<?php endif; ?>