<!DOCTYPE html>
<html>
<head>
    <title>Resultados dos Pensamentos Ansiosos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Resultados dos</h2>
    <h3 class="mb-4">Pensamentos Ansiosos</h3>

    <form method="GET" action="/presults">
        
        <div class="mb-3">
            <label for="selected_file" class="form-label">Selecione o arquivo para visualizar:</label>
            <select name="selected_file" id="selected_file" class="form-control" onchange="this.form.submit()">
                <option value="">-- Selecione --</option>
                @foreach($fileOptions as $fileOption)
                    <option value="{{ $fileOption }}" @if($selectedFile == $fileOption) selected @endif>{{ $fileOption }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Agora, a tabela para exibir os resultados -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Situação</th>
                <th>Pensamentos</th>
                <th>Intensidade</th>
                <th>O que de pior achei que aconteceria</th>
            </tr>
        </thead>
        <tbody>
    @if(isset($results['situacao']))
        @for($i = 0; $i < count($results['situacao']); $i++)
            <tr>
                <td>{{ $results['situacao'][$i] ?? '' }}</td>
                <td>{{ $results['pensamentos'][$i] ?? '' }}</td>
                <td>{{ $results['intensidade'][$i] ?? '' }}</td>
                <td>{{ $results['pior'][$i] ?? '' }}</td>
            </tr>
        @endfor
    @endif
</tbody>


    </table>
</div>

</body>
</html>
