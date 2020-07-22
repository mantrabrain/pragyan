( function( api ) {

	// Extends our custom "pragyan-pro" section.
	api.sectionConstructor['pragyan-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
