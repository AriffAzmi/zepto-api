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

namespace ZeptoApi\Helpers;

class ZeptoApiHelper
{
	/**
	 * @var set the pickup location value from booking details
	 */
    protected $pickupLocation = array();

    /**
	 * @var set the delivery location value from booking details
	 */
    protected $deliveryLocation = array();
	
	/**
	 * @var set the delivery status value from booking details
	 */
    protected $deliveryStatus;
	
	/**
	 * @var set the instruction notes value from booking details
	 */
    protected $instructionNotes;
	
	/**
	 * @var set the trip type value from booking details
	 */
    protected $tripType;
	
	/**
	 * @var set the job created date value from booking details
	 */
    protected $jobCreatedDate;
	
	/**
	 * @var set the job delivered date value from booking details
	 */
    protected $jobDeliveredDate;
	
	/**
	 * @var set the job pickup date value from booking details
	 */
    protected $jobPickupDate;
	
	/**
	 * @var set the job secret code value from booking details
	 */
    protected $jobSecretCode = array();
	
	/**
	 * @var set the value for rider assigned to job from booking details
	 */
    protected $assignedRiderDetails = array();
	
	/**
	 * @var set the job pickup details value from booking details
	 */
    protected $jobSenderDetails = array();
	
	/**
	 * @var set the job delivery details value from booking details
	 */
    protected $jobRecipientDetails = array();
	
	/**
	 * @var set the value for rider location from booking details
	 */
    protected $riderLocation;
	
	/**
	 * @var set the estimated booking price value
	 */
    protected $estimatedBookingPrice;
	
	/**
	 * @var set the estimated booking mileage value
	 */
    protected $estimatedBookingMileage;

    /**
	 * @var set the payment url value
	 */
    protected $paymentUrl;

    /**
	 * @var set the job id value
	 */
    protected $jobID;

    /**
	 * @var set the error message from API
	 */
    protected $apiErrMsg;

    /**
	 * @var set the total job created based on job history
	 */
    protected $totalJobCreated;


	public function getPickupLocation()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->pickupLocation;
	}

	public function getDeliveryLocation()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->deliveryLocation;
	}

	public function getDeliveryStatus()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->deliveryStatus;
	}

	public function getInstructionNotes()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->instructionNotes;
	}

	public function getTripType()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->tripType;
	}

	public function getJobCreatedDate()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobCreatedDate;
	}

	public function getJobDeliveredDate()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobDeliveredDate;
	}

	public function getJobPickupDate()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobPickupDate;
	}

	public function getSecretCode()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobSecretCode;
	}

	public function getRiderDetails()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->assignedRiderDetails;
	}

	public function getSenderDetails()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobSenderDetails;
	}

	public function getRecipientDetails()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobRecipientDetails;
	}

	public function getRiderLocation()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->riderLocation;
	}

	public function getEstimatedBookingPrice()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->estimatedBookingPrice;
	}

	public function getEstimatedBookingMileage()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->estimatedBookingMileage;
	}

	public function getPaymentUrl()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->paymentUrl;
	}

	public function getJobID()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->jobID;
	}

	public function getErrorMsg()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->apiErrMsg;
	}

	public function getTotalJobCreated()
	{
		/**
		* @todo setter/getter/send request to api
		*/

		return $this->totalJobCreated;
	}
	
}