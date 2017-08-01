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

use GuzzleHttp\Client;

/**
 * Class Cabralog
 * @package Xoborg\Cabralog
 */
class Cabralog
{
	/**
	 * @var string
	 */
	private static $tokenUser;
	/**
	 * @var string
	 */
	private static $tokenProject;

	/**
	 * @param $tokenUser
	 */
	public static function setTokenUser($tokenUser)
	{
		self::$tokenUser = $tokenUser;
	}

	/**
	 * @param $tokenProject
	 */
	public static function setTokenProject($tokenProject)
	{
		self::$tokenProject = $tokenProject;
	}

	/**
	 * @param $name
	 * @param $logContent
	 * @param null $tokenProject
	 * @return bool
	 */
	public static function setLog($name, $logContent, $tokenProject = null)
	{
		if($tokenProject === null) {
			$tokenProject = self::$tokenProject;
		}
		return self::doRequest(new RequestLog(self::$tokenUser, $tokenProject, $logContent, $name, LogKind::LOG));
	}

	/**
	 * @param $name
	 * @param $logContent
	 * @param null $tokenProject
	 * @return bool
	 */
	public static function setText($name, $logContent, $tokenProject = null)
	{
		if($tokenProject === null) {
			$tokenProject = self::$tokenProject;
		}
		return self::doRequest(new RequestLog(self::$tokenUser, $tokenProject, $logContent, $name, LogKind::TEXT));
	}

	/**
	 * @param $name
	 * @param $logContent
	 * @param null $tokenProject
	 * @return bool
	 */
	public static function setTimeStats($name, $logContent, $tokenProject = null)
	{
		if($tokenProject === null) {
			$tokenProject = self::$tokenProject;
		}
		return self::doRequest(new RequestLog(self::$tokenUser, $tokenProject, $logContent, $name, LogKind::TIMESTATS));
	}

	/**
	 * @param $requestLog
	 * @return bool
	 */
	private static function doRequest($requestLog)
	{
		$client = new Client([
			'base_uri' => 'https://cabralog.azurewebsites.net/api/'
		]);

		$response = $client->request('POST', 'PublicRequest/SetLog/', [
			'json' => $requestLog
		]);

		return $response->getStatusCode() === 200;
	}
}