<!DOCTYPE html>
<html>
    <head>
        <title>Page Not Found</title>

        {{-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> --}}

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Page not found!</div>
                <img src="\images\unknown.jpg">
                <div>It seems like the page you tried to access does not exist on our site.</div>
                <a href="{{ URL::previous() }}" class="btn btn-default btn-xs">Go Back</a>
            </div>
        </div>
    </body>
</html>