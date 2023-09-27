<!DOCTYPE html>
<html>
<head>
    <title>Resultados do Questionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Resultados do Questionário de Intensidade de Medo</h2>

    <form method="GET" action="/results">
        <div class="mb-3">
        <select class="form-control" name="selected_file" onchange="this.form.submit()">
    <option value="">Selecione um resultado</option>
    @foreach($fileOptions as $fileOption)
        @php
            // Extraia a data e a hora do nome do arquivo
            $dateString = substr($fileOption, 8, 19);  // answers_YYYY-MM-DD_HH-MM-SS.json
            $dateTime = DateTime::createFromFormat('Y-m-d_H-i-s', $dateString);
            $formattedDate = $dateTime->format('d/m/Y H:i');
        @endphp
        <option value="{{ $fileOption }}" {{ $fileOption == $selectedFile ? 'selected' : '' }}>
            {{ $formattedDate }}
        </option>
    @endforeach
</select>
        </div>
    </form>

    @if(!empty($results))
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Perguntas</th>
                <th>Nota</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $question => $answer)
                <tr>
                    <td>{{ $question }}</td>
                    <td>{{ $answer }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>
