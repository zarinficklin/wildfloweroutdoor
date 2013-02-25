

(function($){
	
	
	$.fn.setPortfolio=function(options){
		var defaults={
			//default settings
			itemsPerPage: 12, //the number of items per page
			pageWidth: 960,  //the width of each page
			pageHeight:430,  //the height of each page
			itemMargin:40,  //margin of each of the portfolio items
			showCategories: true,  // if set to false, the categories will be hidden
			easing: 'easeOutExpo', //the animation easing
			animationSpeed: 800, //the speed of the animation of the pagination
			navButtonWidth:21,  //the width of the pagination button 
			wavyAnimation:false, //if set the true, all the elements will fade in consecutively with a wavy effect
			pageWrapperClass: 'page-wrapper',  //the class of the div that wraps the items in order to set a page
			navigationId: 'portfolio-pagination',  //the ID of the pagination div
			itemClass: 'portfolio-item', //the class of the div that wraps each portfolio item data
			columns:3,
			desaturate:false,
			itemHeight:410
		};
		
		var options=$.extend(defaults, options);
		
		
		//define some helper variables
		var root=null, parentId, categories=[], items=[], 
		pageWrappers=[], imagesLoaded=0, counter=0, ie=false, 
		categoryHolder, iesix=false, currentPage=0, pageHolder=null, 
		inAnimation=false, pageNumber=0, imgNum=0, firstLoad=true;
		
		pageHolder=$(this);
	    root=$('<div />').css({width:(options.pageWidth*2), float:'left', overflow:'hidden'});
	    pageHolder.css({height:'auto', overflow:'hidden'}).addClass('container_24').append(root);
		parentId=pageHolder.attr('id');
var i=1;
	if($(this).length){
		init();
	}
	
	if(!$.browser.msie || parseInt($.browser.version, 10)>=9){
	$(window).scroll( function(){

		if($(window).width()<768) return;		
		/* Check the location of each desired element */
		$('.page-wrapper').each( function(){
			$(this).find('.item-wrapper:odd').each( function(i){
		
				var top_of_object = $(this).offset().top;
				var top_of_window = $(window).scrollTop();
				var bottom_of_object = top_of_object + $(this).height();
				var bottom_of_window = top_of_window + $(window).height();
				var margin_top_of_object = parseInt($(this).css('margin-top').replace(/[^-\d\.]/g, ''));
				
				if( margin_top_of_object != 0 && top_of_window < top_of_object - margin_top_of_object) { $(this).animate({marginTop:"0px"}, 1000);}
				else if( margin_top_of_object == 0 && top_of_window > top_of_object && (bottom_of_window < bottom_of_object-options.itemHeight/2) ) $(this).stop(true, true).animate({marginTop:"-"+options.itemHeight/2+"px"}, 1000);
				
				else if( margin_top_of_object != 0 && bottom_of_window > bottom_of_object ) $(this).animate({marginTop:"0px"}, 1000);
		
			}); 
		});
		
	});
	}
	
	function init() {
		loadItems();
	}
	
	/**
	 * Parses the XML portfolio item data.
	 */
	function loadItems(){
		if(options.showCategories){
			//get the portfolio categories
			$('.category').each(function(i){
				var current=$(this),
				category = {
					id:	current.attr('id'),
					name: current.text()
				};
				categories.push(category);
			});
		}
		
						
		// get the portfolio items
		$('.portfolio-item').each(function(i){
				var item = {
					obj:$(this),
					category:String($(this).data('category')).split(',')
				},
				img=$(this).find('img'),
				title=$(this).find('.portfolio-project-title');
				item.html=item.obj.html();
				items.push(item);
				img.animate({opacity:0},0);
				title.animate({opacity:0},0);
				
				if(options.desaturate){
				img.hanaDesaturate({parent:$(this), globalHover:false});
				}
		});
		
		setSetter();	
		pageHolder.css({visibility:'visible'});
		
	}
	
	
	/**
	 * Calls the main functions for setting the portfolio items.
	 */
	function setSetter(){
		if($.browser.msie){
			ie=true;
			if($.browser.version.substr(0,1)<7){
				iesix=true;
			}
		}
		root.siblings('.loading').remove();
		root.after('<div id="'+options.navigationId+'" class="grid_24"><ul></ul></div>');
		if(options.showCategories){
			displayCategories();
		}
		
		displayItems();
		showNavigationArrows();
		bindEventHandlers();
	}
	
	/**
	 * Displays the categories.
	 */
	function displayCategories(){
		
		categoryHolder=$('#portfolio-categories').addClass('grid_24');	
		
		//add the ALL link
		var allLink= categoryHolder.find('li:first');
		showSelectedCat(allLink);
		
		//bind the click event
		allLink.bind({
			'click': function(){
				displayItems();
				showSelectedCat($(this));
			},
			'mouseover':function(){
				$(this).css({cursor:'pointer'});
			}
		});
		
		//add all the category names to the list
		categoryHolder.find('li').each(function(i){
			
			if(i){
				//bind the click event
				$(this).bind({
					'click': function(){
						displayItems(categories[i-1].id);
						showSelectedCat($(this));
					},
					'mouseover':function(){
						$(this).css({cursor:'pointer'});
					}
				});
			}
		});
	}
	
	function showSelectedCat(selected){
		//hide the previous selected element
		var prevSelected=categoryHolder.find('ul li.selected');
		if(prevSelected[0]){
			prevSelected.removeClass('selected');
		}
		
		//show the new selected element
		selected.addClass('selected');
	}
	
	/**
	 * Displays the portfolio items.
	 */
	function displayItems(){
		var filterCat=arguments.length===0?false:true;
		
		//reset the divs and arrays
		$('.portfolio-item').detach();
		
		root.html('');
		root.width(300);
		pageWrappers=[];
		root.animate({marginLeft:0});
		
		var length=items.length;	
		counter=0;
		var catId=arguments[0];
		var grid = 24 / options.columns;
		for ( var i = 0; i < length; i++)
			(function(i, filterCat, catId) {
				
				if(!filterCat || (filterCat && items[i].category.contains(catId))){
					if(counter%options.itemsPerPage===0){
						counter=0;
						//create a new page wrapper and make the holder wider
						root.width(root.width()+options.pageWidth+20);
						var wrapper=$('<div class="'+options.pageWrapperClass+'"></div>').css({float:'left', width:options.pageWidth+options.itemMargin});
						pageWrappers.push(wrapper);
						for ( var j = 0; j < options.columns; j++)
							wrapper.append('<div class="item-wrapper grid_'+grid+'"></div>');
						root.append(wrapper);
					}
					
					var lastWrapper=pageWrappers[pageWrappers.length-1];
					/*if(counter%options.columns===0){
						lastWrapper.append('<div class="item-wrapper"></div>');
					}
					*/
					
					var obj = items[i].obj,
					//innerDiv=lastWrapper.find('div.item-wrapper:last');
					innerDiv=lastWrapper.find('div.item-wrapper:nth-child('+(counter%options.columns+1)+')');
					innerDiv.append(obj.css({display:'none'}).removeClass('last-item'));

					items[i].obj.css({display:'block'});
					
					counter++;
				}
				
		})(i,filterCat, catId);
		
		if(firstLoad){
			$images=$('.portfolio-item').find('img.gallery-img');
			imgNum=$images.length;
			$images.onImagesLoad({
				itemCallback:function(){
					var title=$(this).parents('.portfolio-item:first').find('.portfolio-project-title');
					$(this).animate({opacity:1},500);
					if(title.length){
						title.animate({opacity:0.9},500);
					}
				}
			});
			firstLoad=false;
		}
		
		currentPage=0;
		pageNumber=pageWrappers.length;
				
		//show the navigation buttons
		showNavigation();
		
		//call cufon
		hanaSite.loadCufon();
		//load the lightbox
		hanaSite.setLightbox(jQuery("#gallery a[rel^='lightbox[group]']"));
		
		if(pageNumber==1){
			$('.portfolio-arrows').fadeOut();
		}else{
			$('.portfolio-arrows').fadeIn();
		}
		$('.portf-navigation').trigger('pageChanged', [0]);
		
		
	}
	
	/**
	 * Binds page change event handlers to the root, so that when any of the navigation buttons
	 * has been clicked, to display the page to be shown.
	 */
	function bindEventHandlers(){
		root.bind('changePage', function(e, index){
			if(!inAnimation){
				$('.portf-navigation').trigger('pageChanged', [index]);
				var marginLeft=index*options.pageWidth+index*options.itemMargin;
				
				inAnimation=true;
				root.animate({marginLeft:[-marginLeft,options.easing]}, options.animationSpeed, function(){
					inAnimation=false;
					currentPage=index;
				});
				
			}
		});
		
		root.delegate('.portfolio-item', 'mouseenter', function(){
			$(this).find('.portfolio-project-title').stop().animate({opacity:1}, 200).addClass('portfolio-hover');
			$(this).find('.item-desc').stop(true,true).slideDown('normal');
		}).delegate('.portfolio-item', 'mouseleave', function(){
			$(this).find('.portfolio-project-title').stop().animate({paddingTop:0, paddingBottom:0, opacity:0.9},200).removeClass('portfolio-hover');
			$(this).find('.item-desc').stop(true,true).slideUp('normal');
		});
	}
	
	
	/**
	 * Displays the navigation buttons.
	 */
	function showNavigation(){
		//reset the divs and arrays
		var navUl=root.siblings('#'+options.navigationId).find('ul').addClass('portf-navigation'),
			selectedClass="selected";
		navUl.html('');
		
		if(pageNumber>1){
			for(var i=0; i<pageNumber; i++)(function(i){
				var li = $('<li class="hover"></li>');
				navUl.append(li);
				//bind the click handler
				li.bind({
					'click': function(){
						root.trigger('changePage', [i]);
					}
				});
			})(i);
			
			navUl.find('li:first').addClass(selectedClass);
			
			navUl.bind('pageChanged', function(e, index){
				navUl.find('li.'+selectedClass).removeClass(selectedClass);
				navUl.find('li').eq(index).addClass(selectedClass);
			});
		}
	}
	
	/**
	 * Displays the navigation arrows and binds click handlers to them.
	 */
	function showNavigationArrows(){
		if(pageNumber>1){
		var disabledClass='disabled';
		
		//add the "previous" arrow
		$('<div />', {'class':'portfolio-prev hover portf-navigation portfolio-arrows'})
		.bind('click', function(){
				if(currentPage-1>=0){
					root.trigger('changePage', [currentPage-1]);
				}
			}
		)
		.bind('pageChanged', function(e, index){
			if(index==0){
				$(this).addClass(disabledClass);
			}else{
				$(this).removeClass(disabledClass);
			}
		})
		.insertBefore(pageHolder);
		
		//add the "next" arrow
		$('<div />', {'class':'portfolio-next hover portf-navigation portfolio-arrows'}).insertBefore(pageHolder)
		.bind('click', function(){
			if(currentPage+1<pageNumber){
				root.trigger('changePage', [currentPage+1]);
			}
		})
		.bind('pageChanged', function(e, index){
			if(index+1==pageNumber){
				$(this).addClass(disabledClass);
			}else{
				$(this).removeClass(disabledClass);
			}
		})
		.insertBefore(pageHolder);
		
		}
	}
	
	};
}(jQuery));


/**
 * Declare a function for the arrays that checks
 * whether an array contains a value.
 * @param value the value to search for
 * @return true if the array contains the value and false if the
 * array doesn't contain the value
 */
Array.prototype.contains=function(value){
	var length=this.length;
	for(var i=0; i<length; i++){
		if(this[i]===value){
			return true;
		}
	}
	return false;
};
