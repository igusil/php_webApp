const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");
const msgAlerta = document.getElementById("msgAlerta");

const listarUsuarios = async (pagina) => {
  const dados = await fetch("./list.php?pagina=" + pagina);
  const resposta = await dados.text();
  tbody.innerHTML = resposta;
}

listarUsuarios(1);

cadForm.addEventListener("submit", async(e) => {
  e.preventDefault();
  
  const dadosForm = new FormData(cadForm);
  dadosForm.append("add", 1);
  //console.log(dadosForm)

  const dados = await fetch("cadastrar.php", {
    method:"POST",
    body: dadosForm,
  });
  
  const resposta = await dados.json();
  console.log(resposta);
  if(resposta['erro']){
    msgAlerta.innerHTML = resposta['msg'];
  } else{
    msgAlerta.innerHTML = resposta['msg'];
  }
});
