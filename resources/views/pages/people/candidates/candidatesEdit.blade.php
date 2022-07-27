@extends('layouts.master')
@section('page-stylesheets')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
<main id="main-container">
<?php $fullName = $candidate->firstname . ' ' . $candidate->surname; ?>

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    {{__('pages.candidate')}} <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">{{$fullName}}</small><br/>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ __('pages.candidates') }}</li>
                        <li class="breadcrumb-item">{{ __('pages.view') }}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="#">{{$fullName}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        @include('misc.alert')
        @include('pages.people.nav')
        <!-- Basic -->
        <form class="mb-5" method="POST" action="{{route('candidates.update', $candidate->id)}}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">{{ __('person.basic') }}</h3>
            </div>
            <div class="block-content block-content-full">
                    <div class="row push">
                        <div class="col-lg-7">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="id">{{ __('person.id') }} <strong class="text-danger">*</strong></label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="id" name="id" value="{{$candidate->id}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="firstname">{{ __('person.firstname') }} <strong class="text-danger">*</strong></label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" value="{{$candidate->firstname}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="secondname">{{ __('person.secondname') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="secondname" name="secondname" value="{{$candidate->secondname}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="surname">{{ __('person.surname') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="surname" name="surname" value="{{$candidate->surname}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="f_name">{{ __('person.f_name') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="f_name" name="f_name" value="{{$candidate->f_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="m_name">{{ __('person.m_name') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="m_name" name="m_name" value="{{$candidate->m_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="sex">{{ __('person.sex') }}</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-control-sm" type="radio" id="male" name="sex" value="m" 
                                        @if ($candidate->sex == 'm'){{'selected'}} @endif>
                                        <label class="form-check-label col-form-label-sm" for="male">{{ __('person.male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-control-sm" type="radio" id="female" name="sex" value="f"
                                        @if ($candidate->sex == 'm'){{'selected'}} @endif>
                                        <label class="form-check-label col-form-label-sm" for="female">{{ __('person.female') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="birthdate">{{ __('person.birthdate') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="js-flatpickr form-control form-control-sm bg-white" id="birthdate" name="birthdate" placeholder="{{ __('misc.dmy_format') }}"  value="{{$candidate->birthdate}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="birthplace">{{ __('person.birthplace') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control form-control-sm" id="birthplace" name="birthplace" value="{{$candidate->birthplace}}">
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="citizenship">{{ __('person.citizenship') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="citizenship" name="citizenship">
                                        @foreach ($citizenships as $citizenship)
                                            <option value="{{ $citizenship->id }}" @if($citizenship->id == $candidate->citizenships_id)
                                                                                        {{'selected'}} @endif>{{ $citizenship->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label-sm" for="nationality">{{ __('person.nationality') }}</label>
                                <div class="col-sm-8">
                                    <select class="form-control form-control-sm" id="nationality" name="nationality">
                                        @foreach ($nations as $nation)
                                            <option value="{{ $nation->id }}" @if($nation->id == $candidate->nations_id)
                                                                                    {{'selected'}} @endif>{{ $nation->name }}</option>
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
                                            <textarea class="form-control form-control-sm" id="notes" name="notes" rows="4" placeholder="{{ __('messages.notes', ['person' => 'candidate']) }}">{{$candidate->notes}}</textarea>
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
                            <div class="form-group">
                                <div class="block block-dimmed pb-3">
                                    <div class="block-header">
                                        <h4 class="block-title">{{ __('person.lastEdited') }}</h4>
                                        <div class="form-group-text"><i class="feather icon-eye"></i></div>
                                    </div>
                                    <div class="block-content pt-0">
                                        <div class="form-group-text text-center">
                                            <h4 class="font-w400 mb-0 text-primary"><strong>
                                                <a href="{{route('users.show', $candidate->last_editor)}}">{{$lastEditor->firstname . ' ' . $lastEditor->surname}}</a>
                                            </strong></h4>
                                            <small>{{$candidate->created_at}}<br/>({{(new Carbon\Carbon($candidate->created_at))->diffForHumans()}})</small>
                                        </div>  
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="block block-dimmed pb-3">
                                    <div class="block-header">
                                        <h4 class="block-title">{{ __('person.createdBy') }}</h4>
                                        <div class="form-group-text"><i class="feather icon-user-plus"></i></div>
                                    </div>
                                    <div class="block-content pt-0">
                                        <div class="form-group-text text-center">
                                            <h4 class="font-w400 mb-0 text-primary"><strong>
                                                <a href="{{route('users.show', $candidate->created_by)}}">{{$createdBy->firstname . ' ' . $createdBy->surname}}</a>
                                            </strong></h4>
                                            <small>{{$candidate->updated_at}}<br/>({{(new Carbon\Carbon($candidate->updated_at))->diffForHumans()}})</small>
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
                                    <select class="form-control form-control-sm" id="status" name="status">
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" @if($status->id == $candidate->status_id)
                                            {{'selected'}} @endif>{{ $status->name }}</option>
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
                                <label class="col-sm-2 col-form-label-sm" for="nin">{{ __('person.nin') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nin" name="nin" value="{{$candidate->nin}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="nin2">{{ __('person.nin2') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="nin2" name="nin2" value="{{$candidate->nin2}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="tin">{{ __('person.tin') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="tin" name="tin" value="{{$candidate->tin}}">
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
                                            <option value="{{ $nation->id }}" @if($nation->id == $candidate->res_country)
                                                {{'selected'}} @endif>{{ $nation->name }}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <select class="form-control form-control-sm" id="mail_country" name="mail_country">
                                        @foreach ($nations as $nation)
                                            <option value="{{ $nation->id }}" @if($nation->id == $candidate->mail_country)
                                                {{'selected'}} @endif>{{ $nation->name }}</option>
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="street">{{ __('person.street') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_street" name="res_street" value="{{$candidate->res_street}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_street" name="mail_street" value="{{$candidate->mail_street}}">
                                </div>
                            </div>   
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="flat">{{ __('person.flat') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_flat" name="res_flat" value="{{$candidate->res_flat}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_flat" name="mail_flat" value="{{$candidate->mail_flat}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="postal">{{ __('person.postal') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_postal" name="res_postal" value="{{$candidate->res_postal}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_postal" name="mail_postal" value="{{$candidate->mail_postal}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="mailbox">{{ __('person.mail_box') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_mailbox" name="res_mailbox" value="{{$candidate->res_mailbox}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_mailbox" name="mail_mailbox" value="{{$candidate->mail_mailbox}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="place">{{ __('person.place') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_place" name="res_place" value="{{$candidate->res_place}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_place" name="mail_place" value="{{$candidate->mail_place}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="district">{{ __('person.district') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_district" name="res_district" value="{{$candidate->res_district}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_district" name="mail_district" value="{{$candidate->mail_district}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="commune">{{ __('person.commune') }}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="res_commune" name="res_commune" value="{{$candidate->res_commune}}">
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="mail_commune" name="mail_commune" value="{{$candidate->mail_commune}}">
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
                                        <input type="text" class="form-control form-control-sm" id="phone" name="phone" value="{{$candidate->phone}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="phone_notes" name="phone_notes" value="{{$candidate->phone_notes}}" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="email">{{ __('person.email') }}</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{$candidate->email}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="email_notes" name="email_notes" value="{{$candidate->email_notes}}" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="viber">Viber</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-viber"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="viber" name="viber" value="{{$candidate->viber}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="viber_notes" name="viber_notes" value="{{$candidate->viber_notes}}" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="whatsapp">Whatsapp</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="whatsapp" name="whatsapp" value="{{$candidate->whatsapp}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="whatsapp_notes" name="whatsapp_notes" value="{{$candidate->whatsapp_notes}}" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="telegram">Telegram</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-telegram-plane"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="telegram" name="telegram" value="{{$candidate->telegram}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="telegram_notes" name="telegram_notes" value="{{$candidate->telegram_notes}}" placeholder="{{ __('person.add_notes') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm" for="other_contact">{{ __('person.other') }}</label>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-md">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="feather icon-mail"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="other_contact" name="other_contact" value="{{$candidate->other_contact}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" id="other_contact_notes" name="other_contact_notes" value="{{$candidate->other_contact_notes}}" placeholder="{{ __('person.add_notes') }}">
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

@foreach (Auth::user()->unreadNotifications as $notification)
@if ($notification->type == "App\Notifications\CompanyAutoChange")
<script> jQuery('#toast-example-2').toast('show'); </script>
@endif
@endforeach
@endsection