<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Inicio</title>
</head>
<body>
{{$width = '4px'}}
<x-modal :variable="$width">
    <x-slot:title>
        <h2>Holaaaaa</h2>
    </x-slot:title>
    <p>The password you have provided is not valid.
        Here are the rules for valid passwords: [...]</p>
    <p><a href="#">...</a></p>
</x-modal>

<a>otra cosa</a>
</body>
</html>
