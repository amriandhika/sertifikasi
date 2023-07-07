@extends('layouts.admin-portal')
@section('title',__('Settings'))
@section('content')
    <div class=" row mb-4">
        <div class="col">
            <h5 class="fw-bolder">
                {{__('Settings')}}
            </h5>
        </div>
        <div class="col text-end">
        </div>
    </div>
    <div class="col-lg-8 col-12 mx-auto">

        <div class=" row">
            <div class="col">
                <h5 class="fw-bolder">
                    {{__('General Settings')}}
                </h5>
            </div>
            <div class="col text-end">
            </div>
        </div>
        <div class="row mb-5">
            <div class="  col-md-12 mt-lg-0 mt-4">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="/settings" method="post">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="" id="basic-info">
                                <div class=" pt-0">
                                    @if ($user->super_admin)
                                        <div class="row">
                                            <div class="col-md-12 align-self-center">
                                                <div>
                                                    <label for="logo_file" class="form-label">{{__('Upload Logo')}}</label>
                                                    <input class="form-control" name="logo" type="file" id="logo_file">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                        @if ($user->super_admin)
                                            <div class="row">
                                                <div class="col-md-12 align-self-center">
                                                    <div>
                                                        <label for="logo_file" class="form-label mt-4">{{__('Upload favicon')}}</label>
                                                        <input class="form-control" name="favicon" type="file" id="favicon_file">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @if ($user->super_admin)
                                        <label class="form-label mt-3">{{__('Currency')}}</label>

                                        <div class="input-group">
                                            <input id="currency" name="currency" value="{{$settings['currency'] ?? config('app.currency')}}"
                                                   class="form-control" type="text" required="required">
                                        </div>
                                    @endif

                                    @if ($user->super_admin)
                                        <div class="row">
                                            <div class="col-md-12 align-self-center">
                                                <div>
                                                    <label for="free_trial_days" class="form-label mt-4">{{__('Landing Page')}}</label>
                                                    <select class="form-select" aria-label="Default select example" name="landingpage">

                                                        <option value="Default"
                                                                @if(($settings['landingpage'] ?? null) === 'Default') selected @endif
                                                        >{{__('Default landing page')}}</option>
                                                        <option value="Login"
                                                                @if(($settings['landingpage'] ?? null) === 'Login') selected @endif>{{__('Login Page')}}</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                            <label  class="form-label mt-4">{{__('Custom Script')}}</label>
                                            <div class="input-group">
                                                <textarea id="custom_script" name="custom_script"  class="form-control" type="text">{{$settings['custom_script'] ?? ''}}</textarea>
                                            </div>
                                            <label  class="form-label mt-4">{{__('Meta Description')}}</label>
                                            <div class="input-group">
                                                <textarea id="meta_description" name="meta_description"  class="form-control" type="text">{{$settings['meta_description'] ?? ''}}</textarea>
                                            </div>


                                        @endif

                                    @csrf
                                    <button class="btn btn-info float-left mt-4 mb-0">{{__('Update')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow-lg">
            <div class="card-body">

                <div class="accordion-1">
                    <div class="accordion" id="accordionSettings">
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    {{__('SMTP Settings')}}
                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                </button>
                            </h5>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                                <div class="accordion-body text-sm opacity-8">
                                    <form action="/save-email-setting" method="post">

                                        <div class="mt-3" id="basic-info">
                                            <div class=" pt-0">

                                                <div class="row mb-4">
                                                    <label class="form-label" for="mail_from_address">{{__('Default Email From Address')}}</label>

                                                    <div class="input-group">
                                                        <input id="mail_from_address" name="mail_from_address" value="{{$settings['mail_from_address'] ?? ''}}"
                                                               class="form-control" type="email" required="required">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label class="form-label">{{__('SMTP Host')}}</label>

                                                    <div class="input-group">
                                                        <input id="host" name="smtp_host" value="{{$settings['smtp_host'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label class="form-label">{{__('SMTP Username')}}</label>

                                                    <div class="input-group">
                                                        <input id="username" name="smtp_username" value="{{$settings['smtp_username'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="form-label">{{__('SMTP Password')}}</label>

                                                    <div class="input-group">
                                                        <input id="password" name="smtp_password" value="{{$settings['smtp_password'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="form-label">{{__('SMTP Port')}}</label>

                                                    <div class="input-group">
                                                        <input id="port" name="smtp_port" value="{{$settings['smtp_port'] ?? ''}}"
                                                               class="form-control" type="number" required="required">
                                                    </div>
                                                </div>
                                                @csrf
                                                <button class="btn btn-info float-left mt-4 mb-0">{{__('Update')}} </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingTwo">
                                <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    {{__('reCAPTCHA V2')}}
                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                </button>
                            </h5>
                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                <div class="accordion-body text-sm">
                                    <form action="/settings/save-recaptcha-config" method="post">
                                        <div class="mt-3">
                                            <div class="pt-0">
                                                <div class="row mb-4">
                                                    <label for="recaptcha_api_key" class="form-label">{{__('Site Key')}}</label>
                                                    <div class="input-group">
                                                        <input id="recaptcha_api_key" name="recaptcha_api_key" value="{{$settings['recaptcha_api_key'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="recaptcha_api_secret" class="form-label">{{__('Secret Key')}}</label>

                                                    <div class="input-group">
                                                        <input id="recaptcha_api_secret" name="recaptcha_api_secret" value="{{$settings['recaptcha_api_secret'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                @if ($user->super_admin)

                                                    <div class="form-check form-switch mt-3">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="config_recaptcha_in_user_login" name="config_recaptcha_in_user_login" value="1"
                                                               @if(!empty($settings['config_recaptcha_in_user_login']))
                                                               checked
                                                                @endif>

                                                        <label class="form-check-label" for="config_recaptcha_in_user_login">{{__('Enable Recaptcha in Student Login')}}</label>
                                                    </div>

                                                    <div class="form-check form-switch mt-3">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="config_recaptcha_in_admin_login" name="config_recaptcha_in_admin_login" value="1"
                                                               @if(!empty($settings['config_recaptcha_in_admin_login']))
                                                               checked
                                                                @endif>

                                                        <label class="form-check-label" for="config_recaptcha_in_admin_login">{{__('Enable Recaptcha in Admin Login')}}</label>
                                                    </div>
                                                    <div class="form-check form-switch mt-3">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="config_recaptcha_in_user_signup" name="config_recaptcha_in_user_signup" value="1"
                                                               @if(!empty($settings['config_recaptcha_in_user_signup']))
                                                               checked
                                                                @endif>

                                                        <label class="form-check-label" for="config_recaptcha_in_user_signup">{{__('Enable Recaptcha in Signup Page')}}</label>
                                                    </div>


                                                @endif

                                                @csrf
                                                <button class="btn btn-info float-left mb-0 mt-3">{{__('Save')}}</button>
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingTwo">
                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{__('Twilio')}}
                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                </button>
                            </h5>
                            <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionRental">
                                <div class="accordion-body text-sm opacity-8">

                                    <form action="/settings/save-twilio-config" method="post">



                                        <div class="mt-3">
                                            <div class=" pt-0">
                                                <div class="row mb-4">
                                                    <label for="twilio_account_sid" class="form-label">{{__('Account SID')}}</label>
                                                    <div class="input-group">
                                                        <input id="twilio_account_sid" name="twilio_account_sid" value="{{$settings['twilio_account_sid'] ?? ''}}" class="form-control" type="text" required="required">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="twilio_api_key" class="form-label">{{__('API Key')}}</label>

                                                    <div class="input-group">
                                                        <input id="twilio_api_key" name="twilio_api_key" value="{{$settings['twilio_api_key'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="twilio_api_secret" class="form-label">{{__('API Secret')}}</label>

                                                    <div class="input-group">
                                                        <input id="twilio_api_secret" name="twilio_api_secret" value="{{$settings['twilio_api_secret'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>

                                                @csrf
                                                <button class="btn btn-info float-left mt-4 mb-0">{{__('Save')}} </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingPusher">
                                <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePusher" aria-expanded="false" aria-controls="collapsePusher">
                                    {{__('Pusher')}}
                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                </button>
                            </h5>
                            <div id="collapsePusher" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionSettings">
                                <div class="accordion-body text-sm opacity-8">

                                    <form action="/settings/save-pusher-config" method="post">

                                        <div class="mt-3">
                                            <div class=" pt-0">
                                                <div class="row mb-4">
                                                    <label for="pusher_app_id" class="form-label">{{__('App ID')}}</label>
                                                    <div class="input-group">
                                                        <input id="pusher_app_id" name="pusher_app_id" value="{{$settings['pusher_app_id'] ?? ''}}" class="form-control" type="text" required="required">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label for="pusher_app_key" class="form-label">{{__('App Key')}}</label>

                                                    <div class="input-group">
                                                        <input id="pusher_app_key" name="pusher_app_key" value="{{$settings['pusher_app_key'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="pusher_app_secret" class="form-label">{{__('App Secret')}}</label>

                                                    <div class="input-group">
                                                        <input id="pusher_app_secret" name="pusher_app_secret" value="{{$settings['pusher_app_secret'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="pusher_app_cluster" class="form-label">{{__('App Cluster')}}</label>

                                                    <div class="input-group">
                                                        <input id="pusher_app_cluster" name="pusher_app_cluster" value="{{$settings['pusher_app_cluster'] ?? ''}}"
                                                               class="form-control" type="text" required="required">
                                                    </div>
                                                </div>

                                                @csrf
                                                <button class="btn btn-info float-left mt-4 mb-0">{{__('Save')}} </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>



    </div>

@endsection
