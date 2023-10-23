<?php 
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)){

  //calcular o inicio visualização
  $qnt_result_pg = 5; //Quantidade de registro por pagina
  $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
  //

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
  $dados .= "<tr><td>$id</td><td>$nome</td><td>$email</td><td>Ações</td></tr>";
}

$dados .= "</tbody>
  </table>
</div>";

//pagination - sum qnt users
$query_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
$result_pg = $conn->prepare($query_pg);
$result_pg->execute();
$row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

//qnt pages
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
//16 / 10//

  $max_links = 1;

  $dados .= "<nav aria-label='Page navigation'><ul class='pagination pagination-sm justify-content-center'>";
  $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios(1)'>Primeira</a></li>";
  
  for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++) {
    if($pag_ant >= 1) {
      $dados .= "<li class='page-item'><a class='page-link' onclick='listarUsuarios($pag_ant)' href='#'>$pag_ant</a></li>";
    }
  }
  
  $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

  for($pag_dep = $pagina +1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
    if($pag_dep <= $quantidade_pg) {
      $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
    }
  }
  
  $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Última</a></li>";
  
  $dados .= "</ul></nav>";

  echo $dados;

} else {
  echo"<div class='alert alert-danger' role='alert'>Erro: Nenhum usuario encontrado!</div";
}