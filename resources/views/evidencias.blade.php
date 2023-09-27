<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidência dos Pensamentos</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-1">COLOCANDO OS</h2>
    <h3 class="mb-4">PENSAMENTOS EM EVIDÊNCIA</h3>
    <p>Esse exercício vai te auxiliar a colocar seus pensamentos automáticos em evidência, mais do que isso, vai te dar a possibilidade de questioná-los. Ele funciona assim: Escreva um pensamento e após isso liste as evidências que reforçam esse pensamento (a favor) e as que o enfraquecem (contra).</p>

    <form action="{{ route('evidencias.save') }}" method="post">
    @csrf 
        <div class="mb-3">
            <label for="pensamento" class="form-label"><strong>PENSAMENTO</strong></label>
            <textarea class="form-control" id="pensamento" name="pensamento" rows="2"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="a_favor" class="form-label"><strong>A FAVOR</strong></label>
                <textarea class="form-control" id="a_favor" name="a_favor" rows="4"></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label for="contra" class="form-label"><strong>CONTRA</strong></label>
                <textarea class="form-control" id="contra" name="contra" rows="4"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('eresults') }}" class="btn btn-secondary mt-3 ml-2">Ver Resultados</a>
    </form>
</div>

<!-- Bootstrap JS, Popper.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
