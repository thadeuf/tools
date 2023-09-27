<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visão Flexível vs Inflexível</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Visão</h2>
    <h3 class="mb-4">Flexível vs Inflexível</h3>
    <p>O sofrimento muitas vezes está associado à inflexibilidade psicológica. Esse conceito se refere a tendência das pessoas de se prenderem a pensamentos e comportamentos rígidos, evitando ou resistindo a mudanças.  Marque, em uma escala de 1 a 6, quais pensamentos você mais se aproxima.</p>


    <form action="{{ route('inflexivel.save') }}" method="POST">
    @csrf
    <table class="table mt-4">
        
        <tbody>
            @php
            $inflexibleAffirmations = [
                "Tenho resistência em aceitar situações ou experiências que considero negativas ou indesejadas",
                "Tento controlar as minhas emoções, pensamentos e comportamentos, principalmente os indesejáveis",
                "Sou duro comigo mesmo e me julgo quando as coisas não saem como planejadas",
                "Tenho dificuldade de me conectar com os meus valores e com o que realmente importa para mim",
                "Tem ideias fixas sobre mim, os outros e a realidade, e tenho dificuldades em considerar outras perspectivas"
            ];

            $flexibleAffirmations = [
                "Tenho tendência a aceitar situações e experiências, mesmo quando difíceis ou incertas.",
                "Me sinto capaz de selecionar e ajustar minhas emoções, pensamentos e comportamentos de forma consciente, sem me prender a eles",
                "Sou compreensivo comigo mesmo quando as coisas não saem como planejadas",
                "Me sinto capaz de questionar e considerar diferentes perspectivas e crenças",
                "Sou capaz de questionar e considerar diferentes perspectivas e crenças"
            ];
            @endphp

            @foreach($inflexibleAffirmations as $index => $affirmation)
<tr>
    <td class="col-md-4">{{ $affirmation }}</td>
    <td class="col-md-4">
        <!-- Adicionando campo escondido para afirmação inflexível -->
        <input type="hidden" name="inflexible[{{$index}}]" value="{{ $affirmation }}">

        <select class="form-control" name="answers[{{$index}}]">
            @for($j=0; $j<=6; $j++)
                <option value="{{ $j }}">{{ $j }}</option>
            @endfor
        </select>
    </td>
    <td class="col-md-4">{{ $flexibleAffirmations[$index] }}</td>

    <!-- Adicionando campo escondido para afirmação flexível -->
    <input type="hidden" name="flexible[{{$index}}]" value="{{ $flexibleAffirmations[$index] }}">
</tr>
@endforeach

        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('iresults') }}" class="btn btn-secondary mt-3 ml-2">Ver Resultados</a>
</form>

</div>

<!-- Bootstrap JS, Popper.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
