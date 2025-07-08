<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>
<body>
    
<h1>
    <?php echo $usuario['nome'] ?? '' ?>
    <a id="btn_logout" href="/logout">Sair</a>
</h1>

Listar tarefas
<p style="text-align:right;">
    <a href="/tarefa/incluir">Adicionar</a>
</p>
<table>
    <thead>
        <tr>
            <td>id</td>  <td>titulo</td> <td>descricao</td> <td>Ação</td>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($tarefas as $tarefa){
            echo "<tr> <td>{$tarefa['id']}</td> <td>{$tarefa['titulo']}</td>
                <td>{$tarefa['descricao']}</td>
                 <td>
                  <i class='far fa-edit'></i>
                  <i class='fas fa-trash-alt'></i>
                 </td>
            </tr>";
        }
    ?>
    </tbody>
</table>

</body>
</html>