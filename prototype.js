$(document).ready(documentInit);

function documentInit() {
	let data = [{name: "Edelstahl", height: "1.2", width: "1000"},
	{name: "Kruppstahl", height: "2.3", width: "1100"},
	{name: "Eisenblock", height: "12", width: "800"},
	{name: "Stahlbeton", height: "15", width: "950"},
	{name: "Holzpellets", height: "23", width: "725"}];

	data = data.map(function(d) {
		return {
			name: d.name,
			width: parseInt(d.width),
			height: parseInt(d.height),
		};
	});

	let svgWidth = 1000;
	let svgHeight = 500;
	let svg = d3.select("svg");
	svg.attr("viewBox", "0 0 " + svgWidth + " " + svgHeight);
	let margin = {top: 20, right: 80, bottom: 50, left: 80};
	let width = svgWidth - margin.left - margin.right;
	let height = svgHeight - margin.top - margin.bottom;
	let canvas = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");
	let xscale = d3.scaleLinear().range([0, width]);
	let yscale = d3.scaleLinear().range([height, 0]);
	xscale.domain(d3.extent(data, function(d) {return d.height;}));
	yscale.domain(d3.extent(data, function(d) {return d.width;}));

	let xaxis = d3.axisBottom()
		.scale(xscale)
		.tickFormat(d3.format(".2s"));
	let yaxis = d3.axisLeft()
		.scale(yscale)
		.tickFormat(d3.format(".2s"));

	//Gruppe für x-Achse
	canvas.append("g")
		.attr("class", "axis axis-x")
		.attr("transform", "translate(0," + height + ")");
	//Gruppe für y-Achse
	canvas.append("g")
		.attr("class", "axis axis-y");

	//Achsenbeschriftungen x-Achse
	canvas.append("text")
		.attr("class", "axis-x axis-label label")
		.attr("text-anchor", "middle")
		.attr("x", width/2)
		.attr("y", height + margin.bottom*3/4)
		.text("x-Achse");
	//Achsenbeschriftungen y-Achse
	canvas.append("text")
		.attr("class", "axis-y axis-label label")
		.attr("text-anchor", "middle")
		.attr("transform", "translate(-" + margin.left/2 + "," + height/2 + ")rotate(-90)")
		.text("y-Achse");

	d3.select(".axis-x").call(xaxis);
	d3.select(".axis-y").call(yaxis);	

	let datapoints = canvas.selectAll(".datapoint")
		.data(data)
			.attr("cx", function(d) {return xscale(d.height);})
			.attr("cy", function(d) {return yscale(d.width);});
	datapoints.enter()
		.append("circle")
			.attr("class","datapoint")
			.attr("r", 3)
			.attr("cx", function(d) {return xscale(d.height);})
			.attr("cy", function(d) {return yscale(d.width);});
	datapoints.exit()
		.remove();

}