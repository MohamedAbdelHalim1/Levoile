$(function (e) {
	//______Data-Table
	$("#data-table3").DataTable({
	  language: {
		searchPlaceholder: "Search...",
		sSearch: "",
	  },
	});

    //______Select2
	$(".select2").select2({
        minimumResultsForSearch: Infinity,
        width: '60px'
    });

});


$(function(e){
  'use strict'

	/* Chartjs (#total-customers) */
	
    var options = {
        series: [44, 55, 17],
        chart: {
            height: 265,
            type: 'donut',
        },
      
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
          },
        plotOptions: {
            pie: {
              donut: {
                size: '75%',
                background: 'transparent',
                labels: {
                  show: true,
                  name: {
                    show: true,
                    fontSize: '20px',
                    color:'#495057',
                    offsetY: -4
                  },
                  value: {
                    show: true,
                    fontSize: '18px',
                    color: undefined,
                    offsetY: 8,
                    formatter: function (val) {
                      return val + "%"
                    }
                  },
                  total: {
                    show: true,
                    showAlways: true,
                    label: 'Total',
                    fontSize: '22px',
                    fontWeight: 600,
                    color: '#495057',
                    }
          
                }
              }
            }
        },
      responsive: [{
        breakpoint: 320,
        options: {
          chart: {
            width: 250
          },
          legend: {
            show: false,
            position: 'top'
          }
        }
      }],

      colors: ["#467fcf", '#5eba00', '#f35e90'],
      
    };

      var chart = new ApexCharts(document.querySelector("#Viewing_Devices"), options);
      chart.render();
	/* Chartjs (#total-customers) closed */

});
