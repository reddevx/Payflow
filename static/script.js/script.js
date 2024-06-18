document.getElementById('dark-mode-toggle').onclick = function() {
  document.documentElement.classList.toggle('dark');
};

// Script para limpar os campos
function limparCampos() {
  document.getElementById("tipo").value = "Entrada";
  document.getElementById("descricao").value = "";
  document.getElementById("valor").value = "";
  document.getElementById("data").value = "";
  document.getElementById("forma_pagamento").value = "Dinheiro";
  document.getElementById("liquidado").checked = true;
}

