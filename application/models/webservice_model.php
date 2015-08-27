<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
 
class webservice_model extends CI_Model {
      
    function __construct(){
    	parent::__construct();
    }
    /*
    	Created Date: 21-01-2014
    	Purpose: to get login details
    */  
	function checkUserlogin($vEmail,$vPassword){            
        $this->db->select('');
        $this->db->from('r_administrator');
        $this->db->where('vEmail',$vEmail);
        $this->db->where('vPassword',$vPassword);
        $data=$this->db->get()->result_array();               
        return $data;                
    } 
    
    function checkNewsLetter($vEmail,$iApplicationId){            
        $this->db->select('vMailName, vEmail, iCategoryId');
        $this->db->from('r_app_newletter');
        $this->db->where('vEmail',$vEmail);
        $this->db->where('iApplicationId',$iApplicationId);
        $data=$this->db->get()->result();               
        return $data;                
    }

    function save_newsletter($Data){

        $this->db->insert('r_app_newletter',$Data);
        return $this->db->insert_id();
    }
	
    function save_contactus($Data){

        $this->db->insert('r_app_contact_values',$Data);
        return $this->db->insert_id();
    }

    function getApplicationData($vApplicationCode){

        $this->db->select('iApplicationId, tAppIconName, vApplicationCode');
        $this->db->from('r_appinformation');
        $this->db->where('vApplicationCode',$vApplicationCode);
        $query = $this->db->get();
        return $query->row_array();
    }

	function save_app_order_transaction_details($data){
		$this->db->insert('r_app_order_transaction_details', $data);
        return $this->db->insert_id();
	}
	
    function save_fee_payment_value($data){
        $this->db->insert('r_app_fee_payment_value', $data);
        return $this->db->insert_id();
    }

    function save_fee_payment_detail($data){
        $this->db->insert('r_app_fee_payment_detail', $data);
        return $this->db->insert_id();   
    }

