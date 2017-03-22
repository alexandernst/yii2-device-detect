<?php

namespace alexandernst\devicedetect;

use Yii;
use Detection\MobileDetect;

/**
 * DeviceDetect
 *
 * @author Alexander Nestorov <alexandernst@gmail.com>
 * @version 0.0.10
 */

class DeviceDetect extends \yii\base\Component {

	private $_mobileDetect;

	// Automatically set view parameters based on device type
	public $setParams = true;

	// Automatically set alias parameters based on device type
	public $setAlias = true;

	public function __call($name, $parameters) {
		return call_user_func_array(
			array($this->_mobileDetect, $name),
			$parameters
		);
	}

	public function __construct($config = array()) {
		parent::__construct($config);
	}

	public function init() {
		$this->_mobileDetect = new MobileDetect();
		parent::init();

		if ($this->setParams) {
		    \Yii::$app->params['devicedetect'] = [
			'isMobile' => false,
			'isTablet' => false,
			'isDesktop' => false,
		    ];

		    if ( $this->_mobileDetect->isTablet() ) \Yii::$app->params['devicedetect']['isTablet'] = true;
		    elseif ( $this->_mobileDetect->isMobile() ) \Yii::$app->params['devicedetect']['isMobile'] = true;
		    else \Yii::$app->params['devicedetect']['isDesktop'] = true;
		}

		if ($this->setAlias) {
			if ($this->_mobileDetect->isTablet()) {
					\Yii::setAlias('@device', 'tablet');
			} else if ($this->_mobileDetect->isMobile()) {
					\Yii::setAlias('@device', 'mobile');
			} else {
					\Yii::setAlias('@device', 'desktop');
			}
		}
	}

}
