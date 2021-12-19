<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificatesController extends Controller
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
                'qualification'=> 'required|max:70',
                'user_id'=> 'required|exists:employes,id',
                'Specialization'=> 'required|max:70',
                'university'=> 'required|max:40',
                'date'=> 'nullable|max:40',
                'details'=> 'nullable|max:255',
            ] ,[
                    'qualification.required'=>'يجب ادخال المؤهلات ',
                    'user_id.required'=>'يجب اضافة موظف لمواصلة الاضافة ',
                    'user_id.exists'=>'هناك خطأ ما الموظف المدخل غير موجود ',
                    'qualification.max'=>'ادخل المؤهلات بحيث لا تتجاوز ال70 حرف',
                    'Specialization.required'=>'يجب ادخال التخصص ',
                    'Specialization.max'=>'ادخل التخصص بحيث لا تتجاوز ال70 حرف ',
                    'university.required'=>'يجب ادخال الجامعة ',
                    'university.max'=>'ادخل الجامعة بحيث لا تتجاوز 40 حرف ',
                    'details.max'=>'اختصر التفاصيل على 255 حرف  ',

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {
                if ($request->user_id > 0) {
                    Certificate::insert([
                        'qualification' => $request->post('qualification'),
                        'Specialization' => $request->post('Specialization'),
                        'university' => $request->post('university'),
                        'date' => $request->post('date'),
                        'details' => $request->post('details'),
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
