$(document).ready(function (){
  $('form').submit(function (event){
    event.preventDefault();
    var nome=$('#nome').val();
    var email=$('#emaili').val();
    var assunto=$('#assunto').val();
    var mensagem=$('#msg').val(); 

    if(nome=="" ||  email==""){
      alert("O envio não foi conseguido, verifique se preencheu os campos obrigatórios (*).");
    }else{
      
      //alert("Dados enviados com sucesso!");
      $.ajax({
        type: 'POST',
        url: 'functions.php',
        data: {nome:nome,email:email,assunto:assunto,mensagem:mensagem}, 
        //success: function(output) {
          //alert(output); 
        //}    
        }).done(function(result){
          alert(result);
          $('#nome').val('');
          $('#emaili').val('');
          $('#assunto').val('');
          $('#msg').val(''); 
        });

    }

  });
});