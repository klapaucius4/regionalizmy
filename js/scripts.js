
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
  if(rgmCookie()){
    $('.findCountyInput').val(rgmCookie().name);
  }

  $(".findCountyInput, .findCountyInput2, .findCountyInput3").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "/wp-json/rgm/v1/counties/",
        data: { 'search': request.term },
        type: "GET",
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
      location.reload();
    },
    autoFill: true,
  });
  //// counties end

  //// dictionary search begin
  $(".frontpage-search-section__input-search-dictionary").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "/wp-json/rgm/v1/phrases/",
        data: {
          'search': request.term,
        },
        type: "GET",
        success: function (data) {
          var transformed = $.map(data, function (el) {
              return {
                  label: el.name,
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
      location.reload();
    },
    autoFill: true,
  });
  //// dictionary search end


  $("body").on('click', '.vote-buttons button', function(e){
    e.preventDefault();
    var phraseId = $(this).data('phrase-id');
    var phraseName = $(this).data('phrase-name');
    var countyId = -1;
    var voteValue = $(this).data('vote-value');
    var userId = 0;

    var modalPopup = $('#voteModalPopup');
    var modalPopup2 = $('#selectDistrictModalPopup');
    modalPopup.find('h5.modal-title').text(phraseName);

    if(!rgmCookie()){
      modalPopup2.modal('show');
    }
    else if($(this).hasClass('btn-success')){

      modalPopup.modal('show');
      // console.log(cookie.name);
      modalPopup.find('.fieldset2, .fieldset3').hide();
      modalPopup.find('label[for=voteModalPopupRadio1]').html("Znam z: <b>" + rgmCookie().name + '</b>');

      modalPopup.find('input[type=radio][name=voteModalPopupRadio]').on('change', function(ee){
        ee.preventDefault();
        if ($(this).val() == 1) {
          modalPopup.find('.fieldset2').hide(500);
          modalPopup.find('.fieldset3').hide(500);
        }else if($(this).val() == 2){
          modalPopup.find('.fieldset3').hide(500);
          modalPopup.find('.fieldset2').show(500);
        }else if($(this).val() == 3){
          modalPopup.find('.fieldset3').show(500);
          modalPopup.find('.fieldset2').hide(500);
        }
        
      });
    }
    
  });

})(jQuery); // End of use strict
