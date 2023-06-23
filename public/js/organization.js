$(document).ready(function() {

  
  $("#data-table-default").DataTable({
    responsive: false,
    lengthMenu: [
        [5,10, 15, 20, -1],
        [5,10, 15, 20, 'All'],
    ],
    initComplete: function (settings, json) {
      $("#data-table-default").wrap(
          "<div style='overflow:auto; width:100%;position:relative;'></div>"
      );
  },
});
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

    // var route = "{{ route('loginView') }}";
    // console.log(route);

    
    
    google.charts.load('current', {packages:["orgchart"]});

    google.charts.setOnLoadCallback(drawChartmain);
    google.charts.setOnLoadCallback(drawChartchildEdaran);
    google.charts.setOnLoadCallback(drawChartchildHumanResource);
    google.charts.setOnLoadCallback(drawChartchildFinancialAccounting);
    google.charts.setOnLoadCallback(drawChartchildInternalAudit);
    
    
  
    // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');

   

    //main
    function drawChartmain() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Name');
      data.addColumn('string', 'Manager');
      data.addColumn('string', 'ToolTip');
    //   var route = "{{ url('/org/chartchild') }}";
    //   console.log(route);
      // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');
      // For each orgchart box, provide the name, manager, and tooltip to show.
      data.addRows([
        // <div><a href="{{ url("/org/chartchild") }}">Some Text</a></div>

      [{'v':'EdaranBerhad', 'f':'<a href="/org/chartchild" style="color: black">Edaran Berhad</a><div style="color:blue; font-style:italic"></div>'},
         '', ''],
      [{'v':'Edaran IT Services Sdn Bhd', 'f':'<div style="color: black">Edaran IT Services Sdn Bhd</div> <div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Edaran Lifestyle Sdn Bhd', 'f':'<div style="color: black">Edaran Lifestyle Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Sidic Technology Sdn Bhd', 'f':'<div style="color: black">Sidic Technology Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Edaran Lifestyle Trading Services Sdn Bhd', 'f':'<div style="color: black">Edaran Lifestyle Trading Services Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'MIDC Technology Sdn Bhd', 'f':'<div style="color: black">MIDC Technology Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],
      [{'v':'Elitemac Resources Sdn Bhd', 'f':'<div style="color: black">Elitemac Resources Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
      'EdaranBerhad', ''],

      

      [{'v':'Edaran Trade Network Sdn Bhd', 'f':'<div style="color: black">Edaran Trade Network Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
      'Edaran IT Services Sdn Bhd', ''],
      [{'v':'Shinba-Edaran Sdn Bhd', 'f':'<div style="color: black">Shinba-Edaran Sdn Bhd</div><div style="color:blue; font-style:italic">(Incorporated in Brunei Darussalam)</div>'},
      'Edaran IT Services Sdn Bhd', ''],
      [{'v':'Edaran Communications Sdn Bhd', 'f':'<div style="color: black">Edaran Communications Sdn Bhd</div><div style="color:blue; font-style:italic"></div>'},
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

    //Edaran berhad child
    function drawChartchildEdaran() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
      //   var route = "{{ url('/org/chartchild') }}";
      //   console.log(route);
        // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');
        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([
          // <div><a href="{{ url("/org/chartchild") }}">Some Text</a></div>
  
          [{'v':'Dato Bistamam Ramli', 'f':'<div style="color: black">Dato&#39; Bistamam Ramli</div><div style="color:blue; font-style:italic"> Group Chief Executive Officer</div>'},
          '', ''],
       [{'v':'GROUP HUMAN RESOURCES DEVELOPMENT', 'f':'<a href="/org/charthumanresource" style="color: black">GROUP HUMAN RESOURCES DEVELOPMENT</a><div style="color:blue; font-style:italic"></div>'},
       'Dato Bistamam Ramli', ''],
       [{'v':'GROUP CORPORATE PLANNING & BUDGET', 'f':'<div style="color: black">GROUP CORPORATE PLANNING & BUDGET</div><div style="color:blue; font-style:italic"></div>'},
       'Dato Bistamam Ramli', ''],
       [{'v':'GROUP PROCUREMENT & CREDIT CONTROL & GROUP ADMINISTRATION', 'f': '<div style="color: black">GROUP PROCUREMENT & CREDIT CONTROL & GROUP ADMINISTRATION</div><div style="color:blue; font-style:italic"></div>'},
       'Dato Bistamam Ramli', ''],
       [{'v':'GROUP FINANCIAL ACCOUNTING', 'f': '<a href="/org/childfinancialaccounting" style="color: black">GROUP FINANCIAL ACCOUNTING</a><div style="color:blue; font-style:italic"></div>'},
       'Dato Bistamam Ramli', ''],
       [{'v':'GROUP LEGAL & SECRETARIAL', 'f': '<div style="color: black">GROUP LEGAL & SECRETARIAL</div><div style="color:blue; font-style:italic"></div>'},
       'Dato Bistamam Ramli', ''],

    //    [{'v':'GROUP INTERNAL AUDIT', 'f': '<a href="/org/childinternalaudit" style="color: black">GROUP INTERNAL AUDIT</a><div style="color:blue; font-style:italic"></div>'},
    //    'Dato Bistaman Ramli', ''],


       [{'v':'Sariza Ibrahim', 'f': '<div style="color: black">Sariza Ibrahim</div><div style="color:blue; font-style:italic">Group Manager, Human Resources Development</div>'},
       'GROUP HUMAN RESOURCES DEVELOPMENT', ''],
       [{'v':'Hashim Ishak', 'f': '<div style="color: black">Hashim Ishak</div><div style="color:blue; font-style:italic">Head, Group Corporate Planning & Budget</div>'},
       'GROUP CORPORATE PLANNING & BUDGET', ''],
       [{'v':'Haslinda Tajudin', 'f': '<div style="color: black">Haslinda Tajudin</div><div style="color:blue; font-style:italic">Head,Group Procurement & Credit Control & Group Administration</div>'},
       'GROUP PROCUREMENT & CREDIT CONTROL & GROUP ADMINISTRATION', ''],
       [{'v':'Tengku Nazwa Naim Tengku Endut', 'f': '<div style="color: black">Tengku Nazwa Naim Tengku Endut</div><div style="color:blue; font-style:italic">Head,Group Financial Accounting</div>'},
       'GROUP FINANCIAL ACCOUNTING', ''],
       [{'v':'Asbanizam Abu Bakar', 'f': '<div style="color: black">Asbanizam Abu Bakar</div><div style="color:blue; font-style:italic">Head, Group Legal & Secretarial</div>'},
       'GROUP LEGAL & SECRETARIAL', ''],

    //    [{'v':'Suhaili Ismail', 'f': '<div style="color: black">Suhaili Ismail</div><div style="color:blue; font-style:italic">Head, Group Internal Audit</div>'},
    //    'GROUP INTERNAL AUDIT', ''],

        ]);

        data.addRows([
 
            [{'v':'Board of Directors & Board Audit Committee', 'f':'<div style="color: black">BOARD OF DIRECTORS & BOARD AUDIT COMMITTEE</div><div style="color:blue; font-style:italic"> Group Chief Executive Officer</div>'},
          '', ''],

          [{'v':'GROUP INTERNAL AUDIT', 'f': '<a href="/org/childinternalaudit" style="color: black">GROUP INTERNAL AUDIT</a><div style="color:blue; font-style:italic"></div>'},
        'Board of Directors & Board Audit Committee', ''],

        [{'v':'Suhaili Ismail', 'f': '<div style="color: black">Suhaili Ismail</div><div style="color:blue; font-style:italic">Head, Group Internal Audit</div>'},
           'GROUP INTERNAL AUDIT', ''],
          ]);
  
        
  
        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div1'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true,
        // nodeClass: 'myNodeClass',
        // selectedNodeClass: 'mySelectedNodeClass',
        compactRows: 'true',
        size: 'large',
      });
      } 

      //Group Human Resource Development
    function drawChartchildHumanResource() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
      //   var route = "{{ url('/org/chartchild') }}";
      //   console.log(route);
        // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');
        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([
          // <div><a href="{{ url("/org/chartchild") }}">Some Text</a></div>
        [{'v':'Dato Bistamam Ramli', 'f':'<div style="color: black">Dato&#39; Bistamam Ramli</div><div style="color:blue; font-style:italic">Group Chief Executive Officer</div>'},
        '', ''],
       [{'v':'Sariza Ibrahim', 'f':'<div style="color: black">Sariza Ibrahim</div><div style="color:blue; font-style:italic">Group Manager, HRD</div>'},
       'Dato Bistamam Ramli', ''],
       [{'v':'Siti Zulaiha Esa', 'f':'<div style="color: black">Siti Zulaiha Esa</div><div style="color:blue; font-style:italic">Executive</div>'},
       'Sariza Ibrahim', ''],
       [{'v':'Ahmad Izzudin Safian', 'f':'<div style="color: black">Ahmad Izzudin Safian</div><div style="color:blue; font-style:italic">Executive</div>'},
       'Sariza Ibrahim', ''],

        ]);
  
        
  
        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_human_resource'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true,
        // nodeClass: 'myNodeClass',
        // selectedNodeClass: 'mySelectedNodeClass',
        compactRows: 'true',
        size: 'large',
      });
      } 

      //Group Human financial accounting
    function drawChartchildFinancialAccounting() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
      //   var route = "{{ url('/org/chartchild') }}";
      //   console.log(route);
        // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');
        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([
            [{'v':'Dato Bistaman Ramli', 'f':'<div style="color: black">Dato&#39; Bistaman Ramli</div><div style="color:blue; font-style:italic">Group Chief Executive Officer</div>'},
           '', ''], 

        [{'v':'Tengku Nazwa Naim Tengku Endut', 'f':'<div style="color: black">Tengku Nazwa Naim Tengku Endut</div><div style="color:blue; font-style:italic">Head, Group Financial Accounting</div>'},
        'Dato Bistaman Ramli', ''], 

        [{'v':'Muhammad Hafiz Zulkifli', 'f':'<div style="color: black">Muhammad Hafiz Zulkifli</div><div style="color:blue; font-style:italic">Senior Executive, Finance & Accounts</div>'},
        'Tengku Nazwa Naim Tengku Endut', ''], 

        [{'v':'Nur Mukminah Abdullah', 'f':'<div style="color: black">Nur Mukminah Abdullah</div><div style="color:blue; font-style:italic">Accounting(Settlement)</div>'},
        'Tengku Nazwa Naim Tengku Endut', ''], 

        [{'v':'Accounting', 'f':'<div style="color: black">1) Mazura Abdullah <br>  2) Zaheira Muhammad Rushdi</div><div style="color:blue; font-style:italic">Accounting</div>'},
        'Tengku Nazwa Naim Tengku Endut', ''],  

        [{'v':'Costing', 'f':'<div style="color: black">1) Zuliana Ismail <br>  2) Vacant</div><div style="color:blue; font-style:italic">Costing</div>'},
        'Tengku Nazwa Naim Tengku Endut', ''],  

        [{'v':'Accounts Payable', 'f':'<div style="color: black">Nuuralinawati Azmi</div><div style="color:blue; font-style:italic">Accounts Payable</div>'},
        'Tengku Nazwa Naim Tengku Endut', ''], 


        ]);
  
        
  
        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_financial_accounting'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true,
        // nodeClass: 'myNodeClass',
        // selectedNodeClass: 'mySelectedNodeClass',
        compactRows: 'true',
        size: 'large',
      });
      } 

        //Group Internal Audit
    function drawChartchildInternalAudit() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
      //   var route = "{{ url('/org/chartchild') }}";
      //   console.log(route);
        // myDataTable.setRowProperty(2, 'selectedStyle', 'background-color:#00FF00');
        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([
            [{'v':'Dato Bistaman Ramli', 'f':'<div style="color: black">Dato&#39; Bistaman Ramli</div><div style="color:blue; font-style:italic">Group Chief Executive Officer</div>'},
            '', ''],
         [{'v':'Suhaili Ismail', 'f':'<div style="color: black">Suhaili Ismail</div><div style="color:blue; font-style:italic">Head,Group Internal Audit</div>'},
         'Dato Bistaman Ramli', ''],
         [{'v':'Muhammad Mustakim Zakaria', 'f':'<div style="color: black">Muhammad Mustakim Zakaria</div><div style="color:blue; font-style:italic">Executive, Internal Audit</div>'},
         'Suhaili Ismail', ''],
         ]);
 
         data.addRows([
         [{'v':'Board of Directors & Board Audit Committee', 'f':'<div style="color: black">Board of Directors & Board Audit Committee</div><div style="color:blue; font-style:italic">Group Chief Executive Officer</div>'},
            '', ''],
         ]);
 

  
        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_internal_audit'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {'allowHtml':true,
        // nodeClass: 'myNodeClass',
        // selectedNodeClass: 'mySelectedNodeClass',
        compactRows: 'true',
        size: 'large',
      });
      } 



     

    
 
});