<!DOCTYPE html>
<html>

<head>
    <title>Header Page </title>
    <link href="/CSS/style.css" rel="stylesheet">
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
    integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
    integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
    integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
    integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>

    <header>
        <nav>
            <div class="logo">
                <img src="/IMG/logo.png" alt="Logo">
            </div>
            <div>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false">
                        @lang('messages.changeLanguage')
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">@lang('messages.en')</a></li>
                        <li><a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">@lang('messages.ar')</a></li>
                        
                    </ul>
                </div>
            </div>
            <ul>
            <li><a href="{{ url('/') }}">@lang('messages.homePage')</a></li>
            <li><a href="{{ url('/register') }}">@lang('messages.register')</a></li>




            </ul>
        </nav>
    </header>
    
</body>

</html>

