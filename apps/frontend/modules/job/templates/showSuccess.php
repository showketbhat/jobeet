<?php /* ?>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $jobeet_job->getId() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $jobeet_job->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $jobeet_job->getType() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $jobeet_job->getCompany() ?></td>
    </tr>
    <tr>
      <th>Logo:</th>
      <td><?php echo $jobeet_job->getLogo() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $jobeet_job->getUrl() ?></td>
    </tr>
    <tr>
      <th>Position:</th>
      <td><?php echo $jobeet_job->getPosition() ?></td>
    </tr>
    <tr>
      <th>Location:</th>
      <td><?php echo $jobeet_job->getLocation() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $jobeet_job->getDescription() ?></td>
    </tr>
    <tr>
      <th>How to apply:</th>
      <td><?php echo $jobeet_job->getHowToApply() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $jobeet_job->getToken() ?></td>
    </tr>
    <tr>
      <th>Is public:</th>
      <td><?php echo $jobeet_job->getIsPublic() ?></td>
    </tr>
    <tr>
      <th>Is activated:</th>
      <td><?php echo $jobeet_job->getIsActivated() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $jobeet_job->getEmail() ?></td>
    </tr>
    <tr>
      <th>Expires at:</th>
      <td><?php echo $jobeet_job->getExpiresAt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $jobeet_job->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $jobeet_job->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('job/edit?id='.$jobeet_job->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('job/index') ?>">List</a>

<?php */ ?>

<?php slot('title', sprintf('%s is looking for a %s', $job->getCompany(), $job->getPosition())) ?>
<!-- Above using a Slot page 54 Practical Symfony. -->

<!-- apps/frontend/modules/job/templates/showSuccess.php -->
<?php use_stylesheet('job.css') ?>
 <?php use_helper('Text') ?>
	<div id="job">
		<h1><?php echo $job->getCompany() ?></h1>
		<h2><?php echo $job->getLocation() ?></h2>
		<h3><?php echo $job->getPosition() ?>
			<small> - <?php echo $job->getType() ?></small>
		</h3>
		<?php if ($job->getLogo()): ?>
			<div class="logo">
				<a href="<?php echo $job->getUrl() ?>">
					<img src="http://www.symfony-project.org/uploads/jobs/<?php echo $job->getLogo() ?>" 
					alt="<?php echo $job->getCompany() ?> logo" />
				</a>
			</div>
		<?php endif ?>
		<div class="description">
			<?php echo simple_format_text($job->getDescription()) ?>
		</div>
		<h4>How to apply?</h4>
		<p class="how_to_apply"><?php echo $job->getHowToApply() ?></p>
		<div class="meta">
			<small>posted on <?php echo $job->getDateTimeObject('created_at')->format('d/m/Y') ?></small>
		</div>
		<div style="padding: 20px 0">
			<a href="<?php echo url_for('job/edit?id='.$job->getId()) ?>"> Edit </a>
		</div>
	</div>

