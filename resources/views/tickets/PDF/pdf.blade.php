<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: DejaVu Sans, sans-serif;
        }
        body {
            width: 100vw;
            text-align: center;
        }
        header {
            margin: 16px;
        }
        h1 {
            font-size: 36px;
            line-height: 40px;
            font-weight: bold;
        }
        main {
            width: 300px;
            margin: 24px;
            margin-left: auto;
            margin-right: auto;
        }
        ul {
            font-weight: bold;
            border: 2px solid black;
            padding: 40px;
        }
        p {
            font-size: 24px;
            line-height: 32px;
            font-weight: bold;
            margin 16px;
        }
    </style>
</head>
<body class=" w-screen text-center ">
    <header class="m-4">
        <h1 class="text-4xl font-bold">Bilet</h1>
    </header>
    <main class=" w-max m-6 ml-auto mr-auto">
        <ul class="font-bold border-2 border-black p-10">
            <li>Tytuł: {{ $title }}</li>
            <li>Data: {{ $date }}</li>
            <li>Godzina: {{ $time }}</li>
            <li>Sala: {{ $room_number }}. {{ $room_name }}</li>
            <li>Miejsce: {{ $seat }}</li>
            <li>Właściciel: {{ $owner }}</li>
        </ul>
    </main>
    <footer>
        <p class=" text-2xl font-bold m-4">ID: {{ $uuid }}</p>
    </footer>
</body>
</html>