<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('personalized/css/estilo.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-grid.css')}}">
    <title>Document</title>
    @livewireStyles
</head>
<body>

    {{$slot}}
    
    
    @livewireScripts
</body>
</html>