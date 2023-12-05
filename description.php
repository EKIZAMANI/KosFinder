<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">\
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>CapyType</title>
    <style>
    body {

        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        /* width: 40%; */
        /* Sesuaikan dengan kebutuhan desain Anda */
        display: flex;
        margin: auto;
        justify-content: space-around;
    }

    .logo {
        font-size: 71px;
        color: #b38c00;
        font-weight: bold;
    }

    .subtitle {
        color: black;
        font-size: 18px;
        font-weight: bold;
        padding-top: 10px;
    }

    .description {
        color: #526777;
        font-size: 20px;

    }

    .buttons-container {
        padding-top: 10px;
    }

    .button {
        display: inline-block;
        padding: 8px 20px;
        font-weight: bold;
        font-size: 16px;
        border-radius: 25px;
        margin-right: 10px;
        text-decoration: none;
    }



    .secondary-button {

        color: #2ABA86;
        border: 2px solid #2ABA86;
    }

    .secondary-button:hover {
        transition: 0.5s;
        background-color: black;
        color: black;
        border: 2px solid #2ABA86;
    }

    .buttons-container a {
        color: inherit;
        text-decoration: none;
    }

    .buttons-container a:hover {
        transition: 0.7s;
        color: white;
        text-decoration: none;

    }

    .text {
        font-family: 'Poppins';
        font-size: 22px;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="text">
            <p class="logo">KosFinder</p>
            <p class="subtitle">Temukan Kos dengan Mudah</p>
            <p class="description">KosFinder adalah sebuah platform daring yang dirancang khusus untuk membantu pengguna
                menemukan kos dengan lebih mudah dan efisien. Dengan fokus pada kebutuhan masyarakat yang mencari tempat
                tinggal sementara, KosFinder menyediakan layanan pencarian yang komprehensif dan user-friendly.</p>

            <div class="buttons-container">

                <a href="#about" class="button secondary-button" onclick="scrollToBottom()">SEE PROPERTY</a>
            </div>
        </div>
        <div>
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module">
            </script>

            <dotlottie-player src="https://lottie.host/982e3f54-e3e5-45dc-8c05-f4a60b1329a6/v1WbZUP4p4.json"
                background="transparent" speed="1" style="width: 450px; height: 450px;" loop autoplay>
            </dotlottie-player>
        </div>
    </div>

    <!-- JavaScript for scrolling to the bottom -->
    <script>
    function scrollToBottom() {
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: 'smooth'
        });
    }
    </script>
</body>

</html>