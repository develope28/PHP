<?php echo form_open('employee/add'); ?>

	<div>
		Employee Name :
		<textarea name="employee_name"><?php echo $this->input->post('employee_name'); ?></textarea>
	</div>
	<div>
		Employee Value :
		<textarea name="employee_value"><?php echo $this->input->post('employee_value'); ?></textarea>
	</div>

	<button type="submit">Save</button>

<?php echo form_close(); ?>
