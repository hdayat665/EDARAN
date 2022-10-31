$(document).ready(function() {

    // department tree
    // var chart = new OrgChart(document.getElementById("tree"), {
    //     mouseScrool: OrgChart.action.none,
    //     nodeBinding: {
    //         field_0: "name",
    //         field_1: "grade",
    //         img_0: "img"
    //     },
    //     nodes: [
    //         { id: 1, name: "Jonis Martin", grade: "CEO", img: "../assets/img/user/user-1.jpg" },
    //         { id: 2, pid: 1, name: "Sarah Hani", grade: "VP", img: "../assets/img/user/user-2.jpg" },
    //         { id: 3, pid: 1, name: "Hanisah Rahman", grade: "VP", img: "../assets/img/user/user-3.jpg" },
    //         { id: 4, pid: 1, name: "Harris Azim", grade: "Budget Analyst", img: "../assets/img/user/user-4.jpg" },
    //         { id: 5, pid: 2, name: "Jamilah Jaafar", grade: "Web Manager", img: "../assets/img/user/user-5.jpg" },

    //     ]
    // });

    // organization chart
    // var chart = new OrgChart(document.getElementById("orgChart"), {
    //     mouseScrool: OrgChart.action.none,
    //     template: "rony",
    //     nodeBinding: {
    //         field_0: "name",
    //         field_1: "grade",
    //         img_0: "img"
    //     },
    //     nodes: [
    //         { id: 1, name: "Munirah Maisarah", grade: "Manager", img: "../assets/img/user/user-1.jpg" },
    //         { id: 2, pid: 1, name: "Sarah Hani", grade: "Executive", img: "../assets/img/user/user-2.jpg" },
    //         { id: 3, pid: 1, name: "Hanisah Rahman", grade: "Executive", img: "../assets/img/user/user-3.jpg" },
    //         { id: 4, pid: 1, name: "Harris Azim", grade: "Executive", img: "../assets/img/user/user-4.jpg" },
    //         { id: 5, pid: 2, name: "Jamilah Jaafar", grade: "Junior Executive", img: "../assets/img/user/user-5.jpg" },
    //     ]
    // });

    google.charts.load('current', {packages:["orgchart"]});
    google.charts.setOnLoadCallback(drawChart);
    myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Name');
      data.addColumn('string', 'Manager');
      data.addColumn('string', 'ToolTip');
      // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');

      // For each orgchart box, provide the name, manager, and tooltip to show.
      data.addRows([

      [{'v':'EdaranBerhad', 'f':'<a href="https://www.w3schools.com" style="color: black;">Edaran Berhad</a><div style="color:red; font-style:italic"></div>'},
         '', ''],
      [{'v':'Edaran IT Services Sdn Bhd', 'f':'Edaran IT Services Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Edaran Lifestyle Sdn Bhd', 'f':'Edaran Lifestyle Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Sidic Technology Sdn Bhd', 'f':'Sidic Technology Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Edaran Lifestyle Trading Services Sdn Bhd', 'f':'Edaran Lifestyle Trading Services Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'MIDC Technology Sdn Bhd', 'f':'MIDC Technology Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Elitemac Resources Sdn Bhd', 'f':'Elitemac Resources Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],

      [{'v':'Edaran Trade Network Sdn Bhd', 'f':'Edaran Trade Network Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'Edaran IT Services Sdn Bhd', ''],
      [{'v':'Shinba-Edaran Sdn Bhd', 'f':'Shinba-Edaran Sdn Bhd<div style="color:blue; font-style:italic">(Incorparated in Brunei Darussalam)</div>'},
      'Edaran IT Services Sdn Bhd', ''],
      [{'v':'Edaran Communications Sdn Bhd', 'f':'Edaran Communications Sdn Bhd<div style="color:blue; font-style:italic"></div>'},
      'Elitemac Resources Sdn Bhd', ''],
      ]);

      

      // Create the chart.
      var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
      // Draw the chart, setting the allowHtml option to true for the tooltips.
      chart.draw(data, {'allowHtml':true,
      // nodeClass: 'myNodeClass',
      // selectedNodeClass: 'mySelectedNodeClass',
      compactRows: 'true',
      size: 'large',
    });
    } 
});