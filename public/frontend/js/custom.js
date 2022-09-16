function goBack() { window.history.back(); } // back history

$("button#clickmore").on("click", function() {
    var $this = $(this); 
    var linkText = $this.text().toUpperCase();    
    
    if(linkText === "XEM THÊM"){
        linkText = "Rút gọn";
    } else {
        linkText = "Xem thêm";
    };
    $this.text(linkText);
});

// ImgUpload
jQuery(document).ready(function () {
ImgUpload();
});

function ImgUpload() {
var imgWrap = "";
var imgArray = [];

$('.upload__inputfile').each(function () {
$(this).on('change', function (e) {
  imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
  var maxLength = $(this).attr('data-max_length');

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);
  var iterator = 0;
  filesArr.forEach(function (f, index) {

    if (!f.type.match('image.*')) {
      return;
    }

    if (imgArray.length > maxLength) {
      return false
    } else {
      var len = 0;
      for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i] !== undefined) {
          len++;
        }
      }
      if (len > maxLength) {
        return false;
      } else {
        imgArray.push(f);

        var reader = new FileReader();
        reader.onload = function (e) {
          var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
          imgWrap.append(html);
          iterator++;
        }
        reader.readAsDataURL(f);
      }
    }
  });
});
});
$('body').on('click', ".upload__img-close", function (e) {
var file = $(this).parent().data("file");
for (var i = 0; i < imgArray.length; i++) {
  if (imgArray[i].name === file) {
    imgArray.splice(i, 1);
    break;
  }
}
$(this).parent().parent().remove();
});
}

$(document).ready(function(){
    $("div#delimg").click(function(){
        var id = $(this).parents('#detail_img').find('input[id="id_img_detail"]').val();
        // alert(id);
        $.ajax({
            url: 'admin/ajax/del_img_detail/'+id,
            type: 'GET',
            cache: false,
            data: {
                "id":id
            },
        });
    });
}); // xóa ảnh trong db
// ImgUpload

function reply_click(id)
{
    $.get("frontend/ajax/changecategory/"+id,function(data){
        $("#loainhadat").html(data);
    });
} // changecategory

$(document).ready(function(){
    $("#province").change(function(){
        var id = $(this).val();
        $.get("frontend/ajax/change_province/"+id,function(data){$("#district").html(data);});
        $.get("frontend/ajax/change_none",function(data){$("#ward").html(data);});
        $.get("frontend/ajax/change_none",function(data){$("#street").html(data);});
    });
}); // change province
$(document).ready(function(){
    $("#district").change(function(){
        var id = $(this).val();
        $.get("frontend/ajax/change_district/"+id,function(data){
            $("#ward").html(data);
        });
        $.get("frontend/ajax/change_district_street/"+id,function(data){
            $("#street").html(data);
        });
    });
}); // change district

$(function(){
    $("input#address-val").keyup(function () {
        var value = $(this).val();
        $(".address-val").text(value + ', ');
    });
    $("select#street").change(function () {
        var animal = document.getElementById("street");
        var animalValue = animal.options[animal.selectedIndex].text;
        $(".street-val").text(animalValue + ', ');
    });
    $("select#ward").change(function () {
        var animal = document.getElementById("ward");
        var animalValue = animal.options[animal.selectedIndex].text;
        $(".ward-val").text(animalValue + ', ');
    });
    $("select#district").change(function () {
        var animal = document.getElementById("district");
        var animalValue = animal.options[animal.selectedIndex].text;
        $(".district-val").text(animalValue + ', ');
    });
    $("select#province").change(function () {
        var animal = document.getElementById("province");
        var animalValue = animal.options[animal.selectedIndex].text;
        $(".province-val").text(animalValue);
    });
});

// price
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});
function formatNumber(n) {
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
  var input_val = input.val();
  if (input_val === "") { return; }
  var original_len = input_val.length;
  var caret_pos = input.prop("selectionStart");
  if (input_val.indexOf(".") >= 0) {
    var decimal_pos = input_val.indexOf(".");
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);
    left_side = formatNumber(left_side);
    right_side = formatNumber(right_side);
    if (blur === "blur") {
      right_side += "";
    }
    right_side = right_side.substring(0, 2);
    input_val = "" + left_side + "." + right_side;
  } else {
    input_val = formatNumber(input_val);
    input_val = "" + input_val + "";
    if (blur === "blur") {
      input_val += "";
    }
  }
  input.val(input_val);
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

// end price

$(document).ready(function() {
    var currency = $('#currency');
    var unit = $('#unit');
    $(currency).prop('disabled', false);
    $(unit).prop('disabled', false);

    $('.click').click(function() {
        if ($(currency).prop('disabled')){
            $(currency).prop('disabled', false);
            let domain = '';
            document.getElementById('currency').value = domain;
            $( ".click" ).removeClass( "active" );
        }else{
            $(currency).prop('disabled', true);
            let domain = 'Thỏa thuận';
            document.getElementById('currency').value = domain;
            $( ".click" ).addClass( "active" );
        }

        if ($(unit).prop('disabled')){
            $(unit).prop('disabled', false);
        }else{
            $(unit).prop('disabled', true);
        }
    });
});


// upload images
function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap').hide();
      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();
      $('.image-title').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
        } else {
    removeUpload();
    }
}
// upload images

