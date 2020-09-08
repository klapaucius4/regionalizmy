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



  var cookie = $.cookie('rgmUserCounty');
  if(cookie){
    cookie = JSON.parse(cookie);
    console.log(cookie.name);
    // $(this).val(cookie.name);
  }
  
  //// counties begin
  $(".findCountyInput").autocomplete({
      source: function (request, response) {
          $.ajax({
              url: "/wp-json/rgm/route/get-counties/"+request.term,
              success: function (data) {
                  var transformed = $.map(data, function (el) {
                      var countyName = 'powiat ' + el.name;
                      if(el.city){
                        countyName = el.name + ' (miasto na prawach powiatu)';
                      }
                      return {
                          label: countyName,
                          id: el.id
                      };
                  });
                  response(transformed);
              },
              error: function () {
                  response([]);
              }
          });
      },
      select: function (event, ui) {
        var newCookie = {
          'id': ui.item.id,
          'name': ui.item.label
        };
        $.cookie('rgmUserCounty', JSON.stringify(newCookie), { expires: 7 });
      },
      autoFill: true,
  });
  //// counties end



})(jQuery); // End of use strict
