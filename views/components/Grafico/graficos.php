<?php 
    if ($_SESSION["session"] == "validated" && $_SESSION["id_usuario"] != 0 && $_SESSION["id_rol"] == 1 or $_SESSION["id_rol"] == 2) {
    $valoresY=array();#cantidad
    $valoresX=array();#estado

    foreach($mostrar as $ver) {
    $valoresY[]=$ver[1];
    $valoresX[]=$ver[0];
    }

    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
?>

    <div class="card p-3 col-md-12">
        <div class="card-header bg-primary">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-header"><i class="fas fa-chart-bar"></i> Grafica de los pedidos</h3>
                
            </div>
        </div>
        </div>
        <div class="card-body">
            <div id="graficabarra"></div>
        </div>
    </div>


<script type="text/javascript">
function crearCadenaBarra(json) {
    var parsed = JSON.parse(json);
    var arr = [];
    for (var x in parsed) {
        arr.push(parsed[x]);
    }
    return arr;
}
</script>
<script type="text/javascript">
datosX = crearCadenaBarra('<?php echo $datosX ?>');
datosY = crearCadenaBarra('<?php echo $datosY ?>');

var trace0 = {
    type: 'bar',
    x: datosX,
    y: datosY,
    width: [0.4, 0.4, 0.4, 0.4, 0.4],
    /* marker: {
        color: ['blue','gray','green','turquoise']
    } */
    textposition: 'auto',
    hoverinfo: 'none',
    opacity: 0.5,
    marker: {
        color: 'rgb(158,202,225)',
        line: {
            color: 'rgb(8,48,107)',
            width: 1.5
        }
    }
};

var data = [trace0];
var layout = {
    title: 'GRAFICA DE TOTAL DE PEDIDOS SEGUN ESTADO',
    barmode: 'group'
};

Plotly.newPlot('graficabarra', data, layout);
</script>
<?php
    }else {
		
        error403();
	}
?>