<?php
// Make connection to database and to the POST
$db = JFactory::getDbo();
$query = $db->getQuery(true);
$jinput = JFactory::getApplication()->input;

// Get 'count' from POST and see if value is 1
$COUNTING = $jinput->get('count', '0', 'post');
if ($COUNTING == 1) {
	
	// Get current rating_count from database
	$query->select($db->quoteName(array('rating_count')));
	$query->from($db->quoteName('jos_content_rating'));
	$query->where($db->quoteName('content_id') . ' = 4');
	
	// Reset the query using our newly populated query object.
	$db->setQuery($query);
	
	// Load the results and do a plus one.
	$results = $db->loadObject();
	$COUNTVALUE = intval($results->rating_count) + 1;
	
	// Create an object for the record we are going to update.
	$object = new stdClass();
	
	// Must be a valid primary key value.
	$object->content_id = 4;
	$object->rating_sum = 0;
	$object->rating_count = $COUNTVALUE;
	$object->lastip = NULL;
	
	// Update the 'rating_count' in the database.
	$result = JFactory::getDbo()->updateObject('jos_content_rating', $object, 'content_id');
	
	// Now lets redirect to the normal webpage to prefent reuse of the couting for more accurate numbers.
	?>
	<meta http-equiv="refresh" content="0; URL=<<PLACE REDIRECT URL>>">-->
	<?php
	} 
?>
