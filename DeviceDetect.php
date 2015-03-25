<?php

namespace alexandernst\devicedetect;

use Yii;
use Detection\MobileDetect;

/**
 * DeviceDetect
 *
 * @author Alexander Nestorov <alexandernst@gmail.com>
 * @version 0.0.1
 */

class DeviceDetect extends \yii\base\Component {

	private $_mobileDetect;

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
		$this->_mobileDetect = new Mobile_Detect();
		parent::init();
	}

}
