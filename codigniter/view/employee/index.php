

       <!-- start: Content -->
            <div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Set Up Employees</h3>
                        <p class="animated fadeInDown">
                          Form <span class="fa-angle-right fa"></span> Set Up Employees
                        </p>

						                         <input type="button" class="btn btn-round btn-info" data-toggle="modal" data-target="#myModal" value="Add"/>

						<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Employee</h4>
        </div>
        <div class="modal-body">
			<?php echo form_open('employee/add'); ?>
          <div>

							 <?php //var_dump($finance_year_active)?>

							  <?php //var_dump($finance_year_active['start_date'])?>

                            <div class="form-group ">
								                         <label><span class="fa fa-calendar"></span>Employee Name</label>
                          <input type="text" class="form-text" name="employee_name" required value="">


                        </div>




                           <div>

                              <input class="submit btn btn-danger" type="submit" value="Submit">
                        </div>
                               <?php echo form_close(); ?>



                          </div>
	</div>
        </div>

      </div>

    </div>
  </div>
                    </div>
                  </div>

              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
					  <div class="panel-heading"><h3>List</h3>  </div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>

                         <tr>
		               <th>SL.No</th>
		                <th>Employee</th>
		                  <th>Added by</th>


		                <th>Actions</th>
                          </tr>

                      </thead>
                      <tbody>
                      <?php
						  $k=0;
						  foreach($employee as $h){ $k++;?>
    <tr>
		<td><?php echo $k ?></td>
		<td><?php echo $h['employee_name']; ?></td>
		<td><?php echo $h['employee_name']; ?></td>
		<?php if($h['employee_name']!="Income"&&$h['employee_name']!="Expense"){ ?>
		<td>
            <a href="<?php echo site_url('head/edit/'.$h['employee_id']); ?>">Edit</a>
            <a href="<?php echo site_url('head/remove/'.$h['employee_id']); ?>">Delete</a>
        </td>
		<?php } ?>

						  </tr>
	<?php } ?>









                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          <!-- end: content -->
