<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<style>
    /* SMOKE */
    #smoke-1 {
        stroke-dasharray: 0, 10;
        animation: smoke 6s ease infinite;
    }

    #smoke-2 {
        stroke-dasharray: 0, 10;
        animation: smoke 6s 0.5s ease infinite;
    }

    @keyframes smoke {
        0% {
            stroke-dasharray: 0, 10;
        }

        50% {
            stroke-dasharray: 10, 0;
        }

        100% {
            stroke-dasharray: 10, 0;
            opacity: 0;
        }
    }

    /* WRITING */
    #line-1 {
        opacity: 0;
        animation: writing 0.5s linear forwards;
    }

    #line-2 {
        opacity: 0;
        animation: writing 0.5s 1s linear forwards;
    }

    #line-3 {
        opacity: 0;
        animation: writing 0.5s 1.5s linear forwards;
    }

    #line-4 {
        opacity: 0;
        animation: writing 0.5s 2s linear forwards;
    }

    @keyframes writing {
        0% {
            width: 0px;
            opacity: 1;
        }

        100% {
            width: 14px;
            opacity: 1;
        }
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Designed with Figma -->
                <svg width="20%" height="60%" style="margin-top: 13%; margin-left: 40%;" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="study">
                        <rect width="64" height="64" />
                        <g id="smoke">
                            <path id="smoke-2" d="M9 21L9.55279 19.8944C9.83431 19.3314 9.83431 18.6686 9.55279 18.1056L9 17L8.44721 15.8944C8.16569 15.3314 8.16569 14.6686 8.44721 14.1056L9 13" stroke="#797270" />
                            <path id="smoke-1" d="M6.5 22L7.05279 20.8944C7.33431 20.3314 7.33431 19.6686 7.05279 19.1056L6.5 18L5.94721 16.8944C5.66569 16.3314 5.66569 15.6686 5.94721 15.1056L6.5 14" stroke="#797270" />
                        </g>
                        <g id="laptop">
                            <rect id="laptop-base" x="17" y="28" width="20" height="3" fill="#F3F3F3" stroke="#453F3C" stroke-width="2" />
                            <rect id="laptop-screen" x="18" y="17" width="18" height="11" fill="#5A524E" stroke="#453F3C" stroke-width="2" />
                            <rect id="line-1" x="20" y="19" width="14" height="1" fill="#F78764" />
                            <rect id="line-2" x="20" y="21" width="14" height="1" fill="#F9AB82" />
                            <rect id="line-3" x="20" y="23" width="14" height="1" fill="#F78764" />
                            <rect id="line-4" x="20" y="25" width="14" height="1" fill="#F9AB82" />
                        </g>
                        <g id="cup">
                            <rect id="Rectangle 978" x="5" y="24" width="5" height="7" fill="#CCC4C4" stroke="#453F3C" stroke-width="2" />
                            <path id="Ellipse 416" d="M11 28C12.1046 28 13 27.1046 13 26C13 24.8954 12.1046 24 11 24" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 996" x="6" y="25" width="3" height="1" fill="#D6D2D1" />
                        </g>
                        <g id="books">
                            <rect id="Rectangle 984" x="58" y="27" width="4" height="14" transform="rotate(90 58 27)" fill="#B16B4F" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 985" x="56" y="23" width="4" height="14" transform="rotate(90 56 23)" fill="#797270" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 986" x="60" y="19" width="4" height="14" transform="rotate(90 60 19)" fill="#F78764" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 993" x="47" y="20" width="12" height="1" fill="#F9AB82" />
                            <rect id="Rectangle 994" x="43" y="24" width="12" height="1" fill="#54504E" />
                            <rect id="Rectangle 995" x="45" y="28" width="12" height="1" fill="#804D39" />
                        </g>
                        <g id="desk">
                            <rect id="Rectangle 973" x="4" y="31" width="56" height="5" fill="#797270" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 987" x="10" y="36" width="30" height="6" fill="#797270" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 975" x="6" y="36" width="4" height="24" fill="#797270" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 974" x="40" y="36" width="18" height="24" fill="#797270" stroke="#453F3C" stroke-width="2" />
                            <line id="Line 129" x1="40" y1="48" x2="58" y2="48" stroke="#453F3C" stroke-width="2" />
                            <line id="Line 130" x1="22" y1="39" x2="28" y2="39" stroke="#453F3C" stroke-width="2" />
                            <line id="Line 142" x1="46" y1="42" x2="52" y2="42" stroke="#453F3C" stroke-width="2" />
                            <line id="Line 131" x1="46" y1="54" x2="52" y2="54" stroke="#453F3C" stroke-width="2" />
                            <rect id="Rectangle 988" x="11" y="37" width="28" height="1" fill="#54504E" />
                            <rect id="Rectangle 992" x="5" y="32" width="54" height="1" fill="#9E9492" />
                            <rect id="Rectangle 989" x="7" y="37" width="2" height="1" fill="#54504E" />
                            <rect id="Rectangle 990" x="41" y="37" width="16" height="1" fill="#54504E" />
                            <rect id="Rectangle 991" x="41" y="49" width="16" height="1" fill="#54504E" />
                            <line id="Line 143" y1="60" x2="64" y2="60" stroke="#453F3C" stroke-width="2" />
                        </g>
                    </g>
                </svg>


            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>