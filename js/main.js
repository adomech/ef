$( document ).ready(function() {
 
  $( "body").on( "click",".pagination a",  function(event) {
	  
		  event.preventDefault();

		  var url=$(this).attr("href");

		  var jqxhr = $.ajax({
			  type: "POST",
			  url: url,
			})
  			.done(function( msg ) {
  			
  				var lastChar = url[url.length -1];
  				if(lastChar =="/"){
  					document.location.href=url;
  				}else{
  					var obj = jQuery.parseJSON( msg );

					$(".list_images").html(obj.results);
				 
					 $(".pagination").html(obj.pagination);
    			
  				}
    				
  			})
			  .fail(function() {
			    alert( "error" );
			});
			

		});

  $( "body").on( "submit","#searching",  function(event) {
	  
		  event.preventDefault();
		  var url=$("#searching").attr('action');

		  var jqxhr = $.ajax({
			  type: "POST",
			  url: url,
			  data: "search="+$("#search").val()
			})
  			.done(function( msg ) {
  		
  					var obj = jQuery.parseJSON( msg );

					$(".list_images").html(obj.results);
					
  			})
			  .fail(function() {
			    alert( "error" );
			});
			

		});
});