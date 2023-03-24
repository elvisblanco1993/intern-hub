<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- This line adds a link to the app.css file in the HTML head section of the page.

        With these changes in place, the image you added should now be displayed as the background of the welcome page.-->
        <style>
        body {
            background-image: url('{{ asset('images/image3.png') }}');
        }
        .heading-wrapper {
            width: 50%; /* adjust as necessary */
            color: white;
            margin: 30% 5%;
            justify-content: center;
            align-items: center;
            height: auto;
        }
        .heading-wrapper h1 {
            word-wrap: break-word;
            text-align: left;
            font-size: xxx-large;
        }
        .orange-button {
            background-color: #F94D39;
            color: white;
            border-radius: 10px;
            padding: 15px 60px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .orange-button:hover {
            background-color: #ff8533;
        }
        </style>

    </head>
    
    <body>
        <div class="heading-wrapper">
            <h1>Find the internship that works for you!</h1>
            <button class="orange-button">START YOUR SEARCH</button>
            
        </div>
    </body>
</html>
