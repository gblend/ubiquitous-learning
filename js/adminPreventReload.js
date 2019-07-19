(function($){
    // start the default jquery using strict mode
    'use strict';
    
    $(document).ready(function(){
       $('.clickremove').click(function(e){
           e.preventDefault();
           alert("click");
       });
        
    })
})(jQuery);