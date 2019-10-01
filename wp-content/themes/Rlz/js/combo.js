function dialogue(a,b,c){var d=$("<div/>");d.addClass("white-popup"),d.append($("<div/>").addClass("ic-modal-title").text(b));for(var e=$("<div/>").addClass("ic-modal-content"),f=0;f<a.length;f++)e.append(a.get(f));e.find(":button").addClass("mfp-close").addClass("mfp-close-ok"),d.append(e),$.magnificPopup.open({closeOnContentClick:!1,items:{src:d,type:"inline"},callbacks:{close:function(){jumpToAnchor(c)}}},0)}function jumpToAnchor(a){a&&$(document).scrollTop($(a).offset().top)}function Alert(a,b){var a=$("<p />",{html:a}),c=$("<button />",{text:"Ok",class:"full"});dialogue(a.add(c),"Alert!",b)}function Prompt(a,b,c,d){var e=$("<p />",{text:a}),f=$("<input />",{val:b}),g=$("<button />",{text:"Ok",click:function(){c(f.val())}}),h=$("<button />",{text:"Cancel",click:function(){c(null)}});dialogue(e.add(f).add(g).add(h),"Attention!",d)}function Confirm(a,b,c){var d=$("<p />",{text:a}),e=$("<button />",{text:"Ok",click:function(){b(!0)}}),f=$("<button />",{text:"Cancel",click:function(){b(!1)}});dialogue(d.add(e).add(f),"Do you agree?",c)}function Question(a,b,c){var d=$("<p />",{html:a}),e=$("<button />",{text:"Yes",click:function(){b(!0)}}),f=$("<button />",{text:"No",click:function(){b(!1)}});dialogue(d.add($("<div />")).append(e).append(f),"Please Review",c)}function answerQuestion(a){a?($("#cc_number").val(""),$('#cc_month option[value=""]').prop("selected",!0),$('#cc_year option[value=""]').prop("selected",!0),$("#cc_cvv").val("")):window.location=window.answerLink}function getStates(a,b,c,d){if(a&&b){var c=$.inArray(c,window.countries)!=-1&&c,d=$.inArray(c,window.countries)!=-1&&d,e=$("#"+b+"StateLabel",a),f=$("#"+b+"ZipLabel",a),g=$("select[name="+b+"State]",a),h=$("input[name="+b+"State]",a);c&&$("select[name="+b+"Country] option[value="+c+"]").attr("selected","selected");var i=$("select[name="+b+"Country]",a);$.ajax({url:"ajax/states.php",data:{country:i.val()},dataType:"json",success:function(a){if(a.complete){e.html(a.stateLabel),f.html(a.zipLabel),g.empty(),$.each(a.states,function(a,b){g.append($("<option></option>").attr("value",a).text(b))}),d&&$("select[name="+b+"State] option[value="+d+"]").attr("selected","selected");var c=$("select[name="+b+"State]").has("[selected]");0==c.length&&$("select[name="+b+"State] option:first-child").attr("selected","selected"),a.disabled?(g.attr("disabled","disabled").addClass("hidden"),h.removeAttr("disabled").removeClass("hidden")):(g.removeAttr("disabled").removeClass("hidden"),h.attr("disabled","disabled").addClass("hidden"))}}})}else Alert("Field not specified for states")}function validateEmail(a){var b=/^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;return!!b.test(a)}function validateString(a,b){return!!a&&!(a.length<b)}function validatePhone(a){var c=/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/,d=/^[a-zA-Z0-9\-().\s]{10,15}$/,e=/^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$/;return!!c.test(a.replace(/[\s()+\-\.]|ext/gi,""))||(!!d.test(a.replace(/[\s()+\-\.]|ext/gi,""))||!!e.test(a.replace(/[\s()+\-\.]|ext/gi,"")))}function validateName(){return name.val().length<4?(name.addClass("error"),nameInfo.text("We want names with more than 3 letters!"),nameInfo.addClass("error"),!1):(name.removeClass("error"),nameInfo.text("What's your name?"),nameInfo.removeClass("error"),!0)}function validateMessage(){return message.val().length<10?(message.addClass("error"),!1):(message.removeClass("error"),!0)}function numericOnly(){$(".numeric").keyup(function(a){var b=$(this).val();/\D/g.test(b)&&(b=b.replace(/\D/g,"")),$(this).val(b)})}function decimalOnly(a){var b=$("input[name="+a+"]").val();b=parseFloat(b),$("input[name="+a+"]").val(parseInt(b))}function modalOnClick(){$(".modalClick").each(function(){var b=($(this).attr("href"),$(this).attr("target"));"iframe"==b?$(this).magnificPopup({closeOnContentClick:!1,disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!0,fixedContentPos:!0,fixedBgPos:!0}):$(this).magnificPopup({closeOnContentClick:!1,fixedContentPos:!0,fixedBgPos:!0,type:"ajax",ajax:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},callbacks:{parseAjax:function(a){a.data=$(a.data).closest(".content")},ajaxContentAdded:function(){modalOnClick()}}})}).click(function(a){a.preventDefault()})}function addCoupon(a){$.ajax({url:"ajax/cart.php",data:{coupon:a,action:"add_coupon"},dataType:"json",beforeSend:function(){$("#price_area").html("Loading ... ")},success:function(a){refreshTotals(),a.complete||Alert(a.msg)}})}function refreshTotals(){$.ajax({url:"ajax/cart.php",data:{action:"totals"},dataType:"json",success:function(a){a.complete&&(console.log(a),$("#price_area").html(a.totals),1==a.info.coupon_status&&($("#dynamic_product_price_XX").val(a.info.unitprice),$("#dynamic_product_price_XX").attr("name","dynamic_product_price_"+a.info.prodID)))}})}function cartItemAdd(a,b,c,d){$.ajax({url:"ajax/cart.php",data:{item:a,itemQty:b,itemPrice:c,itemShipping:d,action:"add_item"},dataType:"json",beforeSend:function(){$("#price_area").html("Loading ... ")},success:function(a){refreshTotals()}})}function isEmpty(a){return void 0===a||null==a||a.length<=0}function showLoading(){window.internalLink=!0,window.formSubmitted=!0,$.magnificPopup.open({closeOnContentClick:!1,closeOnBgClick:!1,showCloseBtn:!1,enableEscapeKey:!1,items:{src:"#ic-loading",type:"inline"}})}function showExitPopup(){window.internalLink=!0,window.formSubmitted=!0,$.magnificPopup.open({closeOnContentClick:!1,closeOnBgClick:!1,showCloseBtn:!1,enableEscapeKey:!1,items:{src:"#ic-exitpop",type:"inline"}})}

