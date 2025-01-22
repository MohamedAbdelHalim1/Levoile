$(function (e) {
	//______Data-Table
	$("#data-table5").DataTable({
	  language: {
		searchPlaceholder: "Search...",
		sSearch: "",
	  },
	});

	//______Select2
	$(".select2").select2({
        minimumResultsForSearch: Infinity,
    });
	
  });
  

/*apex-cahrt*/
 
/* cards small charts*/
var bitcoinChart = {
chart: {
	type: 'line',
	height: 50,
	width: 100,
	sparkline: {
	enabled: true
	},
	dropShadow: {
	enabled: false,
	blur: 3,
	opacity: 0.2,
	show:false,
	}
	},
	stroke: {
	show: true,
	curve: 'smooth',
	lineCap: 'butt',
	colors: undefined,
	width: 2,
	dashArray: 0,
	},
fill: {
	gradient: {
	enabled: false
	}
},
series: [{
	name: 'Total Sales',
	data: [0, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46]
}],
yaxis: {
	min: 0,
	show: false
},
	xaxis: {
	axisBorder: {
	show: false
	},
},   
yaxis: {
	axisBorder: {
	show: false
	},
},  
colors: ['#fc7303'],
}
var bitcoinChart = new ApexCharts(document.querySelector("#bitcoinChart"), bitcoinChart);
bitcoinChart.render();


var enthereumChart = {
	chart: {
	type: 'line',
	height: 50,
	width: 100,
	sparkline: {
	enabled: true
	},
	dropShadow: {
		enabled: false,
		blur: 3,
		opacity: 0.2,
	}
	},
	stroke: {
		show: true,
		curve: 'smooth',
		lineCap: 'butt',
		colors: undefined,
		width: 2,
		dashArray: 0,
	},
	fill: {
	gradient: {
	enabled: false
	}
	},
	series: [{
	name: 'Total stats',
	data: [0, 45, 93, 53, 61, 27, 54, 43, 19, 46, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, ]
	}],
	yaxis: {
	min: 0
	},
	colors: ['#ffc107'],

}
var enthereumChart = new ApexCharts(document.querySelector("#enthereumChart"), enthereumChart);
enthereumChart.render();

var litcoinChart = {
chart: {
	type: 'line',
	height: 50,
	width: 100,
	sparkline: {
	enabled: true
	},
	dropShadow: {
	enabled: false,
	blur: 3,
	opacity: 0.2,
	}
	},
	stroke: {
	show: true,
	curve: 'smooth',
	lineCap: 'butt',
	colors: undefined,
	width: 2,
	dashArray: 0,
	},
	fill: {
	gradient: {
	enabled: false
	}
},
series: [{
	name: 'Total Income',
	data: [0, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46,45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51]
}],
yaxis: {
	min: 0
},
colors: ['#467fcf'],

}
var litcoinChart = new ApexCharts(document.querySelector("#litcoinChart"), litcoinChart);
litcoinChart.render();
   
  