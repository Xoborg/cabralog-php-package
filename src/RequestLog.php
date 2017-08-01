<?php
/*
 * This file is part of the cabralog php package.
 *
 * (c) Xoborg <developers@xoborg.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xoborg\Cabralog;

/**
 * Class RequestLog
 * @package Xoborg\Cabralog
 */
class RequestLog implements \JsonSerializable
{
	/**
	 * @var string
	 */
	public $tokenUser;
	/**
	 * @var string
	 */
	public $tokenProject;
	/**
	 * @var string
	 */
	public $logContent;
	/**
	 * @var string
	 */
	public $name;
	/**
	 * @var string
	 */
	public $kind;

	/**
	 * RequestLog constructor.
	 * @param string $tokenUser
	 * @param string $tokenProject
	 * @param string $logContent
	 * @param string $name
	 * @param string $kind
	 */
	public function __construct($tokenUser, $tokenProject, $logContent, $name, $kind)
	{
		$this->checkData($tokenUser, $tokenProject, $logContent, $name, $kind);
		$this->tokenUser = $tokenUser;
		$this->tokenProject = $tokenProject;
		$this->logContent = $logContent;
		$this->name = $name;
		$this->kind = $kind;
	}

	/**
	 * @param $tokenUser
	 * @param $tokenProject
	 * @param $logContent
	 * @param $name
	 * @param $kind
	 * @throws \Exception
	 */
	private function checkData($tokenUser, $tokenProject, $logContent, $name, $kind)
	{
		if($tokenUser === null || $tokenUser === '') {
			throw new \Exception('TokenUser can not be empty.');
		}
		if($tokenProject === null || $tokenProject === '') {
			throw new \Exception('TokenProject can not be empty.');
		}
		if($logContent === null || $logContent === '') {
			throw new \Exception('LogContent can not be empty.');
		}
		if($name === null || $name === '') {
			throw new \Exception('Name can not be empty.');
		}
		if($kind === null || $kind === '') {
			throw new \Exception('Kind can not be empty.');
		}
	}

	/**
	 * @return array
	 */
	function jsonSerialize()
	{
		return [
			'TokenUser' => $this->tokenUser,
			'TokenProject' => $this->tokenProject,
			'LogContent' => $this->logContent,
			'Name' => $this->name,
			'Kind' => $this->kind
		];
	}
}