//** Scrolling HTML Bookmarks script- (c) Dynamic Drive DHTML code library: http://www.dynamicdrive.com.
//** Available/ usage terms at http://www.dynamicdrive.com/ (April 11th, 09')
//** Updated Nov 10th, 09'- Fixed anchor jumping issue in IE7

var bookmarkscroll={
    setting: {duration:1000, yoffset:0}, //{duration_of_scroll_milliseconds, offset_from_target_element_to_rest}
    topkeyword: '#top', //keyword used in your anchors and scrollTo() to cause script to scroll page to very top

    scrollTo:function(dest, options, hash){
        var $=jQuery, options=options || {}
        var $dest=(typeof dest=="string" && dest.length>0)? (dest==this.topkeyword? 0 : $('#'+dest)) : (dest)? $(dest) : [] //get element based on id, topkeyword, or dom ref
        if ($dest===0 || $dest.length==1 && (!options.autorun || options.autorun && Math.abs($dest.offset().top+(options.yoffset||this.setting.yoffset)-$(window).scrollTop())>5)){
            this.$body.animate({scrollTop: ($dest===0)? 0 : $dest.offset().top+(options.yoffset||this.setting.yoffset)}, (options.duration||this.setting.duration), function(){
                if ($dest!==0 && hash)
                    location.hash=hash
            })
        }
    },

    urlparamselect:function(){
        var param=window.location.search.match(/scrollto=[\w\-_,]+/i) //search for scrollto=divid
        return (param)? param[0].split('=')[1] : null
    },

    init:function(){
        jQuery(document).ready(function($){
            var mainobj=bookmarkscroll
            mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
            var urlselectid=mainobj.urlparamselect() //get div of page.htm?scrollto=divid
            if (urlselectid) //if id defined
                setTimeout(function(){mainobj.scrollTo(document.getElementById(urlselectid) || $('a[name='+urlselectid+']:eq(0)').get(0), {autorun:true})}, 100)
            $('a[href^="#"]').each(function(){ //loop through links with "#" prefix
                var hashvalue=this.getAttribute('href').match(/#\w+$/i) //filter links at least 1 character following "#" prefix
                hashvalue=(hashvalue)? hashvalue[0].substring(1) : null //strip "#" from hashvalue
                if (this.hash.length>1){ //if hash value is more than just "#"
                    var $bookmark=$('a[name='+this.hash.substr(1)+']:eq(0)')
                    if ($bookmark.length==1 || this.hash==mainobj.topkeyword){ //if HTML anchor with given ID exists or href==topkeyword
                        if ($bookmark.length==1 && !document.all) //non IE, or IE7+
                            $bookmark.html('.').css({position:'absolute', fontSize:1, visibility:'hidden'})
                        $(this).click(function(e){
                            mainobj.scrollTo((this.hash==mainobj.topkeyword)? mainobj.topkeyword : $bookmark.get(0), {}, this.hash)
                            e.preventDefault()
                        })
                    }
                }
            })
        })
    }
}

bookmarkscroll.init();







/*!
 * jQuery Placeholder Plugin v2.3.1
 * https://github.com/mathiasbynens/jquery-placeholder
 *
 * Copyright 2011, 2015 Mathias Bynens
 * Released under the MIT license
 */
(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof module === 'object' && module.exports) {
        factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function($) {

    /****
     * Allows plugin behavior simulation in modern browsers for easier debugging.
     * When setting to true, use attribute "placeholder-x" rather than the usual "placeholder" in your inputs/textareas
     * i.e. <input type="text" placeholder-x="my placeholder text" />
     */
    var debugMode = false;

    // Opera Mini v7 doesn't support placeholder although its DOM seems to indicate so
    var isOperaMini = Object.prototype.toString.call(window.operamini) === '[object OperaMini]';
    var isInputSupported = 'placeholder' in document.createElement('input') && !isOperaMini && !debugMode;
    var isTextareaSupported = 'placeholder' in document.createElement('textarea') && !isOperaMini && !debugMode;
    var valHooks = $.valHooks;
    var propHooks = $.propHooks;
    var hooks;
    var placeholder;
    var settings = {};

    if (isInputSupported && isTextareaSupported) {

        placeholder = $.fn.placeholder = function() {
            return this;
        };

        placeholder.input = true;
        placeholder.textarea = true;

    } else {

        placeholder = $.fn.placeholder = function(options) {

            var defaults = {customClass: 'placeholder'};
            settings = $.extend({}, defaults, options);

            return this.filter((isInputSupported ? 'textarea' : ':input') + '[' + (debugMode ? 'placeholder-x' : 'placeholder') + ']')
                .not('.'+settings.customClass)
                .not(':radio, :checkbox, [type=hidden]')
                .bind({
                    'focus.placeholder': clearPlaceholder,
                    'blur.placeholder': setPlaceholder
                })
                .data('placeholder-enabled', true)
                .trigger('blur.placeholder');
        };

        placeholder.input = isInputSupported;
        placeholder.textarea = isTextareaSupported;

        hooks = {
            'get': function(element) {

                var $element = $(element);
                var $passwordInput = $element.data('placeholder-password');

                if ($passwordInput) {
                    return $passwordInput[0].value;
                }

                return $element.data('placeholder-enabled') && $element.hasClass(settings.customClass) ? '' : element.value;
            },
            'set': function(element, value) {

                var $element = $(element);
                var $replacement;
                var $passwordInput;

                if (value !== '') {

                    $replacement = $element.data('placeholder-textinput');
                    $passwordInput = $element.data('placeholder-password');

                    if ($replacement) {
                        clearPlaceholder.call($replacement[0], true, value) || (element.value = value);
                        $replacement[0].value = value;

                    } else if ($passwordInput) {
                        clearPlaceholder.call(element, true, value) || ($passwordInput[0].value = value);
                        element.value = value;
                    }
                }

                if (!$element.data('placeholder-enabled')) {
                    element.value = value;
                    return $element;
                }

                if (value === '') {

                    element.value = value;

                    // Setting the placeholder causes problems if the element continues to have focus.
                    if (element != safeActiveElement()) {
                        // We can't use `triggerHandler` here because of dummy text/password inputs :(
                        setPlaceholder.call(element);
                    }

                } else {

                    if ($element.hasClass(settings.customClass)) {
                        clearPlaceholder.call(element);
                    }

                    element.value = value;
                }
                // `set` can not return `undefined`; see http://jsapi.info/jquery/1.7.1/val#L2363
                return $element;
            }
        };

        if (!isInputSupported) {
            valHooks.input = hooks;
            propHooks.value = hooks;
        }

        if (!isTextareaSupported) {
            valHooks.textarea = hooks;
            propHooks.value = hooks;
        }

        $(function() {
            // Look for forms
            $(document).delegate('form', 'submit.placeholder', function() {

                // Clear the placeholder values so they don't get submitted
                var $inputs = $('.'+settings.customClass, this).each(function() {
                    clearPlaceholder.call(this, true, '');
                });

                setTimeout(function() {
                    $inputs.each(setPlaceholder);
                }, 10);
            });
        });

        // Clear placeholder values upon page reload
        $(window).bind('beforeunload.placeholder', function() {

            var clearPlaceholders = true;

            try {
                // Prevent IE javascript:void(0) anchors from causing cleared values
                if (document.activeElement.toString() === 'javascript:void(0)') {
                    clearPlaceholders = false;
                }
            } catch (exception) { }

            if (clearPlaceholders) {
                $('.'+settings.customClass).each(function() {
                    this.value = '';
                });
            }
        });
    }

    function args(elem) {
        // Return an object of element attributes
        var newAttrs = {};
        var rinlinejQuery = /^jQuery\d+$/;

        $.each(elem.attributes, function(i, attr) {
            if (attr.specified && !rinlinejQuery.test(attr.name)) {
                newAttrs[attr.name] = attr.value;
            }
        });

        return newAttrs;
    }

    function clearPlaceholder(event, value) {

        var input = this;
        var $input = $(this);

        if (input.value === $input.attr((debugMode ? 'placeholder-x' : 'placeholder')) && $input.hasClass(settings.customClass)) {

            input.value = '';
            $input.removeClass(settings.customClass);

            if ($input.data('placeholder-password')) {

                $input = $input.hide().nextAll('input[type="password"]:first').show().attr('id', $input.removeAttr('id').data('placeholder-id'));

                // If `clearPlaceholder` was called from `$.valHooks.input.set`
                if (event === true) {
                    $input[0].value = value;

                    return value;
                }

                $input.focus();

            } else {
                input == safeActiveElement() && input.select();
            }
        }
    }

    function setPlaceholder(event) {
        var $replacement;
        var input = this;
        var $input = $(this);
        var id = input.id;

        // If the placeholder is activated, triggering blur event (`$input.trigger('blur')`) should do nothing.
        if (event && event.type === 'blur' && $input.hasClass(settings.customClass)) {
            return;
        }

        if (input.value === '') {
            if (input.type === 'password') {
                if (!$input.data('placeholder-textinput')) {

                    try {
                        $replacement = $input.clone().prop({ 'type': 'text' });
                    } catch(e) {
                        $replacement = $('<input>').attr($.extend(args(this), { 'type': 'text' }));
                    }

                    $replacement
                        .removeAttr('name')
                        .data({
                            'placeholder-enabled': true,
                            'placeholder-password': $input,
                            'placeholder-id': id
                        })
                        .bind('focus.placeholder', clearPlaceholder);

                    $input
                        .data({
                            'placeholder-textinput': $replacement,
                            'placeholder-id': id
                        })
                        .before($replacement);
                }

                input.value = '';
                $input = $input.removeAttr('id').hide().prevAll('input[type="text"]:first').attr('id', $input.data('placeholder-id')).show();

            } else {

                var $passwordInput = $input.data('placeholder-password');

                if ($passwordInput) {
                    $passwordInput[0].value = '';
                    $input.attr('id', $input.data('placeholder-id')).show().nextAll('input[type="password"]:last').hide().removeAttr('id');
                }
            }

            $input.addClass(settings.customClass);
            $input[0].value = $input.attr((debugMode ? 'placeholder-x' : 'placeholder'));

        } else {
            $input.removeClass(settings.customClass);
        }
    }

    function safeActiveElement() {
        // Avoid IE9 `document.activeElement` of death
        try {
            return document.activeElement;
        } catch (exception) {}
    }
}));







