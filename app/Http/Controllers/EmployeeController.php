<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_employees = Employee::orderBy('id','desc')->paginate(5);

        return view('employees/index',['data'=>$list_employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(['name' => 'required','email' => 'required|unique:employees,email|email','joining_date'=> 'required','joining_salary'=>'required','is_active'=>'required'],['name.required' => 'name field not empty']);
        $data = $request->except('_token');
        //Mass assignment
        $result = Employee::create($data);

        //Insert Single row
        // $employee = new Employee;
        // $employee->name = $data['name'];
        // $employee->email = $data['email'];
        // $employee->joining_date = $data['joining_date'];
        // $employee->joining_salary = $data['joining_salary'];
        // $employee->is_active = $data['is_active'];
        // $result=$employee->save();
        if($result){
        return redirect()->route('employee.index')->withMessage('Employee has been successfully created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_employee = Employee::find($id);
        return view('employees/show',['data' => $show_employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_employee = Employee::find($id);
        return view('employees/edit',compact('edit_employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request->all());
       $request->validate(['name' => 'required','email' => 'required|unique:employees,email,'.$id.'|email','joining_date'=> 'required','joining_salary'=>'required','is_active'=>'required'],['name.required' => 'name field not empty']);
       $data = $request->except('_token');
       $result = Employee::find($id);
       $updated_data = $result->update($data);
       if($updated_data){
         return redirect()->route('employee.index')->withMessage('Employee details Updated successfully');
       }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =Employee::find($id);
        $delete_data = $data->delete($data);
        if($delete_data){
            return redirect()->route('employee.index')->withMessage('Employee record Deleted Successfully');
        }
    }
}
