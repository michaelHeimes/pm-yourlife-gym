<?php

// Populate ACF select field options with Gravity Forms forms 
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = array(
			'none' => 'None'
		);

		$forms = \GFFormsModel::get_forms();

		if ( $forms ) {
			foreach ( $forms as $form ) {
				$choices[ $form->id ] = $form->title;
			}
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter( 'acf/load_field/name=gravity_form', 'acf_populate_gf_forms_ids' );

/**
* Filters the next, previous and submit buttons.
* Replaces the form's <input> buttons with <button> while maintaining attributes from original <input>.
*
* @param string $button Contains the <input> tag to be filtered.
* @param object $form Contains all the properties of the current form.
*
* @return string The filtered button.
*/
add_filter( 'gform_next_button', 'modify_gform_button', 10, 2 );
add_filter( 'gform_previous_button', 'modify_gform_button', 10, 2 );
add_filter( 'gform_submit_button', 'modify_gform_button', 10, 2 );

function modify_gform_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
	$input = $dom->getElementsByTagName( 'input' )->item(0);
	$button_text = $input->getAttribute( 'value' );

	// Create a new button element
	$new_button = $dom->createElement( 'button' );
	$new_button->setAttribute( 'class', 'button chev-link grid-x align-center' );

	// Create a span element to wrap the button text
	$span = $dom->createElement( 'span', $button_text );

	// Create an SVG element for the chevron icon
	$svg = '<svg xmlns="http://www.w3.org/2000/svg" width="11.583" height="18.758" viewBox="0 0 11.583 18.758"><path id="ic_chevron_right_24px" d="M10.794,6,8.59,8.2l7.159,7.175L8.59,22.554l2.2,2.2,9.379-9.379Z" transform="translate(-8.59 -6)"/></svg>';
	$svg_element = $dom->createDocumentFragment();
	$svg_element->appendXML( $svg );

	// Append the span and SVG to the button
	$new_button->appendChild( $span );
	$new_button->appendChild( $svg_element );

	// Replace the input with the new button
	$input->parentNode->replaceChild( $new_button, $input );

	// Return the HTML of the modified button
	return $dom->saveHtml( $new_button );
}