$(function () {
    $('.zip-change').on('blur keyup', function () {
      var $this = $(this);
      if ($this.val().length == 5) {
        getAddressInfoByZip($this.val());
      }
    });
  });

function getAddressInfoByZip(zip) {
if (zip.length >= 5 && typeof google != 'undefined') {
var addr = {};
var geocoder = new google.maps.Geocoder();
geocoder.geocode({'address': zip}, function (results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results.length >= 1) {
  for (var ii = 0; ii < results[0].address_components.length; ii++) {
    var street_number = route = street = city = state = zipcode = country = formatted_address = '';
    var types = results[0].address_components[ii].types.join(",");
    if (types == "street_number") {
      addr.street_number = results[0].address_components[ii].long_name;
    }
    if (types == "route" || types == "point_of_interest,establishment") {
      addr.route = results[0].address_components[ii].long_name;
    }
    if (types == "sublocality,political" || types == "locality,political" || types == "neighborhood,political" || types == "administrative_area_level_3,political") {
      addr.city = (city == '' || types == "locality,political") ? results[0].address_components[ii].long_name : city;
    }
    if (types == "administrative_area_level_1,political") {
      addr.state = results[0].address_components[ii].short_name;
    }
    if (types == "postal_code" || types == "postal_code_prefix,postal_code") {
      addr.zipcode = results[0].address_components[ii].long_name;
    }
    if (types == "country,political") {
      addr.country = results[0].address_components[ii].long_name;
    }
  }
  addr.success = true;
  for (name in addr) {
}
if (addr.country == 'United States') {
  var state = addr.state;
  var city = addr.city;
  $('[name="shippingState"]').val(state).change();
  console.log(state);
  $('#fields_city').val(city);
  $('.zip-change').addClass('valid').removeClass('error');
} else {
  $('[name="shippingState"]').val('').change();
  $('.zip-change').addClass('error').removeClass('valid');
  $('#fields_city').val('');
  return false;
}


} else {
//response({success:false});
return false;
}
} else {
//response({success:false});
return false;
}
});
} else {
//response({success:false});
return false;
}
}

