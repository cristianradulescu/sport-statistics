<table id="selections" cellpadding="3" cellspacing="0">
  <tr>
    <td><?php echo __($sport_form->getLabel()) ?></td>
    <td id="sport_td"><?php echo $sport_form->render('statistics[sport]') ?></td>
    <td>//</td>
    <td><?php echo __($competition_form->getLabel()) ?></td>
    <td id="competition_td"> - </td>
    <td>//</td>
    <td><a href="<?php echo url_for('competition/listTextCompetitions') ?>">Lista competitii</td>
  </tr>
</table>

<hr />
<div id="statistics_table"></div>

<script type="text/javascript" language="javascript">
  $('#statistics_sport').change(function(){
    var sport_id = $('#statistics_sport option:selected').val();
    $.post('<?php echo url_for("competition/getCompetitionsList")?>', { sport_id: sport_id },
      function(data){
        $('#competition_td').html(data);
        $('#statistics_table').html('');
        triggerCompetitionsSelect();
      });
  });

  function triggerCompetitionsSelect()
  {
    $('#statistics_competition').change(function(){
    var competition_id = $('#statistics_competition option:selected').val();
    $.post('<?php echo url_for("competition/getStatistics")?>', { competition_id: competition_id },
      function(data){
        $('#statistics_table').html(data);
      });
    });
  }

</script>