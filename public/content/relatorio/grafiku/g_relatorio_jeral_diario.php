<?php
$labels = array();
$osan_tama = array();
$osan_sai = array();
foreach ($relatorio_diario as $loop) {
    $labels[] = $loop['data'];
    $osan_tama[] = $loop['osan_tama'];
    $osan_sai[] = $loop['osan_sai'];
}
?>

<canvas id="diario" width="400" height="200"></canvas>

<script>
    // Data for the chart
    var labels = <?php echo json_encode($labels); ?>; // Assuming $labels is the PHP variable with your label values
    var osan_tama = <?php echo json_encode($osan_tama); ?>;
    var osan_sai = <?php echo json_encode($osan_sai); ?>;

    var data = {
        labels: labels,
        datasets: [{
                label: "Osan Tama",
                data: osan_tama,
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            },
            {
                label: "Osan Sai",
                data: osan_sai,
                backgroundColor: "rgba(192, 75, 192, 0.2)",
                borderColor: "rgba(192, 75, 192, 1)",
                borderWidth: 1
            }
        ]
    };

    // Configuration options
    var options = {
        indexAxis: 'x',
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Grafiku Diariu',
                font: {
                    size: 16
                }
            }
        }
    };

    // Get the context of the canvas element
    var ctx = document.getElementById("diario").getContext("2d");

    // Create the chart
    var diario = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
    });
</script>