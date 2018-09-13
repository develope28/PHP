<?php echo form_open('employee/edit/'.$employee['employee_id']); ?>

	<div>
		Employee Name :
		<textarea name="employee_name"><?php echo ($this->input->post('employee_name') ? $this->input->post('employee_name') : $employee['employee_name']); ?></textarea>
	</div>
	<div>
		Employee Value :
		<textarea name="employee_value"><?php echo ($this->input->post('employee_value') ? $this->input->post('employee_value') : $employee['employee_value']); ?></textarea>
	</div>

	<button type="submit">Save</button>

<?php echo form_close(); ?>
