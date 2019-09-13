$(function() {
    var availableTags = [
      "Dhaka",
      "Delhi",
      "Tokyo",
      "Beijing",
      "Male",
      "Bangkok",
      "Sylhet",
      "Chittagong",
      "Kolkata",
      "Mumbai",
      "Kuala Lumpur",    
      "Thimphu",    
      "Chennai",
      "Kathmandu",
      "Changi",
      "Jakarta"
        
    ];
    $( "#city_id_from" ).autocomplete({
      source: availableTags
    });
    
    $( "#city_id_to" ).autocomplete({
      source: availableTags
    });
    
  } );    