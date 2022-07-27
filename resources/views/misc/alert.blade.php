@if (Session::has('success'))
<div class="py-3">
    <div class="alert alert-success d-flex align-items-center text-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-times"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">{{Session::get('success')}}</p>
        </div>
    </div>
</div> 
@endif
@if (Session::has('danger'))
<div class="py-3">
    <div class="alert alert-danger d-flex align-items-center text-center" role="alert">
        <div class="flex-00-auto">
            <i class="fa fa-fw fa-times"></i>
        </div>
        <div class="flex-fill ml-3">
            <p class="mb-0">{{Session::get('danger')}}</p>
        </div>
    </div>
</div> 
@endif