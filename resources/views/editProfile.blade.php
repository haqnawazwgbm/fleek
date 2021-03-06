@extends('layouts.site')
@section('content')
    <section id="login" class="container secondary-page">
        <div class="top-score-title right-score col-md-12">
            <h3>Update <span>Now</span><span class="point-int"> !</span></h3>
            <div class="col-md-12 login-page">
                <form method="POST" class="register-form" action="{{ url('/editProfile') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $users->id  }}" />
                    <div class="name">
                        <label for="firstname">* First Name:</label>
                        <div class="clear"></div>
                        <input id="first_name" class="{{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{ $users->first_name }}" type="text"
                               placeholder="e.g. Mr. John" required="">
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                               <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                        @endif
                    </div>
                    <div class="name">
                        <label for="lastname">* Last Name:</label>
                        <div class="clear"></div>
                        <input id="last_name" class="{{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{ $users->last_name }}" type="text" placeholder="e.g. Mr. Doe" required="">
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                               <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                        @endif
                </div>
                <div class="email">
                    <label for="email">* Email:</label>
                    <div class="clear"></div>
                    <input id="email" name="email" class="{{ $errors->has('email') ? ' has-error' : '' }}" value="{{ $users->email }}" type="text"
                               placeholder="example@domain.com" required="">
                    @if ($errors->has('email'))
                        <span class="help-block">
                               <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif

                    </div>


                    <div id="register-submit">
                        <input type="submit" value="Update">
                    </div>
                </form>
                <div class="ctn-img">
                    <img src="/img/federer.png">
                </div><!--Close Images-->
                <div class="clear"></div>
            </div>

        </div>
    </section>
@endsection
