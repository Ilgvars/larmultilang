<!doctype html>
<html lang="{{ Cookie::get('manaValoda',Config::get('app.locale')) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@lang("cookie.multilang")</title>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
   
            <div class="content">
                <div>
                <select name="lang" id="lang">
                    @foreach ($al as $lang) 
                           @php      $selected= strcmp($lang,Cookie::get('manaValoda',Config::get('app.locale')))==0 ? " selected" : "";      @endphp
                        <option value="{{ $lang }}"{{ $selected }}>{{ $lang}}  </option>
                    @endforeach
                </select>   
                </div>
                <div class="title m-b-md">
                    @lang("cookie.laravel")
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
    <script>
        let language="{{ Cookie::get('manaValoda',Config::get('app.locale')) }}";
        let languageSelect = document.getElementById("lang");
        let url='{{url("/lang") }}';
        let token= "{{ csrf_token() }}";
        languageSelect.addEventListener("change", function() {
            let xhttp = new XMLHttpRequest();
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange= function () {
              if (this.readyState === 4 && this.status === 200 && this.responseText===languageSelect.value) { location.reload(); } 
            };
            xhttp.onerror = function (e) {
              console.error(xhttp.statusText);
            };            
            var data = new FormData();
            data.append('lang', languageSelect.value);
            data.append('_token', token);
           // xhttp.send(data);
            xhttp.send('lang=' + languageSelect.value + '&_token='+token);
        });
    </script>
</html>
