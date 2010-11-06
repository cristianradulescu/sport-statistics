<?php $yesterday = date('Y-m-d H:m:s', time() - 60*60*24) ?>
<?php $updated_statistics = ($competition->getStatisticsUpdatedAt() != null && $competition->getStatisticsUpdatedAt() > $yesterday) ? 'true' : 'false' ?>
<?php $updated_fixtures = ($competition->getFixturesUpdatedAt() != null && $competition->getFixturesUpdatedAt() > $yesterday) ? 'true' : 'false' ?>

<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_extract_tables">
      <a href="<?php echo url_for('competition/ListExtractTables?id='.$competition->getId()) ?>" class="status_updated_<?php echo $updated_statistics ?>">
        <?php echo __('Extract Tables') ?>
      </a>
    </li>

    <?php // extract fixtures only for soccer ?>
    <?php //if (Sport::SOCCER == $competition->getSportId()): ?>
      <li class="sf_admin_action_extract_fixtures">
        <a href="<?php echo url_for('competition/ListExtractFixtures?id='.$competition->getId()) ?>" class="status_updated_<?php echo $updated_fixtures ?>">
          <?php echo __('Extract Fixtures') ?>
        </a>
      </li>
    <?php //endif ?>
  </ul>
</td>