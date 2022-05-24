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

    // $('#nav-list-grid button:first-child').each(function(){
    $('#nav-list-grid button').each(function(){
        if($(this).attr('remember') === rem_list_type){
            // alert($(this).attr('remember'));
            $(this).trigger( "click" );
        }else{
            jQuery('#nav-list-grid button:first-child').trigger( "click" );

        }
    });
});
    

        // details page tab section start
        function changeAtiveTab(event,tabID){
            let element = event.target;
            while(element.nodeName !== "A"){
              element = element.parentNode;
            }
            ulElement = element.parentNode.parentNode;
            aElements = ulElement.querySelectorAll("li > a");
            tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
            for(let i = 0 ; i < aElements.length; i++){
              aElements[i].classList.remove("text-white");
              aElements[i].classList.remove("bg-pink-600"); 
              aElements[i].classList.add("bg-white");
              tabContents[i].classList.add("hidden");
              tabContents[i].classList.remove("block");
            }
          
            element.classList.remove("bg-white");
            document.getElementById(tabID).classList.remove("hidden");
            document.getElementById(tabID).classList.add("block");
          }
        //  details page tab section end 
 