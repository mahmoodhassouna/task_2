<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
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
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name'=> 'required|max:70',
                'user_id'=> 'required|exists:employes,id',
                'place'=> 'nullable|max:60',
                'start_date'=> 'required|max:50',
                'expiry_date'=> 'required|max:50',
                'details_courses'=> 'nullable|max:255',
            ] ,[
                    'name.required'=>'يجب ادخال الاسم ',
                    'user_id.required'=>'يجب اضافة موظف لمواصلة الاضافة ',
                    'user_id.exists'=>'هناك خطأ ما الموظف المدخل غير موجود ',
                    'name.max'=>'طول الاسم يجب ان يكون اقل من 70 حرف ',
                    'place.max'=>'يجب ادخال المكان ',
                    'start_date.required'=>'يجب ادخال تاريخ البداية ',
                    'start_date.max'=>'تاريخ البدء اكبر من الحد اللازم',
                    'expiry_date.required'=>'يجب ادخال تاريخ النهاية ',
                    'expiry_date.max'=>'تاريخ الانتهاء اكبر من الحد اللازم ',
                    'details_courses.max'=>'التفاصيل طويلة جدا ',

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {
                if ($request->user_id > 0) {
                    Course::insert([
                        'name' => $request->post('name'),
                        'place' => $request->post('place'),
                        'start_date' => $request->post('start_date'),
                        'expiry_date' => $request->post('expiry_date'),
                        'details_courses' => $request->post('details_courses'),
                        'employe_id' => $request->post('user_id'),

                    ]);

                    return response()->json([
                        'status' => 400,
                        'msg' => 'تم الحفظ',
                    ]);

                }
            }
        }catch (\Exception $ex){
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
