<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Employe;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }
    public function employes()
    {
        return view('employes');
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

    public function fetchEmployes(){
      $employes = Employe::latest()->first();
        return response()->json([
            'employes'=>$employes
        ]);
    }

    public function allEmployes(){
        $employes = Employe::all();
        return response()->json([
            'employes'=>$employes
        ]);
    }

    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'id_number'=> 'required|int|digits:9|unique:employes,id_number',
                'job_number'=> 'required|int|unique:employes,job_number',
                'name_ar'=> 'string|required|max:50',
                'name_en'=> 'string|nullable|max:50',
                'date_of_birth'=> 'required|max:60',
                'relative_relation'=> 'required|max:50',
                'gender'=> 'required',
                'phone'=> 'required|int',
                'telli_phone'=> 'required|int',
                'specialization'=> 'required|max:70',
                'address'=> 'required|nullable|max:150',
                'email'=> 'required|email|max:100',
                'date_of_employment'=> 'required|max:60',
                'photo' => 'required|image|max:512000|dimensions:min_width=300,min_height=300|mimes:jpg,png,jpeg'

            ] ,[
                'id_number.required'=>'يجب ادخال رقم الهوية ',
                'id_number.unique'=>'رقم الهوية موجود مسبقا ',
                'id_number.digits'=>'رقم الهوية يتكون من 9 ارقام ',
                'job_number.unique'=>'رقم الوظيفي موجود مسبقا  ',
                'id_number.integer'=>'رقم الوثيقة غير صالح يرجى ادخال ارقام  ',
                'job_number.required'=>'يجب ادخال رقم الوظيفي ',
                'job_number.integer'=>'الرقم الوظيفي غير صالح يرجى ادخال ارقام  ',
                'name_ar.required'=>'يجب ادخال الاسم ',
                'name_ar.string'=>' الاسم يجب ان يكون نص',
                'name_en.string'=>' الاسم يجب ان يكون نص',
                'name_ar.max'=>'طول الاسم اقل من 50 حرف',
                'name_en.max'=>'طول الاسم اقل من 50 حرف',
                'date_of_birth.required'=>'يجب ادخال تاريخ الميلاد ',
                'date_of_birth.max'=>'طول تاريخ الميلاد لا يتجاوز ال60 رقم ',
                'relative_relation.required'=>'يجب ادخال الحالة الاجتماعية ',
                'gender.required'=>'يجب ادخال الجنس ',
                'phone.required'=>'يجب ادخال رقم الجوال ',
                    'phone.integer'=>'رقم الجوال عبارة عن ارقام  ',
                    'telli_phone.required'=>'يجب ادخال رقم الهاتف ',
                    'telli_phone.integer'=>'رقم التلفون غير صالح ',

                'specialization.required'=>'يجب ادخال التخصص ',
                'address.required'=>'يجب ادخال العنوان ',
                'email.required'=>'يجب ادخال الايميل ',
                'email.email'=>'صيغة الايميل غير صحيحة  ',
                'date_of_employment.required'=>'يجب ادخال تاريخ بدء العمل  ',
                'photo.required'=>'يجب ادخال الصورة ',

                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 200,
                    'errors' => $validator->messages()
                ]);
            } else {

                if ($request->has('photo')) {

                    $file_name = $this->saveImage($request->photo, 'images/user');

                    Employe::insert([
                        'id_number' => $request->post('id_number'),
                        'job_number' => $request->post('job_number'),
                        'name_ar' => $request->post('name_ar'),
                        'name_en' => $request->post('name_en'),
                        'date_of_birth' => $request->post('date_of_birth'),
                        'relative_relation' => $request->post('relative_relation'),
                        'gender' => $request->post('gender'),
                        'phone' => $request->post('phone'),
                        'specialization' => $request->post('specialization'),
                        'telli_phone' => $request->post('telli_phone'),
                        'address' => $request->post('address'),
                        'email' => $request->post('email'),
                        'date_of_employment' => $request->post('date_of_employment'),
                        'photo' => $file_name,
                    ]);


                    return response()->json([
                        'status' => 400,
                        'msg' => "تم الحفظ بنجاح",
                    ]);


                }
            }
        }catch (\Exception $ex){
            return response()->json([
                'status' => 401,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
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
        $employe = Employe::find($id);
        if($employe)
        {
            return response()->json([
                'status'=>true,
                'employe'=> $employe,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'No Employe Found.'
            ]);
        }
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
     return response()->json($request);
     dd('');
        $employe = Employe::find($id);

        if ($employe){


            try {
                $validator = Validator::make($request->all(), [
                    'id_number'=> 'required|int|digits:9|exists:employes,id_number',
                    'job_number'=> 'required|int|exists:employes,job_number',
                    'name_ar'=> 'string|required|max:50',
                    'name_en'=> 'string|nullable|max:50',
                    'date_of_birth'=> 'required|max:60',
                    'relative_relation'=> 'required|max:50',
                    'gender'=> 'required',
                    'phone'=> 'required|int',
                    'telli_phone'=> 'required|int',
                    'specialization'=> 'required|max:70',
                    'address'=> 'required|nullable|max:150',
                    'email'=> 'required|email|max:100',
                    'date_of_employment'=> 'required|max:60',

                ] ,[
                    'id_number.required'=>'يجب ادخال رقم الهوية ',
                    'id_number.exists'=>'لا يمكن تغير رقم الهوية',
                    'id_number.digits'=>'رقم الهوية يتكون من 9 ارقام ',
                    'id_number.integer'=>'رقم الوثيقة غير صالح يرجى ادخال ارقام  ',
                    'job_number.required'=>'يجب ادخال رقم الوظيفي ',
                    'job_number.integer'=>'الرقم الوظيفي غير صالح يرجى ادخال ارقام  ',
                    'job_number.exists'=>'لا يمكن تغير الرقم الوظيفي',
                    'name_ar.required'=>'يجب ادخال الاسم ',
                    'name_ar.string'=>' الاسم يجب ان يكون نص',
                    'name_en.string'=>' الاسم يجب ان يكون نص',
                    'name_ar.max'=>'طول الاسم اقل من 50 حرف',
                    'name_en.max'=>'طول الاسم اقل من 50 حرف',
                    'date_of_birth.required'=>'يجب ادخال تاريخ الميلاد ',
                    'date_of_birth.max'=>'طول تاريخ الميلاد لا يتجاوز ال60 رقم ',
                    'relative_relation.required'=>'يجب ادخال الحالة الاجتماعية ',
                    'gender.required'=>'يجب ادخال الجنس ',
                    'phone.required'=>'يجب ادخال رقم الجوال ',
                    'phone.integer'=>'رقم الجوال عبارة عن ارقام  ',
                    'telli_phone.required'=>'يجب ادخال رقم الهاتف ',
                    'telli_phone.integer'=>'رقم التلفون غير صالح ',

                    'specialization.required'=>'يجب ادخال التخصص ',
                    'address.required'=>'يجب ادخال العنوان ',
                    'email.required'=>'يجب ادخال الايميل ',
                    'email.email'=>'صيغة الايميل غير صحيحة  ',
                    'date_of_employment.required'=>'يجب ادخال تاريخ بدء العمل  ',

                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => 200,
                        'errors' => $validator->messages()
                    ]);
                } else {

                    if($request->has('photo')) {

                        $file_name = $this->saveImage($request->photo, 'images/user');

                        $employe->update([
                            'id_number' => $request->post('id_number'),
                            'job_number' => $request->post('job_number'),
                            'name_ar' => $request->post('name_ar'),
                            'name_en' => $request->post('name_en'),
                            'date_of_birth' => $request->post('date_of_birth'),
                            'relative_relation' => $request->post('relative_relation'),
                            'gender' => $request->post('gender'),
                            'phone' => $request->post('phone'),
                            'specialization' => $request->post('specialization'),
                            'telli_phone' => $request->post('telli_phone'),
                            'address' => $request->post('address'),
                            'email' => $request->post('email'),
                            'date_of_employment' => $request->post('date_of_employment'),
                            'photo' => $file_name,
                        ]);



                        return response()->json([
                            'status' => 400,
                            'msg' => "تم التحديث بنجاح",
                        ]);
                        // }

                    }else{
                        $employe->update([
                            'id_number' => $request->post('id_number'),
                            'job_number' => $request->post('job_number'),
                            'name_ar' => $request->post('name_ar'),
                            'name_en' => $request->post('name_en'),
                            'date_of_birth' => $request->post('date_of_birth'),
                            'relative_relation' => $request->post('relative_relation'),
                            'gender' => $request->post('gender'),
                            'phone' => $request->post('phone'),
                            'specialization' => $request->post('specialization'),
                            'telli_phone' => $request->post('telli_phone'),
                            'address' => $request->post('address'),
                            'email' => $request->post('email'),
                            'date_of_employment' => $request->post('date_of_employment'),

                        ]);



                        return response()->json([
                            'status' => 400,
                            'msg' => "تم التحديث بنجاح",
                        ]);

                    }
                }



            }catch (\Exception $ex){
                return response()->json([
                    'status' => 401,
                    'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
                ]);
            }
        }else{
            return response()->json([
                'status'=>401,
                'msg'=>'الموظف غير موجود'
            ]);
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
        $employe = Employe::find($id);
        if($employe)
        {
            $employe->delete();
            return response()->json([
                'status'=>400,
                'msg'=>'تم الحذف بنجاح'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>200,
                'msg'=>'عذرا هذا الموظف غير موجود'
            ]);
        }
    }
}