function response(obj) {
//console.log(obj);
}

//console.log(country);








var spd = 1000;
var cntDown = 600 ;
setInterval(function () {
      var mn, sc;

      mn = Math.floor(cntDown / 60 );
      mn = (mn < 10 ? '0' + mn : mn);
      sc = Math.floor(cntDown% 60);
      sc = (sc < 10 ? '0' + sc : sc);

      cntDown--;
      if(cntDown < 0) {
      var result = 00 + ':' + 00 ;
        cntDown=20;
      }

      var result = mn + ':' + sc ;
      document.getElementById('time').innerHTML = result;
    }, spd);











if (!app_config.offer_current_step) {
    app_config.offer_current_step = 1;
}

if (!app_config.downsell_current_step) {
    app_config.downsell_current_step = 1;
}

var offerDetailStep = 'offer_details_step' + app_config.offer_current_step.toString();
var exitPopup = 'exit_popup' + app_config.downsell_current_step.toString() + '_enabled';
var exitPopupElem = 'exit_popup' + app_config.downsell_current_step.toString() + '_element_id';
var exitPopupText = 'exit_popup' + app_config.downsell_current_step.toString() + '_browser_alert_text';

var _exit = !app_config[offerDetailStep][exitPopup];

(function ($) {
    $(document).ready(function () {
        window.onbeforeunload = function () {
            if (!_exit && $('#' + app_config[offerDetailStep][exitPopupElem]).length) {
                _exit = true;
                $('#' + app_config[offerDetailStep][exitPopupElem]).show();
                return app_config[offerDetailStep][exitPopupText];
            }
        };
    });
})(jQuery);

