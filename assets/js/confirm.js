function confirmar(cod){
    if (window.confirm("Você realmente quer apagar essa despesa?")) {
        location.href="/ClubeDeRegatasDoFlamengo/controllers/excluirDespesa.php?cod="+cod;
      }
}