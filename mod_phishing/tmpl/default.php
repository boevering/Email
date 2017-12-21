<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_status
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//  Print the number of votes.
if ($params->get('show_votes', 1))
	{
		$output[] = '<div class="btn-group backloggedin-users">'
			. '<span class="btn-group separator"></span>'
			. '<span class="badge">' . $hits . '</span>'
			. JText::plural('MOD_PHISHING_BACKEND_HITS', $hits)
			. '<span class="btn-group separator"></span>'
			. '</div>';
	}

// Output the items.
foreach ($output as $item)
{
	echo $item;
}
