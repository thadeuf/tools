<!DOCTYPE html>
<html>
<head>
    <title>Montando minha lista de problemas</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">MONTANDO MINHA</h2>
    <h3 class="mb-4">LISTA DE PROBLEMAS</h3>
    <p>
    A lista de problemas é um recurso importante na TCC, onde você pode articular de forma clara os problemas que deseja trabalhar na terapia .Nesta lista, tentaremos identificar os fatores que mantem essas emoções desagradáveis ou causam prejuízo em sua vida.
    <br><br><strong>Instruções</strong>
    Use a primeira coluna para identificar os problemas nos quais você deseja trabalhar. Na segunda coluna, descreva os padrões de pensamento ou comportamento disfuncionais. Na terceira coluna, descreva quaisquer déficits de habilidades ou conhecimento que limitem sua compreensão do problema.    


    </p>

    <form action="{{ route('problemas.save') }}" method="post">
                @csrf
    
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Problema</th>
                    <th>Como me afeta?</th>
                    <th>O que não entendo...</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            
                <tr>
                    <td><input type="text" class="form-control" name="situacao[]"></td>
                    <td><input type="text" class="form-control" name="pensamentos[]"></td>
                    <td><input type="text" class="form-control" name="pior[]"></td>
                    <td><!--<button type="button" class="btn btn-danger removeRow">-</button>--></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-3">
        <button type="button" class="btn btn-primary" id="addRow">Adicionar linha</button>
<button type="submit" class="btn btn-success ml-2">Salvar</button>
<a href="{{ route('proresults') }}" class="btn btn-secondary ml-2">Ver Resultados</a>

</div>

    </form>
</div>

<!-- Bootstrap JS, Popper.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<script>
document.getElementById('addRow').addEventListener('click', function() {
    const tbody = document.getElementById('tableBody');
    
    const tr = document.createElement('tr');

    // Criando colunas (td) para cada campo do formulário
    const fields = ['situacao', 'pensamentos', 'pior'];
    fields.forEach(field => {
        const td = document.createElement('td');
        
        const input = document.createElement('input');
        input.type = 'text';
        input.name = field + '[]';
        input.className = 'form-control';
        td.appendChild(input);

        tr.appendChild(td);
    });

    // Adicionando botão para remover a linha
    const tdRemove = document.createElement('td');
    const btnRemove = document.createElement('button');
    btnRemove.textContent = '-';
    btnRemove.className = 'btn btn-danger removeRow';
    btnRemove.type = 'button';
    btnRemove.onclick = function() {
        tr.remove();
    };
    tdRemove.appendChild(btnRemove);
    tr.appendChild(tdRemove);

    tbody.appendChild(tr);
});

</script>
</body>
</html>