function ouibounce(el, config) {
    var config = config || {},
            aggressive = config.aggressive || false,
            sensitivity = setDefault(config.sensitivity, 20),
            timer = setDefault(config.timer, 1000),
            delay = setDefault(config.delay, 0),
            callback = config.callback ||
            function () {
            },
            cookieExpire = setDefaultCookieExpire(config.cookieExpire) || '',
            cookieDomain = config.cookieDomain ? ';domain=' + config.cookieDomain : '',
            cookieName = config.cookieName ? config.cookieName : 'viewedOuibounceModal',
            sitewide = config.sitewide === true ? ';path=/' : '',
            _delayTimer = null,
            _html = document.documentElement;

    function setDefault(_property, _default) {
        return typeof _property === 'undefined' ? _default : _property;
    }

    function setDefaultCookieExpire(days) {
        var ms = days * 24 * 60 * 60 * 1000;

        var date = new Date();
        date.setTime(date.getTime() + ms);

        return "; expires=" + date.toUTCString();
    }

    setTimeout(attachOuiBounce, timer);

    function attachOuiBounce() {
        _html.addEventListener('mouseleave', handleMouseleave);
        _html.addEventListener('mouseenter', handleMouseenter);
        _html.addEventListener('keydown', handleKeydown);
    }

    function handleMouseleave(e) {
        if (e.clientY > sensitivity || (checkCookieValue(cookieName, 'true') && !aggressive)) {
            return;
        }

        _delayTimer = setTimeout(_fireAndCallback, delay);
    }

    function handleMouseenter(e) {
        if (_delayTimer) {
            clearTimeout(_delayTimer);
            _delayTimer = null;
        }
    }

    var disableKeydown = false;

    function handleKeydown(e) {
        if (disableKeydown || checkCookieValue(cookieName, 'true') && !aggressive) {
            return;
        } else if (!e.metaKey || e.keyCode !== 76) {
            return;
        }

        disableKeydown = true;
        _delayTimer = setTimeout(_fireAndCallback, delay);
    }

    function checkCookieValue(cookieName, value) {
        return parseCookies()[cookieName] === value;
    }

    function parseCookies() {
        var cookies = document.cookie.split('; ');

        var ret = {};
        for (var i = cookies.length - 1; i >= 0; i--) {
            var el = cookies[i].split('=');
            ret[el[0]] = el[1];
        }

        return ret;
    }

    function _fireAndCallback() {
        fire();
        callback();
    }

    function fire() {
        if (el) {
            el.style.display = 'block';
        }

        disable();
    }

    function disable(options) {
        var options = options || {};

        if (typeof options.cookieExpire !== 'undefined') {
            cookieExpire = setDefaultCookieExpire(options.cookieExpire);
        }

        if (options.sitewide === true) {
            sitewide = ';path=/';
        }

        if (typeof options.cookieDomain !== 'undefined') {
            cookieDomain = ';domain=' + options.cookieDomain;
        }

        if (typeof options.cookieName !== 'undefined') {
            cookieName = options.cookieName;
        }

        document.cookie = cookieName + '=true' + cookieExpire + cookieDomain + sitewide;

        _html.removeEventListener('mouseleave', handleMouseleave);
        _html.removeEventListener('mouseenter', handleMouseenter);
        _html.removeEventListener('keydown', handleKeydown);
    }

    return {
        fire: fire,
        disable: disable
    };
}


