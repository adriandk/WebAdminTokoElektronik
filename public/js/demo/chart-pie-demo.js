// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function generateHSLColors(count) {
    let backgroundColors = [];
    let hoverBackgroundColors = [];

    for (let i = 0; i < count; i++) {
        const hue = ((i * 360) / count) % 360;
        backgroundColors.push(`hsl(${hue}, 70%, 60%)`);
        hoverBackgroundColors.push(`hsl(${hue}, 70%, 50%)`);
    }

    return { backgroundColors, hoverBackgroundColors };
}

// Pie Chart Example
var ctx = document.getElementById("myPieChart");

if (pieLabels.length > 0) {
    const colors = generateHSLColors(pieLabels.length);
    var myPieChart = new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: pieLabels,
            datasets: [
                {
                    data: pieValues,
                    backgroundColor: colors.backgroundColors,
                    hoverBackgroundColor: colors.hoverBackgroundColors,
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                },
            ],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: "#dddfeb",
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            cutoutPercentage: 80,
        },
    });
} else {
  document.getElementById('myPieChart').parentElement.innerHTML = '<p class="text-center text-muted">Tidak ada data untuk ditampilkan</p>';
}