/**
 * This file contains the main functionality that will be loaded for the theme
 * on many pages in the admin section. Author: Hana
 */
(function($) {

	/**
	 * Getter and setter function for text values - checks the type of the element and if the element contains
	 * embedded text (such as a DIV element), gets/sets its inner text. If the element sets contains its value
	 * as a "value" attribute (such as an INPUT element), gets/sets its value.
	 */
	$.fn.hanaval = function() {
		var elem = $(this),
		tagname=elem.get(0).tagName.toLowerCase(),
		value=arguments.length?arguments[0]:false;
		
		/**
		 * Gets the value.
		 */
		function hanaGetValue(){
			if(tagname==='input'||tagname==='select'){
				return elem.val();
			}else{
				return elem.text();
			}
		}
		
		/**
		 * Sets the value.
		 */
		function hanaSetValue(value){
			if(tagname==='input'||tagname==='select'){
				return elem.val(value)
			}else{
				return elem.text(value);
			}
		}
		
		if(value===false){
			//no arguments have been passed, call the getter function
			return hanaGetValue();
		}else{
			//there is at least one argument passed, call the setter function
			return hanaSetValue(value);
		}
	};

	hanaPageOptions = {

		/**
		 * Inits all the functions needed.
		 */
		init : function() {
			this.setColorPickerFunc();
			this.loadUploadFunctionality();
			this.loadCustomMetaboxFunc();
			this.setConditionalOptionFunc();
		},

		/**
		 * Loads the color picker functionality to all the inputs with class
		 * "color".
		 */
		setColorPickerFunc : function() {
			// set the colorpciker to be opened when the input has been clicked
			var colorInputs = $('input.color');
			if (colorInputs.length) {
				colorInputs.ColorPicker( {
					onSubmit : function(hsb, hex, rgb, el) {
						$(el).val('#' + hex);
						$(el).ColorPickerHide();
					},
					onBeforeShow : function() {
						$(this).ColorPickerSetColor(this.value);
					}
				});
			}

		},

		/**
		 * Loads the Media Library functionality to an element when it is
		 * clicked.
		 */
		loadMediaImage : function($input) {
			window.send_to_editor = function(html) {
				imgurl = $("img", html).attr("src");
				$input.val(imgurl);
				tb_remove();
			}
			tb_show('Add image from Media Library',
					"media-upload.php?type=image&TB_iframe=1");
		},

		/**
		 * Calls the Upload functionality. Requirements: - button with class
		 * "hana-upload-btn" - input field sibling to the button with class
		 * "hana-upload"
		 */
		loadUploadFunctionality : function() {
			$('.hana-upload-btn').each(function() {
				hanaPageOptions.loadUploader($(this));
			});
		},

		/**
		 * Loads the upload functionality to an element. Requirements: - input
		 * field sibling to the element with class "hana-upload"
		 * 
		 * @param element
		 *            the button element whose clicking event will trigger this
		 *            functionality
		 */
		loadUploader : function(element) {
			var button = element, interval, btntext, i, textContainer;
			new AjaxUpload(button, {
				action : hanaUploadHandlerUrl,
				name : 'hanafile',
				onSubmit : function(file, ext) {
					// change button text, when user selects file

					textContainer=element.find('span').length?element.find('span:first'):element;
					btntext = textContainer.hanaval();
					
					// If you want to allow uploading only 1 file at time,
					// you can disable upload button
					this.disable();

					// Uploding -> Uploading. -> Uploading...
					interval = window.setInterval(function() {
						if (++i <= 3) {
							textContainer.hanaval(textContainer.hanaval() + '.');
						} else {
							textContainer.hanaval(btntext);
							i = 0;
						}
					}, 200);
				},
				onComplete : function(file, response) {
					imgUrl = hanaUploadsUrl + '/' + response;
					button.siblings('input.hana-upload:first').attr('value',
							imgUrl);

					textContainer.hanaval(btntext);

					window.clearInterval(interval);

					// enable upload button
					this.enable();
				}
			});
		},
		
		loadCustomMetaboxFunc: function() {
			
			var $ptemplate_select = $('select#page_template'),
				$ptemplate_box = $('.postbox .hana-panel-wrap');
			
			if(	$ptemplate_box.length !== 0) $ptemplate_box.tabs();
			
			if( $ptemplate_select.length == 0) return;
				
			$ptemplate_select.live('change',function(){
				var this_value = jQuery(this).val();
				$ptemplate_box.find('div.options-block').not(".general").css('display','none');
				$ptemplate_box.find('div.options-block.'+this_value.replace('.php','')).css('display','block');
				$ptemplate_box.find('div.options-block').filter(function(){
				  var classes = this.className.split(/\s/);
				  for (var i = 0, len = classes.length; i < len; i++) 
					if (!/^not-/.test(classes[i]) && classes[i]!='options-block') return false;
				  return true;
				}).each(function(){
				  jQuery(this).css('display','block');
				});
				$ptemplate_box.find('div.options-block.not-'+this_value.replace('.php','')).css('display','none');
				
				$ptemplate_box.find('ul.tabs li').not(".general").css('display','none');
				$ptemplate_box.find('ul.tabs li.'+this_value.replace('.php','')).css('display','block');
				$ptemplate_box.find('ul.tabs li.not-'+this_value.replace('.php','')).css('display','none');
				$ptemplate_box.tabs('select',0);
			});
			
			$ptemplate_select.trigger('change');			
		},		
		setConditionalOptionFunc: function() {
			$('.option-conditional').each(function(){
				hanaPageOptions.doConditionalOptionChange(this);
				$(this).change(function() {
					hanaPageOptions.doConditionalOptionChange(this);
				});
			});
		},
		doConditionalOptionChange: function(object) {
			var name = $(object).attr('name');
			$(object).children("option").each(function()
			{
				$("div."+name+"-"+$(this).val()).css('display','none');
			});
			$("div."+name+"-"+$(object).children("option:selected").val()).show('slow');
		},
	};
})(jQuery);

jQuery(function() {
	hanaPageOptions.init();
});

