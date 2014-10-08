<?php namespace Egig;

use Carbon\Carbon;

class Tika extends Carbon {

    /**
     * @var string
     */
    protected $locale;

	/**
	 * @var array
	 */
	protected $languagePack = array();

    /**
     * @var array
     */
	protected $languageFile = array();

    /**
     * @var array
     */
    protected static $builtInLanguages = array('id');

	/**
	 * @{inheritdoc}
	 */
	public function __construct($time = null, $tz = null, $locale = null)
	{
		parent::__construct($time = null, $tz = null);

        $this->locale = is_null($locale) ? 'id' : $locale;

        foreach (static::$builtInLanguages as $lang) {
		  $this->setLanguageFilePath($lang, __DIR__ .'/l10n/'.$lang.'.php');
        }
	}

    /**
     * @{inheritdoc}
     */
    public function format($format)
    {
         return $this->translate(parent::format($format));
    }

    /**
     * Translate given date
     *
     * @param string $data
     */
    protected function translate($date)
    {
    	$replaces = $this->getLanguagePack($this->locale);

    	return strtr($date, $replaces);
    }

    /**
     * set locale
     *
     * @param string $locale
     */
    public function setlocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Get language pack
     *
     * @param
     */
    private function getLanguagePack($locale)
    {
    	if(! isset($this->languagePack[$locale])) {
    		$this->languagePack[$locale] = require $this->getLanguageFilePath($locale);
    	}

    	return $this->languagePack[$locale];
    }

    /**
     * set language file
     *
     * @param string $locale
     * @param string $path
     */
    public function setLanguageFilePath($locale, $path)
    {
    	$this->languageFile[$locale] = $path;
    }


    /**
     * Get language path
     *
     * @param string $locale
     * @return string
     */
    public function getLanguageFilePath($locale)
    {
    	return isset($this->languageFile[$locale])  ? $this->languageFile[$locale] : false;
    }
}