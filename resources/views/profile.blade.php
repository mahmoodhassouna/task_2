<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="assets/css/pages/wizard/wizard-3.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
<style>
    label.error {
        color: red!important;
    }
    .error {
        color: #F00;

    }
</style>
</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF">
<div style="padding: 0px 0px 0px -100px" id="kt_content">
    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    البيانات الاساسية</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                     بيانات العائلة  </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    الشهادات </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    الدورات </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>

                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    الخبرات</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>




                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <ul id="display_error"></ul>
                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                    <div class="col-xl-10  col-xxl-7">
                        <!--begin: Wizard Form-->


                            <div class="pb-5" data-wizard-type="step-content" >
                                <form  class="add_user form" id="kt_form" action="{{route('store')}}" enctype="multipart/form-data" method="post">


                                @csrf
                               @include('include._form')
                                    <button class="button_add_user btn btn-success font-weight-bold text-uppercase px-9 py-4">save</button>
                                </form>
                            </div>
                            <div class="pb-5" data-wizard-type="step-content">
                                <form id="form2" class="add_relative" action="{{route('store.employes')}}" method="post" >
                                    @csrf
                                    <input type="hidden" value="" id="user_id" name="user_id">

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label> الاسم رباعي   <span style="color: #ec0c24">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"  />
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>رقم الهوية   <span style="color: #ec0c24">*</span></label>
                                                <input type="text" class="form-control" name="idNumber"  />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>  صلة القرابة   <span style="color: #ec0c24">*</span></label>
                                                <input type="text" class="form-control" name="relative_relation"  />
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>   تاريخ الميلاد   <span style="color: #ec0c24">*</span></label>
                                                <input type="date" class="form-control" name="dateOfbirth"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>الحالة الاجتماعية</label>
                                                <div class="radio-inline">
                                                    <label class="radio">
                                                        <input name="social_status" value="اعزب" checked type="radio" /> اعزب
                                                        <span></span></label>
                                                    <label class="radio">
                                                        <input name="social_status" value="متزوج" type="radio" />متزوج
                                                        <span></span></label>
                                                </div>


                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>هل يدرس   ؟</label>
                                                <div class="checkbox-single">
                                                    <label class="checkbox">
                                                        <input name="is_study" value="is study" type="checkbox" checked="checked" />نعم
                                                        <span></span></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>هل يعمل   ؟</label>
                                                <div class="checkbox-single">
                                                    <label class="checkbox">
                                                        <input value="is work" checked="checked" name="is_work" type="checkbox"  />نعم
                                                        <span></span></label>
                                                </div>
                                            </div>

                                            <!--end::Input-->
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label> صورة الهوية</label>
                                                <input type="file" class="form-control" name="attach_iD_photo"  />
                                            </div>
                                        </div>
                                    </div>
                                    <button class="button_add_relative btn btn-success font-weight-bold text-uppercase px-9 py-4">save</button>
                                </form>

                            </div>

                            <div class="pb-5" data-wizard-type="step-content">

                                <form id="form3" class="add_certificate" action="{{route('store.certificates')}}" method="post" >
                                    @csrf
                                    <input type="hidden" value="" id="user_id" name="user_id">

                                    <div class="row">
                                <div class="col-xl-6">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label> المؤهل العلمي   <span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control" name="qualification"  />
                                    </div>

                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>التخصص   <span style="color: #ec0c24">*</span></label>
                                        <input type="text" class="form-control" name="Specialization"  />
                                    </div>
                                </div>

                             </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>     الجامعة   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="university"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label> تاريخ التخصص</label>
                                            <input type="date" class="form-control" name="date"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> التفاصيل</label>
                                            <input type="text" class="form-control" name="details"  />
                                        </div>
                                    </div>
                                </div>
                                    <button class="button_add_certificate btn btn-success font-weight-bold text-uppercase px-9 py-4">save</button>
                                </form>
                            </div>
                            <div class="pb-5" data-wizard-type="step-content">

                                <form id="form4" class="add_courses" action="{{route('store.courses')}}" method="post" >
                                    @csrf
                                    <input type="hidden" value="" id="user_id" name="user_id">
                                    <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> اسم الدورة   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="name"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label> المكان  </label>
                                            <input type="text" class="form-control" name="place"  />
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>   تاريخ البداية   <span style="color: #ec0c24">*</span></label>
                                            <input type="date" class="form-control" name="start_date"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>  تاريخ النهاية   <span style="color: #ec0c24">*</span></label>
                                            <input type="date" class="form-control" name="expiry_date"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> التفاصيل</label>
                                            <input type="text" class="form-control" name="details_courses"  />
                                        </div>

                                    </div>

                                </div>
                                    <button class="button_add_courses btn btn-success font-weight-bold text-uppercase px-9 py-4">save</button>

                                </form>
                    </div>
                            <div class="pb-5" data-wizard-type="step-content">
                            <form id="form5" class="add_experience" action="{{route('store.experiences')}}" method="post" >
                                @csrf
                                <input type="hidden" value="" id="user_id" name="user_id">

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>مكان العمل   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="work_place"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>  المسمى الوظيفي   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="job_title"  />
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label> الراتب   <span style="color: #ec0c24">*</span></label>
                                                <input type="text" class="form-control" name="salary"  />
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label> العملة</label>
                                                <input type="text" class="form-control" name="currency"  />
                                            </div>
                                        </div>

                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> تاريخ البداية   <span style="color: #ec0c24">*</span></label>
                                            <input type="date" class="form-control" name="start_date3"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>  تاريخ النهاية   <span style="color: #ec0c24">*</span></label>
                                            <input type="date" class="form-control" name="expiry_date3"  />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> التفاصيل</label>
                                            <input type="text" class="form-control" name="details_experience"  />
                                        </div>

                                    </div>

                                </div>
                                <button class="button_add_experiences btn btn-success font-weight-bold text-uppercase px-9 py-4">save</button>

                            </form>
                              </div>


                    </div>

                        </div>
                    </div>
            </div>
            <!--end: Wizard-->
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/plugins/global/plugins.bundle.js?v=7.0.4"></script>

