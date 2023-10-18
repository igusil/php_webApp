<?php 
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

$query_usuarios = "SELECT id, nome, email FROM usuarios LIMIT 10";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();

$dados = "<div class='table-responsive'>
            <table class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações - $pagina</th>
                    </tr>
                </thead>
                <tbody>";
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
  //var_dump($row_usuario);

  extract($row_usuario);
  $dados .= "<tr><td>$id</td><td>$nome</td><td>$email</td><td>Ações</td></tr>";
}

$dados .= 
    "</tbody>
  </table>
</div>";

echo $dados;
