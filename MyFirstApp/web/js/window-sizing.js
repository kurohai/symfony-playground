var contentSize = {
    init: function() {
        this.elemAppContent = $(".app-content");
        this.elemAppContent.css("margin-left", "250px");
        this.bindEvents();
    },

    bindEvents: function() {
        $( window ).resize(function() {
            if (window.innerWidth <= 767){}
          $( "#log" ).append( "<div>Handler for .resize() called.</div>" );
        });

        $("")
    },

}

window.onload = contentSize.init();
