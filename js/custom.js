const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));
const listarUsuarios = async (pagina) => {
  const dados = await fetch("./list.php?pagina=" + pagina);
  const resposta = await dados.text();
  tbody.innerHTML = resposta;
}
listarUsuarios(1);
cadForm.addEventListener("submit", async(e) => {
  e.preventDefault();

  if(document.getElementById("nome"),value =="") {
    console.log("erro: necessario preencher o campo nome 1");
    msgAlertaErroCad.innerHTML = "erro: necessario preencher o campo nome 1";
  }
  const dadosForm = new FormData(cadForm);
  dadosForm.append("add", 1); 
  document.getElementById("cad-usuario-btn").value = "Salvando..";
  const dados = await fetch("cadastrar.php", {
    method:"POST",
    body: dadosForm,
  });
  
  const resposta = await dados.json();
  console.log(resposta);
  if(resposta['erro']){
    msgAlertaErroCad.innerHTML = resposta['msg'];
  }else{
    msgAlerta.innerHTML = resposta['msg'];
    cadForm.reset();
    cadModal.hide();
    listarUsuarios(1);
  }
  document.getElementById("cad-usuario-btn").value = "Cadastrar";
});
