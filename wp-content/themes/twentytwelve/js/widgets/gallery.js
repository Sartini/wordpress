var GalleryView;

GalleryView = Backbone.View.extend({
	events: {
		'click a.prev' : 'prevBlock',
		'click a.next' : 'nextBlock',
		'click .pointers li a' : 'goToPointer'
	},
	initialize: function(id, autoplay){
		this.id = id;
		this.gallery = $(this.el);
		this.galleryParent = $(this.el).parent();
		this.galleryHeight = this.gallery.height();
		this.galleryParentHeight = this.gallery.parent().height();
		this.mask = this.gallery.find('.mask');
		this.line = this.gallery.find('.mask > ul');
		this.blocks = this.gallery.find('.mask > ul > li');
		this.maskWidth = parseFloat(this.mask.css('width'));
		this.blocksWidth = parseFloat(this.blocks.css('width'));
		this.pointers = this.gallery.find('.pointers');
		this.position = 0;
		this.autoplay = autoplay;
		this.autoplayTime = 5000;

		this.itensVisible = this.maskWidth / this.blocksWidth;

		this.checkBlocks();
		this.styleLine();
		this.disableButton('prev');

		if(this.autoplay)
			this.autoPlay();
	},
	prevBlock: function(e, slide){
		if(e){
			e.preventDefault();
			if(this.autoplay){
				window.clearInterval(this.interval);
				this.autoplay = false;
			}
		}

		if(slide == undefined)
			this.position--;
		else
			this.position = slide;

		this.animateLine();
	},
	nextBlock: function(e, slide){
		if(e){
			e.preventDefault();
			if(this.autoplay){
				window.clearInterval(this.interval);
				this.autoplay = false;
			}
		}

		if(slide == undefined)
			this.position++;
		else
			this.position = slide;

		this.animateLine();
	},
	animateLine: function(method){
		this.next = this.blocks[this.itensVisible + ( this.position )];
		this.prev = this.blocks[this.itensVisible + ( this.position - this.itensVisible ) - 1];

		if(!this.next){
			this.disableButton('next');
		} else {
			this.enableButton('next');
		}

		if(!this.prev){
			this.disableButton('prev');
		} else {
			this.enableButton('prev');
		}

		this.line.animate({
			left: -this.blocksWidth * this.position
		}, 500);

		this.setActivePointer();

		if(this.autoplay)
			if(!this.next)
				this.position = -1;

	},

	/* Autoplay */
	autoPlay: function(){
		var self = this;

		this.interval = window.setInterval(function(){
			self.nextBlock();
		}, this.autoplayTime)
	},

	/* Style */
	styleLine: function(){
		this.line.css('width' , this.blocksWidth * this.blocks.length);
	},

	/* Pointers */
	checkBlocks: function(){
		if(this.blocks.length > 1){
			if(this.pointers.length > 0)
				this.createPointers();
		
			this.showButtons();
		}
	},
	createPointers: function(){
		for(var i = 0; i < this.blocks.length; i++){
			if( i == 0 )
				this.pointers.append('<li class="current"><a>' + i + '</a></li>');
			else
				this.pointers.append('<li><a>' + i + '</a></li>');
		}

		this.pointersWidth = this.pointers.find('li').outerWidth(true) * this.blocks.length;
	},
	goToPointer: function(e){
		e.preventDefault();

		var pointer = e.currentTarget;
		var nextSlide = parseFloat($(pointer).html());

		if(this.position !== nextSlide)
			if(this.position > nextSlide)
				this.prevBlock(e, nextSlide);
			else
				this.nextBlock(e, nextSlide);
	},
	setActivePointer: function(){
		if(this.pointers.length > 0){
			var pointer = $(this.pointers.find('li')[this.position]);

			this.pointers.find('.current').removeClass('current');
			pointer.addClass('current');
		}
	},

	/* Buttons */
	showButtons: function(){
		this.buttons = this.gallery.find('.buttons');

		this.buttons.show();

		if(this.buttons.attr('class').indexOf('centralized') > 0)
			this.centralizeButtons();
	},
	centralizeButtons: function(){
		var width = this.buttons.width();

		this.buttons.css({
			'float' : 'none', 
			'left' : '50%',
			'margin-left' : -(width / 2) + "px"
		})
	},
	enableButton: function(bt){
		this.buttons.find('.' + bt).removeClass('disabled')
	},

	disableButton: function(bt){
		this.buttons.find('.' + bt).addClass('disabled')
	}
});