    #get Client details
    function get_client_details($iAdminId)
    { 
        $this->db->select('');
        $this->db->from('r_administrator');
        $this->db->where('iAdminId', $iAdminId);      
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_fee_payment_value($Data, $iFeePaymentId){
        $this->db->where('iFeePaymentId', $iFeePaymentId);
        $query = $this->db->update("r_app_fee_payment_value", $Data);
        return $query;
    }
	
	function update_app_order_transaction_details($Data, $iPaymentId){
        $this->db->where('iOrderTransId', $iPaymentId);
        $query = $this->db->update("r_app_order_transaction_details", $Data);
        return $query;
    }

    function get_apikey_mailchimp($iApplicationId,$iAppTabId){
        $this->db->select('');
        $this->db->where('iApplicationId',$iApplicationId);
        $this->db->where('iAppTabId',$iAppTabId);
        $this->db->from('r_app_mailinglist_value');
        $query = $this->db->get();
        return $query->row_array();
    }

    function save_post_detail($data){
        $this->db->insert('r_app_share_comment', $data);
        return $this->db->insert_id();
    }
	
    function getEvent_detail($iEventId)
	{
        $this->db->select('*');
        $this->db->where('iEventId',$iEventId);
        $this->db->from('r_app_event_values');
        $query = $this->db->get();
        return $query->row_array();   
    }
	
    function getitem_detail($iMenuId)
	{
        $this->db->select('*');
       	$this->db->from('r_menu_item');
       	$this->db->where('iMenuId',$iMenuId);
       	$this->db->where('eStatus','Active');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	/**
		Developer : Mayur Gajjar
		Date : 21/8/2014
		Description : save order details
	**/
	
	function save_order_details($Data)
	{
		$this->db->insert('r_order_customer_details',$Data);
        return $this->db->insert_id();
	}
	
	
	/** update customer id **/
	function update_order_details_customerid($data,$iUserId)
	{
		$mydata = array(
               'iCustOrderId' => $data,
        );
		$this->db->where('iUserId', $iUserId);
		$this->db->where('status', 'Active');
		$this->db->update('r_order_detail', $mydata); 
	}
	
	/** update order details **/
	function update_order_details($Data)
	{
		$data = array(
               'status' => 'Inactive',
        );
		$this->db->where('iUserId', $Data['iUserId']);
		$this->db->update('r_order_detail', $data); 
	}
	
	function save_cart_order_details($Data)
	{
		$this->db->insert('r_order_detail',$Data);
        return $this->db->insert_id();
	}
	
	function getorder_detail($iUserId,$iApplicationId,$iAppTabId)
	{
		$this->db->select('*,SUM(r_order_detail.fTotalPrice) as `Total`,SUM(r_order_detail.vQuantity) as `vQuantity`,r_menu_item.vImage');
		$this->db->from('r_order_detail');
        $this->db->join('r_menu_catagory', 'r_order_detail.iMenuId = r_menu_catagory.iMenuID','inner');
		$this->db->join('r_menu_item', 'r_order_detail.iItemId = r_menu_item.iItemId','inner');
		$this->db->where('r_order_detail.iUserId',$iUserId);
		$this->db->where('r_order_detail.iApplicationId',$iApplicationId);
		$this->db->where('r_order_detail.status','Active');
		$this->db->group_by('r_order_detail.iItemId');
	    $query = $this->db->get();
	    return $query->result_array();
	}
	
	// delete order details
	function delete_order_details($Data)
	{
		$this->db->where('iOrderId', $Data['iOrderId']);
      	$this->db->delete('r_order_detail'); 
	}
	
	// loyalty details 
	function getloyalty_detail($Data)
	{
		$this->db->select('');
		$this->db->from('r_app_loyalty_values');
		$this->db->where('r_app_loyalty_values.iLoyaltyId',$Data['iLoyaltyId']);
		$this->db->where('r_app_loyalty_values.vSecretCode',$Data['vSecretCode']);
		$query = $this->db->get();
		return $query->result_array();		
	}
	
	// Insert User Used loyalty card details
	function insert_loyalty_details($Data)
	{
		$this->db->insert('r_app_loyalty_user_detail',$Data);
        return $this->db->insert_id();
	}
	
	// delete loyalty details
	function delete_loyalty_details($Data){
		$this->db->where('iLoyaltyID', $Data['iLoyaltyId']);
      	$this->db->delete('r_app_loyalty_user_detail'); 
	}
	
	/**
		Developer : Himanshu
		Date : 1/8/2014
		Description : Reservation
	**/
	function get_reservation_location($iApplicationId){
		$this->db->select('');
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->from('r_app_reservation_location');
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_reservation_services($iApplicationId){
		$this->db->select('');
		$this->db->where('iApplicationId',$iApplicationId);
		$this->db->from('r_app_reservation_service');
		
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}
	
	function get_service_by_id($iServiceId){
		$this->db->select('vServiceName,vPrice,vReservationFee');
		$this->db->where('iServiceId',$iServiceId);
		$this->db->from('r_app_reservation_service');
		
		$query = $this->db->get();
		return $query->row_array();	
	}
	
	function get_current_day_time($iServiceId){
		$this->db->select('');
		$this->db->where('iServiceId',$iServiceId);
		$this->db->from('r_app_reservation_service');
		
		$query = $this->db->get();
		//echo $this->db->last_query(); exit;
		return $query->result_array();
	}

	function get_location_by_id($iLocationId){
		$this->db->select('vAddress1,vCity,vState,vZip');
		$this->db->where('iLocationId',$iLocationId);
		$this->db->from('r_app_reservation_location');
		
		$query = $this->db->get();
		return $query->row_array();
	}	
	function getqrcodeDetail($iQrID){
		$this->db->select('');
		$this->db->from('r_app_qrcode_values');
        $this->db->where('iQrID',$iQrID);
	    $query = $this->db->get();
		return $query->result_array();
	}
	
	function update_app_cust_order_details($data){
		return $query = $this->db->query('update r_order_customer_details set eStatus="Inactive" where iUserId = "'.$data['iUserId'].'"');
	}
	
	function update_app_order_details($data){
		return $query = $this->db->query('update r_order_detail set status="Inactive" where iUserId = "'.$data['iUserId'].'"');
	}
	
	// Create By   :- maksudkhan
    // Date        :- 9-9-14
    // Description :- Get Loyalty Count

	function get_count_loyalty($iLoyaltyId,$iUserId){
		$this->db->select('count(*) As count');
		$this->db->from('r_app_loyalty_user_detail');
		$this->db->where('iUserId',$iUserId);
        $this->db->where('iLoyaltyID',$iLoyaltyId);
	    $query = $this->db->get();
        return $query->row('count');
	}
	
	// get total details
	function get_total_price_order_details($data)
	{
		$this->db->select('sum(fTotalPrice) as fTotalPrice');
		$this->db->from('r_order_customer_details as r_ord');
		$this->db->join('r_order_detail as r_det', 'r_ord.iUserId = r_det.iUserId','inner');
	    $this->db->where('iCustOrderId',$data['iCustOrderId']);
		$this->db->where('eStatus','Active');
	    $query = $this->db->get();
        return $query->result_array();
	}
	
	function get_receipt_order_details($iPaymentId){

		$this->db->select('r_ord_cust.*,r_menu_det.*');
		$this->db->from('r_app_paypal_paymentdetail as r_ap_ord');
		$this->db->join('r_order_customer_details as r_ord_cust', 'r_ap_ord.iUserId = r_ord_cust.iUserId','left');
		$this->db->join('r_order_detail as r_ord_det', 'r_ap_ord.iUserId = r_ord_det.iUserId','left');
		$this->db->join('r_menu_item as r_menu_det', 'r_ord_det.iItemId = r_menu_det.iItemId','left');
		$this->db->where('r_ap_ord.iOrderTransId',$iPaymentId);
		$this->db->where('r_ord_cust.eStatus','Active');
	    $query = $this->db->get();
        return $query->result_array();
	}

	
	/**
		get receipt order details
	**/
	function get_html_receipt_order_details($receipt_data)
	{
		$html .= '';
		$html .= '<center>';
		$html .= '<div data-role="fieldcontain" class="wrapmain">';

		$html .= '<p>Bonjour,</p><br /><br />';

		$html .= '<p>ShaadOR vous informe que  votre commande a bien était enregistrée avec succès et transmise à / au Shaad Or
</p><br /><br />';

		$html .= '<p>Bonne réception.</p><br /><br />';
		
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .= '<label for="vCreditExp">Nom:</label>';
			$html .= $receipt_data[0]['vName'];
		$html .= '</div>';
		
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .= '<label for="vCreditExp">Adresse:</label>';
			$html .= $receipt_data[0]['tAddress'];
		$html .= '</div>';
		
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .= '<label for="vCreditExp">Code Postal:</label>';
			$html .= $receipt_data[0]['tAddress'];
		$html .= '</div>';
				
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .= '<label for="vCreditExp">Ville:</label>';
			$html .= $receipt_data[0]['vArea'];
		$html .= '</div>';
		
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .= '<label for="vCreditExp">Tel:</label>';
			$html .= $receipt_data[0]['vPhone'];
		$html .= '</div>';
		
		$menu_details = $this->get_menu_details_order($receipt_data[0]['iUserId']);
		foreach($menu_details as $val)
		{
			$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
				$html .= '<label for="vCreditExp">Nom de l’article :</label>';
				$html .= $val['vItemName'];
			$html .= '</div>';
			
			$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
				$html .= '<label for="vCreditExp">Prix de l’article :</label>';
				$html .= $val['fPrice'];
			$html .= '</div>';
			
			$total = $total + $val['fPrice'];
		}
		
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .= '<label for="vCreditExp">Sous-total : </label>';
			$html .= $total;
		$html .= '</div>';

		$html .= '<p>Merci </p><br /><p>Cordialement</p>';
		
		$html .= '</div>';
		$html .= '</center>';

		return $html;
	}
	
	function get_menu_details_order($iUserId)
	{
		$this->db->select('*');
		$this->db->from('r_order_detail as r_ap_ord');
		$this->db->join('r_menu_item as r_ord_cust', 'r_ap_ord.iItemId = r_ord_cust.iItemId','inner');
		$this->db->where('r_ap_ord.iUserId',$iUserId);
	    $query = $this->db->get();
        return $query->result_array();	
	}

	function book_service_confirm($data){
		//echo 'In Model'; print_r($data); exit;
		$input = array(
			'iApplicationId' => $data['iApplicationId'],
			'iUserId' => $data['iUserId'],
			'iLocationId' => $data['iLocationId'],
			'iServiceId' => $data['iServiceId'],
			'vServicePrice' => $data['vServicePrice'],
			'vServiceFees' => $data['vServiceFees'],
			'vDate' => $data['vDate'],
			'vTime' => $data['vTime']
		);
		$this->db->insert('r_app_reservation_main',$input);
		

	}
	
	function get_html_of_error_msg()
	{
		$html .='';
		$html .= '<center>';
		$html .= '<div data-role="fieldcontain" class="wrapmain">';
		$html .= '<h3>ERROR!</h3>';
		$html .= '<div data-role="fieldcontain" class="ui-hide-label">';
			$html .='<h3>Transaction is not successfully done !!</h3>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</center>';
		
		return $html;
	}
	
	function get_api_details_application($iApplicationId){
		$this->db->select('*');
		$this->db->from('r_app_payment_key_details');
		$this->db->where('iApplicationId',$iApplicationId);
	    $query = $this->db->get();
        return $query->result_array();	
	}
	function get_loyalty_user_alldetail($iUserId,$applicationid)
	{
		$this->db->select('*');
		$this->db->from('r_app_loyalty_values');
		$this->db->where('iApplicationId',$applicationid);
		$query = $this->db->get();
        return $query->result_array();


/*		//lv.vRewardText, count(ld.iLoyaltyUseId) as LoyaltyUse, lv.vSquareCount
		$this->db->distinct();
		//$this->db->select('ld.iLoyaltyID,lv.iLoyaltyID');
		$this->db->select('lv.iLoyaltyID, ld.iApplicationId,ld.iAppTabId, ld.iUserId, lv.vRewardText, count(ld.iLoyaltyUseId) as LoyaltyUse,lv.vSquareCount  - count(ld.iLoyaltyUseId) as remain_loyalty , lv.vSquareCount,lv.vThumbnail');
		$this->db->from('r_app_loyalty_values as lv');

		$this->db->join('r_app_loyalty_user_detail as ld','lv.iApplicationId=ld.iApplicationId');
		//$this->db->join('r_app_loyalty_user_detail as ld','lv.iLoyaltyID=ld.iLoyaltyID');
		$this->db->where('ld.iApplicationId',$applicationid);
		$this->db->where('ld.iUserId',$iUserId);
		$this->db->group_by("ld.iLoyaltyID"); 
		$query = $this->db->get();
		return $query->result_array();*/
	}
	function get_loyalty_user_countdetail($iUserId,$applicationid)
	{
		$this->db->select('ld.iLoyaltyID,count(ld.iLoyaltyUseId) as LoyaltyUse,lv.vSquareCount  - count(ld.iLoyaltyUseId) as remain_loyalty ');
		$this->db->from('r_app_loyalty_values as lv');
		$this->db->join('r_app_loyalty_user_detail as ld','lv.iLoyaltyID=ld.iLoyaltyID','left');
		$this->db->where('ld.iApplicationId',$applicationid);
		$this->db->where('ld.iUserId',$iUserId);
		$this->db->group_by("ld.iLoyaltyID"); 
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/** check order details **/
	function check_order_details($data)
	{
		$this->db->select('iOrderId');
		$this->db->from('r_order_detail');
		$this->db->where('iUserId',$data['iUserId']);
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$this->db->where('iMenuId',$data['iMenuId']);
		$this->db->where('iItemId',$data['iItemId']);
		$this->db->where('iAppTabId',$data['iAppTabId']);
		$query=$this->db->get();
		return $query->row('iOrderId');
	}
	
	/** Update ordercart **/
	function update_ordercart_details($data)
	{
		$this->db->where('iUserId', $data['iUserId']);
		$this->db->where('iMenuId', $data['iMenuId']);
		$this->db->where('iItemId', $data['iItemId']);
		$this->db->where('iAppTabId',$data['iAppTabId']);
		$this->db->where('iApplicationId', $data['iApplicationId']);
		$this->db->update('r_order_detail', $data);
		return 1;

	}
	
	/** get website **/
	function get_website_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_website_values');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** get social media **/
	function get_socialmedia_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_socialmedia_value');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** pdf details **/
	function get_pdf_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_pdf_values');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** custom details **/
	function get_custom_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_infotab_values');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** Event Details **/
	function get_event_details($data,$today)
	{
		$where="(`dStartDate` >= '".$today."' OR `dEndDate` >= '".$today."')";	

		/** Event Details **/
		$this->db->select('*');
		$this->db->from('r_app_event_values');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$this->db->where($where,NULL,FALSE);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** RSS Details **/
	function get_RSS_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_rss_value');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** Qrcode Details **/
	function get_Qrcode_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_qrcode_values');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** get_home_details **/
	function get_home_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_home_value as rh');
		$this->db->where('rh.iApplicationId',$data['iApplicationId']);
		$this->db->where('rh.iAppTabId',$data['iAppTabId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** get opening details **/
	function get_openingtime_details($iHometabId,$data)
	{
		$this->db->select('*');
		$this->db->from('r_app_home_addopeningtime');
		$this->db->where('iHometabId',$iHometabId);
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/*** get background image ***/
	function get_background_home_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_home_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** **/
	function get_background_image_event($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_event_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();		
	}
	
	/** website background image **/
	function get_website_background_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_website_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();		
	}
	
	/** custom background image **/
	function get_custom_background_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_infotab_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** pdf background image **/
	function get_pdf_background_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_pdf_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** social media background image **/
	function get_socialmedia_background_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_socialmedia_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** background image for rss **/
	function get_rss_background_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_rss_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** Qrcode image **/
	function get_qrcode_background_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_qrcode_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** Youtube channel details **/
	function get_youtube_channel_detail($data)
	{
		/** youtube channel **/
		$this->db->select('*');
		$this->db->from('r_app_youtube_value as rv');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** background image of youtube **/
	function get_background_youtube_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_youtube_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** background image **/
	function get_loyalty_bg_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_loyalty_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** gallery **/
	function get_gallery_detail($data)
	{
		/** youtube channel **/
		$this->db->select('*');
		$this->db->from('r_app_gallery_value as rv');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** get customer image **/
	function get_custom_images_gallery($iGalleryId)
	{
		/** get custom images **/
		$this->db->select('*');
		$this->db->from('r_app_gallery_images as rv');
		$this->db->where('rv.iGalleryId',$iGalleryId);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** get menu category details **/
	function get_menu_category($data)
	{
		$this->db->select('*');
		$this->db->from('r_menu_catagory as rv');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	/** get item category **/
	function get_item_category($data)
	{
		$this->db->select('rv.*,rd.vCurrency');
		$this->db->from('r_menu_item as rv');
		$this->db->join('r_appinformation as ra','ra.iApplicationId=rv.iApplicationId','inner');
		$this->db->join('r_administrator as rd','rd.iAdminId=ra.iClientId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$this->db->where('rv.iMenuId',$data['iMenuId']);
		$query=$this->db->get();
		return $query->result_array();	
	}

	function get_menutitle_name($iMenuID){
		$this->db->select('');
		$this->db->from('r_menu_catagory');
		$this->db->where('iMenuID',$iMenuID);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	/** news details **/
	function get_news_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_news_value as rv');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** news image **/
	function get_background_news_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_news_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** bg image **/
	function get_category_bg_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_menu_catagory as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','left');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','left');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** webservice payment transaction add **/
	function insert_paypal_details($data)
	{
		$this->db->insert('r_app_paypal_paymentdetail',$data);
        	return $this->db->insert_id();
	}
	
	/** voicerecording **/
	function get_voicerecording_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_voice_recording_values as rv');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** background voicerecording **/
	function get_background_voicerecording_image($data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_menu_catagory as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();	
	}
	
	/** get appereance details**/
	function get_appereance_details($data)
	{
		$this->db->select('*,rl.vImage Headerimage');
		$this->db->from('r_app_design_ifo as rv');
		$this->db->join('r_lunch_header as rl','rv.iLunchheaderId = rl.iLunchheaderId','left');
		$this->db->join('r_buttons_tab_background as rt','rv.iBackgroundId = rt.iBtntabbackgroundId','left');
		$this->db->where('rv.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** reservation details **/
	function get_location_reservation_details($data)
	{
		/** reservation details **/
		$this->db->select('*');
		$this->db->from('r_app_reservation_location');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** service get reservation **/
	function get_location_reservation_service($data)
	{
		/** reservation details **/
		$this->db->select('*');
		$this->db->from('r_app_reservation_service as rl');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** Add Final Reservation **/
	function insert_final_reservation($data)
	{
		$this->db->insert('r_app_reservation_main',$data);
        	return $this->db->insert_id();
	}
	
	/** get reservation list **/
	function get_reservation_list($data)
	{
		$this->db->select('rm.*,rl.*,rs.*');
		$this->db->from('r_app_reservation_main as rm');
		$this->db->join('r_app_reservation_location as rl','rm.iLocationId=rl.iLocationId','left');
		$this->db->join('r_app_reservation_service as rs','rm.iServiceId=rs.iServiceId','left');
		$this->db->where('rm.iApplicationId',$data['iApplicationId']);
		$this->db->where('rm.iUserId',$data['iUserId']);
		$this->db->where('rm.vDate >=',date("Y-m-d"));
		$query = $this->db->get();
		return $query->result_array();
	}
		
	/** get reservation list **/
	function get_reservation_past_list($data)
	{
		$this->db->select('rm.*,rl.*,rs.*');
		$this->db->from('r_app_reservation_main as rm');
		$this->db->join('r_app_reservation_location as rl','rm.iLocationId=rl.iLocationId','inner');
		$this->db->join('r_app_reservation_service as rs','rm.iServiceId=rs.iServiceId','inner');
		$this->db->where('rm.iApplicationId',$data['iApplicationId']);
		$this->db->where('rm.iUserId',$data['iUserId']);
		$this->db->where('rm.vDate <',date("Y-m-d"));
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function insert_paypal_reservation_details($data)
	{
		$this->db->insert('r_app_paypal_payment_reservation',$data);
        return $this->db->insert_id();
	}

	function get_application_name_details($iApplicationId){
		$this->db->select('');
		$this->db->from('r_appinformation');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_service_te_details($iReservationId){
		$this->db->select('');
		$this->db->from('r_app_reservation_main as rm');
		$this->db->join('r_app_reservation_service as rs','rs.iServiceId=rm.iServiceId','left');
		$this->db->where('rm.iReservationId',$iReservationId);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_service_center_details($iApplicationId){
		$this->db->select('');
		$this->db->from('r_app_reservation_general_info');
		$this->db->where('iApplicationId',$iApplicationId);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	
	
	/** Around us ***/
	function get_aroundus_list($data)
	{
		/** reservation details **/
		$this->db->select('*');
		$this->db->from('r_app_aroundus_category as rl');
	//	$this->db->join('r_app_aroundus_gen_info as rg','rl.rCatId=rg.rCatId','left');
		$this->db->where('rl.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** around us details **/
	function get_around_us_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_aroundus_gen_info as rl');
		$this->db->where('rl.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** get home lat long **/
	function get_lat_long_home($iApplicationId)
	{
		/** home details **/
		$this->db->select('rl.vLatitude,rl.vLongitude');
		$this->db->from('r_app_home_value as rl');
		$this->db->where('rl.iApplicationId',$iApplicationId);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** get location **/
	function get_location_list($data)
	{
		/** home details **/
		$this->db->select('*');
		$this->db->from('r_app_location_value as rl');
		$this->db->where('rl.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** get Application Features **/
	function get_features_application($data)
	{
		/** home details **/
		$this->db->select('rl.*,ra.vTitle Tabname');
		$this->db->from('r_appfeature as rl');
		$this->db->join('r_appindustryfeature as ra','rl.iFeatureId=ra.iFeatureId','inner');
		$this->db->where('rl.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/** **/
	function get_features_order_application($data)
	{
		/** home details **/
		$this->db->select('ra.vTitle Tabname,rl.*');
		$this->db->from('r_appfeature as rl');
		$this->db->join('r_appindustryfeature as ra','rl.iFeatureId=ra.iFeatureId','inner');
		$this->db->where('rl.iApplicationId',$data['iApplicationId']);
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/* mailchimp */
	function get_mailchimp_details($data)
	{
		/** home details **/
		$this->db->select('*');
		$this->db->from('r_app_mailinglist_value as rl');
		$this->db->where('rl.iApplicationId',$data);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	/** update status order detail list **/
	function update_status_order_details_list($data)
	{
	 	$query = $this->db->query("update r_order_detail set status = 'Inactive' where iCustOrderId = '".$data['iCustOrderId']."'");
	   return $query;
	}
	
	function update_status_order_details_list1($iCustomerId){
		/** update status **/
		$query = $this->db->query("update r_order_customer_details set eStatus = 'Inactive' where iCustOrderId = '".$data['iCustOrderId']."'");
	   return $query;
	}

	function get_customer_order_details_for_mail($iCustOrderId){
		$this->db->select('');
		$this->db->from('r_order_customer_details');
		$this->db->where('iCustomerId',$iCustomerId);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	
	/** Loyalty Details **/
	function get_loyalty_total_Details($iUserId,$iApplicationId)
	{
		$this->db->select('ld.iLoyaltyID,count(ld.iLoyaltyUseId) as LoyaltyUse,lv.vSquareCount  - count(ld.iLoyaltyUseId) as remain_loyalty ');
		$this->db->from('r_app_loyalty_values as lv');
		$this->db->join('r_app_loyalty_user_detail as ld','lv.iLoyaltyID=ld.iLoyaltyID','left');
		$this->db->where('ld.iApplicationId',$applicationid);
		$this->db->where('ld.iUserId',$iUserId);
		$this->db->group_by("ld.iLoyaltyID"); 
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	/** userwise loyalty details **/
	function get_userwise_loyalty_details($iLoyaltyId,$vSquareCount)
	{
		/** user loyalty **/
		$user_loyalty = $this->get_userwise_loyalty_calculation($iLoyaltyId,$vSquareCount);
		if(count($user_loyalty) > 0){
			/** user loyalty **/
			if($vSquareCount >= $user_loyalty['total']){
				$result = $vSquareCount-$user_loyalty['total'];
			}else{
				$result = $user_loyalty['total'];
			}
		}else{
			$result = $vSquareCount;
		}
		
		return $result;
	}
	
	function get_userwise_loyalty_calculation($iLoyaltyId,$vSquareCount)
	{
		/** Loyalty Details **/
		$this->db->select('count(*) as total');
		$this->db->from('r_app_loyalty_user_detail as lv');
		$this->db->where('lv.iLoyaltyId',$iLoyaltyId);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	/** Menu of the day **/
	function menuoftheday($data)
	{
		/** Today Menu Of the Day **/
		$today = date('Y-m-d');
		
		/** Menu Item **/
		$this->db->select('*');
       	$this->db->from('r_menu_item');
       	$this->db->where('iApplicationId',$data['iApplicationId']);
		$this->db->where('DATE(vDayMenu)',$today);
       	$this->db->where('eStatus','Active');
        $query = $this->db->get();
        return $query->result_array();	
	}
	
	/*** Save notification ***/
	function save_pushnotification($data)
	{
		$this->db->insert('r_application_user',$data);
        return $this->db->insert_id();
	}
	
	/** **/
	function check_device_token($data)
	{
		$this->db->select('*');
       	$this->db->from('r_application_user');
        $this->db->where('vToken',$data['vToken']);
       	$query = $this->db->get();
        return $query->row_array();
	}
	
	/** get base64 encode **/
	function get_base64_encode($image,$folder,$iGalleryImageId)
	{
		$imagedata = file_get_contents("uploads/".$folder."/".$iGalleryImageId."/".$image);
    	$picture_image = base64_encode($imagedata);
		return $picture_image;
	}
	
	/** get the order history details **/
	function get_order_history_details($Data)
	{
		$this->db->select('*');
		$this->db->from('r_order_detail as rod');
		$this->db->join('r_menu_catagory as rmc','rmc.iMenuId = rod.iMenuId','left');
		$this->db->join('r_menu_item as rmi','rmi.iItemId = rod.iItemId' ,'left');
		$this->db->join('r_order_customer_details as roc','rod.iCustOrderId = roc.iCustOrderId','left');
		$this->db->join('r_app_paypal_paymentdetail as rap','rap.iCustOrderId = roc.iCustOrderId','left');
		$this->db->where('rod.iUserId',$Data['iUserId']);
		$this->db->where('rod.iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** catalogue details **/
	function get_catalogue_history_details($Data)
	{
		$this->db->select('*');
		$this->db->from('r_app_catalogue_details');		
	//	$this->db->join('r_app_size_catalogue as rs','rc.iCatelogueId= rs.iCatelogueId','inner');
		$this->db->where('iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();		
	}

	/** get catalogue size details **/
	function get_catalogue_size_details($iCatalogueId)
	{
		$this->db->select('*');
		$this->db->from('r_app_size_catalogue as rc');		
		$this->db->where('iCatelogueId',$iCatalogueId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** Arrival Details **/		
	function get_arrival_history_details($Data)
	{
		$this->db->select('*');
		$this->db->from('r_app_arrival_details rd');	
		$this->db->join('r_appindustry rf','rf.iIndustryId=rd.vArrivalType','inner');	
		$this->db->where('iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();	
	}

	/** insert donation details **/
	function insert_donation_details($data)
	{
		$this->db->insert('r_app_donations_details',$data);
		return $this->db->insert_id();
	}

	/** insert quotation details **/
	function insert_quotation_details($data)
	{
		$this->db->insert('r_app_quotation_details',$data);
		return $this->db->insert_id();
	}

	/** appoitment details **/
	function insert_appoitment_details($data)
	{
		$this->db->insert('r_app_appointment_details',$data);
		return $this->db->insert_id();
	}

	/** testonomial **/
	function get_testonomial_history_details($Data)
	{
		$this->db->select('*');
		$this->db->from('r_app_testonomial_details');	
		$this->db->where('iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();	
	}

	/** insert review **/
	function insert_review_details($data)
	{
		$this->db->insert('r_app_review_details',$data);
		return $this->db->insert_id();
	}

	/** insert testomonial **/
	function insert_testomonial_details($data)
	{
		$this->db->insert('r_app_testonomial_details',$data);
		return $this->db->insert_id();	
	}

	/** Appointment Details **/
	function get_appointment_details($data)
	{
		$this->db->select('*');
		$this->db->from('r_app_appointment_details');	
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query = $this->db->get();
		return $query->row_array();
	}

	function get_ticket_details($Data)
	{
		$this->db->select('*');
		$this->db->from('r_app_ticket_info');	
		$this->db->where('iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** search catalogue list **/	
	function get_ecommerse_search_details($Data,$key)
	{
		$this->db->select('*');
		$this->db->from('r_app_catalogue_details');
		$this->db->where('iApplicationId',$Data['iApplicationId']);
		$this->db->like('vCatalogueTagname',$Data['key']);
		$this->db->or_like('iCatalogueType',$Data['key']);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** catalogue size details ecommerce  **/
	function get_ecommerse_size_details($iCatelogueId)
	{
		$this->db->select('*');
		$this->db->from('r_app_size_catalogue');
		$this->db->where('iCatelogueId',$iCatelogueId);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** insert ecommerce payment **/	
	function insert_ecommerce_payment($Data)
	{
		$this->db->insert('r_app_ecommerce_payment_details',$Data);
		return $this->db->insert_id();
	}

	/** **/
	function get_item_size_option($Data)
	{
		$this->db->select('*');
		$this->db->from('r_menu_item_size');
		$this->db->where('iItemId',$Data['iItemId']);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_item_option_option($Data){
		$this->db->select('*');
		$this->db->from('r_menu_item_option');
		$this->db->where('iItemId',$Data['iItemId']);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** service details **/
	function get_service_details($Data){
		$this->db->select('*');
		$this->db->from('r_app_service_details as ra');
		$this->db->where('ra.iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();
	}

	/** service id details **/
	function get_service_timing($iServiceId)
	{
		/** service timing **/
		$this->db->select('*');
		$this->db->from('r_app_service_timing');
		$this->db->where('iServiceId',$iServiceId);
		$query = $this->db->get();
		return $query->result_array();
	}
	/** End service details **/

	/** blog details **/
	function get_blog_details($Data)
	{
		/** service timing **/
		$this->db->select('*');
		$this->db->from('r_app_blog_values');
		$this->db->where('iApplicationId',$Data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();
	}	

	function get_arrival_background_image($Data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_arrival_details as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();		
	}

	function get_catalogue_background_image($Data)
    {
    	//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_catalogue_main as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}

	function get_service_background_image($Data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_service_details as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}

	function get_ticket_background_image($Data)
	{
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_ticket_info as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}

	function get_blog_background_image($Data){
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_blog_values as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function get_reservation_background_image($Data){
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_reservation_general_info as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function get_contact_background_image($Data){
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_appfeature as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$this->db->where('rv.vTitle',"ContactUs");
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function get_gallery_background_image($Data){
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_gallery_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function get_location_background_image($Data){
		//-- changes for showing background, by APLITE
		$this->db->select('*');
		$this->db->from('r_app_location_value as rv');
		$this->db->join('r_app_background_img as rb', 'rv.iApplicationId = rb.iApplicationId','inner');
		//$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rb.iBackgroundId','inner');
		$this->db->join('r_user_tabbackground as rut', 'rut.iAppTabId = rv.iAppTabId','inner');
		$this->db->join('r_tabbackground as rt', 'rt.iBackgroundId = rut.iBackgroundimgId','inner');
		$this->db->where('rv.iApplicationId',$Data['iApplicationId']);
		$query=$this->db->get();
		return $query->row_array();
	}

	/*
		tousles resto administrator
	*/
	function tous_administrator($data){
        $this->db->insert('r_administrator',$data);
        return $this->db->insert_id();
    }

    function tous_packages_value_paypal($data){
        $this->db->insert('r_packages_value_paypal',$data);
    }

    function get_currency_for_order_details($iApplicationId)
    {
    	$this->db->select('');
    	$this->db->from('r_appinformation as ra');
    	$this->db->join('r_administrator as rd','ra.iClientId= rd.iAdminId','inner');
    	$this->db->where('iApplicationId',$iApplicationId);
    	$query = $this->db->get();
    	return $query->row_array();

    }

    function get_all_catalogue_product_details($data){
		$this->db->select('*');
		$this->db->from('r_app_catalogue_details');
		$this->db->where('iCatalogueSubId',$data['iCatalogueSubId']);
		$query = $this->db->get();
		return $query->result_array();
	}

    /*	Check product is availabel or not */
    function check_product_is_available($data)
    {
    	$this->db->select('');
    	$this->db->from('r_app_catalogue_details');
    	$this->db->where('iApplicationId =',$data['iApplicationId']);
    	$this->db->where('iCatelogueId =',$data['iCatelogueId']);
    	$this->db->where('tTotalProduct >=',$data['tQuantity']);
    	$query = $this->db->get();
    	return $query->row_array();
    }

    /*
    	save customer catalogue details
    */
    function save_customer_catalogue_details($data)
    {
    	$this->db->insert('r_catalogue_customer_details',$data);
    	return $this->db->insert_id();
    }

    /*
    	Save customer order details
    */
    function save_customer_order_details($data){
    	$this->db->insert('r_order_customer_details',$data);
    	return $this->db->insert_id();
    }

    /*
    	update customer order details
    */
    function update_customer_order_table($iCustomerId,$data)
    {
    	$res = array(
    		'iCustomerId' => $iCustomerId 
    	);
    	$this->db->where('iApplicationId',$data['iApplicationId']);
    	$this->db->where('iUserId',$data['iUserId']);
    	$this->db->where('eStatus','Active');
    	$this->db->update('r_app_catalogue_order_details',$res);
    }

    /*
    	update customer order
    */
    function update_new_order_table($iCustomerId,$data)
    {
    	$res = array(
    		'iCustomerId' => $iCustomerId 
    	);
    	$this->db->where('iApplicationId',$data['iApplicationId']);
    	$this->db->where('iUserId',$data['iUserId']);
    	$this->db->where('eStatus','Active');
    	$this->db->update('r_order_detail',$res);
    }


    /*
    	save catalogue order
    */
    function easyapps_catalogue_order_details($data,$res)
    {
    	$catalogue_ids = $this->get_catalogue_ids_details($data['iCatelogueId']);
    	
    	if(count($catalogue_ids) >0){
    		$mydata = array(
	    		'iApplicationId' => $res['iApplicationId'],
	    		'iUserId' => $res['iUserId'],
	    		'iCatalogueSubId' => $catalogue_ids['iCatalogueSubId'],
	    		'iCatalogueMainId' => $catalogue_ids['iCatalogueMainId'],
	    		'tQuantity' => $data['qty'],
	    		'fPrice' => $data['price'],
	    		'iSizeId' => $data['iSizeId'],
	    		'iOptionId' => $data['iOptionId'],
	    		'vCurrency' => $data['vCurrency']
	    	);	
	    	$this->db->insert('r_app_catalogue_order_details',$mydata);
	    	return $this->db->insert_id();
    	}else{
    		return 0;
    	}
    }


    /*	save catalogue order  */
    function easyapps_new_order_details($data,$res)
    {
    	$item_ids = $this->get_order_ids_details($data['iCatelogueId']);
    	
    	if(count($item_ids) >0){
    		$mydata = array(
	    		'iApplicationId' => $res['iApplicationId'],
	    		'iUserId' => $res['iUserId'],
	    		'iMenuId' => $item_ids['iMenuId'],
	    		'iItemId' => $item_ids['iItemId'],
	    		'vQuantity' => $data['qty'],
	    		'fPrice' => $data['price'],
	    		'iSizeId' => $data['iSizeId'],
	    		'iOptionId' => $data['iOptionId'],
	    		'vCurrency' => '&euro;'
	    	);	
	    	$this->db->insert('r_order_detail',$mydata);
	    	return $this->db->insert_id();
    	}else{
    		return 0;
    	}
    }

    /*	get order ids details  */
    function get_order_ids_details($iItemId)
    {
		$this->db->select('*');
    	$this->db->from('r_menu_item');
    	$this->db->where('iItemId',$iItemId);
    	$query = $this->db->get();
    	return $query->row_array();
    }

    /* get all subcategory */
    function get_all_subcategory_catalogue($iCatalogueMainId)
    {
		$this->db->select('*');
		$this->db->from('r_app_catalogue_sub_catagory');
		$this->db->where('iCatalogueMainId',$iCatalogueMainId);
		$query = $this->db->get();
		return $query->result_array();	
	}

    /* catalogue main category */
	function get_all_catalogue_main_category($data){
		$this->db->select('*');
		$this->db->from('r_app_catalogue_main');
		$this->db->where('iApplicationId',$data['iApplicationId']);
		$query = $this->db->get();
		return $query->result_array();
	}

    /* get catalogue subid and mainid */
    function get_catalogue_ids_details($iCatalogueId)
    {
    	$this->db->select('rc.iCatalogueSubId,rs.iCatalogueMainId,rc.vCurrency');
    	$this->db->from('r_app_catalogue_details as rc');
    	$this->db->join('r_app_catalogue_sub_catagory as rs','rc.iCatalogueSubId=rs.iCatalogueSubId','inner');
    	$this->db->where('rc.iCatelogueId',$iCatalogueId);
    	$query = $this->db->get();
    	return $query->row_array();
    }

    function get_size_catalogue_details($iCatalogueId){
		$this->db->select('*');
		$this->db->from('r_app_size_catalogue');
		$this->db->where('iCatelogueId',$iCatalogueId);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_option_catalogue_details($iCatalogueId){
		$this->db->select('*');
		$this->db->from('r_app_option_catalogue');
		$this->db->where('iCatelogueId',$iCatalogueId);
		$query = $this->db->get();
		return $query->result_array();
	}

	function insert_catalogue_paypal($data){
		$this->db->insert('r_app_catalogue_paypal_details',$data);
    	return $this->db->insert_id();
	}

	function insert_order_paypal($data){
		$this->db->insert('r_app_order_paypal_details',$data);
    	return $this->db->insert_id();
	}

	/* get order customer sub details */
	function get_order_custoemer_sub_details($iUserId)
	{
		$this->db->select('*');
		$this->db->from('r_order_detail as rd');
		$this->db->join('r_menu_item as ri','rd.iItemId=ri.iItemId','inner');
		$this->db->join('r_order_customer_details as ro','rd.iCustomerId=ro.iCustomerId','inner');
		$this->db->where('rd.iUserId',$iUserId);
		$this->db->where('ro.eStatus','Active');
		$query = $this->db->get();
		return $query->result_array();
	}

	//--- get clients paypal info
	function get_clients_paypal_info($iClientID)
	{
        $this->db->select('vSignature');
       	$this->db->from('r_client_paypal_info');
       	$this->db->where('iClientID',$iClientID);
        $query = $this->db->get();
        $count = $query->num_rows();
        if($count>0)
        {
			return $query->result_array();
        }
        else
        {
        	return false;
        }
    }
    
    //--- get Application Tab Order
    function get_app_tab_id($appId)
    {
    	//$query = $this->db->select('t_appf.*, t_sort.*')
    	$query = $this->db->select('t_appf.*, t_sort.*, t_lan.rEnglish, t_lan.rFrench')
     	->from('r_sorttab as t_sort')
     	->where('t_sort.iApplicationId', $appId)
     	->join('r_appfeature as t_appf', 't_sort.iAppTabId = t_appf.iAppTabId', 'LEFT')
     	->join('r_web_language_details as t_lan', 't_lan.rLabelName = t_appf.vTitle', 'LEFT')
     	->get();
     	
     	$count = $query->num_rows();
     	
     	if($count>0)
        {
			return $query->result_array();
        }
        else
        {
        	return false;
        }
    }
}
?>
