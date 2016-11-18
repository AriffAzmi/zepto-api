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
namespace ZeptoApi;

use \ZeptoApi\Helpers\ZeptoApiHelper;
use \ZeptoApi\Interfaces\ZeptoApiInterface;
use \ZeptoApi\Exception\ZeptoApiException;

class ZeptoApi extends ZeptoApiHelper implements ZeptoApiInterface
{	
	
	/**
     * @const string Version number of the Facebook PHP SDK.
     */
    const VERSION = '1.0.0';

    /**
     * @const string Default API version for requests.
     */
    const DEFAULT_API_VERSION = 'v1.0';

	/**
     * @var AppID
     */
    protected $appID;

    /**
     * @var Token
     */
    protected $token;
	
	/**
	 * @var set the url request
	 */
    protected $url;
	
	/**
	 * @var set the type request
	 */
    protected $type;
	
	/**
	 * @var set the post data request
	 */
    protected $postData = array();

    /**
	 * @var init the curl
	 */
    protected $ch;

	
	function __construct(array $config = [])
	{

		if (is_null($config['appID']) && !isset($config['appID'])) {
			
			$this->exception("Required appID key not supplied in config");
			$this->apiErrMsg = "Required appID key not supplied in config";
		}
		else{

			$this->appID = $config['appID'];
		}

		if (is_null($config['token']) && !isset($config['token'])) {
			
			$this->exception("Required token key not supplied in config");
			$this->apiErrMsg = "Required token key not supplied in config";
		}
		else{

			$this->token = $config['token'];
		}

	}


	public function execute(){

		$args = get_object_vars($this);


		if (isset($args['postData']) && !is_null($args['postData'])) {
			
			$mergeArr['postData'] = [
				'app_id' => $this->appID,
				'token' => $this->token
			];

			$args['postData'] = array_merge($args['postData'],$mergeArr['postData']);
		}
		else{

			$args['postData'] = [
				'app_id' => $this->appID,
				'token' => $this->token
			];
		}


		// Set some options
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($this->ch, CURLOPT_POST, 1);
		curl_setopt($this->ch, CURLOPT_URL, $args['url']);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $args['postData']);

		$resp = curl_exec($this->ch);
		curl_close($this->ch);

