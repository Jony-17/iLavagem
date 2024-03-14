$(document).ready(function () {
  var subtotal = document.getElementById("subtotal");
  var ptotal = 0,
    ppack = 0,
    pengomaria = 0,
    plavseco = 0,
    ptinturaria = 0,
    servico1 = "",
    servico2 = "",
    servico3 = "",
    servico4 = "",
    localrecolha,
    localentrega;

  function updatepreco() {
    ptotal = ppack + pengomaria + plavseco + ptinturaria;
    ptotal = Math.round(ptotal * 100) / 100;
    subtotal.innerHTML = "Sub-total: " + ptotal + "€";
  }

  updatepreco();

  var lavesec = $("#pack");

  lavesec.change(function () {
    if (lavesec.val() == 1) {
      ppack = 6;
      servico1 = "5 a 9kg";
    } else if (lavesec.val() == 2) {
      ppack = 8;
      servico1 = "9 a 14kg";
    } else if (lavesec.val() == 3) {
      ppack = 9.9;
      servico1 = "14 a 19kg";
    } else {
      ppack = 0;
      servico1 = "";
    }
    updatepreco();
  });

  var engomaria = $("#engomar");

  engomaria.change(function () {
    if (engomaria.val() == 1) {
      pengomaria = 1;
      servico2 = "1 peça";
    } else if (engomaria.val() == 2) {
      pengomaria = 13.5;
      servico2 = "15 peças";
    } else if (engomaria.val() == 3) {
      pengomaria = 17;
      servico2 = "20 peças";
    } else if (engomaria.val() == 4) {
      pengomaria = 24;
      servico2 = "30 peças";
    } else if (engomaria.val() == 5) {
      pengomaria = 35;
      servico2 = "mais de 50 peças";
    } else {
      pengomaria = 0;
      servico2 = "";
    }
    updatepreco();
  });

  var lavseco = $("#seco");

  lavseco.change(function () {
    if (lavseco.val() == 1) {
      plavseco = 8.2;
      servico3 = "Kispo";
    } else if (lavseco.val() == 2) {
      plavseco = 8.5;
      servico3 = "Casaco com penas";
    } else if (lavseco.val() == 3) {
      plavseco = 3.7;
      servico3 = "Casaco de malha";
    } else if (lavseco.val() == 4) {
      plavseco = 7.5;
      servico3 = "Fato";
    } else if (lavseco.val() == 5) {
      plavseco = 50;
      servico3 = "Vestido de noiva";
    } else if (lavseco.val() == 6) {
      plavseco = 17;
      servico3 = "Vestido de cerimónia";
    } else if (lavseco.val() == 7) {
      plavseco = 3.5;
      servico3 = "Camisola";
    } else if (lavseco.val() == 8) {
      plavseco = 3.7;
      servico3 = "Camisa";
    } else if (lavseco.val() == 9) {
      plavseco = 3.8;
      servico3 = "Calças";
    } else {
      plavseco = 0;
      servico3 = "";
    }
    updatepreco();
  });

  var qtinturaria = $("#qnttinturaria");

  qtinturaria.change(function () {
    if ($.isNumeric(qtinturaria.val()) || qtinturaria.val() == "") {
      if (qtinturaria.val() < 0) {
        alert("Insira um valor válido.");
      } else {
        var quantidade = qtinturaria.val();
        ptinturaria = quantidade * 12;
      }
      if (qtinturaria.val() == "") {
        var quantidade = 0;
        ptinturaria = quantidade * 12;
      }
    } else {
      alert("Insira um número");
      qtinturaria.val("");
    }
    updatepreco();
    var qnt = quantidade.toString();
    servico4 = qnt + " peças";
  });

  mesmolocal = $("#mmrua");

  mesmolocal.change(function () {
    if (mesmolocal.val() == "1") {
      $("#localentrega").hide();
    }
    if (mesmolocal.prop("checked") == false) {
      $("#localentrega").show();
    }
  });

  $("button").click(function (event) {
    event.preventDefault();
    if (ptotal != 0) {
      if (mesmolocal.val() == "1") {
        localrecolha = $("#localr").val();
        localentrega = localrecolha;
      }
      if (mesmolocal.prop("checked") == false) {
        localrecolha = $("#localr").val();
        localentrega = $("#locale").val();
      }
      
      $.post('function.php' , {
        'servico1': servico1,
        'ppack': ppack,
        'servico2': servico2,
        'pengomaria': pengomaria,
        'servico3': servico3,
        'plavseco': plavseco,
        'servico4': servico4,
        'ptinturaria': ptinturaria,
        'ptotal': ptotal,
        'localrecolha': localrecolha,
        'localentrega': localentrega
      }, function(){
        window.location="../encomenda/";
      });
    } else {
      alert("Não selecionou nenhum serviço!");
    }
  });
});
