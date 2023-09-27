<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Visão Flexível vs Inflexível</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Resultados da Visão Flexível vs Inflexível</h2>
    
    <!-- Seleção de arquivo -->
    <form action="{{ route('iresults') }}" method="GET">

        @csrf
        <div class="mb-4">
            <label for="selected_file">Selecione um arquivo para visualizar os resultados:</label>
            <select name="selected_file" id="selected_file" class="form-control" onchange="this.form.submit()">
                <option value="">-- Selecionar arquivo --</option>
                @foreach($fileOptions as $file)
                    <option value="{{ $file }}" @if($selectedFile == $file) selected @endif>{{ $file }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Tabela de resultados -->
    @if(!empty($results))
<table class="table mt-4">
    <thead>
        <tr>
            <th>Inflexível</th>
            <th>Nota</th>
            <th>Flexível</th>
        </tr>
    </thead>
    <tbody>
        @foreach($results as $result)
        <tr>
            <td>{{ $result['inflexible'] }}</td>
            <td>{{ $result['score'] }}</td>
            <td>{{ $result['flexible'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>

<!-- Bootstrap JS, Popper.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
