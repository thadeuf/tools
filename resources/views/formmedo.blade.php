<!DOCTYPE html>
<html>
<head>
    <title>Questionário de Intensidade de Medo</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Entendendo seu nível</h2>
    <p class="mb-2">de medo a lugares e situações</p>
    <p class="mb-4">Leia cada situação abaixo e marque uma nota de 0 a 10 de acordo com o seu sentimento em relação a elas, sendo 0 a menor e 10 a maior intensidade.</p>

    <form action="{{ route('formmedo.save') }}" method="post">
    @csrf

    <table class="table">
        <thead>
        <tr>
            <th>Perguntas</th>
            <th>Nota</th>
        </tr>
        </thead>
        <tbody>
        @php
            $questions = [
                "Fico tenso, incomodado ou com medo de andar em transportes públicos",
                "Fico tenso, incomodado ou com medo de ficar em lugares como supermercados, estacionamento, etc",
                "Fico tenso, incomodado ou com medo de permanecer em locais fechados", 
                "Fico tenso, incomodado ou com medo de ficar em uma fila com muitas pessoas",
                "Fico tenso, incomodado ou com medo de permanecer no meio de uma multidão",
                "Tenho medo de sair de casa sozinho",
                "Quando estou num local com muitas pessoas, parece que vou sufocar e passar mal",
                "Quando estou num local fechado com pessoas, parece que não vou ter pra onde escapar",
                "Gosto de evitar lugares com muitas pessoas, certamente em casa me sinto mais aliviado",
            ];
        @endphp

        @foreach($questions as $index => $question)
    <tr>
        <td>{{ $question }}</td>
        <td>
            <select class="form-control" name="answers[{{ $question }}]">
                @for($i=0; $i<=10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </td>
    </tr>
@endforeach
    </table>
    <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    <a href="{{ route('results') }}" class="btn btn-secondary mt-3 ml-2">Ver Resultados</a>
</form>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS, Popper.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
