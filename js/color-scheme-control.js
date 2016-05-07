(function(api){
	var cssTemplate= wp.template('twentyfifteen-color-scheme'),
		colorSchemeKeys=['background_color','header_background_color','box_background_color','textcolor','sidebar_textcolor','meta_box_background_color'],
		colorSettings=['background_color','header_background_color','sidebar_textcolor'];

	api.controlConstructor.select = api.Control.extend({
		ready:function(){
			if('color_scheme'===this.id){
				this.setting.bind('change',function(value){
					api( 'background_color' ).set( colorScheme[value].colors[0] );
					api.control( 'background_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[0] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[0] );
					api( 'header_background_color' ).set( colorScheme[value].colors[1] );
					api.control( 'header_background_color' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[1] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[1] );
					api( 'sidebar_textcolor' ).set( colorScheme[value].colors[4] );
					api.control( 'sidebar_textcolor' ).container.find( '.color-picker-hex' )
						.data( 'data-default-color', colorScheme[value].colors[4] )
						.wpColorPicker( 'defaultColor', colorScheme[value].colors[4] );
				});
			}
		}
	});
	function updateCSS(){
		var scheme=api('color_scheme')(),css,colors=_.object(colorSchemeKeys,colorScheme[scheme].colors);
		_.each(colorSettings,function(setting){colors[setting]=api(setting)();});
		colors.secondary_textcolor = Color( colors.textcolor ).toCSS( 'rgba', 0.7 );
		colors.border_color = Color( colors.textcolor ).toCSS( 'rgba', 0.1 );
		colors.border_focus_color = Color( colors.textcolor ).toCSS( 'rgba', 0.3 );
		colors.secondary_sidebar_textcolor = Color( colors.sidebar_textcolor ).toCSS( 'rgba', 0.7 );
		colors.sidebar_border_color = Color( colors.sidebar_textcolor ).toCSS( 'rgba', 0.1 );
		colors.sidebar_border_focus_color = Color( colors.sidebar_textcolor ).toCSS( 'rgba', 0.3 );
		css = cssTemplate( colors );
		api.previewer.send( 'update-color-scheme-css', css );
	}
	_.each(colorSettings,function(setting){api(setting,function(setting){setting.bind(updateCSS);});});
})(wp.customize);
