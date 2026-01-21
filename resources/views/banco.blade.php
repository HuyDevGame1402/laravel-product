<!DOCTYPE html>
<html>
<head>
    <title>Bàn cờ {{ $n }}x{{ $n }}</title>
    <style>
        table { border-collapse: collapse; }
        td { width: 40px; height: 40px; text-align: center; }
        .black { background-color: black; }
        .white { background-color: white; }
    </style>
</head>
<body>
    <h1>Bàn cờ {{ $n }}x{{ $n }}</h1>
    <table>
        @for($i = 0; $i < $n; $i++)
            <tr>
                @for($j = 0; $j < $n; $j++)
                    <td class="{{ ($i+$j)%2 == 0 ? 'white' : 'black' }}"></td>
                @endfor
            </tr>
        @endfor
    </table>
</body>
</html>
