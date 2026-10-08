( function( api ) {

	// Extends our custom "otography" section.
	api.sectionConstructor['otography'] = api.Section.extend( {

		// No otography for this type of section.
		attachOtography: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
