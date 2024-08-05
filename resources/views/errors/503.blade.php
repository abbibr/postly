<!doctype html>
<html lang="en">

<head>
    <title>Site Maintenance</title>
    <style>
        html,
        body {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
        }

        * {
            box-sizing: border-box;
        }

        body {
            text-align: center;
            padding: 0;
            background: #160873;
            background: radial-gradient(at center, #160873, #12075f);
            color: #fff;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 600;
            font-size: 20px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            min-height: 600px;
        }

        h1 {
            font-size: 50px;
            font-weight: 900;
            text-align: center;
        }

        article {
            display: block;
            width: 800px;
            padding: 50px;
            margin: 0 auto;
        }

        a {
            color: #fff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: none;
        }

        svg {
            height: 84px;
            margin-top: 1em;
        }

        .bi-exclamation-diamond .kaboom {
            animation: kaboom 2.5s ease-in-out alternate infinite;
            transform-origin: center;
        }

        @keyframes kaboom {
            0% {
                transform: scale(1.0);
            }

            100% {
                transform: scale(1.2);
                fill: #f50057;
            }
        }

        .gradient-animation {
            background: linear-gradient(270deg, #160873, #1608AA);
            background-size: 400% 400%;

            -webkit-animation: AnimationName 4s ease infinite;
            -moz-animation: AnimationName 4s ease infinite;
            -o-animation: AnimationName 4s ease infinite;
            animation: AnimationName 4s ease infinite;
        }

        @-webkit-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @-moz-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @-o-keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        @keyframes AnimationName {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }
    </style>
</head>

<body class="gradient-animation">
    <article>
        <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" fill="white"
            class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
            <path
                d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z" />
            <path class="kaboom"
                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
        </svg>
        <h1>We&rsquo;ll be back soon!</h1>
        <div>
            <p>Sorry for the inconvenience. We&rsquo;re performing some scheduled maintenance at the moment. Please
                visit the site again in couple hours.</p>
            <p>&mdash; The Visionary Voyagers Team</p>
        </div>
    </article>
    <script>
        setTimeout(() => {
            window.location = window.location
        }, 4000);
    </script>
</body>

</html>
