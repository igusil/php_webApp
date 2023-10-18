<?php 
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)){

  //calcular o inicio visualização
  $qnt_result_pg = 10; //Quantidade de registro por pagina
  $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
  // 1 * 10 = 10 - 10 = 0

$query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();

$dados = "<div class='table-responsive'>
            <table class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>";
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
  //var_dump($row_usuario);

  extract($row_usuario);
  $dados .= "<tr><td>$id</td><td>$nome</td><td>$email</td><td>Ações - $pagina</td></tr>";
}

$dados .= "</tbody>
  </table>
</div>";

echo $dados;

} else {
  echo"<div class='alert alert-danger' role='alert'>Erro: Nenhum usuario encontrado!</div";
}