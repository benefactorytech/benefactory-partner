@extends("layouts.app")

@section("head")
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/userinformation_create.css">
@endsection

@section("content")
<div class="container">
    <form class="form-horizontal" method="POST" action="/userinformation/register" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Retailer Admin Information</div>

                    <div class="panel-body">
                        
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" required>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control" name="mobile" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Retailer Information</div>

                    <div class="panel-body">
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('organization_name') ? ' has-error' : '' }}">
                            <label for="organization_name" class="col-md-4 control-label">Organization Name</label>

                            <div class="col-md-6">
                                <input id="organization_name" type="text" class="form-control" name="organization_name" required>

                                @if ($errors->has('organization_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="col-md-4 control-label">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" required>

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('introduction') ? ' has-error' : '' }}">
                            <label for="introduction" class="col-md-4 control-label">Introduction</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="introduction" name="introduction" required></textarea>

                                @if ($errors->has('introduction'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('introduction') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-md-4 control-label">Logo</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="logo" required>

                                @if ($errors->has('logo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                            <label for="banner" class="col-md-4 control-label">Banner</label>

                            <div class="col-md-6">
                                <input id="banner" type="file" class="form-control" name="banner" required>

                                @if ($errors->has('banner'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banner') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cause') ? ' has-error' : '' }}">
                            <label for="industry" class="col-md-4 control-label">Industry</label>

                            <div class="col-md-6">
                                
                                <select class="form-control" id="industry" name="industry" required>
                                    <?php
                                        for($i=0; $i < count($industries); $i++){
                                            $id = $industries[$i]->id;
                                            $name = $industries[$i]->name;
                                            echo "<option value='$id'>$name</option>";
                                        }
                                    ?>
                                </select>

                                @if ($errors->has('industry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cause') ? ' has-error' : '' }}">
                            <label for="cause" class="col-md-4 control-label">Cause</label>

                            <div class="col-md-6">
                                
                                <select class="form-control" id="cause" name="cause" required>
                                    <?php
                                        for($i=0; $i < count($causes); $i++){
                                            $id = $causes[$i]->id;
                                            $name = $causes[$i]->title;
                                            echo "<option value='$id'>$name</option>";
                                        }
                                    ?>
                                </select>

                                @if ($errors->has('cause'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cause') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('donation_amount') ? ' has-error' : '' }}">
                            <label for="donation_amount" class="col-md-4 control-label">Donation Amount</label>

                            <div class="col-md-6">
                                <input id="donation_amount" type="number" class="form-control" name="donation_amount" required>

                                @if ($errors->has('donation_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('donation_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" id="status" name="status" value="1" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-custom-submit" style="margin-bottom: 40px;">
                    Next
                </button>
            </div>
        </div>
    </form>
</div>
@endsection