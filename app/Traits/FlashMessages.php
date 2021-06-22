<?php

namespace ECC\Traits;

trait FlashMessages
{
	// set properties
	protected $errorMessages = [];
	protected $successMessages = [];
	protected $warningMessages = [];
	protected $infoMessages = [];

	protected function setFlashMessage($message, $type)
	{
		$model = 'infoMessage'; 

		switch ($type) {
			case 'info': {
					$model = 'infoMessage';
				}
				break;
			case 'error': {
					$model = 'errorMessage';
				}
				break;
			case 'success': {
					$model = 'successMessage';
				}
				break;
			case 'warning': {
					$model = 'warningMessage';
				}
				break;
		}

		if (is_array($message)) {
			foreach ($message as $key => $value) {
				array_push($this->$model, $value);
			}
		} else {
			array_push($this->$model, $message);
		}
	}

	protected function getFlashMessage()
	{
		return [
			'error' => $this->errorMessage,
			'success' => $this->successMessage,
			'warning' => $this->warningMessage,
			'info' => $this->infoMessage,
		];
	}

	protected function showFlashMessages()
	{
		session()->flash('error', $this->errorMessages);
		session()->flash('info', $this->infoMessages);
		session()->flash('success', $this->successMessages);
		session()->flash('warning', $this->warningMessages);
	}
}