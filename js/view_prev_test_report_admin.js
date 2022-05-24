$(document).ready(function(){

	$('#apply_filter_btn').click(function(){

		var filter_options = [];
        	$(':checkbox:checked').each(function(i){
          	filter_options[i] = $(this).val();
        	});

	        $.ajax({
	         data:  {
				 filter_options:filter_options
			 },
	         type: "post",
	         url: "display_filtered_labtest_table.php",
	         success: function(data){
	              $('#table_body').html(data);
	         	}
			});

			$.ajax({
	         data:  {
				 filter_options:filter_options
			 },
	         type: "post",
	         url: "display_filtered_labtest_options.php",
	         success: function(data){
	              $('#filter_opts').html(data);
	         	}
			});
		

		$('#filterModal').modal('hide');
	});
});

/*removing filter by crossing out from top bar*/

$(document).on('click', ".remove_filter", function () {
    var removedItem = $(this).parent().text();  /*getting the filter text which has to be removed*/

    /*uncheck checkbox of that filter from the filter options modal*/
    $('input:checkbox[name="' + removedItem + '"]').prop('checked', false);

    var filter_options = [];   /*getting all the existing filters*/
     $('.opt').each(function(i){
          filter_options[i] = $(this).text();
     });

     filter_options = $.grep(filter_options, function(value) {
	  return value != removedItem;      /*removing the one which has been crossed*/
	});

     /*$.each(filter_options, function(index, value){
          alert(value);
     });*/

     /*if-block is for removing the last filter*/

     if (filter_options.length == 0){
     	$.ajax({
	         url: "display_all_labtest_table.php",
	         success: function(data){
	              $('#table_body').html(data);
	         	}
		});

		$('#filter_opts').empty();
     }else{                           /*else-block is for removing rest of the filters*/

	     $.ajax({
	         data: {
				filter_options:filter_options
			},
	         type: "post",
	         url: "display_filtered_labtest_table.php",
	         success: function(data){
	              $('#table_body').html(data);
	         	}
		});

		$.ajax({
	          data:  {
				filter_options:filter_options
			},
	         type: "post",
	         url: "display_filtered_labtest_options.php",
	         success: function(data){
	              $('#filter_opts').html(data);
	         	}
		});
	}

});


$(document).ready(function(){
	$('#search_topic').keyup(function(){
		if($('#search_topic').val() != ''){
			var search_topic=$('#search_topic').val();
			$.ajax({
		         url: "display_searched_result_labtest.php?st="+search_topic,
		         success: function(data){
		              $('#table_body').html(data);
		         	}
			});
		}
	});

	$('#dlt_search').click(function(){
		$('#search_topic').attr("value",'');
		$.ajax({
	         url: "display_all_labtest_table.php",
	         success: function(data){
	              $('#table_body').html(data);
	         	}
		});
	});
});
