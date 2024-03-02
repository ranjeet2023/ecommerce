<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    * {
        padding: 0;
        margin: 0;
        font-family: roboto, verdana;

    }

    *:focus {
        outline: none;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #333;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .outer {
        border: 1px solid gray;
        height: ;
        background: linear-gradient(45deg, pink, lightblue);
        padding: 20px 10px;
        box-shadow: 10px 10px 10px #555;
        animation: ;
    }

    .outer h1,
    h4 {
        text-align: center;
        color: #333;
        font-family: Monaco;

    }

    .outer h1 {
        background: linear-gradient(30deg, blue, red);
        -webkit-background-clip: text;
        color: transparent;
        font-weight: 800;
        font-family: inherit;
    }

    .inner {
        padding: 0;
        margin-bottom: 10px;
        font-size: 1.5rem;
        font-family: Comic Sans;
    }

    .inner p {
        text-align: center;

    }

    .inner i {
        color: black;
        opacity: .6;
        line-height: 1.5rem;
        padding: 9.5px;
        background: transparent;
        position: relative;
        top: 2px;
        border: 1px solid transparent;
        box-shadow: 5px 5px 20px gray;
    }

    .in {
        margin-top: 10px;
        padding: 10px 7px;
        border: 1px solid gray;
        border-right: none;
        width: 12em;
        font-size: 1.2rem;
        background: transparent;
        box-shadow: ;
        display: inline-block;
    }

    .in:focus {
        border: 1px solid pink;
        border-right: none;
        box-shadow: 5px 5px 20px hotpink;
    }

    .btn {
        padding: 5px 5px;
        margin: 15px 15px 0px 15px;
        width: 10em;
        background: linear-gradient(40deg, lightblue, pink);
        border: 1px solid gray;
        border-radius: 5px;
        font-size: 1.2rem;
        transition: .5s 0s ease-out;
        box-shadow: 5px 5px 20px gray;
    }

    .btn:hover {
        background: linear-gradient(30deg, blue, red);
        color: white;
        font-size: 1.7rem;
    }

    .outer p:nth-child(3) {
        font-size: .8rem;
        margin-top: 10px;
    }
</style>

<body>
    <!-- outer div for better design -->
    <div class="outer">
        <h1>Login Form</h1>
        <h4>login in to get notified</h4>
        <!-- Form Started here -->
        <div class="inner">
            <form action="{{ url('sms-login') }}" method="POST">
                @csrf
                <p><input class="in" type="email" placeholder="name" name="name" /><i
                        class="fa-solid fa-user"></i>
                </p>
                @error('name')
                    {{ $message }}
                @enderror
                <p><input class="in" type="number" placeholder="Enter Your number" /><i class="fa-solid fa-lock"
                        name ='phone_number'></i></p>
                @error('name')
                    {{ $message }}
                @enderror
                <!-- To do: normal login button with animating border -->
                <p><input class="btn" type="submit" value="Submit" /><input class="btn" type="reset"
                        value="Reset" /></p>
            </form>
        </div>
    </div>
</body>

</html>
