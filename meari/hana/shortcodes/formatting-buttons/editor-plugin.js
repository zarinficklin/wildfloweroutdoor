/**
 * This file contains all the main JavaScript functionality needed for the editor formatting buttons.
 * 
 * @author Hana
 * http://hana.com
 */

/**
 * Define all the formatting buttons with the HTML code they set.
 */
var hanaButtons=[
		{
			id:'hanaintro',
			image:'int.png',
			title:'Page Intro',
			allowSelection:true,
			fields:[{id:'text', name:'Intro Text'}],
			generateHtml:function(text){
				return '<div class="intro"><span class="heading-width-line">&nbsp;</span><h3>'+text+'</h3><span class="heading-width-line">&nbsp;</span></div>&nbsp;';
			}
		},
		{
			id:'hanatitle',
			image:'heading.png',
			title:'Page Underlined Heading',
			allowSelection:true,
			fields:[{id:'text', name:'Heading Text'}],
			generateHtml:function(text){
				return '<h4 class="page-heading">'+text+'</h4><div class="heading-width-line">&nbsp;</div>&nbsp;';
			}
		},
        {
			id:'hanahighlight1',
			image:'hl.png',
			title:'Highlight',
			allowSelection:true,
			fields:[{id:'text', name:'Text'}],
			generateHtml:function(text){
				return '<span class="highlight1">'+text+'</span>&nbsp;';
			}
		},
		{
			id:'hanahighlight2',
			image:'hl_d.png',
			title:'Highlight Dark',
			allowSelection:true,
			fields:[{id:'text', name:'Text'}],
			generateHtml:function(text){
				return '<span class="highlight2">'+text+'</span>&nbsp;';
			}
		},
		{
			id:'hanadropcaps',
			image:'drop.png',
			title:'Drop Caps',
			allowSelection:true,
			fields:[{id:'letter', name:'Letter'}],
			generateHtml:function(letter){
				return '<span class="drop-caps">'+letter+'</span>';
			}
		},
		{
			id:'hanalistcheck',
			image:'check.png',
			title:'List Check',
			allowSelection:false,
			list:"bullet_check"
		},
		{
			id:'hanalistarrow',
			image:'arrow.png',
			title:'List Arrow',
			allowSelection:false,
			list:"bullet_arrow"
		},
		{
			id:'hanalistarrow2',
			image:'arrow2.png',
			title:'List Arrow 2',
			allowSelection:false,
			list:"bullet_arrow2"
		},
		{
			id:'hanalistarrow4',
			image:'arrow3.png',
			title:'List Arrow 4',
			allowSelection:false,
			list:"bullet_arrow4"
		},
		{
			id:'hanaliststar',
			image:'star.png',
			title:'List Star',
			allowSelection:false,
			list:"bullet_star"
		},
		{
			id:'hanalistplus',
			image:'plus.png',
			title:'List Plus',
			allowSelection:false,
			list:"bullet_plus"
		},
		{
			id:'hanalinebreak',
			image:'br.png',
			title:'Line break',
			allowSelection:false,
			generateHtml:function(){
				return '<br class="clear" />';
			}
		},
		{
			id:'hanaframe',
			image:'fr.png',
			title:'Image with shadow',
			allowSelection:false,
			fields:[{id:'src', name:'Image URL', type:'upload'},{id:'align', name:'Align', values:['none', 'left', 'right']}],
			generateHtml:function(obj){
				var imgclass=obj.align==='none'?'':'align'+obj.align;
				return '<img class="img-frame '+imgclass+'" src="'+obj.src+'" />';
			}
		},
		{
			id:'hanalightbox',
			image:'lb.png',
			title:'Lightbox image',
			allowSelection:false,
			fields:[{id:'src', name:'Thumbnail URL', type:'upload'}, {id:'href', name:'Preview Image URL', type:'upload'}, {id:'description', name:'Description'}, {id:'align', name:'Align', values:['none', 'left', 'right']}],
			generateHtml:function(obj){
			var imgclass=obj.align==='none'?'':'align'+obj.align;
				return '<div><a rel="lightbox" class="lightbox-image" href="'+obj.href+'" title="'+obj.description+'"><img class="img-frame '+imgclass+'" src="'+obj.src+'" /></a></div>';
			}
		},
		{
			id:'hanabutton',
			image:'but.png',
			title:'Button',
			allowSelection:false,
			fields:[{id:'text', name:'Text'},{id:'href', name:'Link URL'},{id:'color', name:'Color', type:'colorpicker'}],
			generateHtml:function(obj){
				
				var style=obj.color?'style="background-color:'+obj.color+';"':'';
				return '<a class="button" '+style+' href="'+obj.href+'">'+obj.text+'</a>&nbsp;';
			}
		},
		{
			id:'hanainfoboxes',
			image:'info.png',
			title:'Info Box',
			allowSelection:false,
			fields:[{id:'text', name:'Text'},{id:'type', name:'Type', values:['info', 'error', 'note', 'tip']}],
			generateHtml:function(obj){
				return '<br class="clear" /> <div class="'+obj.type+'-box">'+obj.text+'</div><br class="clear" />';
			}
		},
		{
			id:'hanatwocolumns',
			image:'col_2.png',
			title:'Two Columns',
			allowSelection:false,
			fields:[{id:'columnone', name:'Column One Content', textarea:true}, {id:'columntwo', name:'Column Two Content', textarea:true}],
			generateHtml:function(obj){
				return '<br class="clear" /><div class="columns-wrapper"><div class="two-columns">'+obj.columnone+'</div><div class="two-columns nomargin">'+obj.columntwo+'</div></div><br class="clear" />';
			}
		},
		{
			id:'hanathreecolumns',
			image:'col_3.png',
			title:'Three Columns',
			allowSelection:false,
			fields:[{id:'columnone', name:'Column One Content', textarea:true}, {id:'columntwo', name:'Column Two Content', textarea:true}, {id:'columnthree', name:'Column Three Content', textarea:true}],
			generateHtml:function(obj){
				return '<br class="clear" /><div class="columns-wrapper"><div class="three-columns">'+obj.columnone+'</div><div class="three-columns">'+obj.columntwo+'</div><div class="three-columns nomargin">'+obj.columnthree+'</div></div><br class="clear" />';
			}
		},
		{
			id:'hanafourcolumns',
			image:'col_4.png',
			title:'Four Columns',
			allowSelection:false,
			fields:[{id:'columnone', name:'Column One Content', textarea:true}, {id:'columntwo', name:'Column Two Content', textarea:true}, {id:'columnthree', name:'Column Three Content', textarea:true}, {id:'columnfour', name:'Column Four Content', textarea:true}],
			generateHtml:function(obj){
				return '<br class="clear" /><div class="columns-wrapper"><div class="four-columns">'+obj.columnone+'</div><div class="four-columns">'+obj.columntwo+'</div><div class="four-columns">'+obj.columnthree+'</div><div class="four-columns nomargin">'+obj.columnfour+'</div></div><br class="clear" />';
			}
		},
		{
			id:'hanapricingtable',
			image:'price.png',
			title:'Insert Pricing Table',
			allowSelection:false,
			fields:[{id:'rownumber', name:'Nuber of rows'},{id:'colnumber', name:'Number of columns'},{id:'titlecolor', name:'Title Bg Color', type:'colorpicker'}, {id:'pricingrow', name:'Pricing row index <br>(the number of the <br /> row which will <br /> contain the prices, <br /> starting from 1)'}],
			generateHtml:function(obj){
				var html='<table class="pricing-table"><tbody>',
					rownumber=parseFloat(obj.rownumber),
					colnumber=parseFloat(obj.colnumber),
					titlecolor=obj.titlecolor,
					pricingrow=parseFloat(obj.pricingrow);
				
				for(var i=0; i<rownumber; i++){
					var trclass='table-description';
					var trstyle='';
					if(i==0){
						trclass='table-title';
						trstyle='background-color:'+titlecolor+' !important;';
					}
					if(i==pricingrow-1){
						trclass='table-price';
					}
					html+='<tr class="'+trclass+'" style="'+trstyle+'">'
					for(var j=0; j<colnumber; j++){
						html+='<td> Text </td>';
					}
					html+='</tr>';
				}
				
				html+='</tbody></table>';
				return html;
			}
		},
		{
			id:'hanayoutube',
			image:'yt.png',
			title:'Insert YouTube Video',
			allowSelection:false,
			fields:[{id:'src', name:'Video URL'},{id:'width', name:'Width'},{id:'height', name:'Height'}],
			generateHtml:function(obj){
			   var vars = [], hash,
			   hashes = obj.src.slice(obj.src.indexOf('?') + 1).split('&');
			   for(var i = 0; i < hashes.length; i++)
			   {
			       hash = hashes[i].split('=');
			       vars.push(hash[0]);
			       vars[hash[0]] = hash[1];
			   }
			   var width=obj.width||500,
			   		height=obj.height||500;
			   
			   return '<iframe width="'+width+'" height="'+height+'" src="http://www.youtube.com/embed/'+vars['v']+'" frameborder="0" allowfullscreen></iframe>';
			}
		},
		{
			id:'hanavimeo',
			image:'vm.png',
			title:'Insert Vimeo Video',
			allowSelection:false,
			fields:[{id:'src', name:'Video URL'},{id:'width', name:'Width'},{id:'height', name:'Height'}],
			generateHtml:function(obj){
			var url=obj.src;

			url = url.split('//').pop();
			var videoId=url.split('/')[1];
			
			   var width=obj.width||500,
			   		height=obj.height||500;
			   
			   return '<iframe src="http://player.vimeo.com/video/'+videoId+'?title=0&amp;byline=0&amp;portrait=0" width="'+width+'" height="'+height+'" frameborder="0"></iframe>';
			}
		},
		{
			id:'hanaflash',
			image:'fl.png',
			title:'Insert Flash',
			allowSelection:false,
			fields:[{id:'src', name:'Video URL'},{id:'width', name:'Width'},{id:'height', name:'Height'}],
			generateHtml:function(obj){
			 var width=obj.width||500,
		   		height=obj.height||500;
			return '<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="'+width+'" HEIGHT="'+height+'" id="hana-flash" ALIGN=""><PARAM NAME=movie VALUE="'+obj.src+'"> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#333399> <EMBED src="'+obj.src+'" quality=high bgcolor=#333399 WIDTH="'+width+'" HEIGHT="'+height+'" NAME="hana-flash" ALIGN="" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED> </OBJECT> ';
			}
		},
		{
			id:'hanatestimonials',
			image:'testimonials.png',
			title:'Insert Testimonial',
			allowSelection:false,
			fields:[{id:'name', name:'Person Name'},{id:'img', name:'Person Image URL', type:'upload'},{id:'occup', name:'Occupation'},{id:'org', name:'Organization'},{id:'link', name:'Organization Link'}, {id:'testim', name:'Testimonial', textarea:true}],
			generateHtml:function(obj){
			var shortcode='[hana_testimonial name="'+obj.name+'"';
			if(obj.img){
				shortcode+=' img="'+obj.img+'"';
			}
			if(obj.occup){
				shortcode+=' occup="'+obj.occup+'"';
			}
			if(obj.org){
				shortcode+=' org="'+obj.org+'"';
			}
			if(obj.link){
				shortcode+=' link="'+obj.link+'"';
			}
			shortcode+=']'+obj.testim+'[/hana_testimonial]'
			
			return shortcode;
			}
		},
		{
			id:'hanaslider',
			image:'slider.png',
			title:'Product Slider',
			allowSelection:false,
			fields:[{id:'products', name:'Products By', values:['Recent','Featured','Best Seller']}, {id:'visible', name:'Visible'}, {id:'step', name:'Step'}, {id:'autoplay', name:'Autoplay', values:['no', 'yes']}, {id:'interval', name:'Interval(in miliseconds)'}],
			generateHtml:function(obj){
				visible = 4;
				if(parseInt(obj.visible)>0){
					visible=parseInt(obj.visible);
				}
				autoplay='';
				if(obj.autoplay=='yes'){
					autoplay=' autoplay=true';
				}
				interval='';
				if(parseInt(obj.interval)>0){
					interval=' interval='+parseInt(obj.interval);
				}
				if(obj.products=='Recent'){
					products='[recent_products per_page="12" orderby="date" order="desc"]';
				}else if(obj.products=='Best Seller'){
					products='[bestseller_products per_page="12"]';
				}else{
					products='[featured_products per_page="12" orderby="date" order="desc"]';
				}
				return '[carousel_products id="'+obj.id+'" visible='+visible+autoplay+interval+']'+products+'[/carousel_products]';
			}
		},
		{
			id:'hanaimagelink',
			image:'il.png',
			title:'Image Link with Effect',
			allowSelection:false,
			fields:[{id:'image', name:'Image URL', type:'upload'}, {id:'link', name:'Link'}, {id:'title', name:'Title'}],
			generateHtml:function(obj){
				return '<div class="image-link"><a href="'+obj.link+'"><img src="'+obj.image+'" /><span>'+obj.title+'</span></a></div>';
			}
		}
];


