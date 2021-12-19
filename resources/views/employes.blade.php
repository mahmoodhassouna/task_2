<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF" >

<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h2 class="card-label">الموظفين</h2>
        </div>

    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
            <thead>
            <tr>
                <th>الرقم</th>
                <th>الاسم</th>
                <th>الرقم الوظيفي</th>
                <th>رقم الهوية</th>
                <th>الحالة الاجتماعية </th>
                <th>الجنس</th>
                <th>رقم الجوال</th>
                <th>رقم التلفون</th>
                <th>العنوان</th>
                <th>تاريخ التعين</th>
                <th>تاريخ الميلاد </th>
                <th>صورة الموظف </th>
                <th>الاجراءت</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
</body>

<div class="modal fade bd-example-modal-lg" id="Editemploye" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 17px 17px 18px 15px;">
            <ul id="display_error"></ul>
            <form  class="add_employe form" id="kt_form"   enctype="multipart/form-data" >

                @csrf
                @include('include._form')
                <button class="update_employe btn btn-success font-weight-bold text-uppercase px-9 py-4">تحديث</button>
            </form>
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

        allEmployes();

        function allEmployes(){
            $.ajax({
                type:"GET",
                url:"{{route('allEmployes')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('tbody').html("");
                    $.each(response.employes ,function (key ,item) {
                        $('tbody').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.name_ar+'</td>\
                                       <td>'+item.job_number+'</td>\
                                       <td>'+item.id_number+'</td>\
                                       <td>'+item.relative_relation+'</td>\
                                       <td>'+item.gender+'</td>\
                                       <td>'+item.phone+'</td>\
                                       <td>'+item.telli_phone+'</td>\
                                       <td>'+item.address+'</td>\
                                       <td>'+item.date_of_employment+'</td>\
                                       <td>'+item.date_of_birth+'</td>\
                                       <td><img src="/images/user/'+item.photo+'" height="70" width="60"></td>\
                                       <td ><button  type="button" value="'+item.id+'" class="btn btn-outline-danger delete_employe">Delete</button> <button type="button" value="'+item.id+'" class="edit_employe btn btn-outline-primary">Edit</button> </td>\
                                          </tr>');

                    });
                }
            });
        }

        $(document).on('click', '.delete_employe', function (e) {
            e.preventDefault();
            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "delete/employe/" + id,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        allEmployes();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: response.msg,
                            showConfirmButton: false,
                            timer: 1500
                        })

                    }
                }
            });
        });

        $(document).on('click', '.edit_employe', function (e) {
            e.preventDefault();
            var id = $(this).val();
            $('#Editemploye').modal('show');

            $.ajax({
                type: "GET",
                url: "edit/employe/"+id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#Editemploye').modal('hide');
                    } else {
                        $('#id_number').val(response.employe.id_number);
                        $('#job_number').val(response.employe.job_number);
                        $('#name_ar').val(response.employe.name_ar);
                        $('#name_en').val(response.employe.name_en);
                        $('#date_of_birth').val(response.employe.date_of_birth);


                        $('#phone').val(response.employe.phone);
                        $('#specialization').val(response.employe.specialization);
                        $('#telli_phone').val(response.employe.telli_phone);
                        $('#address').val(response.employe.address);
                        $('#email').val(response.employe.email);
                        $('#date_of_employment').val(response.employe.date_of_employment);
                        $('#id').val(id);
                        if(response.employe.gender == "ذكر"){$("#gender1").prop("checked", true)}else{$("#gender2").prop("checked", true)}
                        if(response.employe.relative_relation == "متزوج"){$("#relative_relation1").prop("checked", true)}else{$("#relative_relation2").prop("checked", true)}
                    }
                }
            });

            $('#Editemploye').find('input').val('');
        });

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

                telli_phone: {
                    required: "يرجى رقم التليفون",
                    digits: "يجب ادخال رقم تليفون صالح",
                    rangelength: "يرجى التاكد من صيغة رقم التليفون",
                }
            },submitHandler: function(form) {

                var formData = new FormData($('.add_employe')[0]);
                var id = $('#id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    enctype: 'multipart/form-data',
                    url: "update/employe/"+id,
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
                            allEmployes();
                            $('#Editemploye').modal('hide');

                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'تم الحفظ بنجاح',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#display_error').hide();
                        }else {
                            $('#Editemploye').modal('hide');
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'فشلت عملية الحفظ  ',
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
