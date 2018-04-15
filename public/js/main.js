var config = {};

$(function(){
    $.ajax({
        url: '?cmd=getConfig',
        dataType: 'json',
        async: false,
        data: '',
        success: function(data) {
           config = data;
        }
    });
});

function exchangeCurrency(sum){
    var sum_exchange = 0;
    $.ajax({
        url: '?cmd=exchangeCurrency&sum='+sum,
        async: false,
        data: '',
        success: function(data) {
           sum_exchange = data;
        }
    });
    return Number(sum_exchange);
}



$(function(){
    $("a[href^='/?lang'], a[href^='/?currency']").on("click", function(e){
        $.get(this.href, function(data){
            location.reload();
        });
        e.preventDefault();
    });
});


$(function(){
    $("a.disabled").on("click", function(e){
        e.preventDefault();
    });
});



$(function(){
    
    $(window).scroll(function(){
        if($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        }else{
            $('.go-top').fadeOut(200);
        }
    });
    $('.go-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 300);
    });

    
    
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });
    
    
    if($(".order-steps").length != 0 && $(document).outerWidth() <= 768){
        $('html, body').animate({
            scrollTop: $(".order-steps").offset().top
        }, 0);
    }
    
    if($(".product").length != 0 && $(document).outerWidth() <= 768){
        $('html, body').animate({
            scrollTop: $(".product").offset().top
        }, 500);
    }
    
    
    $("body").on("touchstart mouseover", ".items .photo a.hover", function(e){
        $(this).addClass('active');
    });
    $("body").on("touchend mouseout", ".items .photo a.hover", function(e){
        $('.items .photo a.hover').removeClass('active');
    });
    
    
    $(window).on("scroll load resize", function (e) {
        if(window.location.pathname != "/step-1"){
            if($(window).scrollTop() > $(".navbar").offset().top){
                if($(".cart.fixed").length == 0){
                    $(".cart").addClass("fixed");
                }
            }else{
                if($(".cart.fixed").length != 0){
                    $(".cart").removeClass("fixed");
                }
            }
        }
    });
    



$(function(){
    $(".sortable").css("cursor", "move");
	$(".sortable").parent().sortable({
        items: '> .sortable',
		update : function () {
            $(".loading").fadeIn();
			$(this).find('.sortable').each(function(index){
                var sort = index;
                var group = $(this).data("sort").split(',')[0];
                var parent = $(this).data("sort").split(',')[1];
                var photoID = $(this).data("sort").split(',')[2];
                $.post('?cmd=sortablePhoto', {group : group, parent : parent, photoID : photoID, sort : sort}, function(data){
                    $(".loading").fadeOut();
                });
            });
		}
	});
});

function previewPhoto(e) {
    window.URL = window.URL || window.webkitURL;
    var list = '';
    $(".photo-group .photo-preview").remove();
    for(i = 0; i < e.files.length; i++){
        list += '<div class="photo-option photo-preview" style="background-image:url('+window.URL.createObjectURL(e.files[i])+');"></div>';
    }
    $(".photo-group").append(list);
}

function addPhoto(group, parent, file) {
    $(".loading").fadeIn();
	formdata = new FormData();
	for ( i = 0; i < file.files.length; i++) {
       formdata.append("file[]", file.files[i]);
    }
    formdata.append("group", group);
    formdata.append("parent", parent);
	$.ajax({
		url: "?cmd=addPhoto",
		type: "POST",
		data: formdata,
		processData: false,
		contentType: false,
		success: function (data){
            window.location.reload();
		}
	});     
}

function removePhoto(group, parent, photoID){
	$.post("?cmd=removePhoto", {group : group, parent : parent, photoID : photoID}, function(data) {
          window.location.reload();
	});
}

function removePreOrder(group, parent, photoID){
	$.post("?cmd=removePhoto", {group : group, parent : parent, photoID : photoID}, function(data) {
          window.location.reload();
	});
}


$(document).on("click", ".reload", function(e){
     var reload_btn = this;
     var box = "."+reload_btn.dataset.box;
     var start = reload_btn.dataset.start;
     var end = reload_btn.dataset.end;
     var refresh_icon = $(reload_btn).find(".fa-refresh");
     $(refresh_icon).fadeIn();
     $.get(''+this.href+'?start='+start+'&end='+end, function(data){
         if(data.length > 50){
             //var scrollTop = $(window).scrollTop() + 250;
             $(box).append(data);
             //$('html, body').animate({scrollTop : scrollTop}, 400);
             reload_btn.dataset.start = Number(start) + Number(end);
             document.cookie = "end="+reload_btn.dataset.start+"; path=/;";
         }
         $(refresh_icon).fadeOut();
     });
    e.preventDefault();
});

$(function(){
    if($('.reload').length > 0){
        var lastID = 0;
        $(window).scroll(function(){
            if ($(window).scrollTop() + $(window).height() - 100 >= $(".products-box").height() + $(".products-box").offset().top){
                if($("[data-id]").last().length > 0 && $("[data-id]").last().data("id") != lastID){
                    $(".reload").click();
                    lastID = $("[data-id]").last().data("id");
                }
            }
        });  
    }
});



$(window).on("load", function(e){
    getOverlay();
});

$(window).on("hashchange", function(e){
    if($('.modal').length > 0){
        $(".modal").remove();
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open");
        $("body").css("padding-right", 0);
        $("body").css("padding-left", 0);
    }
    getOverlay();
});

