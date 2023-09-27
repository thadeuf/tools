<!DOCTYPE html>
<html>
<head>
    <title>Resultados da Evidência dos Pensamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Resultados da Evidência dos Pensamentos</h2>

        <form method="GET" action="/eresults">
            <select name="selected_file">
                @foreach($fileOptions as $file)
                    <option value="{{ $file }}" {{ $selectedFile == $file ? 'selected' : '' }}>
                        {{ $file }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Mostrar Resultado</button>
        </form>

        @if($results)
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Pensamento</th>
                    <th>A Favor</th>
                    <th>Contra</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{!! nl2br(e($results['pensamento'])) !!}</td>
                    <td>{!! nl2br(e($results['a_favor'])) !!}</td>
                    <td>{!! nl2br(e($results['contra'])) !!}</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>

<!-- Bootstrap JS, Popper.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
