<!DOCTYPE html>
<html>
<head>
    <title>Monitorando os Pensamentos Ansiosos</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-3">Monitorando os</h2>
    <h3 class="mb-4">Pensamentos Ansiosos</h3>
    <p>Comece a identificar e anotar as situações que te deixaram ansioso, avaliando numa escala de 0 a 10 o nível de intensidade dessa ansiedade, sendo 0 o menor nível e 10 o maior. Anote também os pensamentos que teve nesse momento, bem como o que de pior pensou que aconteceria.</p>

    <form action="{{ route('pensamentos.save') }}" method="post">
                @csrf
    
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Situação</th>
                    <th>Pensamentos</th>
                    <th>Intensidade</th>
                    <th>O que de pior achei que aconteceria</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="tableBody">
            
                <tr>
                    <td><input type="text" class="form-control" name="situacao[]"></td>
                    <td><input type="text" class="form-control" name="pensamentos[]"></td>
                    <td>
                        <select class="form-control" name="intensidade[]">
                            @for($i=0; $i<=10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="pior[]"></td>
                    <td><button type="button" class="btn btn-danger removeRow">-</button></td>
                </tr>
            </tbody>
        </table>
        <div class="mt-3">
        <button type="button" class="btn btn-primary" id="addRow">Adicionar linha</button>
<button type="submit" class="btn btn-success ml-2">Salvar</button>
<a href="{{ route('presults') }}" class="btn btn-secondary ml-2">Ver Resultados</a>

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
        const fields = ['situacao', 'pensamentos', 'intensidade', 'pior'];
        fields.forEach(field => {
            const td = document.createElement('td');
            
            if (field === 'intensidade') {
                const select = document.createElement('select');
                select.name = field + '[]';
                select.className = 'form-control';
                
                for (let i = 0; i <= 10; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    select.appendChild(option);
                }
                
                td.appendChild(select);
            } else {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = field + '[]';
                input.className = 'form-control';
                td.appendChild(input);
            }

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
