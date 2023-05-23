
@if (Session::has('success'))
     <div class="alert alert-success">
         {{ Session::get('success') }}
     </div>
     <?php
    event(new \App\Events\NewUserRegistered());
    ?>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<style>
    .error{
        color: red;
    }
</style>
@include('Pages.Header')



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>
    function getActors(){
        //YYYY-MM-DD yyyy->[0] , mm->[1] , dd->[2]
        var month = document.getElementById("birthdate").value.split("-")[1];
        var day = document.getElementById("birthdate").value.split("-")[2];        
        if(typeof month == "undefined"|| month == null || month === "" || typeof day == "undefined"|| day == null || day === ""){
            alert("Please enter a date");
            return;
        }
        $.ajax({
            type: "GET",
            url: "{{ route('getActorsName') }}",
            data: {month: month, day: day},
            success: function(data){
                var actors = document.getElementById("actors");
                actors.innerHTML = "";
                for(var i=0; i<data.length; i++){
                    var li = document.createElement("li");
                    li.appendChild(document.createTextNode(data[i]));
                    actors.appendChild(li);
                }
            }
        });
    }
</script>


<div id="form">
    <form method="post" action="{{ route('checkErrors') }}" >  
        @csrf

        @lang('messages.fullName') <input type="text" name="name" placeholder=" @lang('messages.enterYourName')" value="{{ old('name') }}" >
        <span class="error">* @error ('name') {{$message}} @enderror</span>
        <br><br>
        @lang('messages.userName') <input type="text" name="user_name" placeholder="@lang('messages.enterYourUserName')" value="{{ old('user_name') }}">
        <span class="error">* @error ('user_name') {{$message}} @enderror</span>
        <br><br>
        @lang('messages.Birthdate')<input type="date" id = "birthdate" name="birthdate" placeholder="@lang('messages.enterYourBirthdate')" value="{{ old('birthdate') }}">
        <span class="error">* @error ('birthdate') {{$message}} @enderror</span>
        <button type="button" onclick= "getActors()">@lang('messages.actorsName')</button>
        <ol id="actors"></ol>
        <br><br>
        <!-- <ol id="actors"></ol>-->
        @lang('messages.phone')<input type="text" name="phone" placeholder="@lang('messages.enterYourPhone')" value="{{ old('phone') }}">
        <span class="error">* @error ('phone') {{$message}} @enderror</span>
        <br><br>
        @lang('messages.address') <input type="text" name="address" placeholder="@lang('messages.enterYourAddress')" value="{{ old('address') }}">
        <span class="error">* @error ('address') {{$message}} @enderror</span>
        <br><br>
        @lang('messages.password') <input type="password" name="password" placeholder="@lang('messages.enterYourPassword')" value="{{ old('password') }}">
        <span class="error">* @error ('password') {{$message}} @enderror</span>
        <br><br>
        @lang('messages.confirmPassword') <input type="password" name="confirm_password" placeholder="@lang('messages.enterYourConfirmPassword')"value="{{ old('confirm_password') }}">
        <span class="error">* @error ('confirm_password') {{$message}} @enderror</span>
        <br><br>
        @lang('messages.email') <input type="text" name="email" placeholder="@lang('messages.enterYourEmail')" value="{{ old('email') }}">
        <span class="error">* @error ('email') {{$message}} @enderror</span>
        <br><br>

        <input type="submit" name="submit" value="@lang('messages.Submit')" >
    </form>
</div>
@include('Pages.Footer')
