
<!DOCTYPE HTML> 
<html> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title>Highcharts Example</title> 
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page --> 
		
        <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-latest.js"></script> 
        <script type="text/javascript" src="<?php echo base_url() ?>js/graficos/js/highcharts.js"></script> 
		  
		
		<!-- 1a) Optional: add a theme file --> 
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		--> 
		
		<!-- 1b) Optional: the exporting module --> 
	 
		 <script type="text/javascript" src="<?php echo base_url() ?>js/graficos/js/modules/exporting.js"></script> 
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready --> 
		<script type="text/javascript"> 
		
			/**
			 * Visualize an HTML table using Highcharts. The top (horizontal) header 
			 * is used for series names, and the left (vertical) header is used 
			 * for category names. This function is based on jQuery.
			 * @param {Object} table The reference to the HTML table to visualize
			 * @param {Object} options Highcharts options
			 */
			Highcharts.visualize = function(table, options, tiempo) {
				// the categories
				options.xAxis.categories = [ 
				<?php foreach($listas as $item):?> 
                <?php echo "'".$item->nombre."'".',';?>    
       			<?php endforeach;?>  
				];
				
				// the data series
				options.series = [];
				$('tr', table).each( function(i) {
					var tr = this;
					$('th, td', tr).each( function(j) {
						if (j > 0) { // skip first column
							if (i == 0) { // get the name and init the series
								options.series[j - 1] = { 
									name: this.innerHTML,
									data: []
								};
							} else { // add values
								options.series[j - 1].data.push(parseFloat(this.innerHTML));
							}
						}
					});
				});
				
				var chart = new Highcharts.Chart(options);
			}
				
			// On document ready, call visualize on the datatable.
			$(document).ready(function() {			
				var table = document.getElementById('datatable'),
				options = {
					   chart: {
					      renderTo: 'container',
					      defaultSeriesType: 'column'
					   },
					   title: {
					      text: 'Agendamientos por lista'
					   },
					   xAxis: {
					   },
					   yAxis: {
					      title: {
					         text: 'Registros'
					      }
					   },
					   tooltip: {
					      formatter: function() {
					         return '<b>'+ this.series.name +'</b><br/>'+
					            this.y +' '+ this.x.toLowerCase();
					      }
					   }
					};
				
			    var r = new Date().getTime();  					
				Highcharts.visualize(table, options, r);
			});
				
		</script> 
		
	</head> 
	<body> 
		
		<!-- 3. Add the container --> 
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto; background-color: transparent"></div> 
		
		
		<p>&nbsp;</p>
		<table id="datatable" align="center"> 
			<thead> 
				<tr> 
					<th></th> 
					<th>Privado</th> 
					<th>Publico</th> 
				</tr> 
			</thead> 
			<tbody> 
				
               <?php foreach($listas as $lista):?> 
                <tr> 
					<th><?php echo $lista->nombre;?>  </th> 
					<td><?php echo $lista->aprivado;?> </td> 
					<td><?php echo $lista->apublico;?></td> 
				</tr> 
                <?php endforeach;?>  
               
                
               
                
                
			</tbody> 
		</table> 
		
			
	</body> 
</html> 