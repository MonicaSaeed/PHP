
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

        Fullname: <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" >
        <span class="error">* @error ('name') {{$message}} @enderror</span>
        <br><br>
        Username: <input type="text" name="user_name" placeholder="Enter your user name" value="{{ old('user_name') }}">
        <span class="error">* @error ('user_name') {{$message}} @enderror</span>
        <br><br>
        Birthdate: <input type="date" id = "birthdate" name="birthdate" placeholder="Enter your birthdate" value="{{ old('birthdate') }}">
        <span class="error">* @error ('birthdate') {{$message}} @enderror</span>
        <button type="button" onclick= "getActors()">actor’s names born on the same day</button>
        <ol id="actors"></ol>
        <br><br>
        <!-- <ol id="actors"></ol>-->
        Phone: <input type="text" name="phone" placeholder="Enter your phone" value="{{ old('phone') }}">
        <span class="error">* @error ('phone') {{$message}} @enderror</span>
        <br><br>
        Address: <input type="text" name="address" placeholder="Enter your address" value="{{ old('address') }}">
        <span class="error">* @error ('address') {{$message}} @enderror</span>
        <br><br>
        Password: <input type="password" name="password" placeholder="Enter your password" value="{{ old('password') }}">
        <span class="error">* @error ('password') {{$message}} @enderror</span>
        <br><br>
        Confirm Password: <input type="password" name="confirm_password" placeholder="Confirm your password" value="{{ old('confirm_password') }}">
        <span class="error">* @error ('confirm_password') {{$message}} @enderror</span>
        <br><br>
        E-mail: <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        <span class="error">* @error ('email') {{$message}} @enderror</span>
        <br><br>

        <input type="submit" name="submit" value="Submit" >
    </form>
</div>
@include('Pages.Footer')