<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_status
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//$config = JFactory::getConfig();
//$user   = JFactory::getUser();
$db     = JFactory::getDbo();
//$lang   = JFactory::getLanguage();
//$input  = JFactory::getApplication()->input;


// Get the number of hits on the phishing email.
$query = $db->getQuery(true)
	->select('rating_count')
	->from('jos_content_rating')
	->where('content_id = 4');

$db->setQuery($query);
$hits = (int) $db->loadResult();

require JModuleHelper::getLayoutPath('mod_phishing', $params->get('layout', 'default'));