<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
<script src="assets/js/scripts.bundle.js?v=7.0.4"></script>
<script src="assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        fetchEmployes();
        function fetchEmployes(){
        $.ajax({
            type:"GET",
            url:"{{route('fetchEmployes')}}",
            dataType:"json",
            success: function (response) {
                $('input[name="user_id"]').val(response.employes.id);
            }
        });
    }

        $("#kt_form").validate({
            rules: {
                id_number: {
                    required: true,
                    digits: true,
                    rangelength: [9, 9],

                },
                job_number: {
                    required: true,
                    digits: true,
                    rangelength: [4, 8],

                },
                name_ar: {
                    required: true,
                    maxlength: 50,
                },name_en: {

                    maxlength: 50,
                },
                date_of_birth: {
                    required: true,

                },
                relative_relation: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                phone: {
                    required: true,
                    digits: true,
                    rangelength: [7, 10],

                },
                specialization: {
                    required: true,
                    maxlength: 70
                },
                email: {
                    required: true,
                    email: true
                },
                date_of_employment: {
                    required: true,
                },
                photo: {
                    required: true,

                },
                telli_phone: {
                    required: true,
                    digits: true,
                    rangelength: [7, 9],
                }
            },
            messages: {
                id_number: {
                    rangelength: "رقم هوية غير صالح ",
                    //maxlength: "Name should be at least 3 characters",
                    required: "رقم الهوية مطلوب",
                    digits: "يرجى ادخال ارقام فقط"
                } ,
                job_number: {
                    rangelength: "رقم وظيفي غير صالح ",
                    required: "يرجى ادخال الرقم الوظيفي",
                    digits: "الرقم الوظيفي عبارة عن ارقام"
                },
                name_ar: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 50 حرف"
                }, name_en: {

                    maxlength: "الاسم اقل من 50 حرف"
                },
                date_of_birth: {
                    required: "يرجى ادخال تاريخ الميلاد",
                },
                relative_relation: {
                    required: "يرجى اختيار الحالة الاجتماعية",
                },
                gender: {
                    required: "يرجى اختيار الجنس",
                },
                phone: {
                    required: "يرجى رقم الجوال",
                    digits: "يجب ادخال رقم جوال صالح",
                    rangelength: "يرجى التاكد من صيغة رقم الجوال",
                },
                specialization: {
                    required: "يرجى ادخال التخصص",
                    maxlength: "ادخل التخصص في 70 حرف "

                },
                email: {
                    required: "يرجى ادخال الايميل",
                    email: "صيغة الايميل غير صحيحة",
                },
                date_of_employment: {
                    required: "يرجى تاريخ بدء العمل",
                },
                photo: {
                    required: "يرجى ادخال الصورة",
                },
                telli_phone: {
                    required: "يرجى رقم التليفون",
                    digits: "يجب ادخال رقم تليفون صالح",
                    rangelength: "يرجى التاكد من صيغة رقم التليفون",
                }
            },submitHandler: function(form) {


                var formData = new FormData($('.add_user')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "store/",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }
                        else if(data.status == 400){

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }


                });

            }
            ,
            // errorPlacement: function(error, element) {
            //     element.css('background', '#ffdddd');
            //     error.insertAfter(element);
            // }
        });

        $("#form3").validate({
            rules: {
                qualification: {
                    required: true,
                    maxlength: 70,
                },
                Specialization: {
                    required: true,
                    maxlength:  70,
                },
                university: {
                    required: true,
                    maxlength: 40,
                }
            },
            messages: {
                qualification: {
                    required: "المؤهلات مطلوبة",
                    maxlength: "يرجى حصر المؤهلات في اقل من 70 حرف"

                },
                Specialization: {
                    required: "التخصص مطلوب",
                    maxlength: "يرجى حصر التخصص في اقل من 70 حرف"
                },
                university:{
                    required: "الجامعة مطلوبة",
                    maxlength: "يرجى حصر الجامعة في اقل من 40 حرف"
                }
            },submitHandler: function(form) {

                var formData = new FormData($('.add_certificate')[0]);
                //var user_id = $("#user_id").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "store/certificates",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        } else if(data.status == 400){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title:  data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();
                            $('#form3').find('input').val('');
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title:  data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }

                    }
                });

            }
        });

        $("#form4").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 70
                },
                start_date: {
                    required: true,
                },
                expiry_date: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "اسم الدورة مطلوب",
                    maxlength: "يرجى حصر اسم الدورة في اقل من 70 حرف"
                },
                start_date: {
                    required: "تاريخ البداية مطلوب"
                },
                expiry_date: {
                    required: "تاريخ النهاية مطلوب"
                }
            },submitHandler: function(form) {

                var formData = new FormData($('.add_courses')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "store/courses",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {

                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        } else if(data.status == 400){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();
                            $('#form4').find('input').val('');
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }


                    }
                });

            }
        });

        $("#form5").validate({
            rules: {
                work_place: {
                    required: true,
                    maxlength: 70
                },job_title: {
                    required: true,
                    maxlength: 70
                },salary: {
                    required: true,
                    digits: true,
                    maxlength: 10
                },start_date3: {
                    required: true,
                },expiry_date3: {
                    required: true,
                }
            },
            messages: {
                work_place: {
                    required: "مكان العمل مطلوب",
                    maxlength: "يرجى حصر مكان العمل في اقل من 70 حرف"
                },job_title: {
                    required: "المسمى الوظيفي مطلوب",
                    maxlength: "يرجى حصر المسمى الوظيفي في اقل من 70 حرف"
                },salary: {
                    required: "الراتب مطلوب",
                    digits: "ادخل الراتب بصيغة ارقام صحيحة",
                    maxlength: "رقم غير صالح تاكد من القيمة المدخلة"
                },start_date3: {
                    required: "تاريخ البداية مطلوب ",
                },expiry_date3: {
                    required: "تاريخ النهاية مطلوب ",
                }
            },submitHandler: function(form) {

                var formData = new FormData($('.add_experience')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "store/experiences",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }else if(data.status == 400){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg ,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();
                            $('#form5').find('input').val('');
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg ,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });
            }
        });

        $("#form2").validate({
            rules: {
                name: {
                    required: true,
                    rangelength: [3, 20],
                },
                idNumber: {
                    required: true,
                    digits: true,
                    rangelength: [9, 9],

                },
                relative_relation: {
                    required: true,
                    rangelength: [5, 20],
                },
                dateOfbirth: {
                    required: true,
                }
            },
            messages: {
                name: {
                    rangelength: "يرجى ادخال اسم صالح",
                    required: "الاسم مطلوب "
                },
                idNumber:{
                    rangelength: "رقم هوية غير صالح ",
                    //maxlength: "Name should be at least 3 characters",
                    required: "رقم الهوية مطلوب",
                    digits: "يرجى ادخال ارقام فقط"
                },
                relative_relation:{
                    required: "صلة القرابة مطلوبة",
                    rangelength: "ادخل نص يتكون من 5 احرف ع الاقل",

                },
                dateOfbirth:{
                    required: "تاريخ الميلاد مطلوب",

                }
            },submitHandler: function(form) {


                var formData = new FormData($('.add_relative')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "store/employes",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        } else if(data.status == 400){
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title:  data.msg ,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();
                            $('#form2').find('input').val('');
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                });

            }
        });

        });
</script>

</body>
</html>
