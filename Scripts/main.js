var mymap;
var newMarker='';
$(document).ready(function(){
  $("#menubutono").click(function(){
  $(".sidebar").toggleClass("sidebarActive");
});

$("#fermbutono").click(function(){
$(".sidebar").removeClass("sidebarActive");
});

  var currentImage = 1;
  var totalImages = $(".mySlides").length;

  $('#c_' + currentImage).addClass("active");

//Slideshow
  $('#previous').on('click', function(){
    // Change to the previous image
    $('#im_' + currentImage).stop().hide();
    $('#c_' + currentImage).removeClass("active");
    decreaseImage();
    $('#im_' + currentImage).stop().css("display", "flex");
    $('#c_' + currentImage).addClass("active");
  });
  $('#next').on('click', function(){
    // Change to the next image
    $('#im_' + currentImage).stop().hide();
    $('#c_' + currentImage).removeClass("active");
    increaseImage();
    $('#im_' + currentImage).stop().css("display", "flex");
    $('#c_' + currentImage).addClass("active");
  });

  $('.dot').on('click', function(){
    // Change to the selected image
    $('#im_' + currentImage).stop().hide();
    $('#c_' + currentImage).removeClass("active");
    currentImage = $(this).data("item");
    $('#im_' + currentImage).stop().css("display", "flex");
    $('#c_' + currentImage).addClass("active");
  });




  function increaseImage() {
    /* Increase currentImage by 1.
    * Resets to 1 if larger than totalImages
    */
    ++currentImage;
    if(currentImage > totalImages) {
      currentImage = 1;
    }
  }
  function decreaseImage() {
    /* Decrease currentImage by 1.
    * Resets to totalImages if smaller than 1
    */
    --currentImage;
    if(currentImage < 1) {
      currentImage = totalImages;
    }
  }

  window.setInterval(function() {
    $('#next').click();
  }, 4000);

  $(".Acceptujo").click(function(){
  $(".Acceptujo").hide()
  $(".AcceptujoKajReveno").css("display", "flex")
  $(".formHeaderpart1").removeClass("formHeaderpartAktive")
  $(".formHeaderpart2").addClass("formHeaderpartAktive")
  $(".formMain1").hide()
  $(".formMain2").css("display", "flex")
});

  $(".backA").click(function(){
    $(".Acceptujo").css("display", "flex")
    $(".AcceptujoKajReveno").hide()
    $(".formHeaderpart1").addClass("formHeaderpartAktive")
    $(".formHeaderpart2").removeClass("formHeaderpartAktive")
    $(".formMain1").css("display", "flex");
    $(".formMain2").hide()
  });

  $(".nextA").click(function(){
    $(".AcceptujoKajReveno").hide()
    $(".formHeaderpart2").removeClass("formHeaderpartAktive")
    $(".formHeaderpart3").addClass("formHeaderpartAktive")
    $(".formMain2").hide()
    $(".formMain3").css("display", "flex")
  });

  $("#PetoPorEbleco").click(function(){
    $(".NCsubaParto").hide();
    $(".NCsubaParto2").css("display", "flex");

     mymap = L.map('mapid').setView([31.320286, 48.670124], 11);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamFoYW5naXJpemFkZWFtaXIiLCJhIjoiY2p1Y211YTRpMGRweTRkcDlsNzI5eXhkdSJ9.CF_84BFn2FS-2aIHdL1wVA', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox.streets',
      accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
    mymap.on('click', onMapClick);

  });

  $("#sendoPetoPorEbleco").click(function(){
    var name,mobile,tell,address,postalCode,serviceModel,lat,lng;
     name = $('#name').val();
     mobile = $('#phNR').val();
     tell = $('#phNSR').val();
     address = $('#AdressR').val();
     postalCode = $('#PostCodeR').val();

     //ADSL 1
     //
     serviceModel = $('#TD_LTE').attr('checked')?"3":"";
     serviceModel = $('#adsl').attr('checked')?"1":"";
     serviceModel = $('#wireless').attr('checked')?"2":"";

     lat = $('#lat').val();
     lng = $('#lng').val();
    $.ajax({
      url:"ajax/addCheckS.php",
      data:{
        name:name,
        mobile:mobile,
        tell:tell,
        address:address,
        postalCode:postalCode,
        serviceModel:serviceModel,
        lat:lat,
        lng:lng
      },
      dataType:'json',
      type:'post',
      success: function (data) {
        if(data['error']){
          $('#error').html(data['MSG']).show();
        }else{
          $(".NCsubaParto2").hide();
          $(".NCsubaParto3").css("display", "flex");
        }
      }

    });

  });


  $('#PetoPorEbleco1').click(function () {


    var accCode = $('#acceptCode').val();
    $.ajax({
      url:"ajax/checkService.php",
      data:{
        number:accCode
      },
      dataType:'json',
      type:'post',
      success: function (data) {
        if(data['error']){
          $('#error2').show();
        }else{

          window.location.href="newCostumers2.php";

        }
      }
    });

  });

  $("#sendoPetoPorEblecoReveno").click(function(){
    $(".NCsubaParto2").hide();
    $(".NCsubaParto").css("display", "flex")
  });

  $("#miJaFaris").click(function(){
    $(".NCsubaParto").hide();
    $(".NCsubaParto4").css("display", "flex")
  });

  $("#miJaFarisReveno").click(function(){
    $(".NCsubaParto4").hide();
    $(".NCsubaParto").css("display", "flex")
  });

  $("#HaghighiN").click(function(){
    $(".ncpasxo2bildujo").hide();
    $(".NCsubaPartoTekstomemHaHo").hide();
    $("#NCIHa").css("display", "flex");
  });

  $("#HoghughiN").click(function(){
    $(".ncpasxo2bildujo").hide();
    $(".NCsubaPartoTekstomemHaHo").hide();
    $("#NCIHo").css("display", "flex");
  });


  $("#revenoHaghighi").click(function(){
    $(".ncpasxo2bildujo").css("display", "flex")
    $(".NCsubaPartoTekstomem").css("display", "block")
    $("#NCIHa").hide()
  })

  $("#revenoHoghughi").click(function(){
    $(".ncpasxo2bildujo").css("display", "flex")
    $(".NCsubaPartoTekstomem").css("display", "block")
    $("#NCIHo").hide()
  })

  $(".hoTypeujo").click(function(){
    $(".hoTypeelektujo").toggleClass("hoTypeelektujoAktiva")
    $(".hoTypeujo").toggleClass("hoTypeujoAktiva")
  })

  $(".hoTypeElekto").click(function(){
    $(".hoTypeelektujo").removeClass("hoTypeelektujoAktiva")
    $(".hoTypeujo").removeClass("hoTypeujoAktiva")
  })

  $(".itemz").click(function(){
    $(".itemz").removeClass("itemzAktiva")
    $(this).toggleClass("itemzAktiva")
  })

  $(".adslpc").click(function(){
    $(".adslpc").removeClass("adslpcaktiva")
    $(this).toggleClass("adslpcaktiva")
  })

  $(".CostSTipoujo").click(function(){
    $(".CostSTipoujo").removeClass("CostSTipoujoActive")
    $(this).addClass("CostSTipoujoActive")

  })




$("#costWirelessE").click(function(){
  $("#costWireless").css("display", "grid")
  $("#costTDLTE").css("display", "none")
  $("#costADSL").css("display", "none")
  $("#costFilterWireless").css("display", "flex")
  $("#costFilterTDLTE").css("display", "none")
  $("#costFilterADSL").css("display", "none")
})

$("#costtdlteE").click(function(){
  $("#costTDLTE").css("display", "grid")
  $("#costWireless").css("display", "none")
  $("#costFilterWireless").css("display", "none")
  $("#costFilterADSL").css("display", "none")
  $("#costADSL").css("display", "none")
  $("#costFilterTDLTE").css("display", "flex")
})

  $("#costADSLE").click(function(){
    $("#costTDLTE").css("display", "none")
    $("#costWireless").css("display", "none")
    $("#costFilterWireless").css("display", "none")
    $("#costFilterTDLTE").css("display", "none")
    $("#costFilterADSL").css("display", "flex")
    $("#costADSL").css("display", "grid")


})










//scroll smooth
$('a[href*="#"]')
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {

        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) {
            return false;
          } else {
            $target.attr('tabindex','-1');
            $target.focus();
          };
        });
      }
    }
  });



  var rangeSlider = function(){
    var slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');

    slider.each(function(){

      value.each(function(){
        var value = $(this).prev().attr('value');
        $(this).html(value);
      });

      range.on('input', function(){
        $(this).next(value).html(this.value);
      });
    });
  };

  rangeSlider();


});
function onMapClick(e) {
  if (newMarker!=='') {
    mymap.removeLayer(newMarker);
  }
  $('#lat').val(e.latlng.lat);
  $('#lng').val(e.latlng.lng);
  newMarker = new L.marker(e.latlng).addTo(mymap);
}

