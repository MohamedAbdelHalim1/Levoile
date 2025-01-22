

$(function (e) {
  //______Data-Table
  $("#data-table").DataTable({
    language: {
      searchPlaceholder: "Search...",
      sSearch: "",
    },
  });

  // ______Select2
  $(".select2").select2({
    minimumResultsForSearch: Infinity,
    width: '60px'
  });
});

$(function(e){
  'use strict'

	/*Chart2 js*/
	var options = {
		chart: {
			height: 395,
			width: "100%",
			type: 'bar',
			stacked: true,
			stackType: '100%',

      toolbar: {
        show: false,
      }
		},
		plotOptions: {
			bar: {
				horizontal: true,
			},

		},
    grid: {
      borderColor: 'rgba(119, 119, 142, 0.08)',
    },

		stroke: {
			width: 1,
			colors: ['#fff']
		},
		series: [{
			name: 'Usa',
			data: [44, 55, 41, 37, 22, 43, 32]
		},{
			name: 'India',
			data: [53, 32, 33, 52, 13, 43, 32]
		},{
			name: 'Russia',
			data: [17, 14, 13, 18, 15, 12, 14]
		},{
			name: 'Canada',
			data: [18, 15, 20, 12, 15, 9, 18]
		}
        ,{
			name: 'Japan',
			data: [10, 15, 13, 8, 16, 9, 18]
		},
        {
			name: 'Australia',
			data: [20, 25, 22, 19, 22, 15, 16]
		}
        ,{
			name: 'Mexico',
			data: [18, 24, 16, 22, 13, 17, 21]
		},
        {
			name: 'Germany',
			data: [25, 12, 19, 32, 25, 24, 30]
		}],
		colors: ['#467fcf', '#5eba00', '#ffca4a', '#ff6666' ,'#867efc', '#3ec7e8', '#2bb4a6', '#00C851'],
		title: {
			text: ''
		},
		xaxis: {
			categories: [2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021],
      axisBorder: {
        show: true,
        color: 'rgba(119, 119, 142, 0.05)',
      },
      axisTicks: {
        show: true,
        color: 'rgba(119, 119, 142, 0.05)',
      },
		},

		tooltip: {
				y: {
					formatter: function(val) {
					return val + "K"
				}
			}
		},
		fill: {
			opacity: 1
		},

		legend: {
			position: 'top',
			horizontalAlign: 'left',
			offsetX: 40
		}
	}

   var chart = new ApexCharts(
		document.querySelector("#sales-country-wise"),
		options
	);

	chart.render();
	/*Chart2 js*/

	/*Chart3 js*/
	var options = {
    series: [55, 78, 35, 25],
    labels: ['USA', 'INDIA', 'RUSSIA', 'CANADA'],
    chart: {
      height: 250,
      type: 'donut',
    },
    dataLabels: {
      enabled: false,
    },
  
    legend: {
      show: false,
    },
     stroke: {
      show: true,
      width:0
    },
    plotOptions: {
    pie: {
      donut: {
        size: '84%',
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
            // formatter: function (w) {
            //   return w.globals.seriesTotals.reduce((a, b) => {
            // 	return a + b
            //   }, 0)
            // }
            }
  
        }
      }
    }
    },
    responsive: [{
      options: {
        legend: {
          show: false,
        }
      }
    }],
    
    colors: ["#5eba00", '#467fcf', '#3ec7e8', "#ffc107", "#5c509b"],
  };
  var chart = new ApexCharts(document.querySelector("#recent-orders"), options);
  chart.render();
	/*Chart3 js*/	
	
  $('.resp-tabs-list .home-sparic').addClass('active');
	$('.second-sidemenu .home-sparic').addClass('resp-tab-content-active');


 });

 