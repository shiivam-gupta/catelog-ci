$.fn.isOnScreen = function() {
    var win = $(window);
    var viewport = { 
        top: win.scrollTop(), 
        left: win.scrollLeft() 
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();
    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();
    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom)); 
};

function preconfirmSwal(type,title,titleText,newLocation) {
    /*const swalWithBootstrapButtons = Swal.mixin({
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
    })*/
    swal({
        type: type,
        title: title,
        text: titleText,
        allowOutsideClick: false,
        showCancelButton: true,
        showCloseButton: false,
        allowEscapeKey: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i>',
        cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
        confirmButtonColor: 'green',
        cancelButtonColor: 'red',
        onOpen: function() {

        }
    }).then((result) => {
        if (result.value) {
            /*swalWithBootstrapButtons(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )*/
            window.location.href = newLocation;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            /*swalWithBootstrapButtons(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )*/
        }
    }).catch(swal.noop);
}

$(function () {
    /*$("input[id*='txtQty']").keydown(function (event) {*/
    $(".decimalNumber").keydown(function (event) {
        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }
        
        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault();

    });

    /*** For Loading More Content ***/
    $(document).on('click','[data-request="load-moredata"]', function(){
        var $this  = $(this);
        var url    = $this.data('url');
        var target = $this.data('target');
        var form   = $this.data('form');
        var filter = $this.data('filterform');
        var $data  = new FormData($(form)[0]);
        
        if($processingLoadMore) {
            return true;
        }
        
        $data.append('target', target);

        if(filter) {
            var $filterData = $(filter).serializeArray();
            if($filterData.length > 0){
                for (var i=0; i<$filterData.length; i++){
                    $data.append($filterData[i].name, $filterData[i].value);
                }
            }
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: $data,
            contentType:false,
            processData:false,
            statusCode: {
                404: function() {
                  console.log( "page not found" );
                },
                500: function() {
                  console.log( "internal error" );
                }
            },
            beforeSend: function( jqXHR, settings, status ) {
                $processingLoadMore = true;
            },
            success: function (r) {
                if ($.isPlainObject(r)) {
                    var o = s;
                }else {
                    var o = JSON.parse(r);
                }
                $(o.target).last().after(o.data);
                if(o.data) {
                    $processingLoadMore = false;
                }
            },
            error: function (data) {
                console.log(data);
                if(loader) {    
                    $(loader).hide();
                }
            }
        })
    });
});

/*function convertRate(obj) {
    var to = $(obj).attr('data-other');
    var from = $(obj).attr('data-iam');
    var target = $(obj).attr('data-target');
    var convertRate = $.ajax({
        url:"<?= base_url('convert/currency/rate'); ?>",
        method:$method,
        data:{from:from,to:to},
        beforeSend: function(bs){
            if(convertRate){
                convertRate.abort();
            }
        },
        success: function(s){
            o = JSON.parse(s)
            if(os){
                $(target).val(o.data);
            }
        }
    }).then(function(t){
        
    });
}
*/

function show_validation_error(msg,errorClass,messageClass) {
    errorClass = errorClass ? errorClass : 'has-error';
    messageClass = messageClass ? messageClass : 'help-block';

    if ($.isPlainObject(msg)) {
        $data = msg;
    }else {
        $data = $.parseJSON(msg);
    }
    /*$('form .form-group').append('<div class="'+messageClass+'">&nbsp</div>');*/
    $.each($data, function (index, value) {
        var name    = index.replace(/\./g, '][');

        if (index.indexOf('.') !== -1) {
            name = name + ']';
            name = name.replace(']', '');
        }

        if (!$('form [name="' + name + '"]').last().closest('.form-group').hasClass(errorClass)) {
            if (name.indexOf('[]') !== -1) {
                $('form [name="' + name + '"]').last().closest('.form-group').addClass(errorClass);
                $('form [name="' + name + '"]').last().closest('.form-group').find('.message-group').append('<div class="'+messageClass+'">' + value + '</div>');
            }else{
                if($('form [name="' + name + '"]').attr('type') == 'checkbox' || $('form [name="' + name + '"]').attr('type') == 'radio') {
                    if($('form [name="' + name + '"]').attr('type') == 'checkbox') {
                        $('form [name="' + name + '"]').closest('.form-group').addClass(errorClass);
                        $('form [name="' + name + '"]').parent().after('<div class="'+messageClass+'">' + value + '</div>');
                    } else {
                        $('form [name="' + name + '"]').closest('.form-group').addClass(errorClass);
                        $('form [name="' + name + '"]').parent().parent().append('<div class="'+messageClass+'">' + value + '</div>');
                    }
                } else if($('form [name="' + name + '"]').get(0)){
                    if($('form [name="' + name + '"]').get(0).tagName == 'SELECT') {
                        $('form [name="' + name + '"]').closest('.form-group').addClass(errorClass);
                        $('form [name="' + name + '"]').parent().after('<div class="'+messageClass+'">' + value + '</div>');
                    } else if ($('form [name="' + name + '"]').attr('type') == 'file') {
                        $('form [name="' + name + '"]').closest('.form-group').addClass(errorClass);
                        $('form [name="' + name + '"]').next().after('<div class="'+messageClass+'">' + value + '</div>');
                    } else {
                        $('form [name="' + name + '"]').closest('.form-group').addClass(errorClass);
                        if($('form [name="' + name + '"]').parent().find('.'+messageClass).length==0){
                            $('form [name="' + name + '"]').after('<div class="'+messageClass+'">' + value + '</div>');
                        }else{
                            $('form [name="'+name+'"]').parent().find('.'+messageClass).text(value);
                        }
                    }   
                } else {
                    $('form [name="' + name + '"]').closest('.form-group').addClass(errorClass);
                    $('form [name="' + name + '"]').after('<div class="'+messageClass+'">' + value + '</div>');
                }
            }
        }else{
            $('form [name="' + name + '"]').after('<div class="'+messageClass+'">' + value + '</div>');
        }
    });

    /*SCROLLING TO THE INPUT BOX*/
    scroll(errorClass);
}

