<?php

/**
 * Copyright 2016 ZeptoExpress Berhad.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * ZeptoExpress.
 *
 * As with any software that integrates with the ZeptoExpress platform, your use
 * of this software is subject to the ZeptoExpress Developer Principles and
 * Policies [https://www.zeptoexpress.com/my/privacy-policy]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 *
 *	@package ZeptoApi
 *	
 *	@author Ariff Azmi <ariff.azmi16@gmail.com>
 */

namespace ZeptoApi\Interfaces;

interface ZeptoApiInterface{

	public function execute();
	public function getAccountStatus();
	public function zoneCalculator();
	public function postcodeCalculator();
	public function addressCalculator();
	public function liveTracker();
	public function createBooking();
	public function getBookingById();
	public function getBookingHistory();
}