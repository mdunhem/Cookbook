<?php
/**
 *  Twitter Bootstrap Form Helper
 *
 *  @author Mikael Dunhem <mikael.dunhem@gmail.com>
 *  @package app.View.Helper
 *  @version 0.1.0
 */
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {
	/**
	 *  Uses the Bootstrap Html Helper
	 *
	 *  @var array
	 */
	public $helpers = array(
		'Html' => array('className' => 'BootstrapHtml')
	);
}

?>