$(function() {
    $(window).keydown(function(e) {
        if (e.which === 27 && $('#error_handler_overlay').length) {
            $('#error_handler_overlay').remove();
        }
    });

    // $(document).off('click', '#error_handler_overlay');
    // $(document).on('click', '#error_handler_overlay', function() {
    //  $(this).remove();
    // });

    $(document).off('click', '#error_handler_overlay_close');
    $(document).on('click', '#error_handler_overlay_close', function(event) {
        event.preventDefault ? event.preventDefault() : (event.returnValue = false);
        $('#error_handler_overlay').remove();
    });
});

function error_handler(errors) {
    if ($('#error_handler_overlay').length) {
        $('#error_handler_overlay').remove();
    }

    $('body').append(getUI(errors));

    $('#error_handler_overlay').fadeIn(500);
}

function getUI(errors) {
    var li = '';

    $.each(errors, function(key, value) {
        li += '<li>' + value + '</li>';
    });

    var html = '';
    html += '<div id="error_handler_overlay">';
    html += '<div class="error_handler_body"><a href="javascript:void(0);" id="error_handler_overlay_close">X</a><ul>' + li + '</ul></div>';
    html += '</div>';

    return html;
}




$(document).ready(function() {


  modalOnClick();
       $('.slider').slick({
         dots: true,
         autoplay: true,
         autoplaySpeed: 15000,
         adaptiveHeight: true,
         fade: false,
         focusOnSelect: false,
         arrows: false,
         //slidesToScroll: 3,
         slidesToShow: 1,
         responsive: [{
          breakpoint: 767,
          settings: {
           slidesToShow: 1,
           slidesToScroll: 1,
         }
       }]

 });



     $("#ouibounce-modal").on('click',function(e){
      $(this).hide();
      $('html, body').animate({
        scrollTop: $("form").offset().top
      }, 1000);
    });
    // if you want to use the 'fire' or 'disable' fn,
    // you need to save OuiBounce to an object
    var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
     aggressive: true,
     timer: 0,
     callback: function () {
      console.log('ouibounce fired!');
    }
  });

    $('body').on('click', function () {
     $('#ouibounce-modal').hide();
   });

    $('#ouibounce-modal .modal-footer').on('click', function () {
     $('#ouibounce-modal').hide();
   });

    $('#ouibounce-modal .modal_neu').on('click', function (e) {
     e.stopPropagation();
   });


    $(document).mousemove(function(e) {
          if(e.pageY <= 5)
          {
                  // Show the exit popup
                  $('#exitpopup-overlay').fadeIn();
                  //$('#exit_pop').fadeIn();
                }

          });

    $('#exitpopup_bg').click(function(){
      $('#exitpopup-overlay').fadeOut();
      $('#exit_pop').slideUp();
    });

    $('.close').click(function () {
      $('#viewing-lp').hide();
    });

        //console.log("test");
        var show = true;
        $('#viewing-lp').hide();
        function viewing() {
         var windowH = $(window).height()
         var scroll = $(window).scrollTop();

         if(scroll>100 && show == true){
          $('#viewing-lp').fadeIn();
        }else{
         $('#viewing-lp').fadeOut();
       }

     }

     viewing();
     jQuery(window).on('scroll',function(){

      viewing();
    });

     $("#viewing-lp .close").click(function(){
      $('#viewing-lp').fadeOut();
      show = false;
    });


function removeDownsell(){
    $('.exitpopup-overlay').hide();
}

$('input, textarea').placeholder();

});
