(function($) {
    "use strict"

    //basic bar chart

    const barChart_1 = document.getElementById("barChart_1").getContext('2d');
    
    barChart_1.height = 100;

    new Chart(barChart_1, {
        type: 'bar',
        data: {
            defaultFontFamily: 'Poppins',
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Augs", "Sept", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40, 20, 30, 40, 30, 40],
                    borderColor: 'rgba(26, 51, 213, 1)',
                    borderWidth: "0",
                    backgroundColor: 'rgba(26, 51, 213, 1)'
                }
            ]
        },
        options: {
            legend: false, 
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    // Change here
                    barPercentage: 0.5
                }]
            }
        }
    });


})(jQuery);