<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 if ( ! function_exists('getSidebar()'))
     {
       function getSidebar()
       {
          $response = array();
			$allRegion = null;
        $allCity = null;
        $mappedRegionCity = array();

        //SERVER_URL is constant to URL service

        $curl = curl_init();

        //get region block
        curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."Region");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curl);
        $error = curl_error($curl);

        $curlRegion = json_decode($result);
        $allRegion = $curlRegion->result;

        //get city block
        curl_setopt($curl,CURLOPT_URL,JEJALAN_SERVER_URL."City");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

        $result = curl_exec($curl);
        $error = curl_error($curl);

        $curlCity = json_decode($result);
        $allCity = $curlCity->result;

        //init the map
        foreach($allRegion as $region)
        {
            $temp = new stdClass();
            $temp->namaRegion = $region->namaRegion;
            $temp->cities = array();
            $mappedRegionCity[$region->id] = $temp;
        }

        //map cities
        foreach($allCity as $city)
        {
            $temp = $city;

            $tempRegion = $mappedRegionCity[$city->region];

            unset($temp->region);

            $tempRegion->cities[] = $temp;
        }

        $response['mappedRegionCity'] = $mappedRegionCity;

        //end of mapping
		curl_close($curl);
		return $response;
       }
	 }