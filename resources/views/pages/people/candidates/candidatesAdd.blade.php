@extends('layouts.master')
@section('page-stylesheets')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
<main id="main-container">

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    {{ __('pages.candidates') }} <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">{{ __('pages.candidates_d') }}</small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ __('pages.candidates') }}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">{{ __('pages.add') }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        @include('misc.alert')
        <!-- Basic -->
        <form class="mb-5" action="/candidates" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">{{ __('person.basic') }}</h3>
            </div>
            <div class="block-content block-content-full">
                    <div class="row push">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="firstname">{{ __('person.firstname') }} <strong class="text-danger">*</strong></label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="firstname" name="firstname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="secondname">{{ __('person.secondname') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="secondname" name="secondname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="surname">{{ __('person.surname') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="surname" name="surname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="f_name">{{ __('person.f_name') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="f_name" name="f_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="m_name">{{ __('person.m_name') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="m_name" name="m_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="sex">{{ __('person.sex') }}</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-control-sm" type="radio" id="male" name="sex" value="m">
                                        <label class="form-check-label col-form-label-sm" for="male">{{ __('person.male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-control-sm" type="radio" id="female" name="sex" value="f">
                                        <label class="form-check-label col-form-label-sm" for="female">{{ __('person.female') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="birthdate">{{ __('person.birthdate') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="js-flatpickr form-control form-control-sm bg-white" id="birthdate" name="birthdate" placeholder="{{ __('misc.dmy_format') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="birthplace">{{ __('person.birthplace') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="birthplace" name="birthplace">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="citizenship">{{ __('person.citizenship') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="citizenship" name="citizenship"">
                                        @foreach ($citizenships as $citizenship)
                                            <option value="{{ $citizenship->id }}">{{ $citizenship->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="nationality">{{ __('person.nationality') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="nationality" name="nationality"">
                                        @foreach ($nations as $nation)
                                            <option value="{{ $nation->id }}">{{ $nation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                            <div class="block block-dimmed">
                                <div class="block-header">
                                    <h4 class="block-title">{{ __('person.notes') }}</h4>
                                    <div class="form-group-text"><i class="feather icon-edit-2"></i></div>
                                </div>
                                <div class="block-content">
                                    <div class="form-group">
                                        <textarea class="form-control form-control-sm" id="notes" name="notes" rows="4" placeholder="{{ __('messages.notes', ['person' => 'candidate']) }}"></textarea>
                                    </div>  
                                </div>  
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="block block-dimmed">
                                    <div class="block-header">
                                        <h4 class="block-title">{{ __('person.tags') }}</h4>
                                        <div class="form-group-text"><i class="feather icon-tag"></i></div>
                                    </div>
                                    <div class="block-content">
                                        <div class="form-group">
                                            <select class="js-select2 form-control" id="tags" name="tags[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                                <option></option>
                                                @foreach ($tags as $tag )
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Recruitment info -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">{{ __('person.recruitment_info') }}</h3>
            </div>
            <div class="block-content block-content-full">
                    <div class="row push">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="firstname">{{ __('person.set_status') }} <strong class="text-danger">*</strong></label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="status" name="status"">
                                        @foreach ($statuses as $status)
                                        <option style="color: {{ $status->color }};" value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="firstname">{{ __('person.assign_to') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="assignto" name="assignto"">
                                        <option value="1">Kandydat</option>
                                        <option value="2">Pracownik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="firstname">{{ __('person.source') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="source" name="source"">
                                        <option value="1">Kandydat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="firstname">{{ __('person.recruited') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="recruited" name="recruited"">
                                        <option value="1">Kandydat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                        </div>
                    </div>
            </div>
        </div>
        <!-- IDENTITY NUMBERS -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">{{ __('person.idnumbers') }}</h3>
            </div>
            <div class="block-content block-content-full">
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="idnumber">{{ __('person.idnumber') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="idnumber" name="idnumber">
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="id_issued_on " name="id_issued_on" placeholder="{{ __('person.issued_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="id_expires_on" name="id_expires_on" placeholder="{{ __('person.expires_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="id_issued_by" name="id_issued_by" placeholder="{{ __('person.issued_by') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="passport">{{ __('person.passport') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="passport" name="passport">
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="passport_issued_on " name="passport_issued_on" placeholder="{{ __('person.issued_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="passport_expires_on" name="passport_expires_on" placeholder="{{ __('person.expires_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="id_issued_by" name="passport_issued_by" placeholder="{{ __('person.issued_by') }}">
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="visa">{{ __('person.visa') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="visa" name="visa">
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="visa_issued_on " name="visa_issued_on" placeholder="{{ __('person.issued_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="visa_expires_on" name="visa_expires_on" placeholder="{{ __('person.expires_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="visa_issued_by" name="visa_issued_by" placeholder="{{ __('person.issued_by') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="rescard">{{ __('person.rescard') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="rescard" name="rescard">
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="rescard_issued_on " name="rescard_issued_on" placeholder="{{ __('person.issued_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="rescard_expires_on" name="rescard_expires_on" placeholder="{{ __('person.expires_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="rescard_issued_by" name="rescard_issued_by" placeholder="{{ __('person.issued_by') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="dlicense">{{ __('person.dlicense') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="dlicense" name="dlicense">
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="dlicense_issued_on " name="dlicense_issued_on" placeholder="{{ __('person.issued_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-append">
                                            <span class="input-group-text border-0">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="js-flatpickr form-control form-control-sm bg-white text-center" id="dlicense_expires_on" name="dlicense_expires_on" placeholder="{{ __('person.expires_on') }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control form-control-sm" id="dlicense_issued_by" name="dlicense_issued_by" placeholder="{{ __('person.issued_by') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="nin">{{ __('person.nin') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nin" name="nin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="nin2">{{ __('person.nin2') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nin2" name="nin2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="tin">{{ __('person.tin') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="tin" name="tin">
                                </div>
                            </div>
                        </div>
                    </div>                
            </div>
        </div>
        <!-- ADDRESSES -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">{{ __('person.addresses') }}</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4 text-center">
                            <h3 class="block-title">{{ __('person.residence_address') }}</h3>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4 text-center">
                            <h3 class="block-title">{{ __('person.mailing_address') }}</h3>
                        </div>
                    </div>
                </div>    
                <div class="row push">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="country">{{ __('person.country') }}</label>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="res_country" name="res_country">
                                        @foreach ($nations as $nation)
                                            <option value="{{ $nation->id }}">{{ $nation->name }}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="mail_country" name="mail_country">
                                        @foreach ($nations as $nation)
                                            <option value="{{ $nation->id }}">{{ $nation->name }}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="street">{{ __('person.street') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_street" name="res_street">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_street" name="mail_street">
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="flat">{{ __('person.flat') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_flat" name="res_flat">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_flat" name="mail_flat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="postal">{{ __('person.postal') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_postal" name="res_postal">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_postal" name="mail_postal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="mailbox">{{ __('person.mail_box') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_mailbox" name="res_mailbox">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_mailbox" name="mail_mailbox">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="place">{{ __('person.place') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_place" name="res_place">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_place" name="mail_place">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="district">{{ __('person.district') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_district" name="res_district">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_district" name="mail_district">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="commune">{{ __('person.commune') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_commune" name="res_commune">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_commune" name="mail_commune">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!--- Contact NUMBERS -->
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">{{ __('person.contact_numbers') }}</h3>
            </div>
            <div class="block-content block-content-full">
                    <div class="row push">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="phone">{{ __('person.phone') }}</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="feather icon-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="phone_notes" name="phone_notes" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="email">{{ __('person.email') }}</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="email_notes" name="email_notes" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="viber">Viber</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-viber"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="viber" name="viber">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="viber_notes" name="viber_notes" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="whatsapp">Whatsapp</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="whatsapp" name="whatsapp">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="whatsapp_notes" name="whatsapp_notes" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="telegram">Telegram</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-telegram-plane"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="telegram" name="telegram">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="telegram_notes" name="telegram_notes" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="other_contact">{{ __('person.other') }}</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="other_contact" name="other_contact">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="other_contact_notes" name="other_contact_notes" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" data-wizard="finish">
                            <i class="fa fa-check mr-2"></i> {{__('misc.submit')}}
                        </button>
                    </div>
                </div>                
            </div>
        </div>
        </form>
        <!-- END Alternative Style -->

        <!-- END Grid Sizes -->
    </div>


@endsection


@section('page-scripts')
<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
<script>jQuery(function () { One.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']);  });</script>
@endsection