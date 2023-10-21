<?php
include_once "conexao.php"
?>
<!---->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                <h4>Listar Usuários</h4>
                </div>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cadUsuarioModal">Cadastar</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <span class="listar-usuarios"></span>   
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cadUsuarioModal" tabindex="-1" aria-labelledby="cadUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadUsuarioModalLabel">Cadastrar Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="cad-usuario-form">
                    <div class="mb-3">
                        <label for="nome" class="col-form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Digite o seu melhor e-mail" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-outline-primary btn-sm" id="cad-usuario-btn" value="Cadastrar"/>
                    </div>
                </form>

                </div>
                
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/custom.js"></script>

</body>
</html>
