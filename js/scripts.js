$(document).ready(function() {


    // Tabs

    $('.tabs-nav a').click(function() {
        // Check for active
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');

        // Display active tab
        let currentTab = $(this).attr('href');
        $('.tabs-content > div').hide();
        $(currentTab).show();

        return false;
    });




    // Modale

    $(".open-modal").click(function(e){
        e.preventDefault();
        dataModal = $(this).attr("data-modal");
        $("#" + dataModal).css({"display":"block"});
    });

    $(".modal .close, .modal .overlay").click(function(){
        $(".modal").css({"display":"none"});
    });




    // Lightbox image
    $('.open-lightbox').on('click', function(e) {
        e.preventDefault();
        var image = $(this).attr('href');
        $('html').addClass('no-scroll');
        $('body').append('<div class="lightbox-opened"><img src="' + image + '"></div>');
    });
      
    $('body').on('click', '.lightbox-opened', function() {
        $('html').removeClass('no-scroll');
        $('.lightbox-opened').remove();
    });



    // Ajouter champs Joueur

    var max_fields      = 11;
    var wrapper         = $(".field-wrapper"); 
    var add_button      = $(".add-field");
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><input type="text" name="joueur[]" class="new-field" required /><a href="#" class="remove-field" title="Supprimer"><i class="material-icons">remove</i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove-field", function(e) {
        e.preventDefault(); $(this).parent('div').remove(); 
        x--;
    })




    




    










  
});



