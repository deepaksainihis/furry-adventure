( function( api ) {

	// Extends our custom "the-travel-booking" section.
	api.sectionConstructor['the-travel-booking'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );