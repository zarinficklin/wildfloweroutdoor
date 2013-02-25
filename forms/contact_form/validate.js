/**
 * Copyright (c) 2012 Maurer Innovation, LLC
 *
 * @author Jason Maurer <jason@maurerinnovation.com>
 * @date 10/22/2012
 */

$(document).ready(function() {

	/**********************************************
		Functions
	**********************************************/

	var throw_error = function(obj, error) {
		$(obj).next().html(error).attr('class','help-block').css('color','#B94A48');
		$(obj).css('border-color','#B94A48');

		$('input#submit').addClass('disabled').attr('disabled','disabled');
	};
	var remove_error = function(obj) {
		$(obj).next().html('<i class="icon icon-ok"></i>').attr('class','help-inline').css('color','#57a358');
		$(obj).css('border-color','#000');

		$('input#submit').removeClass('disabled').removeAttr('disabled');
	};
	var validate_email = function(email) { 
    	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(email);
	};
	var check_fullname = function(obj) {
		var value = $(obj).val();

		if (value == '') {
			throw_error(obj, 'Please enter your name.');
			return false;
		} else {
			remove_error(obj);
			return true;
		}
	};
	var check_email = function(obj) {
		var value = $(obj).val();

		if (value == '' || !validate_email(value)) {
			throw_error(obj, 'Please enter a valid email.');
			return false;
		} else {
			remove_error(obj);
			return true;
		}
	};
	var check_message = function(obj) {
		var value = $(obj).val();

		if (value == '') {
			throw_error(obj, 'Please enter a message.');
			return false;
		} else {
			remove_error(obj);
			return true;
		}
	};

	/**********************************************
		Listeners
	**********************************************/

	var fullname = $('input#fullname');
	var email = $('input#email');
	var message = $('textarea#message');

	fullname.blur(function() {
		check_fullname(this);
	});

	email.blur(function() {
		check_email(this)
	});

	message.blur(function() {
		check_message(this);
	});

	$('input#submit').click(function() {
		check_fullname(fullname);
		check_email(email);
		check_message(message);
	});

});