(function(){
    window.ColorConverter = {
        toHTML: function(rgb){
            return '#'+$ensureHexLength(rgb[0].toString(16)) + $ensureHexLength(rgb[1].toString(16)) + $ensureHexLength(rgb[2].toString(16));
        },
        toRGB: function(color){
            var r, g, b;
            var html = color;
            
            // Parse out the RGB values from the HTML Code
            if (html.substring(0, 1) == "#")
            {
                html = html.substring(1);
            }
            
            if (html.length == 3)
            {
                r = html.substring(0, 1);
                r = r + r;
                
                g = html.substring(1, 2);
                g = g + g;
                
                b = html.substring(2, 3);
                b = b + b;
            }
            else if (html.length == 6)
            {
                r = html.substring(0, 2);
                g = html.substring(2, 4);
                b = html.substring(4, 6);
            }
        
            // Convert from Hex (Hexidecimal) to Decimal
            r = parseInt(r, 16);
            g = parseInt(g, 16);
            b = parseInt(b, 16);
        	var rgb = new Array(r, g, b);
			
            return rgb;
        },
		hsv2rgb: function (hsv) {
			var h=hsv[0];
			var s=hsv[1]*100;
			var v=hsv[2]*100;
			var r, g, b;
			var i;
			var f, p, q, t;
			
			// Make sure our arguments stay in-range
			h = Math.max(0, Math.min(360, h));
			s = Math.max(0, Math.min(100, s));
			v = Math.max(0, Math.min(100, v));
			
			// We accept saturation and value arguments from 0 to 100 because that's
			// how Photoshop represents those values. Internally, however, the
			// saturation and value are calculated from a range of 0 to 1. We make
			// That conversion here.
			s /= 100;
			v /= 100;
			
			if(s == 0) {
				// Achromatic (grey)
				r = g = b = v;
				return [Math.round(r * 255), Math.round(g * 255), Math.round(b * 255)];
			}
			
			h /= 60; // sector 0 to 5
			i = Math.floor(h);
			f = h - i; // factorial part of h
			p = v * (1 - s);
			q = v * (1 - s * f);
			t = v * (1 - s * (1 - f));
		
			switch(i) {
				case 0:
					r = v;
					g = t;
					b = p;
					break;
					
				case 1:
					r = q;
					g = v;
					b = p;
					break;
					
				case 2:
					r = p;
					g = v;
					b = t;
					break;
					
				case 3:
					r = p;
					g = q;
					b = v;
					break;
					
				case 4:
					r = t;
					g = p;
					b = v;
					break;
					
				default: // case 5:
					r = v;
					g = p;
					b = q;
			}
			return [Math.round(r * 255), Math.round(g * 255), Math.round(b * 255)];
		},
		rgb2hsv: function (rgb) {
			var r=rgb[0];
			var g=rgb[1];
			var b=rgb[2];
			 var computedH = 0;
			 var computedS = 0;
			 var computedV = 0;
			
			 //remove spaces from input RGB values, convert to int
			 var r = parseInt( (''+r).replace(/\s/g,''),10 ); 
			 var g = parseInt( (''+g).replace(/\s/g,''),10 ); 
			 var b = parseInt( (''+b).replace(/\s/g,''),10 ); 
			
			 if ( r==null || g==null || b==null ||
				 isNaN(r) || isNaN(g)|| isNaN(b) ) {
			   return;
			 }
			 if (r<0 || g<0 || b<0 || r>255 || g>255 || b>255) {
			   alert ('RGB values must be in the range 0 to 255.');
			   return;
			 }
			 r=r/255; g=g/255; b=b/255;
			 var minRGB = Math.min(r,Math.min(g,b));
			 var maxRGB = Math.max(r,Math.max(g,b));
			
			 // Black-gray-white
			 if (minRGB==maxRGB) {
			  computedV = minRGB;
			  return [0,0,computedV];
			 }
			
			 // Colors other than black-gray-white:
			 var d = (r==minRGB) ? g-b : ((b==minRGB) ? r-g : b-r);
			 var h = (r==minRGB) ? 3 : ((b==minRGB) ? 1 : 5);
			 computedH = 60*(h - d/(maxRGB - minRGB));
			 computedS = (maxRGB - minRGB)/maxRGB;
			 computedV = maxRGB;
			 return [computedH,computedS,computedV];
		}
    };
    
    function $ensureHexLength(str){
        if (str.length == 1){
            str = "0" + str;
        }
        return str;
    }
})();

