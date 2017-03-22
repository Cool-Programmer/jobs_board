<a href="/index/jobs" class="btn btn-warning">Back to Job Listings</a>
<h2><?= $job->title ?> <small class="text-muted">in <?= $job->city ?>, <?= $job->state ?></small>
<?php if(Yii::$app->user->identity->id == $job->user_id) : ?>
  <span class="pull-right"> <a class="btn btn-primary" href="/jobs/edit/<?=$job->id?>">Edit</a> <a class="btn btn-danger" href="/jobs/delete/<?=$job->id?>">Delete</a> </span> 
<?php endif ?>

</h2>
<div class="well">
  <h4>Job Description</h4>
  <p><?= $job->description; ?></p>
</div>
<?php
  $date = strtotime($job->create_date);
  $formatted_date = date("F j, Y, g:i a", $date);
?>
<ul class="list-group">
  <li class="list-group-item"><strong>Listing Date: </strong><?= $formatted_date; ?></li>
  <li class="list-group-item"><strong>Category: </strong><?= $job->category->name; ?></li>
  <li class="list-group-item"><strong>Requirements: </strong> <?= $job->requirements; ?></li>
  <li class="list-group-item"><strong>Type: </strong> <?= $job->type; ?></li>
  <li class="list-group-item"><strong>State: </strong> <?= $job->state; ?></li>
  <li class="list-group-item"><strong>City: </strong> <?= $job->city; ?></li>
  <li class="list-group-item"><strong>Zipcode: </strong> <?= $job->zipcode; ?></li>
  <li class="list-group-item"><strong>State: </strong> <?= $job->state; ?></li>
  <li class="list-group-item"><strong>Email: </strong> <a href="mailto: <?= $job->contact_email; ?>"><?= $job->contact_email; ?></a> </li>
  <li class="list-group-item"><strong>Phone: </strong> <?= $job->contact_phone; ?></li>
  <li class="list-group-item"><strong>Salary Range: </strong> <?= $job->salary_range; ?></li>
  <li class="list-group-item"><strong>Vacancy: </strong>  <?php if ($job->is_published == 0) : ?>
    Close
  <?php else : ?>
    Open
  <?php endif ?>
  </li>
</ul>