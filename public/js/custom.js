(function($) {
    $('#tabs-id li > a').click(function(){
        $('#tabs-id ul li').each(function(){
            $(this).find('a').removeClass('text-normal-dark');
            $(this).removeClass('border-b-4 border-normal-dark');
        }); 
        $(this).addClass('text-normal-dark');
        $(this).closest("li").addClass('border-b-4 border-normal-dark');
    });
    // details page bottom tabs js
        // $('#tabs-id li > a').click(function(){
        //     $('#tabs-id ul').each(function(){
        //         $(this).find('li a').removeClass('text-normal-dark');
        //         $(this).find('li').removeClass('border-b-4 border-normal-dark');
        //     }); `
        //     $(this).find('a').addClass('text-normal-dark');
        //     $(this).addClass('border-b-4 border-normal-dark');
        // });
        
        $('#list-button').click(function(){
    
            $('#main-content-section').addClass('list-custom') 
         });
         $('#grid-button').click(function(){
             
            $('#main-content-section').removeClass('list-custom') 
         });

        // cookie section for remember list type selected by user on list page
        $('#nav-list-grid button').click(function(){
            let remember = $(this).attr('remember');
        var visited = $.cookie('remember-list-grid', remember, { expires: 100000, path: '/' });
        if(remember == 'grid'){
            $('#main-content-section').addClass('grid-content');
        }else{
            $('#main-content-section').removeClass('grid-content')
        }
        });



})($);

$(document).ready(function(){
    let rem_list_type  =  $.cookie("remember-list-grid");

    $('#nav-list-grid button').each(function(){
        if($(this).attr('remember') === rem_list_type){
            // alert($(this).attr('remember'));
            $(this).trigger( "click" );
        } 
    });
});
    
 