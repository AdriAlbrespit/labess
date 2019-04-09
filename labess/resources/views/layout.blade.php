<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 5.7 CRUD Example Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  <div>
    <canvas id="myChart"></canvas>
  </div>
  
  <script>
	    var myContext = document.getElementById("myChart");
	    var myChartConfig = {
	      type: 'bar',
	      data: {
	        labels: ["Féminin", "Masculin", "Animaux"],
	        datasets: [
	           {
	           label: "Tous les voyageurs",
	           data: [227, 331, 11]
	           },{
	           label: "1ère Classe",
	           data: [107, 115, 2]
	           },{
	           label: "2ème Classe",
	           data: [120, 116, 9]
	           }
	        ]
	      }
	    }
	  var myChart = new Chart(myContext, myChartConfig);
	</script>
  
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>