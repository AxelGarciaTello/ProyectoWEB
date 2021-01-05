function graficoGeneral(){
    $.ajax({
      url:'CalificacionesGeneral.php',
      type: 'POST'
    }).done(function(resp){
      var valores = eval(resp);

          var cal0 = valores[0];
          var cal1 = valores[1];
          var cal2 = valores[2];
          var cal3 = valores[3];
          var cal4 = valores[4];
          var cal5 = valores[5];
          var cal6 = valores[6];
          var cal7 = valores[7];
          var cal8 = valores[8];
          var cal9 = valores[9];
          var cal10 = valores[10];

          document.getElementById('promedioGeneral').innerHTML='<h5>Promedio: '+valores[11]+'</h5>';
          var contexto = document.getElementById('graficoGeneral').getContext('2d');
          var myChart = new Chart(contexto,{
            type: 'doughnut',
            data: {
              
              labels: ['0','1','2','3','4','5','6','7','8','9','10'],
              datasets: [{
                label: 'Calificaciones Generales',
                backgroundColor:[ 'rgba(3,9,240,0.94)',
                                  'rgba(3,108,255,0.94)',
                                  'rgba(111,101,209,0.94)',
                                  'rgba(183,91,239,0.94)',
                                  'rgba(255,73,204,0.94)',                                    
                                  'rgba(255,79,161,0.94)',
                                  'rgba(255,113,117,0.94)',
                                  'rgba(255,159,76,0.94)',
                                  'rgba(255,203,47,0.94)',
                                  'rgba(255,244,49,0.94)',
                                  'rgba(255,240,120,0.94)'
                ],
                borderColor: 'rgba(52,68,112,0.44)',
                highlightfill: 'rgba(30,72,189,0.74)',
                highlightStroke: 'rgba(18,43,112,0.44)',
                data: [cal0,cal1,cal2,cal3,cal4,cal5,cal6,cal7,cal8,cal9,cal10],
                borderWidth: 1
              }]
            },
            options: {
              legend: {
                display: true,
                labels: {
                fontColor: 'rgb(0,0,0)'
                },
                position: 'bottom' 
              },
              title: {
                display: true,
                text: 'Calificaciones Generales',
                position: 'top'
              }
            }
          });
    });
    
}

function graficoHorario(resp){
    var contexto = document.getElementById('graficoGrupo').getContext('2d');
    if (window.grafica) {
      window.grafica.clear();
      window.grafica.destroy();
    }
    if(resp != ""){
      $.ajax({
      url:'CalificacionesHorario.php',
      type: 'POST',
      data: 'resp='+resp
      }).done(function(resp){ 
        var valores = eval(resp);

        var cal0 = valores[0];
        var cal1 = valores[1];
        var cal2 = valores[2];
        var cal3 = valores[3];
        var cal4 = valores[4];
        var cal5 = valores[5];
        var cal6 = valores[6];
        var cal7 = valores[7];
        var cal8 = valores[8];
        var cal9 = valores[9];
        var cal10 = valores[10];

        document.getElementById('promedioGrupo').innerHTML='<h5>Promedio: '+valores[11]+'</h5>';
        window.grafica = new Chart(contexto,{
          type: 'bar',
          data: {      
            labels: ['0','1','2','3','4','5','6','7','8','9','10'],
            datasets: [{
              backgroundColor:[ 'rgba(0,9,100,0.94)',
                                'rgba(3,45,109,0.94)',
                                'rgba(0,66,130,0.94)',
                                'rgba(0,88,150,0.94)',
                                'rgba(17,111,170,0.94)',                                    
                                'rgba(37,154,188,0.94)',
                                'rgba(59,157,206,0.94)',
                                'rgba(81,181,223,0.94)',
                                'rgba(106,205,239,0.94)',
                                'rgba(132,229,255,0.94)',
                                'rgba(152,247,255,0.94)'
              ],
              borderColor: 'rgba(52,68,112,0.44)',
              highlightfill: 'rgba(30,72,189,0.74)',
              highlightStroke: 'rgba(18,43,112,0.44)',
              data: [cal0,cal1,cal2,cal3,cal4,cal5,cal6,cal7,cal8,cal9,cal10],
              borderWidth: 1
            }]
          },
          options: {
            legend: {
              display: false,
            },
            scales: {
              yAxes: [{
                scaleLabel: {
                  display: true,
                  labelString: 'Alumnos'
                }
              }],
              xAxes: [{
                scaleLabel: {
                  display: true,
                  labelString: 'Calificaciones'
                }
              }]
            }            
          }
        });
      });
    }
    else{
      document.getElementById('promedioGrupo').innerHTML='<h5></h5>';
     window.grafica = new Chart(contexto,null);
    }
}

function graficoGenero(){
  $.ajax({
    url:'ConsultaGenero.php',
    type: 'POST'
  }).done(function(resp){
    var valores = eval(resp);

        var hombre = valores[0];
        var mujer = valores[1];


        var contexto = document.getElementById('graficoGenero').getContext('2d');
        var myChart = new Chart(contexto,{
          type: 'pie',
          data: {
            
            labels: ['Hombre','Mujer'],
            datasets: [{
              label: 'Calificaciones Generales',
              backgroundColor:[ 'rgba(3,9,240,0.94)',
                                'rgba(253,31,230,0.94)'
              ],
              borderColor: 'rgba(0,0,0,1)',
              highlightfill: 'rgba(30,72,189,0.74)',

              data: [hombre,mujer],
              borderWidth: 1
            }]
          },
          options: {
              legend: {
              display: true,
              labels: {
              fontColor: 'rgb(0,0,0)'
              },
              position: 'bottom' 
            },
            title: {
              display: true,
              text: '',
              position: 'top'
            }
          }
        });
  });
  
}