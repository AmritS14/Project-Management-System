<?php
 $today = date_create(date('F j, y'));
 $deadline = date_create($comp);

 $diff = date_diff($today, $deadline);

 ?>

