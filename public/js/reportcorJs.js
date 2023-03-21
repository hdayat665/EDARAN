$("document").ready(function () {
    $("#datepickercor").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'dd/mm/yyyy',
      });

      $(document).on('change', "#staffn", function() {
        if ($(this).val() == "2")  {
            $("#staffname").show();
			
		
			

        } 
		else {
            $("#staffname").hide();
			
        }
    });
});