		return json_decode($resp);

	}


	public function getAccountStatus()
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/authenticate';
		$this->type = 'authenticate';

		$res = $this->execute();

		if ($res->result->status != false) {
			
			return $res;
		}
		else{

			$this->apiErrMsg = $res->result[0]->message;

			return false;
		}
	}

	public function zoneCalculator($pickup=null, $delivery=null)
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/calculator/zone';
		$this->type = 'zone_calculator';
		$this->postData = [
			'pickup' => $pickup,
			'delivery' => $delivery
		];

		$res = $this->execute();

		
		if ($res->result[0]->status != false) {
			
			$this->estimatedBookingPrice = $res->result[0]->price;
			$this->estimatedBookingMileage = $res->result[0]->distance;

			return $res;
		}
		else{

			$this->apiErrMsg = $res->result[0]->message;

			return false;
		}
	}

	public function postcodeCalculator($pickup=null, $delivery=null)
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/calculator/postcode/';
		$this->type = 'postcode_calculator';
		$this->postData = [
			'pickup' => $pickup,
			'delivery' => $delivery
		];

		$res = $this->execute();

		if ($res->result[0]->status != false) {
			
			$this->estimatedBookingPrice = $res->result[0]->price_myr;
			$this->estimatedBookingMileage = $res->result[0]->distance_km;

			return $res;
		}
		else{

			$this->apiErrMsg = $res->result[0]->message;

			return false;
		}
	}

	public function addressCalculator($pickup=null, $delivery=null, $vehicle=1, $scheduleDate = null, $country="MY")
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/calculator/address';
		$this->type = 'address_calculator';
		$this->postData = [
			'pickup' => $pickup,
			'delivery' => $delivery,
			'vehicle' => $vehicle,
			'schedule' => $scheduleDate,
			'country' => $country
		];

		$res = $this->execute();
		
		if ($res->result[0]->status != false) {
			
			$this->estimatedBookingPrice = $res->result[0]->price_myr;
			$this->estimatedBookingMileage = $res->result[0]->distance_km;

			return $res;
		}
		else{

			$this->apiErrMsg = $res->result[0]->message;

			return false;
		}
	}

	public function liveTracker($jobid=null)
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/tracker';
		$this->type = 'live_tracker';
		$this->postData = [
			'jobid' => $jobid
		];

		$res = $this->execute();
		
		if ($res->result->status != false) {
			
			$this->riderLocation = $res->result->rider;

			return $res;
		}
		else{

			$this->apiErrMsg = $res->message;

			return false;
		}
	}

	public function createBooking(
		$sender_fullname = null,
		$sender_email = null,
		$sender_phone = null,
		$recipient_fullname = null,
		$recipient_email = null,
		$recipient_phone = null,
		$pickup_address = null,
		$delivery_address = null,
		$pickup_latlng = null,
		$delivery_latlng = null,
		$distance_km = null,
		$price_myr = null,
		$trip_type = null,
		$instruction_notes = null,
		$datetime_pickup = "NOW",
		$unit_no_pickup = null,
		$unit_no_delivery = null,
		$vehicle = 1,
		$country = "MY"
	)
	{

		/**
		* @todo setter/getter/send request to api
		*/

		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/booking/new';
		$this->type = 'create_booking';
		$this->postData = [
			'sender_fullname' => $sender_fullname,
			'sender_email' => $sender_email,
			'sender_phone' => $sender_phone,
			'recipient_fullname' => $recipient_fullname,
			'recipient_email' => $recipient_email,
			'recipient_phone' => $recipient_phone,
			'pickup_address' => $pickup_address,
			'delivery_address' => $delivery_address,
			'pickup_latlng' => $pickup_latlng,
			'delivery_latlng' => $delivery_latlng,
			'distance_km' => $distance_km,
			'price_myr' => $price_myr,
			'trip_type' => $trip_type,
			'instruction_notes' => $instruction_notes,
			'datetime_pickup' => $datetime_pickup,
			'unit_no_pickup' => $unit_no_pickup,
			'unit_no_delivery' => $unit_no_delivery,
			'vehicle' => $vehicle,
			'country' => $country
		];

		$res = $this->execute();

		if ($res->booking->status != false) {
			
			$this->paymentUrl = $res->booking->payment_url;
			$this->jobID = $res->booking->jobid;

			return $res;
		}
		else{

			$this->apiErrMsg = $res->booking->message;

			return false;
		}
	}

	public function getBookingById($jobid=null)
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/booking/details';
		$this->type = 'retrieve_booking_id';
		$this->postData = [
			'jobid' => $jobid
		];

		$res = $this->execute();

		if ($res->booking_details[0]->status != false) {
			
			$this->pickupLocation = [
				'address' => $res->booking_details[0]->pickup_address,
				'latlong' => $res->booking_details[0]->pickup_latlng
			];

			$this->deliveryLocation = [
				'address' => $res->booking_details[0]->delivery_address,
				'latlong' => $res->booking_details[0]->delivery_latlng
			];

			$this->deliveryStatus = $res->booking_details[0]->delivery_status;
			$this->instructionNotes = $res->booking_details[0]->instruction_notes;
			$this->tripType = $res->booking_details[0]->trip_type;
			$this->jobCreatedDate = $res->booking_details[0]->date_created;
			$this->jobDeliveredDate = $res->booking_details[0]->date_delivered;
			$this->jobPickupDate = $res->booking_details[0]->date_pickup;
			$this->jobSecretCode = $res->secret_code[0];
			$this->assignedRiderDetails = $res->rider_details[0];
			$this->jobSenderDetails = $res->sender_details[0];
			$this->jobRecipientDetails = $res->recipient_details[0];

			return $res;
		}
		else{

			$this->apiErrMsg = $res->booking_details[0]->message;

			return false;
		}
	}

	public function getBookingHistory()
	{

		/**
		* @todo setter/getter/send request to api
		*/
		$this->ch = curl_init();
		$this->url = 'https://zeptoapi.com/api/rest/history/info';
		$this->type = 'booking_history';

		$res = $this->execute();

		return $res;
	}

	public function exception($msg=null){

		/**
		* @todo setter/getter/send request to api
		*/
		
		throw new ZeptoApiException($msg);
	}
}
