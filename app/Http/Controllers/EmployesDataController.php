<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\EmployeData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployesDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    function saveImage($photo, $folder)
    {
        //save photo in folder
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = $folder;
        $photo->move($path, $file_name);

        return $file_name;
    }

    public function store(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [

                'name'=> 'required|max:20',
                'user_id'=> 'required|exists:employes,id',
                'idNumber'=> 'required|int|digits:9|unique:employes_data,idNumber',
                'relative_relation'=> 'required|max:20',
                'dateOfbirth'=> 'required|max:50',
                'social_status'=> 'required|max:50',
                'is_study'=> 'nullable|max:30',
                'is_work'=> 'nullable|max:30',
                'attach_iD_photo' => 'image|max:512000|dimensions:min_width=300,min_height=300|mimes:jpg,png,jpeg'
            ] ,[

                    'idNumber.required'=>'يجب ادخال رقم الهوية ',
                    'user_id.required'=>'يجب اضافة موظف لمواصلة الاضافة ',
                    'user_id.exists'=>'هناك خطأ ما الموظف المدخل غير موجود ',
                    'idNumber.unique'=>'رقم الهوية موجود مسبقا ',
                    'idNumber.integer'=>'رقم الوثيقة غير صالح يرجى ادخال ارقام  ',
                    'idNumber.digits'=>'رقم الوثيقة غير صالح يرجى ادخال ارقام  ',
                    'relative_relation.required'=>'يجب ادخال صلة القرابة ',
                    'relative_relation.max'=>' ',
                    'name.required'=>'يجب ادخال الاسم ',
                    'name.max'=>'طول الاسم اقل من 20 حرف',
                    'dateOfbirth.required'=>'يجب ادخال تاريخ الميلاد ',
                    'dateOfbirth.max'=>'طول تاريخ الميلاد اقل من 50 ',
                    'social_status.required'=>'يجب ادخال الحالة الاجتماعية ',
                    'social_status.max'=>'طول الحالة الاجتماعية اقل من 50 حرف ',

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {
                if ($request->user_id > 0) {


                    if ($request->has('attach_iD_photo')) {

                        $file_name = $this->saveImage($request->attach_iD_photo, 'images/relatives');

                        EmployeData::insert([
                            'name' => $request->post('name'),
                            'relative_relation' => $request->post('relative_relation'),
                            'social_status' => $request->post('social_status'),
                            'idNumber' => $request->post('idNumber'),
                            'dateOfbirth' => $request->post('dateOfbirth'),
                            'is_study' => $request->post('is_study'),
                            'is_work' => $request->post('is_work'),
                            'attach_iD_photo' => $file_name,
                            'employe_id' => $request->post('user_id'),

                        ]);

                        return response()->json([
                            'status' => 400,
                            'msg' => 'تم الحفظ',
                        ]);
                    } else {
                        EmployeData::insert([
                            'name' => $request->post('name'),
                            'relative_relation' => $request->post('relative_relation'),
                            'social_status' => $request->post('social_status'),
                            'idNumber' => $request->post('idNumber'),
                            'dateOfbirth' => $request->post('dateOfbirth'),
                            'is_study' => $request->post('is_study'),
                            'is_work' => $request->post('is_work'),
                            'employe_id' => $request->post('user_id'),

                        ]);

                        return response()->json([
                            'status' => 400,
                            'msg' => 'تم الحفظ',
                        ]);

                    }
                }
            }
        }  catch (\Exception $ex){
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ ',
            ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