function scroll(errorClass) {
    errorClass = errorClass ? errorClass : 'has-error';
    errorClass = '.'+errorClass;
    if ($(errorClass).not('.modal '+errorClass).length > 0) {
        $('html, body').animate({
            scrollTop: ($(errorClass).offset().top - 100)
        }, 200);
    }
}

$(document).on('click','[data-request="form-submit"]',function(e){
    e.preventDefault();

    var $this       =  $(this);
    var $target     = $this.attr('data-target');
    var $url        = $this.attr('data-url');
    var $request    = $this.attr('data-request');
    var $method     = $($target).attr('method');
    var $formData   = new FormData($($target)[0]);

    $this.attr('disabled',true);

    submitForm($url,$method,$formData,$this);
})

function submitForm($url,$method,$data,$btnObj) {
    $('.help-block').remove();
    $('.has-error').removeClass('has-error');
    var $formSubmission = {abort: function () {}};
    $formSubmission.abort();
    $formSubmission = $.ajax({
        url:$url,
        method:$method,
        data:$data,
        contentType:false,
        processData:false,
        beforeSend: function(bs){
            if($formSubmission){
                $formSubmission.abort();
            }
        },
        success: function(r) {
            if ($.isPlainObject(r)) {
                var o = r;
            }else {
                var o = JSON.parse(r);
            }
            if(o.status == false){
                show_validation_error(o.errors);
            }
            if(o.status == true && o.reload == true){
                window.location.reload(0);
            }
            if(o.status == true && o.target){
                $(o.target).html(o.data);
            }
            if(o.status == true && o.location){
                window.location.href = o.location;
            }
        }
    }).then(function(t){
        $btnObj.attr('disabled',false);
    });
}

$('#registartionModal').on('hidden.bs.modal', function () {
    $('.help-block').remove();
    $('.has-error').removeClass('has-error');
    $('#registartionForm')[0].reset();
});

$('#loginModal').on('hidden.bs.modal', function () {
    $('.help-block').remove();
    $('.has-error').removeClass('has-error');
    $('#loginForm')[0].reset();
});

function triggerLogin() {
    $('[data-target="#loginModal"]').trigger('click');
}

function increaseCount(cid,qty,mqty) {
    /*var divUpd = $(this).parent().find('.value'),
    newVal = parseInt(divUpd.text(), 10) + 1;
    divUpd.text(newVal);*/

    var oldQuantity = parseInt($('#quantity_'+cid).text(), 10);
    var newqty = oldQuantity + parseInt(qty, 10);
    /*if(mqty >= newqty) {
        updateCartItem(cid,newqty);
    } else {
        $('#quantity_'+cid).text(oldQuantity);
        swal({type:'info',text:'Max quantity reached.'});
    }*/
    updateCartItem(cid,newqty);
}

function decreaseCount(cid,qty,lqty) {
    /*var divUpd = $(this).parent().find('.value'),
    newVal = parseInt(divUpd.text(), 10) - 1;
    if (newVal >= 1) divUpd.text(newVal);*/

    var oldQuantity = parseInt($('#quantity_'+cid).text(), 10);
    var newqty = oldQuantity - parseInt(qty, 10);
    if(newqty >= lqty) {
        updateCartItem(cid,newqty);
    } else {
        removeCartItem(cid);
    }
}


function addProductToCart(pid,qty) {
    var productId = pid;
    var quantity  = qty ? qty : 1;
    var price     = $('#pdt_price_'+pid).val();
    var name      = $('#pdt_name_'+pid).val();
    var image     = $('#pdt_image_'+pid).val();
    var supplier  = $('#pdt_supplier_'+pid).val();
    var maxqty    = $('#pdt_maxqty_'+pid).val();
    var data = {
        'id':productId,
        'qty':quantity,
        'price':price,
        'name':name,
        'image':encodeURIComponent(image),
        'supplier':supplier,
        'maxqty' : maxqty
    }
    $.ajax({
        url:$base_url+'cart/add',
        type:'POST',
        data:data,
        success: function(r) {
            if ($.isPlainObject(r)) {
                var o = r;
            }else {
                var o = JSON.parse(r);
            }
            $('.cartCount').text(o.totalItems);
            swal({type:o.type,text:o.message});
        }
    });
}

function removeCartItem(cid) {
    var data = {
        'rowid':cid
    }
    $.ajax({
        url:$base_url+'cart/remove',
        type:'POST',
        data:data,
        success: function(r) {
            if ($.isPlainObject(r)) {
                var o = r;
            }else {
                var o = JSON.parse(r);
            }
            $('.cart-items').html(o.data);
            $('.cartCount').text(o.totalItems);
            
            if(o.totalItems <= 0) {
                window.location.href = $base_url+'home';
            }
        }
    });
}

function updateCartItem(cid,qty) {
    var data = {
        'rowid':cid,
        'qty':qty,
    }
    $.ajax({
        url:$base_url+'cart/update',
        type:'POST',
        data:data,
        success: function(r) {
            if ($.isPlainObject(r)) {
                var o = s;
            }else {
                var o = JSON.parse(r);
            }
            $('.cart-items').html(o.data);
            $('.cartCount').text(o.totalItems);

            if(o.totalItems <= 0) {
                window.location.href = $base_url+'home';
            }
        }
    });
}