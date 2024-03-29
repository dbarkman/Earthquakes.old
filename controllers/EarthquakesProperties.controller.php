<?php

/**
 * EarthquakesProperties.class.php
 * Description:
 *
 */

class EarthquakesProperties extends Properties
{
	private $_propertiesFile;
	const PROP_LOGFILE = "earthquakes.log.file";
	const PROP_LOGLEVEL = "earthquakes.log.level";
	const PROP_ACTION_STORE = "earthquakes.action.store";
	const PROP_ACTION_NOTIFY = "earthquakes.action.notify";

	public function __construct()
	{
		$this->_propertiesFile = dirname(__FILE__) . '/../config/earthquakes.properties';
		$this->load($this->_propertiesFile);
	}

	public function load($file)
	{
		parent::load($file);
	}

	public function save($file)
	{
		parent::save($file);
	}

	public function getLogFile()
	{
		return parent::getProperty(self::PROP_LOGFILE);
	}

	public function getLogLevel()
	{
		$string = $this->getLogLevelString();
		return Logger::getLevelInt($string);
	}

	public function getLogLevelString()
	{
		$string = $this->getProperty(self::PROP_LOGLEVEL);
		$level = Logger::getLevelInt($string);
		if ($level != NULL) {
			return $string;
		}
		return "INFO";
	}

	public function setLogFile($value)
	{
		$this->setProperty(self::PROP_LOGFILE, $value);
	}

	public function setLogLevel($value)
	{
		$this->setLogLevelString(Logger::getLevelString($value));
	}

	public function setLogLevelString($value)
	{
		$this->setProperty(self::PROP_LOGLEVEL, $value);
	}

	public function getStoreValue()
	{
		return parent::getProperty(self::PROP_ACTION_STORE);
	}

	public function getNotifyValue()
	{
		return parent::getProperty(self::PROP_ACTION_NOTIFY);
	}
}
