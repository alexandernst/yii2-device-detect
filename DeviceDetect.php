<?php

namespace alexandernst\devicedetect;

use Yii;
use Detection\MobileDetect;

/**
 * DeviceDetect
 *
 * @author Alexander Nestorov <alexandernst@gmail.com>
 * @method DeviceDetect isMobile()
 * @method DeviceDetect isTablet()
 * @version 0.0.12
 */

class DeviceDetect extends \yii\base\Component {
	/**
	* @var MobileDetect
	*/
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
				'isMobile' => $this->_mobileDetect->isMobile() && !$this->_mobileDetect->isTablet(),
				'isTablet' => $this->_mobileDetect->isTablet() && !$this->_mobileDetect->isMobile(),
				'isDesktop' => !$this->_mobileDetect->isTablet() && !$this->_mobileDetect->isMobile(),
			];
		}

		if ($this->setAlias) {
			if ($this->_mobileDetect->isMobile()) {
				\Yii::setAlias('@device', 'mobile');
			} else if ($this->_mobileDetect->isTablet()) {
				\Yii::setAlias('@device', 'tablet');
			} else {
				\Yii::setAlias('@device', 'desktop');
			}
		}
	}
}
