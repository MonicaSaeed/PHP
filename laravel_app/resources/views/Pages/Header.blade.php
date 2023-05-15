<!DOCTYPE html>
<html>

<head>
    <title>Header Page </title>
    <link href="/CSS/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="/IMG/logo.png" alt="Logo">
            </div>
            <ul>
            <li><a href="{{ url('/') }}">Home Page</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>

            </ul>
        </nav>
    </header>
    
</body>

</html>