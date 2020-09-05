(function($) {
  "use strict"; // Start of use strict

  // Floating label headings for the contact form
  $("body").on("input propertychange", ".floating-label-form-group", function(e) {
    $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
  }).on("focus", ".floating-label-form-group", function() {
    $(this).addClass("floating-label-form-group-with-focus");
  }).on("blur", ".floating-label-form-group", function() {
    $(this).removeClass("floating-label-form-group-with-focus");
  });

  // Show the navbar when the page is scrolled up
  var MQL = 992;

  //primary navigation slide-in effect
  if ($(window).width() > MQL) {
    var headerHeight = $('#mainNav').height();
    $(window).on('scroll', {
        previousTop: 0
      },
      function() {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < this.previousTop) {
          //if scrolling up...
          if (currentTop > 0 && $('#mainNav').hasClass('is-fixed')) {
            $('#mainNav').addClass('is-visible');
          } else {
            $('#mainNav').removeClass('is-visible is-fixed');
          }
        } else if (currentTop > this.previousTop) {
          //if scrolling down...
          $('#mainNav').removeClass('is-visible');
          if (currentTop > headerHeight && !$('#mainNav').hasClass('is-fixed')) $('#mainNav').addClass('is-fixed');
        }
        this.previousTop = currentTop;
      });
  }

  //// counties begin
  $( ".findCountyInput" ).each(function(){
    $(this).autocomplete({
      source: [],
      selectFirst: true,
      minLength: 0
    });
  });

  $( ".findCountyInput" ).on('input', function(){
    var findCountyInput = this;
    var phrase, counties;
    phrase = $(findCountyInput).val();
    $.ajax({
			url : "/wp-json/rgm/route/get-counties/" + phrase,
			method: "GET",
			data: {
				search: $(this).val()
      },
      beforeSend : function(response){
        phrase = phrase;
        counties = [];
      },
			success : function(response) {
				  response.forEach(function(item, index) {
          var countyType = 'powiat';
          if(item.city){
            var countyType = 'miasto powiatowe';
          }
					counties.push(countyType+' '+item.name);
        });
      },
      complete : function(respnse){
        $( findCountyInput ).autocomplete({
          source: counties,
          selectFirst: true,
          minLength: 0
        });
      }
    });
  });
  //// counties end

})(jQuery); // End of use strict
