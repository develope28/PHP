<?php


class Employee extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		     $this->load->library('session');
          $this->load->model('Employee_model');
    }

    /*
     * Listing of EMployees
     */
    function index()
    {
        $data['employee'] = $this->Employee_model->get_all_employees();

        $data['_view'] = 'employee/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new employee
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'employee_name' => $this->input->post('employee_name'),

            );

            $account_id = $this->Employee_model->add_employee($params);
            redirect('employee/index');
        }
        else
        {
            $data['_view'] = 'employee/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a employee
     */
    function edit($employee_id)
    {
        // check if the account exists before trying to edit it
        $data['employee'] = $this->Employee_model->get_account($employee_id);

        if(isset($data['employee']['employee_id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'employee_name' => $this->input->post('employee_name'),
					'employee_age' => $this->input->post('employee_age'),
                );

                $this->Employee_model->update_account($employee_id,$params);
                redirect('employee/index');
            }
            else
            {
                $data['_view'] = 'employee/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The account you are trying to edit does not exist.');
    }

    /*
     * Deleting employee
     */
    function remove($employee_id)
    {
        $employee = $this->Employee_model->get_employee($employee_id);

        // check if the employee exists before trying to delete it
        if(isset($employee['employee_id']))
        {
            $this->Employee_model->delete_employee($employee_id);
            redirect('employee/index');
        }
        else
            show_error('The employee you are trying to delete does not exist.');
    }

}
