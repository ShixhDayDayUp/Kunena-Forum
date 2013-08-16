<?php
/**
 * @package     Joomla.Libraries
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

/**
 * Compatibility layer for JLayoutBase
 */
class KunenaCompatLayoutBase extends JLayoutBase
{
	/**
	 * Options object
	 *
	 * @var  JRegistry
	 */
	protected $options = null;

	/**
	 * Set the options
	 *
	 * @param   mixed  $options  Array / JRegistry object with the options to load
	 *
	 * @return  JLayoutBase      An instance of itself for chaining
	 */
	public function bindOptions($options = null)
	{
		// Received JRegistry
		if ($options instanceof JRegistry)
		{
			$this->options = $options;
		}
		elseif (is_array($options))
			// Received array
		{
			$this->options = new JRegistry($options);
		}
		else
		{
			$this->options = new JRegistry;
		}

		return $this;
	}

	/**
	 * Get the options
	 *
	 * @return  JRegistry  Object with the options
	 */
	public function getOptions()
	{
		// Always return a JRegistry instance
		if (!($this->options instanceof JRegistry))
		{
			$this->resetOptions();
		}

		return $this->options;
	}

	/**
	 * Function to empty all the options
	 *
	 * @return  JLayoutBase  An instance of itself for chaining
	 */
	public function resetOptions()
	{
		$this->options = new JRegistry;

		return $this;
	}
}