function getOverlay(){
    var url = (location.hash.indexOf("#!")==0) ? location.hash.substring(2) : location.hash.substring(1);
    if(url != "" && url != "close"){
        $.get("/overlay/"+url, function(data){
            if($('.modal').length == 0){
                if(data != ""){
                    $("body").append(data);
                    $('.modal').modal('show');
                }else{
                    if($("a[href='?cmd=logOut']").length == 0){
                        location.href = "/signIn?backUrl="+encodeURIComponent(location.href);
                    }else{
                        location.hash = "#close";
                    }
                }
            }
        });
    }
}

$(document).on('hide.bs.modal','.modal', function (){
    history.pushState({}, '', "#");
});
$(document).on('show.bs.modal','.modal', function (){
});
$(document).on('shown.bs.modal','.modal', function (){
    $("body").addClass("modal-open");
});
$(document).on('hidden.bs.modal','.modal', function (){
    $("body").removeClass("modal-open");
    $(".modal").remove();
    $(".modal-backdrop").remove();
});



$(document).on('submit', '.form-ajax', function(e){
    e.preventDefault();
    var form = this;
    var message = $(form).find(".form-message");
    var loading = $(form).find(".loading");
    $(loading).fadeIn();
    $(form).find("input[type=text], textarea, select").css("border", "1px solid #ccc");
    $(this).ajaxSubmit(function(data){
        $(loading).fadeOut();
        var response = $.parseJSON(data);
        if(response.message !== 0){
            message.html(response.message).hide().fadeIn();
        }
        if(Array.isArray(response.field) && response.field !== false){
            response.field.forEach(function(index){
                $(form).find("[name="+index+"]").css("border", "1px solid red");
            });
        }
        if(response.reset === true){
            form.reset();
        }
        if(response.location !== false){
            if(response.location.hash !== false){
                history.pushState({}, '', "#");
                window.location.hash = response.location.hash;
            }else if(response.location.href !== false){
                window.location.href = response.location.href;
            }else if(response.location.reload === true){
                window.location.reload();
            }
        }
    }); 
}); 



function highlightStar(obj,id){
	removeHighlight(id);		
	$('.rating-box#rating-item-'+id+' li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $('.rating-box#rating-item-'+id+' li').index(obj)) {
			return false;	
		}
	});
}
function removeHighlight(id){
	$('.rating-box#rating-item-'+id+' li').removeClass('selected');
	$('.rating-box#rating-item-'+id+' li').removeClass('highlight');
}
function addRating(obj,id){
	$('.rating-box#rating-item-'+id+' li').each(function(index) {
		$(this).addClass('selected');
		$('#rating-item-'+id+' .rating').val((index+1));
		if(index == $('.rating-box#rating-item-'+id+' li').index(obj)) {
			return false;	
		}
	});
	$.get('?cmd=addRating&id='+id+'&rating='+$('#rating-item-'+id+' .rating').val(), function(data){
        $(".rating_count").html(Number(data).toFixed(1));
    });
}
function resetRating(id){
	if($('#rating-item-'+id+' .rating').val() != 0) {
		$('.rating-box#rating-item-'+id+' li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $('#rating-item-'+id+' .rating').val()) {
				return false;	
			}
		});
	}
}


$(document).on("click", "a[href^='?cmd=removeNotification']", function(e){
    var a = this;
    $(a).parent().fadeOut();
    $.getJSON(a.href, function(response){
    });
    e.preventDefault();
});


function getUpdate(){
    $.getJSON("?cmd=getUpdate", function(response){
        if(response.location != false){
            history.pushState({}, '', "#");
            location.hash = response.location.hash;
        }
        if(response.auth){
            var notification_count = $("sum.notification-count");
            if(response.voice !== false){
                //$("audio.tone").remove();
                //$("body").append("<audio class='tone' autoplay><source src='/public/img/voice.mp3' type='audio/mpeg'/><source src='/public/img/voice.ogg' type='audio/ogg'/></audio>");
            }
            if(response.message != false){
                notification_count.html(response.message.notification_count);
            }
        }
    });
}
$(function(){
    getUpdate();
    setInterval(getUpdate, 5000);
});



window.fbAsyncInit = function() {
FB.init({
  appId      : '1198944430209831',
  cookie     : true,
  xfbml      : true,
  version    : 'v2.8'
});
FB.AppEvents.logPageView();   
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.9&appId=1198944430209831";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).on("click", "a[href='?cmd=FBlogin']", function(e){
    var form = $(this).closest('form');
    var formMessage = $(form).find(".form-message");
    var loading = $(form).find(".loading");
    $(loading).fadeIn();
	FB.login(function(response){
		if(response.authResponse){
             $.get('?cmd=FBlogin&accessToken='+response.authResponse.accessToken, function(data){
                $(loading).fadeOut();
                var response = $.parseJSON(data);
                if(response.message !== 0){
                    formMessage.html(response.message).hide().fadeIn();
                }
                if(response.location !== false){
                    if(response.location.hash !== false){
                        history.pushState({}, '', "#");
                        window.location.hash = response.location.hash;
                    }else if(response.location.href !== false){
                        window.location.href = response.location.href;
                    }else if(response.location.reload === true){
                        window.location.reload();
                    }
                }
             });
		}
	}, {scope: 'public_profile, email'});
    e.preventDefault();
});