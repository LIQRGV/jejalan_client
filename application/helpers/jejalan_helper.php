<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if ( ! function_exists('jejalanRouter()'))
    {
		/** 
		*	
		*	date format should be yyyy-mm-dd
		*	target should be on scope general, payment, history, deposit, flight, hotel, event or train
		* 	param included on tiket.com documentation for clarity
		*	
		*/
       function jejalanRouter($target, array $param, $custom = NULL)
		{
			$response = array();
			
			$curl = curl_init();
			
			$query = http_build_query($param);
			$url = __tiketGetUrl($target, $custom);
			
			curl_setopt($curl,CURLOPT_URL,TIKET_SERVER_URL.$url.$query);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

			$result = curl_exec($curl);
			$error = curl_error($curl);

			$curlResult = json_decode($result);
			$response = $curlResult->tiket;
			
			curl_close($curl);
			
			return $response;
		}
		
		function __tiketGetUrl($string, $custom = NULL)
		{
			//$scope = __tiketGetUrlScope($string);
			
			$splittedString = explode('.',$string);
			$scope = $splittedString[0];
			$request = $splittedString[1];
			
			$url = __tiketGetUrlMethod($scope, $request, $custom);
			
			return $url;
		}
		/*
		function __tiketGetUrlScope($string)
		{
			
		}*/
		
		function __tiketGetUrlMethod($scope, $request, $custom = NULL)
		{
			$result = "";
			if(strcmp($scope, "general") == 0)
			{
				if(strcmp($request,"token") == 0)
				{
					$result = "apiv1/payexpress?method=getToken&";
				}
				else if(strcmp($request,"currency") == 0)
				{
					$result = "general_api/listCurrency?";
				}
				else if(strcmp($request,"lang") == 0)
				{
					$result = "general_api/listLanguage?";
				}
				else if(strcmp($request,"country") == 0)
				{
					$result = "general_api/listCountry?";
				}
				else if(strcmp($request,"policies") == 0)
				{
					$result = "general_api/getPolicies?";
				}
			}
			else if(strcmp($scope, "payment") == 0)
			{
				if(strcmp($request,"checkoutBankNormal") == 0)
				{
					$result = "checkout/checkout_payment/2?";
				}
				else if(strcmp($request,"checkoutBankKlikBca") == 0)
				{
					$result = "checkout/checkout_payment/3?";
				}
				else if(strcmp($request,"checkoutBankInst") == 0)
				{
					$result = "checkout/checkout_payment/35?";
				}
				else if(strcmp($request,"creditCard") == 0)
				{
					$result = "payment/checkout_payment?";
				}
				else if(strcmp($request,"clickpay") == 0)
				{
					$result = "payment/checkout_payment?payment_type=4&";
				}
				else if(strcmp($request,"cimbClick") == 0)
				{
					$result = "payment/checkout_payment?payment_type=31&";
				}
				else if(strcmp($request,"epayBri") == 0)
				{
					$result = "payment/checkout_payment?payment_type=33&";
				}
			}
			else if(strcmp($scope, "history") == 0)
			{
				if(strcmp($request,"check") == 0)
				{
					$result = "check_order?";
				}
			}
			else if(strcmp($scope, "deposit") == 0)
			{
				if(strcmp($request,"set") == 0)
				{
					$result;
				}
				else if(strcmp($request,"topUp") == 0)
				{
					$result; 
				}
				else if(strcmp($request,"checkDeposit") == 0)
				{
					$result;
				}
				else if(strcmp($request,"checkoutPayment") == 0)
				{
					$result; 
				}
				else if(strcmp($request,"confirmByWeb") == 0)
				{
					$result; 
				}
				else if(strcmp($request,"show") == 0)
				{
					$result; 
				}
				else if(strcmp($request,"confirmByApi") == 0)
				{
					$result; 
				}
			}
			else if(strcmp($scope, "flight") == 0)
			{
				if(strcmp($request,"searchFlight") == 0)
				{
					$result = "search/flight?";
				}
				else if(strcmp($request,"nearestAirport") == 0)
				{
					$result = "flight_api/getNearestAirport?";
				}
				else if(strcmp($request,"popular") == 0)
				{
					$result = "flight_api/getPopularDestination?";
				}
				else if(strcmp($request,"searchAirport") == 0)
				{
					$result = "flight_api/all_airport?";
				}
				else if(strcmp($request,"checkUpdate") == 0)
				{
					$result = "ajax/mCheckFlightUpdated?";
				}
				else if(strcmp($request,"lionCaptcha") == 0)
				{
					$result = "flight_api/getLionCaptcha?";
				}
				else if(strcmp($request,"flightData") == 0)
				{
					$result = "flight_api/get_flight_data?";
				}
				else if(strcmp($request,"addOrder") == 0)
				{
					$result = "order/add/flight?";
				}
			}
			else if(strcmp($scope, "hotel") == 0)
			{
				if(strcmp($request,"searchHotel") == 0)
				{
					$result = "search/hotel?";
				}
				else if(strcmp($request,"searchArea") == 0)
				{
					$result = "search/search_area?";
				}
				else if(strcmp($request,"searchHotelPromo") == 0)
				{
					$result = "home/hotelDeals?";
				}
				else if(strcmp($request,"hotelData") == 0)
				{
					$result = "$custom?";
				}
				else if(strcmp($request,"addOrder") == 0)
				{
					$result = "order/add/hotel?";
				}
			}
			else if(strcmp($scope, "event") == 0)
			{
				if(strcmp($request,"searchEvent") == 0)
				{
					$result = "search/event?";
				}
				else if(strcmp($request,"eventData") == 0)
				{
					$result = "$custom?";
				}
				else if(strcmp($request,"addOrder") == 0)
				{
					$result = "order/add/event?";
				}
			}
			else if(strcmp($scope, "train") == 0)
			{
				if(strcmp($request,"searchTrain") == 0)
				{
					$result = "search/train?";
				}
				else if(strcmp($request,"searchStation") == 0)
				{
					$result = "train_api/train_station?";
				}
				else if(strcmp($request,"seatMap") == 0)
				{
					$result = "general_api/get_train_seat_map?";
				}
				else if(strcmp($request,"addOrder") == 0)
				{
					$result = "order/add/train?";
				}
				else if(strcmp($request,"changeSeat") == 0)
				{
					$result = "general_api/train_change_seat?";
				}
				else if(strcmp($request,"searchPromo") == 0)
				{
					$result = "train_api/train_promo?";
				}
			}
			else if(strcmp($scope, "order") == 0)
			{
				if(strcmp($request,"finishOrder") == 0)
				{
					$result = "order?";
				}
				else if(strcmp($request,"deleteOrder") == 0)
				{
					$result = "order/delete_order?";
				}
				else if(strcmp($request,"checkoutRequest") == 0)
				{
					$result = "order/checkout/$custom/IDR?";
				}
				else if(strcmp($request,"checkoutLogin") == 0)
				{
					$result = "checkout/checkout_customer?";
				}
				else if(strcmp($request,"checkoutCostumer") == 0)
				{
					$result = "checkout/checkout_customer?";
				}
				else if(strcmp($request,"availablePayment") == 0)
				{
					$result = "checkout/checkout_payment?";
				}
			}
		}
	}