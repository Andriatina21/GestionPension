// ../Views/Diagramme.js
// Create root element
var root = am5.Root.new("chartdiv");

// Set themes
root.setThemes([
    am5themes_Animated.new(root)
]);

// Create chart
var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: true,
    panY: true,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
}));

// Use the data from PHP
var data = diplomesData;

// Create axes
var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "Diplome",
    renderer: am5xy.AxisRendererX.new(root, {
        minGridDistance: 30
    }),
    tooltip: am5.Tooltip.new(root, {})
}));

xAxis.data.setAll(data);

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {})
}));

// Create series for number of persons
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    name: "Nombre de Personnes",
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: "nombre_personnes",
    categoryXField: "Diplome",
    tooltip: am5.Tooltip.new(root, {
        labelText: "{categoryX}: {valueY} personnes"
    })
}));

// Add colors
series.columns.template.adapters.add("fill", function(fill, target) {
    return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function(stroke, target) {
    return chart.get("colors").getIndex(series.columns.indexOf(target));
});

// Add labels on top of columns
series.bullets.push(function() {
    return am5.Bullet.new(root, {
        locationY: 1,
        sprite: am5.Label.new(root, {
            text: "{valueY}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: 0,
            centerX: am5.p50,
            populateText: true
        })
    });
});

// Set data
series.data.setAll(data);

// Add chart title
chart.children.unshift(am5.Label.new(root, {
    text: "HISTOGRAMME",
    fontSize: 25,
    fontWeight: "bold",
    textAlign: "center",
    x: am5.percent(50),
    centerX: am5.percent(50),
    paddingTop: 0,
    paddingBottom: 20
}));

// Add legend
var legend = chart.children.push(am5.Legend.new(root, {
    centerX: am5.percent(50),
    x: am5.percent(50),
    layout: root.horizontalLayout
}));
legend.data.setAll(chart.series.values);

// Make it appear with animation
series.appear(1000);
chart.appear(1000, 100);