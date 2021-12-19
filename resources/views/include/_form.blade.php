<input type="hidden" name="id" id="id">
<div class="row">

    <div class="col-md-4">
        <!--begin::Input-->
        <div class="form-group">
            <label >رقم الوثيقة  <span style="color: #ec0c24">*</span> </label>
            <input type="text" class="form-control" name="id_number" id="id_number" placeholder=""  />

        </div>
        <!--end::Input-->
    </div>

    <div class="col-md-4">
        <!--begin::Input-->
        <div class="form-group">
            <label class="form-label">الرقم الوظيفي  <span style="color: #ec0c24">*</span></label>
            <input type="text" class="form-control" name="job_number" id="job_number" placeholder="0000"  />
        </div>
        <!--end::Input-->
    </div>

    <div class="col-md-4">
        <!--begin::Input-->
        <div class="form-group">
            <label> الاسم <span style="color: #ec0c24">*</span></label>
            <input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="enter name"  />
        </div>

        <!--end::Input-->
    </div>

</div>
<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>الاسم (en)</label>
            <input type="text" class="form-control" name="name_en" id="name_en"  placeholder="enter name"  />
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>تاريخ الميلاد  <span style="color: #ec0c24">*</span></label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" asp-format="{0:yyyy-MM-dd}"  />
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>   الحالة الاجتماعية  <span style="color: #ec0c24">*</span></label>
            <div class="radio-inline">
                <label class="radio">
                    <input checked name="relative_relation" id="relative_relation2" value="اعزب" type="radio" /> اعزب
                    <span></span></label>
                <label class="radio">
                    <input name="relative_relation" id="relative_relation1" value="متزوج" type="radio" />متزوج
                    <span></span></label>
            </div>


        </div>
        <!--end::Input-->
    </div>
</div>
<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>  الجنس  <span style="color: #ec0c24">*</span></label>
            <div class="radio-inline">
                <label class="radio">
                    <input checked name="gender" id="gender1"   type="radio" value="ذكر" />ذكر
                    <span></span></label>
                <label class="radio">
                    <input name="gender" id="gender2" type="radio" value="انثى" />انثى
                    <span></span></label>
            </div>



        </div>

        <!--end::Input-->
    </div>
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>  الجوال  <span style="color: #ec0c24">*</span></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="099999999"  />
        </div>
        <!--end::Input-->
    </div>
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>التخصص  <span style="color: #ec0c24">*</span></label>
            <input type="text" class="form-control" name="specialization" id="specialization" placeholder="" />
        </div>
        <!--end::Input-->
    </div>
</div>
<div class="row">
    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label> الهاتف   <span style="color: #ec0c24">*</span></label>
            <input type="text" class="form-control" name="telli_phone" id="telli_phone" placeholder="" value="" />
        </div>
        <!--end::Input-->
    </div>

    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>العنوان</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="" value="" />
        </div>
        <!--end::Input-->
    </div>


    <div class="col-xl-4">
        <!--begin::Input-->
        <div class="form-group">
            <label>   الايميل   <span style="color: #ec0c24">*</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="" value="" />
        </div>
        <!--end::Input-->
    </div>
</div>
<div class="row">


    <div class="col-md-4">
        <!--begin::Input-->
        <div class="form-group">
            <label> تاريخ بدء العمل   <span style="color: #ec0c24">*</span></label>
            <input type="date" class="form-control" name="date_of_employment" id="date_of_employment" asp-for="تاريخ بدء العمل" asp-format="{0:yyyy-MM-dd}"  />
        </div>
        <!--end::Input-->
    </div>
    <div class="form-group">
        <label>الصورة   <span style="color: #ec0c24">*</span></label>
        <input type="file" class="form-control" name="photo"  />
    </div>
</div>
