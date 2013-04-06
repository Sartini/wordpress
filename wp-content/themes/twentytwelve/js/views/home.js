window.HomeView = Backbone.View.extend({
	el: 'body',
	events: {
		
	},
	initialize: function(){
		this.homeGallery = new GalleryView({el : '#homeGallery' }, true);			
	}
});