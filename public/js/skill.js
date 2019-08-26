var webDoughnut = document.getElementById("Web").getContext("2d");
var netDoughnut = document.getElementById("Networking").getContext("2d");
var LinuxDoughnut = document.getElementById("Linux").getContext("2d");


var webData = [
  {
    value: 70,
    color:"#aed581",
      highlight: "#FF5A5E",
      label: "Red"
  },
  {
    value : 30,
    color : "#f2f2f2"
  }
];

var netData = [
  {
    value: 40,
    color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "Green"
  },
  {
    value : 60,
    color : "#f2f2f2"
  }
];

var LinuxData = [
  {
    value: 40,
    color: "#ffff8d",
      highlight: "#FFC870",
      label: "Yellow"
  },
  {
    value : 60,
    color : "#f2f2f2"
  }
];

var mywebdoughnut = new Chart(webDoughnut).Doughnut(webData, {
  
    segmentShowStroke : true,
    segmentStrokeColor : "#fff",
    segmentStrokeWidth : 2,
    animationSteps : 100,
    animationEasing : "easeOutBounce",
    animateRotate : true,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true,
    showScale: true,
    animateScale: true,

  
});

var mynetdoughnut = new Chart(netDoughnut).Doughnut(netData, {
  
    segmentShowStroke : true,
    segmentStrokeColor : "#fff",
    segmentStrokeWidth : 2,
    animationSteps : 100,
    animationEasing : "easeOutBounce",
    animateRotate : true,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true,
    showScale: true,
    animateScale: true
});

var myLinuxdoughnut = new Chart(LinuxDoughnut).Doughnut(LinuxData, {
 
    segmentShowStroke : true,
    segmentStrokeColor : "#fff",
    segmentStrokeWidth : 2,
    animationSteps : 100,
    animationEasing : "easeOutBounce",
    animateRotate : true,
    animateScale : false,
    responsive: true,
    maintainAspectRatio: true,
    showScale: true,
    animateScale: true
});


