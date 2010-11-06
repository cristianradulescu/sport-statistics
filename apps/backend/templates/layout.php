<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
	 <div class="topmenu">
		<ul>
			<li><a href="<?php echo url_for("sport") ?>">Sports</a></li><li> | </li>
			<li><a href="<?php echo url_for("country") ?>">Countries</a></li><li> | </li>
			<li><a href="<?php echo url_for("competition") ?>">Competitions</a></li><li> | </li>
			<li><a href="<?php echo url_for("statistics") ?>">Statistics</a></li><li> | </li>
			<li><a href="<?php echo url_for("fixture") ?>">Fixtures</a></li>
		</ul>
	  </div>
   
    <?php echo $sf_content ?>
  </body>
</html>
