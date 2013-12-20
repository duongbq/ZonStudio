
<?php if (isset($error)) { echo '<div class="alert alert-error">'. $error. '</div>'; } ?>

<?php if ($this->session->flashdata('alert_success')) { ?>
<div class="alert alert-success"><?php echo $this->session->flashdata('alert_success'); ?></div>
<?php } ?>

<?php if ($this->session->flashdata('alert_info')) { ?>
<div class="alert alert-info"><?php echo $this->session->flashdata('alert_info'); ?></div>
<?php } ?>

<?php if ($this->session->flashdata('alert_error')) { ?>
<div class="alert alert-error"><?php echo $this->session->flashdata('alert_error'); ?></div>
<?php } ?>