function convert_color(color, before, after) {
		var color_hsv = ColorConverter.rgb2hsv(ColorConverter.toRGB(color));
		var before_hsv = ColorConverter.rgb2hsv(ColorConverter.toRGB(before));
		var after_hsv = ColorConverter.rgb2hsv(ColorConverter.toRGB(after));
		var H = color_hsv[0] + after_hsv[0] - before_hsv[0];
		var S = color_hsv[1] * after_hsv[1] / before_hsv[1];
		var V = color_hsv[2] * after_hsv[2] / before_hsv[2];
		var color = ColorConverter.toHTML(ColorConverter.hsv2rgb([H, S, V]));
		return color;
}

/**
 * Contains the main formatting buttons functionality.
 */
hanaButtonManager={
	dialog:null,
	idprefix:'hana-shortcode-',
	ie:false,
	opera:false,
		
	/**
	 * Init the formatting button functionality.
	 */
	init:function(){
			
		var length=hanaButtons.length;
		for(var i=0; i<length; i++){
		
			var btn = hanaButtons[i];
			hanaButtonManager.loadButton(btn);
		}
		
		if ( jQuery.browser.msie ) {
			hanaButtonManager.ie=true;
		}
		
		if (jQuery.browser.opera){
			hanaButtonManager.opera=true;
		}
		
	},
	
	/**
	 * Loads a button and sets the functionality that is executed when the button has been clicked.
	 */
	loadButton:function(btn){
		tinymce.create('tinymce.plugins.'+btn.id, {
	        init : function(ed, url) {
			        ed.addButton(btn.id, {
	                title : btn.title,
	                image : url+'/btnicons/'+btn.image,
	                onclick : function() {
			        	
			           var selection = ed.selection.getContent();
	                   if(btn.allowSelection && selection){
	                	   //modification via selection is allowed for this button and some text has been selected
	                	   selection = btn.generateHtml(selection);
	                	   ed.selection.setContent(selection);
	                   }else if(btn.fields){
	                	   //there are inputs to fill in, show a dialog to fill the required data
	                	   hanaButtonManager.showDialog(btn, ed);
	                   }else if(btn.list){
	  	           			
	                	    //this is a list
	                	    var list, dom = ed.dom, sel = ed.selection;
	                	    
		               		// Check for existing list element
		               		list = dom.getParent(sel.getNode(), 'ul');
		               		
		               		// Switch/add list type if needed
		               		ed.execCommand('InsertUnorderedList');
		               		
		               		// Append styles to new list element
		               		list = dom.getParent(sel.getNode(), 'ul');
		               		
		               		if (list) {
		               			dom.addClass(list, btn.list);
		               			dom.addClass(list, 'imglist');
		               		}
	                   }else{
	                	   //no data is required for this button, insert the generated HTML
	                	   ed.execCommand('mceInsertContent', true, btn.generateHtml());
	                   }
	                }
	            });
	        }
	    });
		
	    tinymce.PluginManager.add(btn.id, tinymce.plugins[btn.id]);
	},
	
	/**
	 * Displays a dialog that contains fields for inserting the data needed for the button.
	 */
	showDialog:function(btn, ed){

		
		if(hanaButtonManager.ie){
			ed.dom.remove('hanacaret');
		    var caret = '<div id="hanacaret">&nbsp;</div>';
		    ed.execCommand('mceInsertContent', false, caret);	
			var selection = ed.selection;
		}
	    
		var html='<div>';
		for(var i=0, length=btn.fields.length; i<length; i++){
			var field=btn.fields[i], inputHtml='';
			if(btn.fields[i].values){
				//this is a select list
				inputHtml='<select id="'+hanaButtonManager.idprefix+btn.fields[i].id+'">';
				jQuery.each(btn.fields[i].values, function(index, value){
					inputHtml+='<option value="'+value+'">'+value+'</option>';
				});
				inputHtml+='</select>';
			}else{
				if(btn.fields[i].textarea && !hanaButtonManager.opera){
					//this field should be a text area
					inputHtml='<textarea id="'+hanaButtonManager.idprefix+btn.fields[i].id+'" ></textarea>';
				}else{
					var inputClass="";
					if(btn.fields[i].type==='colorpicker'){
						inputClass="color";
					}else if(btn.fields[i].type==='upload'){
						inputClass="hana-upload";
					}
					inputHtml='<input type="text" id="'+hanaButtonManager.idprefix+btn.fields[i].id+'" class="'+inputClass+'" />';
					if(btn.fields[i].type==='upload'){
						inputHtml+='<input type="button" class="hana-upload-btn button-secondary" value="Upload Image" />';
					}
				}
			}
			html+='<div class="hana-shortcode-field"><label>'+btn.fields[i].name+'</label>'+inputHtml+'</div>';
		}
		html+='<input type="button" id="insertbtn" class="button-primary alignright" value="Insert" /></div>';
				
		var dialog = jQuery(html).dialog({
							 title:btn.title, 
							 modal:false,
							 dialogClass:'hana-dialog',
							 width:500,
							 close:function(event, ui){
								jQuery(this).html('').remove();
							 },
							 create:function(){
								 //load the color picker functionality
								 hanaPageOptions.setColorPickerFunc();
								 //load the Upload button functionality
								 var uploadBtns = jQuery(this).find('.hana-upload-btn');
								 if(uploadBtns.length){
									 uploadBtns.each(function(){
										hanaPageOptions.loadUploader(jQuery(this));
									});
								 }
							 }
							 });
		
		hanaButtonManager.dialog=dialog;
		
		//set a click handler to the insert button
		dialog.find('#insertbtn').click(function(event){
			event.preventDefault();
			hanaButtonManager.executeCommand(ed,btn,selection);
		});
	},
	
	/**
	 * Executes a command when the insert button has been clicked.
	 */
	executeCommand:function(ed, btn, selection){

    		var values={}, html='';
    		
    		if(!btn.allowSelection){
    			//the button doesn't allow selection, generate the values as an object literal
	    		for(var i=0, length=btn.fields.length; i<length; i++){
	        		var id=btn.fields[i].id,
	        			value=jQuery('#'+hanaButtonManager.idprefix+id).val();
	        		
	    			values[id]=value;
	    		}
	    		html = btn.generateHtml(values);
    		}else{
    			//the button allows selection - only one value is needed for the formatting, so
    			//return this value only (not an object literal)
    			value = jQuery('#'+hanaButtonManager.idprefix+btn.fields[0].id).attr("value")
    			html = btn.generateHtml(value);
    		}
    		
    	hanaButtonManager.dialog.remove();

    	if(hanaButtonManager.ie){
	    	selection.select(ed.dom.select('div#hanacaret')[0], false);
	    	ed.dom.remove('hanacaret');
    	}

  		ed.execCommand('mceInsertContent', false, html);
    	
	}
};

/**
 * Init the formatting functionality.
 */
(function() {
	
	hanaButtonManager.init();
    
})();

