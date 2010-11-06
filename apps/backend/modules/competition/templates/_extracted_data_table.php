  <table id='<?php echo $table_class ?>' cellpadding="0" cellspacing="0" >

    <tr class="header">
      <?php foreach ($groups as $group_name => $group_data): ?>
        <td class="group" colspan="<?php echo count($group_data['columns']) ?>">
          <?php echo $group_data['label']; ?>
        </td>
      <?php endforeach; ?>
    </tr>

   <tr class="header">
      <?php foreach ($groups as $group_name => $group_data): ?>
        <?php foreach ($group_data['columns'] as $column => $column_data): ?>
          <td class="subgroup">
            <?php echo $column_data['label']; ?>
          </td>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tr>

  <?php for ($i = 0; $i < count ($values); $i++): ?>
    <tr>
      <?php foreach ($groups as $group_name => $group_data): ?>
        <?php foreach ($group_data['columns'] as $column => $column_data): ?>
            <td class="column_<?php echo strtolower($column_data['label']); ?>">
              <?php echo $values[$i][$column]; ?>
            </td>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tr>
  <?php endfor; ?>

  </table>