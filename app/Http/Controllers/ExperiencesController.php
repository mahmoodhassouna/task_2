<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperiencesController extends Controller
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
                'work_place'=> 'required|max:70',
                'user_id'=> 'required|exists:employes,id',
                'job_title'=> 'required|max:70',
                'start_date3'=> 'required|max:50',
                'expiry_date3'=> 'required|max:50',
                'salary'=> 'required|int',
                'details_experience'=> 'nullable|max:255',
                'currency'=> 'nullable|max:15',
            ] ,[
                    'work_place.required'=>'يجب ادخال مكان العمل  ',
                    'user_id.required'=>'يجب اضافة موظف لمواصلة الاضافة ',
                    'user_id.exists'=>'هناك خطأ ما الموظف المدخل غير موجود ',
                    'work_place.max'=>'يجب ادخال مكان العمل  ',
                    'job_title.required'=>'يجب ادخال المسمى الوظيفي ',
                    'job_title.max'=>'يجب ادخال المسمى الوظيفي ',
                    'start_date3.required'=>'يجب ادخال تاريخ البداية ',
                    'expiry_date3.required'=>'يجب ادخال تاريخ النهاية ',
                    'salary.required'=>'يجب ادخال الراتب ',
                    'salary.integer'=>'الراتب عبارة عن ارقام ',
                    'details_experience.max'=>'التفاصيل يجب ان تكون اقل من 255 حرف',
                    'currency.max'=>'يجب ان تكون العملة اقل من 15 حرف  ',

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {
                if ($request->user_id > 0) {
                    Experience::insert([
                        'work_place' => $request->post('work_place'),
                        'job_title' => $request->post('job_title'),
                        'start_date' => $request->post('start_date3'),
                        'expiry_date' => $request->post('expiry_date3'),
                        'salary' => $request->post('salary'),
                        'details_experience' => $request->post('details_experience'),
                        'currency' => $request->post('currency'),
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
