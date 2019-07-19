(function($){
    // start the default jquery using strict mode
    'use strict';
    
    $(document).ready(function(){
        var allBtn = $('.clickremove');
        
        allBtn.each(function(){
            var elBtn = $(this);
           $(this).click(function(){
               var id = $(this).data('id');
               var method = 'GET';
//               var 
               
               $.get('http://localhost/www.ulearning.com/ajax-request.php?delete_item=' + id, function(data, status){
                   console.log(status);
                   var valu = json.parse(success_all);
                   if( data.valu === true) {
                       alert('hello');
                   }
               });
               
               return false;
           });
        });
    })
})(jQuery);