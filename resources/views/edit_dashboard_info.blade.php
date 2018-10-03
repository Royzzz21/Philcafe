@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div class="card">
                <div class="card-header text-center">Edit Personal Profile</div>
                <div class="col-sm-12 mt-3">
                    {!! Form::open(['action' => 'DashboardController@store_edit','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    <input type="hidden" name="old_profile_picture">

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Profile picture') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo"  required autofocus>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- profile_picture-->

                        <input type="hidden" value="{{ $user->id }}" name='user_id'>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- Name-->

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- E-Mail Address -->

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="gender" type="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required> --}}
                                
                                <select class="form-control" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" id="exampleSelect1"  id="gender" name="gender" required>
                                    <option value="Male" <?php echo $user->gender == 'Male'? 'selected' : ''; ?> >Male</option>
                                    <option value="Female" <?php echo $user->gender == 'Female'? 'selected' : ''; ?> >Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- Gender -->

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Contact number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="0{{ $user->phone }}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- Contact number -->
    
                        {{-- BIRTHDATE --}}

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>
                            <div class="col-sm-2">

                                <select class="form-control" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" id="year" value="{{ old('year') }}" name="year" required>
                                
                                    @for ($year = 1905; $year < 2018; $year++)
                                       
                                        <option value="{{ $year }}" 
                                            @if ($year == date('Y', strtotime($user->birthdate)))
                                                {{ 'selected' }}
                                            @endif
                                        >{{ $year }}</option>
                                       
                                    @endfor

                                </select>
                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div><!-- YEAR -->

                            <div class="col-sm-1.0">
                                <select class="form-control" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" id="month" value="{{ old('month') }}" name="month" required>
                                    @for ($month = 1; $month < 13; $month++)
                                        <option value="{{ $month }}"
                                            @if ($month == date('m', strtotime($user->birthdate)))
                                                {{ 'selected' }}
                                            @endif
                                        >{{ $month }}</option>
                                    @endfor
                                </select>
                                @if ($errors->has('month'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div><!-- MONTH -->

                            <div class="col-sm-1.0 px-3">
                                <select class="form-control" class="form-control{{ $errors->has('day') ? ' is-invalid' : '' }}" id="day" value="{{ old('day') }}" name="day" required>
                                    @for ($day = 1; $day < 32; $day++)
                                        <option value="{{ $day }}"
                                            @if ($day == date('d', strtotime($user->birthdate)))
                                                {{ 'selected' }}
                                            @endif
                                        >{{ $day }}</option>
                                    @endfor
                                </select>
                                @if ($errors->has('day'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif
                            </div><!-- DAY -->

                        </div><!-- BIRTHDATE -->

                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4 text-right">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div><!-- col-sm-12 -->
            </div><!-- card -->
        </div><!-- col-sm-4 -->
    </div>
<hr>

{{-- For post CONTENT --}}
<style>
        p {
            margin-top: 3px;
            margin-bottom: 8px;
        }
        div#post_content {
            padding-left: 30px;
        }   
</style>

@endsection

