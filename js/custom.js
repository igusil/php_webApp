const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");

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
  
  await fetch("cadastrar.php", {
    method:"POST",
    body: dadosForm,
  });
});