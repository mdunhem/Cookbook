<?php
/**
 *  Twitter Bootstrap HTML Helper
 *
 *  @author Mikael Dunhem <mikael.dunhem@gmail.com>
 *  @package app.View.Helper
 *  @version 0.1.0
 */
App::uses('HtmlHelper', 'View/Helper');

class BootstrapHtmlHelper extends HtmlHelper {

	const COL_TYPE_NORMAL = 1;
	const COL_TYPE_SMALL = 2;
	const COL_TYPE_LARGE = 4;
	const COL_TYPE_ALL = 8;

	protected $classList = array(
		'columnPrefix' => array(
			'normal' => 'col-',
			'small' => 'col-sm-',
			'large' => 'col-lg-'
		)
	);

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);

		$this->_tags['javascriptlink'] = '<script src="%s"%s></script>';
	}

	public function container($tag = 'div', $text = null, $options = array()) {
		if (isset($options['class'])) {
			$class = $options['class'];
		} else {
			$class = array();
		}

		$options['class'] = $this->createClassList('container', $class);
		
		return $this->tag($tag, $text, $options);
	}

	public function row($tag = 'div', $text = null, $options = array()) {
		if (isset($options['class'])) {
			$class = $options['class'];
		} else {
			$class = array();
		}

		$options['class'] = $this->createClassList('row', $class);
		
		return $this->tag($tag, $text, $options);
	}

	public function column($type = self::COL_NORMAL, $size = 12, $text = null, $options = array()) {
		if (isset($options['class'])) {
			$options['class'] = $options['class'] . ' ' . $this->getColumnClass($type, $size);
		} else {
			$options['class'] = $this->getColumnClass($type, $size);
		}

		return $this->tag('div', $text, $options);
	}

	protected function createClassList($defaultClass, $inputClass = array()) {
		$defaultClass = (array) $defaultClass;

		if (!empty($inputClass)) {
			if (is_string($inputClass)) {
				$inputClass = explode(' ', $inputClass);
			} else if (!is_array($inputClass)) {
				$inputClass = array();
			}
		}

		return implode(' ', array_merge($defaultClass, $inputClass));
	}

	protected function getColumnClass($type = self::COL_TYPE_ALL, $size = 12) {
		$columnTypes = array(
			'normal' => $this->classList['columnPrefix']['normal'] . (string) $size,
			'small' => $this->classList['columnPrefix']['small'] . (string) $size,
			'large' => $this->classList['columnPrefix']['large'] . (string) $size
		);

		$returnClassList = array();

		// if (($type & self::COL_TYPE_ALL) == self::COL_TYPE_ALL) {
		// 	return implode(' ', $columnTypes);
		// } else if (($type & self::COL_TYPE_NORMAL) == self::COL_TYPE_NORMAL) {
		// 	$returnClassList[] = $columnTypes['normal'];
		// } else if (($type & self::COL_TYPE_SMALL) == self::COL_TYPE_SMALL) {
		// 	$returnClassList[] = $columnTypes['small'];
		// } else if (($type & self::COL_TYPE_LARGE) == self::COL_TYPE_LARGE) {
		// 	$returnClassList[] = $columnTypes['large'];
		// }
		if ($type & self::COL_TYPE_ALL) {
			return implode(' ', $columnTypes);
		}

		if ($type & self::COL_TYPE_NORMAL) {
			$returnClassList[] = $columnTypes['normal'];
		}

		if ($type & self::COL_TYPE_SMALL) {
			$returnClassList[] = $columnTypes['small'];
		}

		if ($type & self::COL_TYPE_LARGE) {
			$returnClassList[] = $columnTypes['large'];
		}

		return implode(' ', $returnClassList);
	}

}


?>