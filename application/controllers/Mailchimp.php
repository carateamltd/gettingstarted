<?php
class Mailchimp {

    public $apikey;
    public $ch;
    public $root  = 'https://api.mailchimp.com/2.0';
    public $debug = false;

    public static $error_map = array(
        "ValidationError" => "Mailchimp_ValidationError",
        "ServerError_MethodUnknown" => "Mailchimp_ServerError_MethodUnknown",
        "ServerError_InvalidParameters" => "Mailchimp_ServerError_InvalidParameters",
        "Unknown_Exception" => "Mailchimp_Unknown_Exception",
        "Request_TimedOut" => "Mailchimp_Request_TimedOut",
        "Zend_Uri_Exception" => "Mailchimp_Zend_Uri_Exception",
        "PDOException" => "Mailchimp_PDOException",
        "Avesta_Db_Exception" => "Mailchimp_Avesta_Db_Exception",
        "XML_RPC2_Exception" => "Mailchimp_XML_RPC2_Exception",
        "XML_RPC2_FaultException" => "Mailchimp_XML_RPC2_FaultException",
        "Too_Many_Connections" => "Mailchimp_Too_Many_Connections",
        "Parse_Exception" => "Mailchimp_Parse_Exception",
        "User_Unknown" => "Mailchimp_User_Unknown",
        "User_Disabled" => "Mailchimp_User_Disabled",
        "User_DoesNotExist" => "Mailchimp_User_DoesNotExist",
        "User_NotApproved" => "Mailchimp_User_NotApproved",
        "Invalid_ApiKey" => "Mailchimp_Invalid_ApiKey",
        "User_UnderMaintenance" => "Mailchimp_User_UnderMaintenance",
        "Invalid_AppKey" => "Mailchimp_Invalid_AppKey",
        "Invalid_IP" => "Mailchimp_Invalid_IP",
        "User_DoesExist" => "Mailchimp_User_DoesExist",
        "User_InvalidRole" => "Mailchimp_User_InvalidRole",
        "User_InvalidAction" => "Mailchimp_User_InvalidAction",
        "User_MissingEmail" => "Mailchimp_User_MissingEmail",
        "User_CannotSendCampaign" => "Mailchimp_User_CannotSendCampaign",
        "User_MissingModuleOutbox" => "Mailchimp_User_MissingModuleOutbox",
        "User_ModuleAlreadyPurchased" => "Mailchimp_User_ModuleAlreadyPurchased",
        "User_ModuleNotPurchased" => "Mailchimp_User_ModuleNotPurchased",
        "User_NotEnoughCredit" => "Mailchimp_User_NotEnoughCredit",
        "MC_InvalidPayment" => "Mailchimp_MC_InvalidPayment",
        "List_DoesNotExist" => "Mailchimp_List_DoesNotExist",
        "List_InvalidInterestFieldType" => "Mailchimp_List_InvalidInterestFieldType",
        "List_InvalidOption" => "Mailchimp_List_InvalidOption",
        "List_InvalidUnsubMember" => "Mailchimp_List_InvalidUnsubMember",
        "List_InvalidBounceMember" => "Mailchimp_List_InvalidBounceMember",
        "List_AlreadySubscribed" => "Mailchimp_List_AlreadySubscribed",
        "List_NotSubscribed" => "Mailchimp_List_NotSubscribed",
        "List_InvalidImport" => "Mailchimp_List_InvalidImport",
        "MC_PastedList_Duplicate" => "Mailchimp_MC_PastedList_Duplicate",
        "MC_PastedList_InvalidImport" => "Mailchimp_MC_PastedList_InvalidImport",
        "Email_AlreadySubscribed" => "Mailchimp_Email_AlreadySubscribed",
        "Email_AlreadyUnsubscribed" => "Mailchimp_Email_AlreadyUnsubscribed",
        "Email_NotExists" => "Mailchimp_Email_NotExists",
        "Email_NotSubscribed" => "Mailchimp_Email_NotSubscribed",
        "List_MergeFieldRequired" => "Mailchimp_List_MergeFieldRequired",
        "List_CannotRemoveEmailMerge" => "Mailchimp_List_CannotRemoveEmailMerge",
        "List_Merge_InvalidMergeID" => "Mailchimp_List_Merge_InvalidMergeID",
        "List_TooManyMergeFields" => "Mailchimp_List_TooManyMergeFields",
        "List_InvalidMergeField" => "Mailchimp_List_InvalidMergeField",
        "List_InvalidInterestGroup" => "Mailchimp_List_InvalidInterestGroup",
        "List_TooManyInterestGroups" => "Mailchimp_List_TooManyInterestGroups",
        "Campaign_DoesNotExist" => "Mailchimp_Campaign_DoesNotExist",
        "Campaign_StatsNotAvailable" => "Mailchimp_Campaign_StatsNotAvailable",
        "Campaign_InvalidAbsplit" => "Mailchimp_Campaign_InvalidAbsplit",
        "Campaign_InvalidContent" => "Mailchimp_Campaign_InvalidContent",
        "Campaign_InvalidOption" => "Mailchimp_Campaign_InvalidOption",
        "Campaign_InvalidStatus" => "Mailchimp_Campaign_InvalidStatus",
        "Campaign_NotSaved" => "Mailchimp_Campaign_NotSaved",
        "Campaign_InvalidSegment" => "Mailchimp_Campaign_InvalidSegment",
        "Campaign_InvalidRss" => "Mailchimp_Campaign_InvalidRss",
        "Campaign_InvalidAuto" => "Mailchimp_Campaign_InvalidAuto",
        "MC_ContentImport_InvalidArchive" => "Mailchimp_MC_ContentImport_InvalidArchive",
        "Campaign_BounceMissing" => "Mailchimp_Campaign_BounceMissing",
        "Campaign_InvalidTemplate" => "Mailchimp_Campaign_InvalidTemplate",
        "Invalid_EcommOrder" => "Mailchimp_Invalid_EcommOrder",
        "Absplit_UnknownError" => "Mailchimp_Absplit_UnknownError",
        "Absplit_UnknownSplitTest" => "Mailchimp_Absplit_UnknownSplitTest",
        "Absplit_UnknownTestType" => "Mailchimp_Absplit_UnknownTestType",
        "Absplit_UnknownWaitUnit" => "Mailchimp_Absplit_UnknownWaitUnit",
        "Absplit_UnknownWinnerType" => "Mailchimp_Absplit_UnknownWinnerType",
        "Absplit_WinnerNotSelected" => "Mailchimp_Absplit_WinnerNotSelected",
        "Invalid_Analytics" => "Mailchimp_Invalid_Analytics",
        "Invalid_DateTime" => "Mailchimp_Invalid_DateTime",
        "Invalid_Email" => "Mailchimp_Invalid_Email",
        "Invalid_SendType" => "Mailchimp_Invalid_SendType",
        "Invalid_Template" => "Mailchimp_Invalid_Template",
        "Invalid_TrackingOptions" => "Mailchimp_Invalid_TrackingOptions",
        "Invalid_Options" => "Mailchimp_Invalid_Options",
        "Invalid_Folder" => "Mailchimp_Invalid_Folder",
        "Invalid_URL" => "Mailchimp_Invalid_URL",
        "Module_Unknown" => "Mailchimp_Module_Unknown",
        "MonthlyPlan_Unknown" => "Mailchimp_MonthlyPlan_Unknown",
        "Order_TypeUnknown" => "Mailchimp_Order_TypeUnknown",
        "Invalid_PagingLimit" => "Mailchimp_Invalid_PagingLimit",
        "Invalid_PagingStart" => "Mailchimp_Invalid_PagingStart",
        "Max_Size_Reached" => "Mailchimp_Max_Size_Reached",
        "MC_SearchException" => "Mailchimp_MC_SearchException",
        "Goal_SaveFailed" => "Mailchimp_Goal_SaveFailed",
        "Conversation_DoesNotExist" => "Mailchimp_Conversation_DoesNotExist",
        "Conversation_ReplySaveFailed" => "Mailchimp_Conversation_ReplySaveFailed",
        "File_Not_Found_Exception" => "Mailchimp_File_Not_Found_Exception",
        "Folder_Not_Found_Exception" => "Mailchimp_Folder_Not_Found_Exception",
        "Folder_Exists_Exception" => "Mailchimp_Folder_Exists_Exception"
    );

    public function __construct($apikey=null, $opts=array()) {
        if (!$apikey) {
            $apikey = getenv('MAILCHIMP_APIKEY');
        }

        if (!$apikey) {
            $apikey = $this->readConfigs();
        }

        if (!$apikey) {
            throw new Mailchimp_Error('You must provide a MailChimp API key');
        }

        $this->apikey = $apikey;
        $dc           = "us1";

        if (strstr($this->apikey, "-")){
            list($key, $dc) = explode("-", $this->apikey, 2);
            if (!$dc) {
                $dc = "us1";
            }
        }

        $this->root = str_replace('https://api', 'https://' . $dc . '.api', $this->root);
        $this->root = rtrim($this->root, '/') . '/';

        if (!isset($opts['timeout']) || !is_int($opts['timeout'])){
            $opts['timeout'] = 600;
        }
        if (isset($opts['debug'])){
            $this->debug = true;
        }


        $this->ch = curl_init();

        if (isset($opts['CURLOPT_FOLLOWLOCATION']) && $opts['CURLOPT_FOLLOWLOCATION'] === true) {
            curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);    
        }

        curl_setopt($this->ch, CURLOPT_USERAGENT, 'MailChimp-PHP/2.0.5');
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_HEADER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, $opts['timeout']);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);


        $this->folders = new Mailchimp_Folders($this);
        $this->templates = new Mailchimp_Templates($this);
        $this->users = new Mailchimp_Users($this);
        $this->helper = new Mailchimp_Helper($this);
        $this->mobile = new Mailchimp_Mobile($this);
        $this->conversations = new Mailchimp_Conversations($this);
        $this->ecomm = new Mailchimp_Ecomm($this);
        $this->neapolitan = new Mailchimp_Neapolitan($this);
        $this->lists = new Mailchimp_Lists($this);
        $this->campaigns = new Mailchimp_Campaigns($this);
        $this->vip = new Mailchimp_Vip($this);
        $this->reports = new Mailchimp_Reports($this);
        $this->gallery = new Mailchimp_Gallery($this);
        $this->goal = new Mailchimp_Goal($this);
    }

    public function __destruct() {
        curl_close($this->ch);
    }

    public function call($url, $params) {
        $params['apikey'] = $this->apikey;
        
        $params = json_encode($params);
        $ch     = $this->ch;

        curl_setopt($ch, CURLOPT_URL, $this->root . $url . '.json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_VERBOSE, $this->debug);

        $start = microtime(true);
        $this->log('Call to ' . $this->root . $url . '.json: ' . $params);
        if($this->debug) {
            $curl_buffer = fopen('php://memory', 'w+');
            curl_setopt($ch, CURLOPT_STDERR, $curl_buffer);
        }

        $response_body = curl_exec($ch);

        $info = curl_getinfo($ch);
        $time = microtime(true) - $start;
        if($this->debug) {
            rewind($curl_buffer);
            $this->log(stream_get_contents($curl_buffer));
            fclose($curl_buffer);
        }
        $this->log('Completed in ' . number_format($time * 1000, 2) . 'ms');
        $this->log('Got response: ' . $response_body);

        if(curl_error($ch)) {
            throw new Mailchimp_HttpError("API call to $url failed: " . curl_error($ch));
        }
        $result = json_decode($response_body, true);
        
        if(floor($info['http_code'] / 100) >= 4) {
            throw $this->castError($result);
        }

        return $result;
    }

    public function readConfigs() {
        $paths = array('~/.mailchimp.key', '/etc/mailchimp.key');
        foreach($paths as $path) {
            if(file_exists($path)) {
                $apikey = trim(file_get_contents($path));
                if ($apikey) {
                    return $apikey;
                }
            }
        }
        return false;
    }

    public function castError($result) {
        if ($result['status'] !== 'error' || !$result['name']) {
            throw new Mailchimp_Error('We received an unexpected error: ' . json_encode($result));
        }

        $class = (isset(self::$error_map[$result['name']])) ? self::$error_map[$result['name']] : 'Mailchimp_Error';
        return new $class($result['error'], $result['code']);
    }

    public function log($msg) {
        if ($this->debug) {
            error_log($msg);
        }
    }
}

class Mailchimp_Lists {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Get all email addresses that complained about a campaign sent to a list
     * @param string $id
     * @param int $start
     * @param int $limit
     * @param string $since
     * @return associative_array the total of all reports and the specific reports reports this page
     *     - total int the total number of matching abuse reports
     *     - data array structs for the actual data for each reports, including:
     *         - date string date+time the abuse report was received and processed
     *         - email string the email address that reported abuse
     *         - campaign_id string the unique id for the campaign that report was made against
     *         - type string an internal type generally specifying the originating mail provider - may not be useful outside of filling report views
     */
    public function abuseReports($id, $start=0, $limit=500, $since=null) {
        $_params = array("id" => $id, "start" => $start, "limit" => $limit, "since" => $since);
        return $this->master->call('lists/abuse-reports', $_params);
    }

    /**
     * Access up to the previous 180 days of daily detailed aggregated activity stats for a given list. Does not include AutoResponder activity.
     * @param string $id
     * @return array of structs containing daily values, each containing:
     */
    public function activity($id) {
        $_params = array("id" => $id);
        return $this->master->call('lists/activity', $_params);
    }

    /**
     * Subscribe a batch of email addresses to a list at once. If you are using a serialized version of the API, we strongly suggest that you
only run this method as a POST request, and <em>not</em> a GET request. Maximum batch sizes vary based on the amount of data in each record,
though you should cap them at 5k - 10k records, depending on your experience. These calls are also long, so be sure you increase your timeout values.
     * @param string $id
     * @param array $batch
     *     - email associative_array a struct with one of the following keys - failing to provide anything will produce an error relating to the email address. Provide multiples and we'll use the first we see in this same order.
     *         - email string an email address
     *         - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *         - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     *     - email_type string for the email type option (html or text)
     *     - merge_vars associative_array data for the various list specific and special merge vars documented in lists/subscribe
     * @param boolean $double_optin
     * @param boolean $update_existing
     * @param boolean $replace_interests
     * @return associative_array struct of result counts and associated data
     *     - add_count int Number of email addresses that were successfully added
     *     - adds array array of structs for each add
     *         - email string the email address added
     *         - euid string the email unique id
     *         - leid string the list member's truly unique id
     *     - update_count int Number of email addresses that were successfully updated
     *     - updates array array of structs for each update
     *         - email string the email address added
     *         - euid string the email unique id
     *         - leid string the list member's truly unique id
     *     - error_count int Number of email addresses that failed during addition/updating
     *     - errors array array of error structs including:
     *         - email string whatever was passed in the batch record's email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - code int the error code
     *         - error string the full error message
     *         - row associative_array the row from the batch that caused the error
     */
    public function batchSubscribe($id, $batch, $double_optin=true, $update_existing=false, $replace_interests=true) {
        $_params = array("id" => $id, "batch" => $batch, "double_optin" => $double_optin, "update_existing" => $update_existing, "replace_interests" => $replace_interests);
        return $this->master->call('lists/batch-subscribe', $_params);
    }

    /**
     * Unsubscribe a batch of email addresses from a list
     * @param string $id
     * @param array $batch
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param boolean $delete_member
     * @param boolean $send_goodbye
     * @param boolean $send_notify
     * @return array Array of structs containing results and any errors that occurred
     *     - success_count int Number of email addresses that were successfully removed
     *     - error_count int Number of email addresses that failed during addition/updating
     *     - errors array array of error structs including:
     *         - email string whatever was passed in the batch record's email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - code int the error code
     *         - error string the full error message
     */
    public function batchUnsubscribe($id, $batch, $delete_member=false, $send_goodbye=true, $send_notify=false) {
        $_params = array("id" => $id, "batch" => $batch, "delete_member" => $delete_member, "send_goodbye" => $send_goodbye, "send_notify" => $send_notify);
        return $this->master->call('lists/batch-unsubscribe', $_params);
    }

    /**
     * Retrieve the clients that the list's subscribers have been tagged as being used based on user agents seen. Made possible by <a href="http://user-agent-string.info" target="_blank">user-agent-string.info</a>
     * @param string $id
     * @return associative_array the desktop and mobile user agents in use on the list
     *     - desktop associative_array desktop user agents and percentages
     *         - penetration double the percent of desktop clients in use
     *         - clients array array of structs for each client including:
     *             - client string the common name for the client
     *             - icon string a url to an image representing this client
     *             - percent string percent of list using the client
     *             - members string total members using the client
     *     - mobile associative_array mobile user agents and percentages
     *         - penetration double the percent of mobile clients in use
     *         - clients array array of structs for each client including:
     *             - client string the common name for the client
     *             - icon string a url to an image representing this client
     *             - percent string percent of list using the client
     *             - members string total members using the client
     */
    public function clients($id) {
        $_params = array("id" => $id);
        return $this->master->call('lists/clients', $_params);
    }

    /**
     * Access the Growth History by Month in aggregate or for a given list.
     * @param string $id
     * @return array array of structs containing months and growth data
     *     - month string The Year and Month in question using YYYY-MM format
     *     - existing int number of existing subscribers to start the month
     *     - imports int number of subscribers imported during the month
     *     - optins int number of subscribers who opted-in during the month
     */
    public function growthHistory($id=null) {
        $_params = array("id" => $id);
        return $this->master->call('lists/growth-history', $_params);
    }

    /**
     * Get the list of interest groupings for a given list, including the label, form information, and included groups for each
     * @param string $id
     * @param bool $counts
     * @return array array of structs of the interest groupings for the list
     *     - id int The id for the Grouping
     *     - name string Name for the Interest groups
     *     - form_field string Gives the type of interest group: checkbox,radio,select
     *     - groups array Array structs of the grouping options (interest groups) including:
     *         - bit string the bit value - not really anything to be done with this
     *         - name string the name of the group
     *         - display_order string the display order of the group, if set
     *         - subscribers int total number of subscribers who have this group if "counts" is true. otherwise empty
     */
    public function interestGroupings($id, $counts=false) {
        $_params = array("id" => $id, "counts" => $counts);
        return $this->master->call('lists/interest-groupings', $_params);
    }

    /**
     * Add a single Interest Group - if interest groups for the List are not yet enabled, adding the first
group will automatically turn them on.
     * @param string $id
     * @param string $group_name
     * @param int $grouping_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function interestGroupAdd($id, $group_name, $grouping_id=null) {
        $_params = array("id" => $id, "group_name" => $group_name, "grouping_id" => $grouping_id);
        return $this->master->call('lists/interest-group-add', $_params);
    }

    /**
     * Delete a single Interest Group - if the last group for a list is deleted, this will also turn groups for the list off.
     * @param string $id
     * @param string $group_name
     * @param int $grouping_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function interestGroupDel($id, $group_name, $grouping_id=null) {
        $_params = array("id" => $id, "group_name" => $group_name, "grouping_id" => $grouping_id);
        return $this->master->call('lists/interest-group-del', $_params);
    }

    /**
     * Change the name of an Interest Group
     * @param string $id
     * @param string $old_name
     * @param string $new_name
     * @param int $grouping_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function interestGroupUpdate($id, $old_name, $new_name, $grouping_id=null) {
        $_params = array("id" => $id, "old_name" => $old_name, "new_name" => $new_name, "grouping_id" => $grouping_id);
        return $this->master->call('lists/interest-group-update', $_params);
    }

    /**
     * Add a new Interest Grouping - if interest groups for the List are not yet enabled, adding the first
grouping will automatically turn them on.
     * @param string $id
     * @param string $name
     * @param string $type
     * @param array $groups
     * @return associative_array with a single entry:
     *     - id int the new grouping id if the request succeeds, otherwise an error will be thrown
     */
    public function interestGroupingAdd($id, $name, $type, $groups) {
        $_params = array("id" => $id, "name" => $name, "type" => $type, "groups" => $groups);
        return $this->master->call('lists/interest-grouping-add', $_params);
    }

    /**
     * Delete an existing Interest Grouping - this will permanently delete all contained interest groups and will remove those selections from all list members
     * @param int $grouping_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function interestGroupingDel($grouping_id) {
        $_params = array("grouping_id" => $grouping_id);
        return $this->master->call('lists/interest-grouping-del', $_params);
    }

    /**
     * Update an existing Interest Grouping
     * @param int $grouping_id
     * @param string $name
     * @param string $value
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function interestGroupingUpdate($grouping_id, $name, $value) {
        $_params = array("grouping_id" => $grouping_id, "name" => $name, "value" => $value);
        return $this->master->call('lists/interest-grouping-update', $_params);
    }

    /**
     * Retrieve the locations (countries) that the list's subscribers have been tagged to based on geocoding their IP address
     * @param string $id
     * @return array array of locations
     *     - country string the country name
     *     - cc string the ISO 3166 2 digit country code
     *     - percent double the percent of subscribers in the country
     *     - total double the total number of subscribers in the country
     */
    public function locations($id) {
        $_params = array("id" => $id);
        return $this->master->call('lists/locations', $_params);
    }

    /**
     * Get the most recent 100 activities for particular list members (open, click, bounce, unsub, abuse, sent to, etc.)
     * @param string $id
     * @param array $emails
     *     - email string an email address - for new subscribers obviously this should be used
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array of data and success/error counts
     *     - success_count int the number of subscribers successfully found on the list
     *     - error_count int the number of subscribers who were not found on the list
     *     - errors array array of error structs including:
     *         - email string whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - error string the error message
     *         - code string the error code
     *     - data array an array of structs where each activity record has:
     *         - email string whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - activity array an array of structs containing the activity, including:
     *             - action string The action name, one of: open, click, bounce, unsub, abuse, sent, queued, ecomm, mandrill_send, mandrill_hard_bounce, mandrill_soft_bounce, mandrill_open, mandrill_click, mandrill_spam, mandrill_unsub, mandrill_reject
     *             - timestamp string The date+time of the action (GMT)
     *             - url string For click actions, the url clicked, otherwise this is empty
     *             - type string If there's extra bounce, unsub, etc data it will show up here.
     *             - campaign_id string The campaign id the action was related to, if it exists - otherwise empty (ie, direct unsub from list)
     *             - campaign_data associative_array If not deleted, the campaigns/list data for the campaign
     */
    public function memberActivity($id, $emails) {
        $_params = array("id" => $id, "emails" => $emails);
        return $this->master->call('lists/member-activity', $_params);
    }

    /**
     * Get all the information for particular members of a list
     * @param string $id
     * @param array $emails
     *     - email string an email address - for new subscribers obviously this should be used
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array of data and success/error counts
     *     - success_count int the number of subscribers successfully found on the list
     *     - error_count int the number of subscribers who were not found on the list
     *     - errors array array of error structs including:
     *         - email associative_array whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - error string the error message
     *     - data array array of structs for each valid list member
     *         - id string The unique id (euid) for this email address on an account
     *         - email string The email address associated with this record
     *         - email_type string The type of emails this customer asked to get: html or text
     *         - merges associative_array a struct containing a key for each merge tags and the data for those tags for this email address, plus:
     *             - GROUPINGS array if Interest groupings are enabled, this will exist with structs for each grouping:
     *                 - id int the grouping id
     *                 - name string the interest group name
     *                 - groups array structs for each group in the grouping
     *                     - name string the group name
     *                     - interested bool whether the member has this group selected
     *         - status string The subscription status for this email address, either pending, subscribed, unsubscribed, or cleaned
     *         - ip_signup string IP Address this address signed up from. This may be blank if single optin is used.
     *         - timestamp_signup string The date+time the double optin was initiated. This may be blank if single optin is used.
     *         - ip_opt string IP Address this address opted in from.
     *         - timestamp_opt string The date+time the optin completed
     *         - member_rating int the rating of the subscriber. This will be 1 - 5 as described <a href="http://eepurl.com/f-2P" target="_blank">here</a>
     *         - campaign_id string If the user is unsubscribed and they unsubscribed from a specific campaign, that campaign_id will be listed, otherwise this is not returned.
     *         - lists array An array of structs for the other lists this member belongs to
     *             - id string the list id
     *             - status string the members status on that list
     *         - timestamp string The date+time this email address entered it's current status
     *         - info_changed string The last time this record was changed. If the record is old enough, this may be blank.
     *         - web_id int The Member id used in our web app, allows you to create a link directly to it
     *         - leid int The Member id used in our web app, allows you to create a link directly to it
     *         - list_id string The list id the for the member record being returned
     *         - list_name string The list name the for the member record being returned
     *         - language string if set/detected, a language code from <a href="http://kb.mailchimp.com/article/can-i-see-what-languages-my-subscribers-use#code" target="_blank">here</a>
     *         - is_gmonkey bool Whether the member is a <a href="http://mailchimp.com/features/golden-monkeys/" target="_blank">Golden Monkey</a> or not.
     *         - geo associative_array the geographic information if we have it. including:
     *             - latitude string the latitude
     *             - longitude string the longitude
     *             - gmtoff string GMT offset
     *             - dstoff string GMT offset during daylight savings (if DST not observered, will be same as gmtoff)
     *             - timezone string the timezone we've place them in
     *             - cc string 2 digit ISO-3166 country code
     *             - region string generally state, province, or similar
     *         - clients associative_array the client we've tracked the address as using with two keys:
     *             - name string the common name of the client
     *             - icon_url string a url representing a path to an icon representing this client
     *         - static_segments array structs for each static segments the member is a part of including:
     *             - id int the segment id
     *             - name string the name given to the segment
     *             - added string the date the member was added
     *         - notes array structs for each note entered for this member. For each note:
     *             - id int the note id
     *             - note string the text entered
     *             - created string the date the note was created
     *             - updated string the date the note was last updated
     *             - created_by_name string the name of the user who created the note. This can change as users update their profile.
     */
    public function memberInfo($id, $emails) {
        $_params = array("id" => $id, "emails" => $emails);
        return $this->master->call('lists/member-info', $_params);
    }

    /**
     * Get all of the list members for a list that are of a particular status and potentially matching a segment. This will cause locking, so don't run multiples at once. Are you trying to get a dump including lots of merge
data or specific members of a list? If so, checkout the <a href="/export/1.0/list.func.php">List Export API</a>
     * @param string $id
     * @param string $status
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - sort_field string optional the data field to sort by - mergeX (1-30), your custom merge tags, "email", "rating","last_update_time", or "optin_time" - invalid fields will be ignored
     *     - sort_dir string optional the direct - ASC or DESC. defaults to ASC (case insensitive)
     *     - segment associative_array a properly formatted segment that works with campaigns/segment-test
     * @return associative_array of the total records matched and limited list member data for this page
     *     - total int the total matching records
     *     - data array structs for each member as returned by member-info
     */
    public function members($id, $status='subscribed', $opts=array()) {
        $_params = array("id" => $id, "status" => $status, "opts" => $opts);
        return $this->master->call('lists/members', $_params);
    }

    /**
     * Add a new merge tag to a given list
     * @param string $id
     * @param string $tag
     * @param string $name
     * @param associative_array $options
     *     - field_type string optional one of: text, number, radio, dropdown, date, address, phone, url, imageurl, zip, birthday - defaults to text
     *     - req boolean optional indicates whether the field is required - defaults to false
     *     - public boolean optional indicates whether the field is displayed in public - defaults to true
     *     - show boolean optional indicates whether the field is displayed in the app's list member view - defaults to true
     *     - order int The order this merge tag should be displayed in - this will cause existing values to be reset so this fits
     *     - default_value string optional the default value for the field. See lists/subscribe() for formatting info. Defaults to blank - max 255 bytes
     *     - helptext string optional the help text to be used with some newer forms. Defaults to blank - max 255 bytes
     *     - choices array optional kind of - an array of strings to use as the choices for radio and dropdown type fields
     *     - dateformat string optional only valid for birthday and date fields. For birthday type, must be "MM/DD" (default) or "DD/MM". For date type, must be "MM/DD/YYYY" (default) or "DD/MM/YYYY". Any other values will be converted to the default.
     *     - phoneformat string optional "US" is the default - any other value will cause them to be unformatted (international)
     *     - defaultcountry string optional the <a href="http://www.iso.org/iso/english_country_names_and_code_elements" target="_blank">ISO 3166 2 digit character code</a> for the default country. Defaults to "US". Anything unrecognized will be converted to the default.
     * @return associative_array the full data for the new merge var, just like merge-vars returns
     *     - name string Name/description of the merge field
     *     - req bool Denotes whether the field is required (true) or not (false)
     *     - field_type string The "data type" of this merge var. One of: email, text, number, radio, dropdown, date, address, phone, url, imageurl
     *     - public bool Whether or not this field is visible to list subscribers
     *     - show bool Whether the field is displayed in thelist dashboard
     *     - order string The order this field displays in on forms
     *     - default string The default value for this field
     *     - helptext string The helptext for this field
     *     - size string The width of the field to be used
     *     - tag string The merge tag that's used for forms and lists/subscribe() and lists/update-member()
     *     - choices array the options available for radio and dropdown field types
     *     - id int an unchanging id for the merge var
     */
    public function mergeVarAdd($id, $tag, $name, $options=array()) {
        $_params = array("id" => $id, "tag" => $tag, "name" => $name, "options" => $options);
        return $this->master->call('lists/merge-var-add', $_params);
    }

    /**
     * Delete a merge tag from a given list and all its members. Seriously - the data is removed from all members as well!
Note that on large lists this method may seem a bit slower than calls you typically make.
     * @param string $id
     * @param string $tag
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function mergeVarDel($id, $tag) {
        $_params = array("id" => $id, "tag" => $tag);
        return $this->master->call('lists/merge-var-del', $_params);
    }

    /**
     * Completely resets all data stored in a merge var on a list. All data is removed and this action can not be undone.
     * @param string $id
     * @param string $tag
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function mergeVarReset($id, $tag) {
        $_params = array("id" => $id, "tag" => $tag);
        return $this->master->call('lists/merge-var-reset', $_params);
    }

    /**
     * Sets a particular merge var to the specified value for every list member. Only merge var ids 1 - 30 may be modified this way. This is generally a dirty method
unless you're fixing data since you should probably be using default_values and/or conditional content. as with lists/merge-var-reset(), this can not be undone.
     * @param string $id
     * @param string $tag
     * @param string $value
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function mergeVarSet($id, $tag, $value) {
        $_params = array("id" => $id, "tag" => $tag, "value" => $value);
        return $this->master->call('lists/merge-var-set', $_params);
    }

    /**
     * Update most parameters for a merge tag on a given list. You cannot currently change the merge type
     * @param string $id
     * @param string $tag
     * @param associative_array $options
     * @return associative_array the full data for the new merge var, just like merge-vars returns
     *     - name string Name/description of the merge field
     *     - req bool Denotes whether the field is required (true) or not (false)
     *     - field_type string The "data type" of this merge var. One of: email, text, number, radio, dropdown, date, address, phone, url, imageurl
     *     - public bool Whether or not this field is visible to list subscribers
     *     - show bool Whether the field is displayed in thelist dashboard
     *     - order string The order this field to displays in on forms
     *     - default string The default value for this field
     *     - helptext string The helptext for this field
     *     - size string The width of the field to be used
     *     - tag string The merge tag that's used for forms and lists/subscribe() and lists/update-member()
     *     - choices array the options available for radio and dropdown field types
     *     - id int an unchanging id for the merge var
     */
    public function mergeVarUpdate($id, $tag, $options) {
        $_params = array("id" => $id, "tag" => $tag, "options" => $options);
        return $this->master->call('lists/merge-var-update', $_params);
    }

    /**
     * Get the list of merge tags for a given list, including their name, tag, and required setting
     * @param array $id
     * @return associative_array of data and success/error counts
     *     - success_count int the number of subscribers successfully found on the list
     *     - error_count int the number of subscribers who were not found on the list
     *     - data array of structs for the merge tags on each list
     *         - id string the list id
     *         - name string the list name
     *         - merge_vars array of structs for each merge var
     *             - name string Name of the merge field
     *             - req bool Denotes whether the field is required (true) or not (false)
     *             - field_type string The "data type" of this merge var. One of the options accepted by field_type in lists/merge-var-add
     *             - public bool Whether or not this field is visible to list subscribers
     *             - show bool Whether the list owner has this field displayed on their list dashboard
     *             - order string The order the list owner has set this field to display in
     *             - default string The default value the list owner has set for this field
     *             - helptext string The helptext for this field
     *             - size string The width of the field to be used
     *             - tag string The merge tag that's used for forms and lists/subscribe() and listUpdateMember()
     *             - choices array For radio and dropdown field types, an array of the options available
     *             - id int an unchanging id for the merge var
     *     - errors array of error structs
     *         - id string the passed list id that failed
     *         - code int the resulting error code
     *         - msg string the resulting error message
     */
    public function mergeVars($id) {
        $_params = array("id" => $id);
        return $this->master->call('lists/merge-vars', $_params);
    }

    /**
     * Retrieve all of Segments for a list.
     * @param string $id
     * @param string $type
     * @return associative_array with 2 keys:
     *     - static array of structs with data for each segment
     *         - id int the id of the segment
     *         - name string the name for the segment
     *         - created_date string the date+time the segment was created
     *         - last_update string the date+time the segment was last updated (add or del)
     *         - last_reset string the date+time the segment was last reset (ie had all members cleared from it)
     *     - saved array of structs with data for each segment
     *         - id int the id of the segment
     *         - name string the name for the segment
     *         - segment_opts string same match+conditions struct typically used
     *         - segment_text string a textual description of the segment match/conditions
     *     - created_date string the date+time the segment was created
     *     - last_update string the date+time the segment was last updated (add or del)
     */
    public function segments($id, $type=null) {
        $_params = array("id" => $id, "type" => $type);
        return $this->master->call('lists/segments', $_params);
    }

    /**
     * Save a segment against a list for later use. There is no limit to the number of segments which can be saved. Static Segments <strong>are not</strong> tied
to any merge data, interest groups, etc. They essentially allow you to configure an unlimited number of custom segments which will have standard performance.
When using proper segments, Static Segments are one of the available options for segmentation just as if you used a merge var (and they can be used with other segmentation
options), though performance may degrade at that point. Saved Segments (called "auto-updating" in the app) are essentially just the match+conditions typically
used.
     * @param string $id
     * @param associative_array $opts
     *     - type string either "static" or "saved"
     *     - name string a unique name per list for the segment - 100 byte maximum length, anything longer will throw an error
     *     - segment_opts associative_array for "saved" only, the standard segment match+conditions, just like campaigns/segment-test
     *         - match string "any" or "all"
     *         - conditions array structs for each condition, just like campaigns/segment-test
     * @return associative_array with a single entry:
     *     - id int the id of the new segment, otherwise an error will be thrown.
     */
    public function segmentAdd($id, $opts) {
        $_params = array("id" => $id, "opts" => $opts);
        return $this->master->call('lists/segment-add', $_params);
    }

    /**
     * Delete a segment. Note that this will, of course, remove any member affiliations with any static segments deleted
     * @param string $id
     * @param int $seg_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function segmentDel($id, $seg_id) {
        $_params = array("id" => $id, "seg_id" => $seg_id);
        return $this->master->call('lists/segment-del', $_params);
    }

    /**
     * Allows one to test their segmentation rules before creating a campaign using them - this is no different from campaigns/segment-test() and will eventually replace it.
For the time being, the crazy segmenting condition documentation will continue to live over there.
     * @param string $list_id
     * @param associative_array $options
     * @return associative_array with a single entry:
     *     - total int The total number of subscribers matching your segmentation options
     */
    public function segmentTest($list_id, $options) {
        $_params = array("list_id" => $list_id, "options" => $options);
        return $this->master->call('lists/segment-test', $_params);
    }

    /**
     * Update an existing segment. The list and type can not be changed.
     * @param string $id
     * @param int $seg_id
     * @param associative_array $opts
     *     - name string a unique name per list for the segment - 100 byte maximum length, anything longer will throw an error
     *     - segment_opts associative_array for "saved" only, the standard segment match+conditions, just like campaigns/segment-test
     *         - match string "any" or "all"
     *         - conditions array structs for each condition, just like campaigns/segment-test
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function segmentUpdate($id, $seg_id, $opts) {
        $_params = array("id" => $id, "seg_id" => $seg_id, "opts" => $opts);
        return $this->master->call('lists/segment-update', $_params);
    }

    /**
     * Save a segment against a list for later use. There is no limit to the number of segments which can be saved. Static Segments <strong>are not</strong> tied
to any merge data, interest groups, etc. They essentially allow you to configure an unlimited number of custom segments which will have standard performance.
When using proper segments, Static Segments are one of the available options for segmentation just as if you used a merge var (and they can be used with other segmentation
options), though performance may degrade at that point.
     * @param string $id
     * @param string $name
     * @return associative_array with a single entry:
     *     - id int the id of the new segment, otherwise an error will be thrown.
     */
    public function staticSegmentAdd($id, $name) {
        $_params = array("id" => $id, "name" => $name);
        return $this->master->call('lists/static-segment-add', $_params);
    }

    /**
     * Delete a static segment. Note that this will, of course, remove any member affiliations with the segment
     * @param string $id
     * @param int $seg_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function staticSegmentDel($id, $seg_id) {
        $_params = array("id" => $id, "seg_id" => $seg_id);
        return $this->master->call('lists/static-segment-del', $_params);
    }

    /**
     * Add list members to a static segment. It is suggested that you limit batch size to no more than 10,000 addresses per call. Email addresses must exist on the list
in order to be included - this <strong>will not</strong> subscribe them to the list!
     * @param string $id
     * @param int $seg_id
     * @param array $batch
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array an array with the results of the operation
     *     - success_count int the total number of successful updates (will include members already in the segment)
     *     - errors array structs for each error including:
     *         - email string whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - code string the error code
     *         - error string the full error message
     */
    public function staticSegmentMembersAdd($id, $seg_id, $batch) {
        $_params = array("id" => $id, "seg_id" => $seg_id, "batch" => $batch);
        return $this->master->call('lists/static-segment-members-add', $_params);
    }

    /**
     * Remove list members from a static segment. It is suggested that you limit batch size to no more than 10,000 addresses per call. Email addresses must exist on the list
in order to be removed - this <strong>will not</strong> unsubscribe them from the list!
     * @param string $id
     * @param int $seg_id
     * @param array $batch
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array an array with the results of the operation
     *     - success_count int the total number of successful removals
     *     - error_count int the total number of unsuccessful removals
     *     - errors array structs for each error including:
     *         - email string whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - code string the error code
     *         - error string the full error message
     */
    public function staticSegmentMembersDel($id, $seg_id, $batch) {
        $_params = array("id" => $id, "seg_id" => $seg_id, "batch" => $batch);
        return $this->master->call('lists/static-segment-members-del', $_params);
    }

    /**
     * Resets a static segment - removes <strong>all</strong> members from the static segment. Note: does not actually affect list member data
     * @param string $id
     * @param int $seg_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function staticSegmentReset($id, $seg_id) {
        $_params = array("id" => $id, "seg_id" => $seg_id);
        return $this->master->call('lists/static-segment-reset', $_params);
    }

    /**
     * Retrieve all of the Static Segments for a list.
     * @param string $id
     * @param boolean $get_counts
     * @param int $start
     * @param int $limit
     * @return array an of structs with data for each static segment
     *     - id int the id of the segment
     *     - name string the name for the segment
     *     - member_count int the total number of subscribed members currently in a segment
     *     - created_date string the date+time the segment was created
     *     - last_update string the date+time the segment was last updated (add or del)
     *     - last_reset string the date+time the segment was last reset (ie had all members cleared from it)
     */
    public function staticSegments($id, $get_counts=true, $start=0, $limit=null) {
        $_params = array("id" => $id, "get_counts" => $get_counts, "start" => $start, "limit" => $limit);
        return $this->master->call('lists/static-segments', $_params);
    }

    /**
     * Subscribe the provided email to a list. By default this sends a confirmation email - you will not see new members until the link contained in it is clicked!
     * @param string $id
     * @param associative_array $email
     *     - email string an email address - for new subscribers obviously this should be used
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param associative_array $merge_vars
     *     - new-email string set this to change the email address. This is only respected on calls using update_existing or when passed to lists/update.
     *     - groupings array of Interest Grouping structs. Each should contain:
     *         - id int Grouping "id" from lists/interest-groupings (either this or name must be present) - this id takes precedence and can't change (unlike the name)
     *         - name string Grouping "name" from lists/interest-groupings (either this or id must be present)
     *         - groups array an array of valid group names for this grouping.
     *     - optin_ip string Set the Opt-in IP field. <em>Abusing this may cause your account to be suspended.</em> We do validate this and it must not be a private IP address.
     *     - optin_time string Set the Opt-in Time field. <em>Abusing this may cause your account to be suspended.</em> We do validate this and it must be a valid date. Use  - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00" to be safe. Generally, though, anything strtotime() understands we'll understand - <a href="http://us2.php.net/strtotime" target="_blank">http://us2.php.net/strtotime</a>
     *     - mc_location associative_array Set the member's geographic location either by optin_ip or geo data.
     *         - latitude string use the specified latitude (longitude must exist for this to work)
     *         - longitude string use the specified longitude (latitude must exist for this to work)
     *         - anything string if this (or any other key exists here) we'll try to use the optin ip. NOTE - this will slow down each subscribe call a bit, especially for lat/lng pairs in sparsely populated areas. Currently our automated background processes can and will overwrite this based on opens and clicks.
     *     - mc_language string Set the member's language preference. Supported codes are fully case-sensitive and can be found <a href="http://kb.mailchimp.com/article/can-i-see-what-languages-my-subscribers-use#code" target="_new">here</a>.
     *     - mc_notes array of structs for managing notes - it may contain:
     *         - note string the note to set. this is required unless you're deleting a note
     *         - id int the note id to operate on. not including this (or using an invalid id) causes a new note to be added
     *         - action string if the "id" key exists and is valid, an "update" key may be set to "append" (default), "prepend", "replace", or "delete" to handle how we should update existing notes. "delete", obviously, will only work with a valid "id" - passing that along with "note" and an invalid "id" is wrong and will be ignored.
     * @param string $email_type
     * @param bool $double_optin
     * @param bool $update_existing
     * @param bool $replace_interests
     * @param bool $send_welcome
     * @return associative_array the ids for this subscriber
     *     - email string the email address added
     *     - euid string the email unique id
     *     - leid string the list member's truly unique id
     */
    public function subscribe($id, $email, $merge_vars=null, $email_type='html', $double_optin=true, $update_existing=false, $replace_interests=true, $send_welcome=false) {
        $_params = array("id" => $id, "email" => $email, "merge_vars" => $merge_vars, "email_type" => $email_type, "double_optin" => $double_optin, "update_existing" => $update_existing, "replace_interests" => $replace_interests, "send_welcome" => $send_welcome);
        return $this->master->call('lists/subscribe', $_params);
    }

    /**
     * Unsubscribe the given email address from the list
     * @param string $id
     * @param associative_array $email
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param boolean $delete_member
     * @param boolean $send_goodbye
     * @param boolean $send_notify
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function unsubscribe($id, $email, $delete_member=false, $send_goodbye=true, $send_notify=true) {
        $_params = array("id" => $id, "email" => $email, "delete_member" => $delete_member, "send_goodbye" => $send_goodbye, "send_notify" => $send_notify);
        return $this->master->call('lists/unsubscribe', $_params);
    }

    /**
     * Edit the email address, merge fields, and interest groups for a list member. If you are doing a batch update on lots of users,
consider using lists/batch-subscribe() with the update_existing and possible replace_interests parameter.
     * @param string $id
     * @param associative_array $email
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param array $merge_vars
     * @param string $email_type
     * @param boolean $replace_interests
     * @return associative_array the ids for this subscriber
     *     - email string the email address added
     *     - euid string the email unique id
     *     - leid string the list member's truly unique id
     */
    public function updateMember($id, $email, $merge_vars, $email_type='', $replace_interests=true) {
        $_params = array("id" => $id, "email" => $email, "merge_vars" => $merge_vars, "email_type" => $email_type, "replace_interests" => $replace_interests);
        return $this->master->call('lists/update-member', $_params);
    }

    /**
     * Add a new Webhook URL for the given list
     * @param string $id
     * @param string $url
     * @param associative_array $actions
     *     - subscribe bool optional as subscribes occur, defaults to true
     *     - unsubscribe bool optional as subscribes occur, defaults to true
     *     - profile bool optional as profile updates occur, defaults to true
     *     - cleaned bool optional as emails are cleaned from the list, defaults to true
     *     - upemail bool optional when  subscribers change their email address, defaults to true
     *     - campaign bool option when a campaign is sent or canceled, defaults to true
     * @param associative_array $sources
     *     - user bool optional user/subscriber initiated actions, defaults to true
     *     - admin bool optional admin actions in our web app, defaults to true
     *     - api bool optional actions that happen via API calls, defaults to false
     * @return associative_array with a single entry:
     *     - id int the id of the new webhook, otherwise an error will be thrown.
     */
    public function webhookAdd($id, $url, $actions=array(), $sources=array()) {
        $_params = array("id" => $id, "url" => $url, "actions" => $actions, "sources" => $sources);
        return $this->master->call('lists/webhook-add', $_params);
    }

    /**
     * Delete an existing Webhook URL from a given list
     * @param string $id
     * @param string $url
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function webhookDel($id, $url) {
        $_params = array("id" => $id, "url" => $url);
        return $this->master->call('lists/webhook-del', $_params);
    }

    /**
     * Return the Webhooks configured for the given list
     * @param string $id
     * @return array of structs for each webhook
     *     - url string the URL for this Webhook
     *     - actions associative_array the possible actions and whether they are enabled
     *         - subscribe bool triggered when subscribes happen
     *         - unsubscribe bool triggered when unsubscribes happen
     *         - profile bool triggered when profile updates happen
     *         - cleaned bool triggered when a subscriber is cleaned (bounced) from a list
     *         - upemail bool triggered when a subscriber's email address is changed
     *         - campaign bool triggered when a campaign is sent or canceled
     *     - sources associative_array the possible sources and whether they are enabled
     *         - user bool whether user/subscriber triggered actions are returned
     *         - admin bool whether admin (manual, in-app) triggered actions are returned
     *         - api bool whether api triggered actions are returned
     */
    public function webhooks($id) {
        $_params = array("id" => $id);
        return $this->master->call('lists/webhooks', $_params);
    }

    /**
     * Retrieve all of the lists defined for your user account
     * @param associative_array $filters
     *     - list_id string optional - return a single list using a known list_id. Accepts multiples separated by commas when not using exact matching
     *     - list_name string optional - only lists that match this name
     *     - from_name string optional - only lists that have a default from name matching this
     *     - from_email string optional - only lists that have a default from email matching this
     *     - from_subject string optional - only lists that have a default from email matching this
     *     - created_before string optional - only show lists that were created before this date+time  - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00"
     *     - created_after string optional - only show lists that were created since this date+time  - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00"
     *     - exact boolean optional - flag for whether to filter on exact values when filtering, or search within content for filter values - defaults to true
     * @param int $start
     * @param int $limit
     * @param string $sort_field
     * @param string $sort_dir
     * @return associative_array result of the operation including valid data and any errors
     *     - total int the total number of lists which matched the provided filters
     *     - data array structs for the lists which matched the provided filters, including the following
     *         - id string The list id for this list. This will be used for all other list management functions.
     *         - web_id int The list id used in our web app, allows you to create a link directly to it
     *         - name string The name of the list.
     *         - date_created string The date that this list was created.
     *         - email_type_option boolean Whether or not the List supports multiple formats for emails or just HTML
     *         - use_awesomebar boolean Whether or not campaigns for this list use the Awesome Bar in archives by default
     *         - default_from_name string Default From Name for campaigns using this list
     *         - default_from_email string Default From Email for campaigns using this list
     *         - default_subject string Default Subject Line for campaigns using this list
     *         - default_language string Default Language for this list's forms
     *         - list_rating double An auto-generated activity score for the list (0 - 5)
     *         - subscribe_url_short string Our eepurl shortened version of this list's subscribe form (will not change)
     *         - subscribe_url_long string The full version of this list's subscribe form (host will vary)
     *         - beamer_address string The email address to use for this list's <a href="http://kb.mailchimp.com/article/how-do-i-import-a-campaign-via-email-email-beamer/">Email Beamer</a>
     *         - visibility string Whether this list is Public (pub) or Private (prv). Used internally for projects like <a href="http://blog.mailchimp.com/introducing-wavelength/" target="_blank">Wavelength</a>
     *         - stats associative_array various stats and counts for the list - many of these are cached for at least 5 minutes
     *             - member_count double The number of active members in the given list.
     *             - unsubscribe_count double The number of members who have unsubscribed from the given list.
     *             - cleaned_count double The number of members cleaned from the given list.
     *             - member_count_since_send double The number of active members in the given list since the last campaign was sent
     *             - unsubscribe_count_since_send double The number of members who have unsubscribed from the given list since the last campaign was sent
     *             - cleaned_count_since_send double The number of members cleaned from the given list since the last campaign was sent
     *             - campaign_count double The number of campaigns in any status that use this list
     *             - grouping_count double The number of Interest Groupings for this list
     *             - group_count double The number of Interest Groups (regardless of grouping) for this list
     *             - merge_var_count double The number of merge vars for this list (not including the required EMAIL one)
     *             - avg_sub_rate double the average number of subscribe per month for the list (empty value if we haven't calculated this yet)
     *             - avg_unsub_rate double the average number of unsubscribe per month for the list (empty value if we haven't calculated this yet)
     *             - target_sub_rate double the target subscription rate for the list to keep it growing (empty value if we haven't calculated this yet)
     *             - open_rate double the average open rate per campaign for the list  (empty value if we haven't calculated this yet)
     *             - click_rate double the average click rate per campaign for the list  (empty value if we haven't calculated this yet)
     *         - modules array Any list specific modules installed for this list (example is SocialPro)
     *     - errors array structs of any errors found while loading lists - usually just from providing invalid list ids
     *         - param string the data that caused the failure
     *         - code int the error code
     *         - error string the error message
     */
    public function getList($filters=array(), $start=0, $limit=25, $sort_field='created', $sort_dir='DESC') {
        $_params = array("filters" => $filters, "start" => $start, "limit" => $limit, "sort_field" => $sort_field, "sort_dir" => $sort_dir);
        return $this->master->call('lists/list', $_params);
    }

}

class Mailchimp_Folders {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Add a new folder to file campaigns, autoresponders, or templates in
     * @param string $name
     * @param string $type
     * @return associative_array with a single value:
     *     - folder_id int the folder_id of the newly created folder.
     */
    public function add($name, $type) {
        $_params = array("name" => $name, "type" => $type);
        return $this->master->call('folders/add', $_params);
    }

    /**
     * Delete a campaign, autoresponder, or template folder. Note that this will simply make whatever was in the folder appear unfiled, no other data is removed
     * @param int $fid
     * @param string $type
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function del($fid, $type) {
        $_params = array("fid" => $fid, "type" => $type);
        return $this->master->call('folders/del', $_params);
    }

    /**
     * List all the folders of a certain type
     * @param string $type
     * @return array structs for each folder, including:
     *     - folder_id int Folder Id for the given folder, this can be used in the campaigns/list() function to filter on.
     *     - name string Name of the given folder
     *     - date_created string The date/time the folder was created
     *     - type string The type of the folders being returned, just to make sure you know.
     *     - cnt int number of items in the folder.
     */
    public function getList($type) {
        $_params = array("type" => $type);
        return $this->master->call('folders/list', $_params);
    }

    /**
     * Update the name of a folder for campaigns, autoresponders, or templates
     * @param int $fid
     * @param string $name
     * @param string $type
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function update($fid, $name, $type) {
        $_params = array("fid" => $fid, "name" => $name, "type" => $type);
        return $this->master->call('folders/update', $_params);
    }

}


class Mailchimp_Templates {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Create a new user template, <strong>NOT</strong> campaign content. These templates can then be applied while creating campaigns.
     * @param string $name
     * @param string $html
     * @param int $folder_id
     * @return associative_array with a single element:
     *     - template_id int the new template id, otherwise an error is thrown.
     */
    public function add($name, $html, $folder_id=null) {
        $_params = array("name" => $name, "html" => $html, "folder_id" => $folder_id);
        return $this->master->call('templates/add', $_params);
    }

    /**
     * Delete (deactivate) a user template
     * @param int $template_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function del($template_id) {
        $_params = array("template_id" => $template_id);
        return $this->master->call('templates/del', $_params);
    }

    /**
     * Pull details for a specific template to help support editing
     * @param int $template_id
     * @param string $type
     * @return associative_array info to be used when editing
     *     - default_content associative_array the default content broken down into the named editable sections for the template - dependant upon template, so not documented
     *     - sections associative_array the valid editable section names - dependant upon template, so not documented
     *     - source string the full source of the template as if you exported it via our template editor
     *     - preview string similar to the source, but the rendered version of the source from our popup preview
     */
    public function info($template_id, $type='user') {
        $_params = array("template_id" => $template_id, "type" => $type);
        return $this->master->call('templates/info', $_params);
    }

    /**
     * Retrieve various templates available in the system, allowing some thing similar to our template gallery to be created.
     * @param associative_array $types
     *     - user boolean Custom templates for this user account. Defaults to true.
     *     - gallery boolean Templates from our Gallery. Note that some templates that require extra configuration are withheld. (eg, the Etsy template). Defaults to false.
     *     - base boolean Our "start from scratch" extremely basic templates. Defaults to false. As of the 9.0 update, "base" templates are no longer available via the API because they are now all saved Drag & Drop templates.
     * @param associative_array $filters
     *     - category string optional for Gallery templates only, limit to a specific template category
     *     - folder_id string user templates, limit to this folder_id
     *     - include_inactive boolean user templates are not deleted, only set inactive. defaults to false.
     *     - inactive_only boolean only include inactive user templates. defaults to false.
     *     - include_drag_and_drop boolean Include templates created and saved using the new Drag & Drop editor. <strong>Note:</strong> You will not be able to edit or create new drag & drop templates via this API. This is useful only for creating a new campaign based on a drag & drop template.
     * @return associative_array for each type
     *     - user array matching user templates, if requested.
     *         - id int Id of the template
     *         - name string Name of the template
     *         - layout string General description of the layout of the template
     *         - category string The category for the template, if there is one.
     *         - preview_image string If we've generated it, the url of the preview image for the template. We do out best to keep these up to date, but Preview image urls are not guaranteed to be available
     *         - date_created string The date/time the template was created
     *         - active boolean whether or not the template is active and available for use.
     *         - edit_source boolean Whether or not you are able to edit the source of a template.
     *         - folder_id boolean if it's in one, the folder id
     *     - gallery array matching gallery templates, if requested.
     *         - id int Id of the template
     *         - name string Name of the template
     *         - layout string General description of the layout of the template
     *         - category string The category for the template, if there is one.
     *         - preview_image string If we've generated it, the url of the preview image for the template. We do out best to keep these up to date, but Preview image urls are not guaranteed to be available
     *         - date_created string The date/time the template was created
     *         - active boolean whether or not the template is active and available for use.
     *         - edit_source boolean Whether or not you are able to edit the source of a template.
     *     - base array matching base templates, if requested. (Will always be empty as of 9.0)
     */
    public function getList($types=array(), $filters=array()) {
        $_params = array("types" => $types, "filters" => $filters);
        return $this->master->call('templates/list', $_params);
    }

    /**
     * Undelete (reactivate) a user template
     * @param int $template_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function undel($template_id) {
        $_params = array("template_id" => $template_id);
        return $this->master->call('templates/undel', $_params);
    }

    /**
     * Replace the content of a user template, <strong>NOT</strong> campaign content.
     * @param int $template_id
     * @param associative_array $values
     *     - name string the name for the template - names must be unique and a max of 50 bytes
     *     - html string a string specifying the entire template to be created. This is <strong>NOT</strong> campaign content. They are intended to utilize our <a href="http://www.mailchimp.com/resources/email-template-language/" target="_blank">template language</a>.
     *     - folder_id int the folder to put this template in - 0 or a blank values will remove it from a folder.
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function update($template_id, $values) {
        $_params = array("template_id" => $template_id, "values" => $values);
        return $this->master->call('templates/update', $_params);
    }

}


class Mailchimp_Users {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Invite a user to your account
     * @param string $email
     * @param string $role
     * @param string $msg
     * @return associative_array the method completion status
     *     - status string The status (success) of the call if it completed. Otherwise an error is thrown.
     */
    public function invite($email, $role='viewer', $msg='') {
        $_params = array("email" => $email, "role" => $role, "msg" => $msg);
        return $this->master->call('users/invite', $_params);
    }

    /**
     * Resend an invite a user to your account. Note, if the same address has been invited multiple times, this will simpy re-send the most recent invite
     * @param string $email
     * @return associative_array the method completion status
     *     - status string The status (success) of the call if it completed. Otherwise an error is thrown.
     */
    public function inviteResend($email) {
        $_params = array("email" => $email);
        return $this->master->call('users/invite-resend', $_params);
    }

    /**
     * Revoke an invitation sent to a user to your account. Note, if the same address has been invited multiple times, this will simpy revoke the most recent invite
     * @param string $email
     * @return associative_array the method completion status
     *     - status string The status (success) of the call if it completed. Otherwise an error is thrown.
     */
    public function inviteRevoke($email) {
        $_params = array("email" => $email);
        return $this->master->call('users/invite-revoke', $_params);
    }

    /**
     * Retrieve the list of pending users invitations have been sent for.
     * @return array structs for each invitation, including:
     *     - email string the email address the invitation was sent to
     *     - role string the role that will be assigned if they accept
     *     - sent_at string the time the invitation was sent. this will change if it's resent.
     *     - expiration string the expiration time for the invitation. this will change if it's resent.
     *     - msg string the welcome message included with the invitation
     */
    public function invites() {
        $_params = array();
        return $this->master->call('users/invites', $_params);
    }

    /**
     * Revoke access for a specified login
     * @param string $username
     * @return associative_array the method completion status
     *     - status string The status (success) of the call if it completed. Otherwise an error is thrown.
     */
    public function loginRevoke($username) {
        $_params = array("username" => $username);
        return $this->master->call('users/login-revoke', $_params);
    }

    /**
     * Retrieve the list of active logins.
     * @return array structs for each user, including:
     *     - id int the login id for this login
     *     - username string the username used to log in
     *     - name string a display name for the account - empty first/last names will return the username
     *     - email string the email tied to the account used for passwords resets and the ilk
     *     - role string the role assigned to the account
     *     - avatar string if available, the url for the login's avatar
     *     - global_user_id int the globally unique user id for the user account connected to
     *     - dc_unique_id string the datacenter unique id for the user account connected to, like helper/account-details
     */
    public function logins() {
        $_params = array();
        return $this->master->call('users/logins', $_params);
    }

    /**
     * Retrieve the profile for the login owning the provided API Key
     * @return associative_array the current user's details, including:
     *     - id int the login id for this login
     *     - username string the username used to log in
     *     - name string a display name for the account - empty first/last names will return the username
     *     - email string the email tied to the account used for passwords resets and the ilk
     *     - role string the role assigned to the account
     *     - avatar string if available, the url for the login's avatar
     *     - global_user_id int the globally unique user id for the user account connected to
     *     - dc_unique_id string the datacenter unique id for the user account connected to, like helper/account-details
     *     - account_name string The name of the account to which the API key belongs
     */
    public function profile() {
        $_params = array();
        return $this->master->call('users/profile', $_params);
    }

}


class Mailchimp_Helper {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Retrieve lots of account information including payments made, plan info, some account stats, installed modules,
contact info, and more. No private information like Credit Card numbers is available.
     * @param array $exclude
     * @return associative_array containing the details for the account tied to this API Key
     *     - username string The company name associated with the account
     *     - user_id string The Account user unique id (for building some links)
     *     - is_trial bool Whether the Account is in Trial mode (can only send campaigns to less than 100 emails)
     *     - is_approved bool Whether the Account has been approved for purchases
     *     - has_activated bool Whether the Account has been activated
     *     - timezone string The timezone for the Account - default is "US/Eastern"
     *     - plan_type string Plan Type - "monthly", "payasyougo", or "free"
     *     - plan_low int <em>only for Monthly plans</em> - the lower tier for list size
     *     - plan_high int <em>only for Monthly plans</em> - the upper tier for list size
     *     - plan_start_date string <em>only for Monthly plans</em> - the start date for a monthly plan
     *     - emails_left int <em>only for Free and Pay-as-you-go plans</em> emails credits left for the account
     *     - pending_monthly bool Whether the account is finishing Pay As You Go credits before switching to a Monthly plan
     *     - first_payment string date of first payment
     *     - last_payment string date of most recent payment
     *     - times_logged_in int total number of times the account has been logged into via the web
     *     - last_login string date/time of last login via the web
     *     - affiliate_link string Monkey Rewards link for our Affiliate program
     *     - industry string the user's selected industry
     *     - contact associative_array Contact details for the account
     *         - fname string First Name
     *         - lname string Last Name
     *         - email string Email Address
     *         - company string Company Name
     *         - address1 string Address Line 1
     *         - address2 string Address Line 2
     *         - city string City
     *         - state string State or Province
     *         - zip string Zip or Postal Code
     *         - country string Country name
     *         - url string Website URL
     *         - phone string Phone number
     *         - fax string Fax number
     *     - modules array a struct for each addon module installed in the account
     *         - id string An internal module id
     *         - name string The module name
     *         - added string The date the module was added
     *         - data associative_array Any extra data associated with this module as key=>value pairs
     *     - orders array a struct for each order for the account
     *         - order_id int The order id
     *         - type string The order type - either "monthly" or "credits"
     *         - amount double The order amount
     *         - date string The order date
     *         - credits_used double The total credits used
     *     - rewards associative_array Rewards details for the account including credits & inspections earned, number of referrals, referral details, and rewards used
     *         - referrals_this_month int the total number of referrals this month
     *         - notify_on string whether or not we notify the user when rewards are earned
     *         - notify_email string the email address address used for rewards notifications
     *         - credits associative_array Email credits earned:
     *             - this_month int credits earned this month
     *             - total_earned int credits earned all time
     *             - remaining int credits remaining
     *         - inspections associative_array Inbox Inspections earned:
     *             - this_month int credits earned this month
     *             - total_earned int credits earned all time
     *             - remaining int credits remaining
     *         - referrals array a struct for each referral, including:
     *             - name string the name of the account
     *             - email string the email address associated with the account
     *             - signup_date string the signup date for the account
     *             - type string the source for the referral
     *         - applied array a struct for each applied rewards, including:
     *             - value int the number of credits user
     *             - date string the date applied
     *             - order_id int the order number credits were applied to
     *             - order_desc string the order description
     *     - integrations array a struct for each connected integrations that can be used with campaigns, including:
     *         - id int an internal id for the integration
     *         - name string the integration name
     *         - list_id string either "_any_" when globally accessible or the list id it's valid for use against
     *         - user_id string if applicable, the user id for the integrated system
     *         - account string if applicable, the user/account name for the integrated system
     *         - profiles array For Facebook, users/page that can be posted to.
     *             - id string the user or page id
     *             - name string the user or page name
     *             - is_page bool whether this is a user or a page
     */
    public function accountDetails($exclude=array()) {
        $_params = array("exclude" => $exclude);
        return $this->master->call('helper/account-details', $_params);
    }

    /**
     * Retrieve minimal data for all Campaigns a member was sent
     * @param associative_array $email
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param associative_array $options
     *     - list_id string optional A list_id to limit the campaigns to
     * @return array an array of structs containing campaign data for each matching campaign (ordered by send time ascending), including:
     *     - id string the campaign unique id
     *     - title string the campaign's title
     *     - subject string the campaign's subject
     *     - send_time string the time the campaign was sent
     *     - type string the campaign type
     */
    public function campaignsForEmail($email, $options=null) {
        $_params = array("email" => $email, "options" => $options);
        return $this->master->call('helper/campaigns-for-email', $_params);
    }

    /**
     * Return the current Chimp Chatter messages for an account.
     * @return array An array of structs containing data for each chatter message
     *     - message string The chatter message
     *     - type string The type of the message - one of lists:new-subscriber, lists:unsubscribes, lists:profile-updates, campaigns:facebook-likes, campaigns:facebook-comments, campaigns:forward-to-friend, lists:imports, or campaigns:inbox-inspections
     *     - url string a url into the web app that the message could link to, if applicable
     *     - list_id string the list_id a message relates to, if applicable. Deleted lists will return -DELETED-
     *     - campaign_id string the list_id a message relates to, if applicable. Deleted campaigns will return -DELETED-
     *     - update_time string The date/time the message was last updated
     */
    public function chimpChatter() {
        $_params = array();
        return $this->master->call('helper/chimp-chatter', $_params);
    }

    /**
     * Have HTML content auto-converted to a text-only format. You can send: plain HTML, an existing Campaign Id, or an existing Template Id. Note that this will <strong>not</strong> save anything to or update any of your lists, campaigns, or templates.
It's also not just Lynx and is very fine tuned for our template layouts - your mileage may vary.
     * @param string $type
     * @param associative_array $content
     *     - html string optional a single string value,
     *     - cid string a valid Campaign Id
     *     - user_template_id string the id of a user template
     *     - base_template_id string the id of a built in base/basic template
     *     - gallery_template_id string the id of a built in gallery template
     *     - url string a valid & public URL to pull html content from
     * @return associative_array the content pass in converted to text.
     *     - text string the converted html
     */
    public function generateText($type, $content) {
        $_params = array("type" => $type, "content" => $content);
        return $this->master->call('helper/generate-text', $_params);
    }

    /**
     * Send your HTML content to have the CSS inlined and optionally remove the original styles.
     * @param string $html
     * @param bool $strip_css
     * @return associative_array with a "html" key
     *     - html string Your HTML content with all CSS inlined, just like if we sent it.
     */
    public function inlineCss($html, $strip_css=false) {
        $_params = array("html" => $html, "strip_css" => $strip_css);
        return $this->master->call('helper/inline-css', $_params);
    }

    /**
     * Retrieve minimal List data for all lists a member is subscribed to.
     * @param associative_array $email
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return array An array of structs with info on the  list_id the member is subscribed to.
     *     - id string the list unique id
     *     - web_id int the id referenced in web interface urls
     *     - name string the list name
     */
    public function listsForEmail($email) {
        $_params = array("email" => $email);
        return $this->master->call('helper/lists-for-email', $_params);
    }

    /**
     * "Ping" the MailChimp API - a simple method you can call that will return a constant value as long as everything is good. Note
than unlike most all of our methods, we don't throw an Exception if we are having issues. You will simply receive a different
string back that will explain our view on what is going on.
     * @return associative_array a with a "msg" key
     *     - msg string containing "Everything's Chimpy!" if everything is chimpy, otherwise returns an error message
     */
    public function ping() {
        $_params = array();
        return $this->master->call('helper/ping', $_params);
    }

    /**
     * Search all campaigns for the specified query terms
     * @param string $query
     * @param int $offset
     * @param string $snip_start
     * @param string $snip_end
     * @return associative_array containing the total matches and current results
     *     - total int total campaigns matching
     *     - results array matching campaigns and snippets
     *     - snippet string the matching snippet for the campaign
     *     - campaign associative_array the matching campaign's details - will return same data as single campaign from campaigns/list()
     */
    public function searchCampaigns($query, $offset=0, $snip_start=null, $snip_end=null) {
        $_params = array("query" => $query, "offset" => $offset, "snip_start" => $snip_start, "snip_end" => $snip_end);
        return $this->master->call('helper/search-campaigns', $_params);
    }

    /**
     * Search account wide or on a specific list using the specified query terms
     * @param string $query
     * @param string $id
     * @param int $offset
     * @return associative_array An array of both exact matches and partial matches over a full search
     *     - exact_matches associative_array containing the exact email address matches and current results
     *         - total int total members matching
     *         - members array each entry will be struct matching the data format for a single member as returned by lists/member-info()
     *     - full_search associative_array containing the total matches and current results
     *         - total int total members matching
     *         - members array each entry will be struct matching  the data format for a single member as returned by lists/member-info()
     */
    public function searchMembers($query, $id=null, $offset=0) {
        $_params = array("query" => $query, "id" => $id, "offset" => $offset);
        return $this->master->call('helper/search-members', $_params);
    }

    /**
     * Retrieve all domain verification records for an account
     * @return array structs for each domain verification has been attempted for
     *     - domain string the verified domain
     *     - status string the status of the verification - either "verified" or "pending"
     *     - email string the email address used for verification - "pre-existing" if we automatically backfilled it at some point
     */
    public function verifiedDomains() {
        $_params = array();
        return $this->master->call('helper/verified-domains', $_params);
    }

}


class Mailchimp_Mobile {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

}


class Mailchimp_Conversations {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Retrieve conversation metadata, includes message data for the most recent message in the conversation
     * @param string $list_id
     * @param string $leid
     * @param string $campaign_id
     * @param int $start
     * @param int $limit
     * @return associative_array Conversation data and metadata
     *     - count int Total number of conversations, irrespective of pagination.
     *     - data array An array of structs representing individual conversations
     *         - unique_id string A string identifying this particular conversation
     *         - message_count int The total number of messages in this conversation
     *         - campaign_id string The unique identifier of the campaign this conversation is associated with
     *         - list_id string The unique identifier of the list this conversation is associated with
     *         - unread_messages int The number of messages in this conversation which have not yet been read.
     *         - from_label string A label representing the sender of this message.
     *         - from_email string The email address of the sender of this message.
     *         - subject string The subject of the message.
     *         - timestamp string Date the message was either sent or received.
     *         - last_message associative_array The most recent message in the conversation
     *             - from_label string A label representing the sender of this message.
     *             - from_email string The email address of the sender of this message.
     *             - subject string The subject of the message.
     *             - message string The plain-text content of the message.
     *             - read boolean Whether or not this message has been marked as read.
     *             - timestamp string Date the message was either sent or received.
     */
    public function getList($list_id=null, $leid=null, $campaign_id=null, $start=0, $limit=25) {
        $_params = array("list_id" => $list_id, "leid" => $leid, "campaign_id" => $campaign_id, "start" => $start, "limit" => $limit);
        return $this->master->call('conversations/list', $_params);
    }

    /**
     * Retrieve conversation messages
     * @param string $conversation_id
     * @param boolean $mark_as_read
     * @param int $start
     * @param int $limit
     * @return associative_array Message data and metadata
     *     - count int The number of messages in this conversation, irrespective of paging.
     *     - data array An array of structs representing each message in a conversation
     *         - from_label string A label representing the sender of this message.
     *         - from_email string The email address of the sender of this message.
     *         - subject string The subject of the message.
     *         - message string The plain-text content of the message.
     *         - read boolean Whether or not this message has been marked as read.
     *         - timestamp string Date the message was either sent or received.
     */
    public function messages($conversation_id, $mark_as_read=false, $start=0, $limit=25) {
        $_params = array("conversation_id" => $conversation_id, "mark_as_read" => $mark_as_read, "start" => $start, "limit" => $limit);
        return $this->master->call('conversations/messages', $_params);
    }

    /**
     * Retrieve conversation messages
     * @param string $conversation_id
     * @param string $message
     * @return associative_array Message data from the created message
     *     - from_label string A label representing the sender of this message.
     *     - from_email string The email address of the sender of this message.
     *     - subject string The subject of the message.
     *     - message string The plain-text content of the message.
     *     - read boolean Whether or not this message has been marked as read.
     *     - timestamp string Date the message was either sent or received.
     */
    public function reply($conversation_id, $message) {
        $_params = array("conversation_id" => $conversation_id, "message" => $message);
        return $this->master->call('conversations/reply', $_params);
    }

}


class Mailchimp_Ecomm {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Import Ecommerce Order Information to be used for Segmentation. This will generally be used by ecommerce package plugins
<a href="http://connect.mailchimp.com/category/ecommerce" target="_blank">provided by us or by 3rd part system developers</a>.
     * @param associative_array $order
     *     - id string the Order Id
     *     - campaign_id string optional the Campaign Id to track this order against (see the "mc_cid" query string variable a campaign passes)
     *     - email_id string optional (kind of) the Email Id of the subscriber we should attach this order to (see the "mc_eid" query string variable a campaign passes) - required if campaign_id is passed, otherwise either this or <strong>email</strong> is required. If both are provided, email_id takes precedence
     *     - email string optional (kind of) the Email Address we should attach this order to - either this or <strong>email_id</strong> is required. If both are provided, email_id takes precedence
     *     - total double The Order Total (ie, the full amount the customer ends up paying)
     *     - order_date string optional the date of the order - if this is not provided, we will default the date to now. Should be in the format of 2012-12-30
     *     - shipping double optional the total paid for Shipping Fees
     *     - tax double optional the total tax paid
     *     - store_id string a unique id for the store sending the order in (32 bytes max)
     *     - store_name string optional a "nice" name for the store - typically the base web address (ie, "store.mailchimp.com"). We will automatically update this if it changes (based on store_id)
     *     - items array structs for each individual line item including:
     *         - line_num int optional the line number of the item on the order. We will generate these if they are not passed
     *         - product_id int the store's internal Id for the product. Lines that do no contain this will be skipped
     *         - sku string optional the store's internal SKU for the product. (max 30 bytes)
     *         - product_name string the product name for the product_id associated with this item. We will auto update these as they change (based on product_id)
     *         - category_id int (required) the store's internal Id for the (main) category associated with this product. Our testing has found this to be a "best guess" scenario
     *         - category_name string (required) the category name for the category_id this product is in. Our testing has found this to be a "best guess" scenario. Our plugins walk the category heirarchy up and send "Root - SubCat1 - SubCat4", etc.
     *         - qty double optional the quantity of the item ordered - defaults to 1
     *         - cost double optional the cost of a single item (ie, not the extended cost of the line) - defaults to 0
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function orderAdd($order) {
        $_params = array("order" => $order);
        return $this->master->call('ecomm/order-add', $_params);
    }

    /**
     * Delete Ecommerce Order Information used for segmentation. This will generally be used by ecommerce package plugins
<a href="/plugins/ecomm360.phtml">that we provide</a> or by 3rd part system developers.
     * @param string $store_id
     * @param string $order_id
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function orderDel($store_id, $order_id) {
        $_params = array("store_id" => $store_id, "order_id" => $order_id);
        return $this->master->call('ecomm/order-del', $_params);
    }

    /**
     * Retrieve the Ecommerce Orders for an account
     * @param string $cid
     * @param int $start
     * @param int $limit
     * @param string $since
     * @return associative_array the total matching orders and the specific orders for the requested page
     *     - total int the total matching orders
     *     - data array structs for each order being returned
     *         - store_id string the store id generated by the plugin used to uniquely identify a store
     *         - store_name string the store name collected by the plugin - often the domain name
     *         - order_id string the internal order id the store tracked this order by
     *         - email string the email address that received this campaign and is associated with this order
     *         - order_total double the order total
     *         - tax_total double the total tax for the order (if collected)
     *         - ship_total double the shipping total for the order (if collected)
     *         - order_date string the date the order was tracked - from the store if possible, otherwise the GMT time we received it
     *         - items array structs for each line item on this order.:
     *             - line_num int the line number
     *             - product_id int the product id
     *             - product_name string the product name
     *             - product_sku string the sku for the product
     *             - product_category_id int the category id for the product
     *             - product_category_name string the category name for the product
     *             - qty int the quantity ordered
     *             - cost double the cost of the item
     */
    public function orders($cid=null, $start=0, $limit=100, $since=null) {
        $_params = array("cid" => $cid, "start" => $start, "limit" => $limit, "since" => $since);
        return $this->master->call('ecomm/orders', $_params);
    }

}

class Mailchimp_Neapolitan {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

}


class Mailchimp_Campaigns {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Get the content (both html and text) for a campaign either as it would appear in the campaign archive or as the raw, original content
     * @param string $cid
     * @param associative_array $options
     *     - view string optional one of "archive" (default), "preview" (like our popup-preview) or "raw"
     *     - email associative_array optional if provided, view is "archive" or "preview", the campaign's list still exists, and the requested record is subscribed to the list. the returned content will be populated with member data populated. a struct with one of the following keys - failing to provide anything will produce an error relating to the email address. If multiple keys are provided, the first one from the following list that we find will be used, the rest will be ignored.
     *         - email string an email address
     *         - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *         - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array containing all content for the campaign
     *     - html string The HTML content used for the campaign with merge tags intact
     *     - text string The Text content used for the campaign with merge tags intact
     */
    public function content($cid, $options=array()) {
        $_params = array("cid" => $cid, "options" => $options);
        return $this->master->call('campaigns/content', $_params);
    }

    /**
     * Create a new draft campaign to send. You <strong>can not</strong> have more than 32,000 campaigns in your account.
     * @param string $type
     * @param associative_array $options
     *     - list_id string the list to send this campaign to- get lists using lists/list()
     *     - subject string the subject line for your campaign message
     *     - from_email string the From: email address for your campaign message
     *     - from_name string the From: name for your campaign message (not an email address)
     *     - to_name string the To: name recipients will see (not email address)
     *     - template_id int optional - use this user-created template to generate the HTML content of the campaign (takes precendence over other template options)
     *     - gallery_template_id int optional - use a template from the public gallery to generate the HTML content of the campaign (takes precendence over base template options)
     *     - base_template_id int optional - use this a base/start-from-scratch template to generate the HTML content of the campaign
     *     - folder_id int optional - automatically file the new campaign in the folder_id passed. Get using folders/list() - note that Campaigns and Autoresponders have separate folder setups
     *     - tracking associative_array optional - set which recipient actions will be tracked. Click tracking can not be disabled for Free accounts.
     *         - opens bool whether to track opens, defaults to true
     *         - html_clicks bool whether to track clicks in HTML content, defaults to true
     *         - text_clicks bool whether to track clicks in Text content, defaults to false
     *     - title string optional - an internal name to use for this campaign.  By default, the campaign subject will be used.
     *     - authenticate boolean optional - set to true to enable SenderID, DomainKeys, and DKIM authentication, defaults to false.
     *     - analytics associative_array optional - one or more of these keys set to the tag to use - that can be any custom text (up to 50 bytes)
     *         - google string for Google Analytics  tracking
     *         - clicktale string for ClickTale  tracking
     *         - gooal string for Goal tracking (the extra 'o' in the param name is not a typo)
     *     - auto_footer boolean optional Whether or not we should auto-generate the footer for your content. Mostly useful for content from URLs or Imports
     *     - inline_css boolean optional Whether or not css should be automatically inlined when this campaign is sent, defaults to false.
     *     - generate_text boolean optional Whether of not to auto-generate your Text content from the HTML content. Note that this will be ignored if the Text part of the content passed is not empty, defaults to false.
     *     - auto_tweet boolean optional If set, this campaign will be auto-tweeted when it is sent - defaults to false. Note that if a Twitter account isn't linked, this will be silently ignored.
     *     - auto_fb_post array optional If set, this campaign will be auto-posted to the page_ids contained in the array. If a Facebook account isn't linked or the account does not have permission to post to the page_ids requested, those failures will be silently ignored.
     *     - fb_comments boolean optional If true, the Facebook comments (and thus the <a href="http://kb.mailchimp.com/article/i-dont-want-an-archiave-of-my-campaign-can-i-turn-it-off/" target="_blank">archive bar</a> will be displayed. If false, Facebook comments will not be enabled (does not imply no archive bar, see previous link). Defaults to "true".
     *     - timewarp boolean optional If set, this campaign must be scheduled 24 hours in advance of sending - default to false. Only valid for "regular" campaigns and "absplit" campaigns that split on schedule_time.
     *     - ecomm360 boolean optional If set, our <a href="http://www.mailchimp.com/blog/ecommerce-tracking-plugin/" target="_blank">Ecommerce360 tracking</a> will be enabled for links in the campaign
     *     - crm_tracking array optional If set, an array of structs to enable CRM tracking for:
     *         - salesforce associative_array optional Enable SalesForce push back
     *             - campaign bool optional - if true, create a Campaign object and update it with aggregate stats
     *             - notes bool optional - if true, attempt to update Contact notes based on email address
     *         - highrise associative_array optional Enable Highrise push back
     *             - campaign bool optional - if true, create a Kase object and update it with aggregate stats
     *             - notes bool optional - if true, attempt to update Contact notes based on email address
     *         - capsule associative_array optional Enable Capsule push back (only notes are supported)
     *             - notes bool optional - if true, attempt to update Contact notes based on email address
     * @param associative_array $content
     *     - html string for raw/pasted HTML content
     *     - sections associative_array when using a template instead of raw HTML, each key should be the unique mc:edit area name from the template.
     *     - text string for the plain-text version
     *     - url string to have us pull in content from a URL. Note, this will override any other content options - for lists with Email Format options, you'll need to turn on generate_text as well
     *     - archive string to send a Base64 encoded archive file for us to import all media from. Note, this will override any other content options - for lists with Email Format options, you'll need to turn on generate_text as well
     *     - archive_type string optional - only necessary for the "archive" option. Supported formats are: zip, tar.gz, tar.bz2, tar, tgz, tbz . If not included, we will default to zip
     * @param associative_array $segment_opts
     * @param associative_array $type_opts
     *     - rss associative_array For RSS Campaigns this, struct should contain:
     *         - url string the URL to pull RSS content from - it will be verified and must exist
     *         - schedule string optional one of "daily", "weekly", "monthly" - defaults to "daily"
     *         - schedule_hour string optional an hour between 0 and 24 - default to 4 (4am <em>local time</em>) - applies to all schedule types
     *         - schedule_weekday string optional for "weekly" only, a number specifying the day of the week to send: 0 (Sunday) - 6 (Saturday) - defaults to 1 (Monday)
     *         - schedule_monthday string optional for "monthly" only, a number specifying the day of the month to send (1 - 28) or "last" for the last day of a given month. Defaults to the 1st day of the month
     *         - days associative_array optional used for "daily" schedules only, an array of the <a href="http://en.wikipedia.org/wiki/ISO-8601#Week_dates" target="_blank">ISO-8601 weekday numbers</a> to send on
     *             - 1 bool optional Monday, defaults to true
     *             - 2 bool optional Tuesday, defaults to true
     *             - 3 bool optional Wednesday, defaults to true
     *             - 4 bool optional Thursday, defaults to true
     *             - 5 bool optional Friday, defaults to true
     *             - 6 bool optional Saturday, defaults to true
     *             - 7 bool optional Sunday, defaults to true
     *     - absplit associative_array For A/B Split campaigns, this struct should contain:
     *         - split_test string The values to segment based on. Currently, one of: "subject", "from_name", "schedule". NOTE, for "schedule", you will need to call campaigns/schedule() separately!
     *         - pick_winner string How the winner will be picked, one of: "opens" (by the open_rate), "clicks" (by the click rate), "manual" (you pick manually)
     *         - wait_units int optional the default time unit to wait before auto-selecting a winner - use "3600" for hours, "86400" for days. Defaults to 86400.
     *         - wait_time int optional the number of units to wait before auto-selecting a winner - defaults to 1, so if not set, a winner will be selected after 1 Day.
     *         - split_size int optional this is a percentage of what size the Campaign's List plus any segmentation options results in. "schedule" type forces 50%, all others default to 10%
     *         - from_name_a string optional sort of, required when split_test is "from_name"
     *         - from_name_b string optional sort of, required when split_test is "from_name"
     *         - from_email_a string optional sort of, required when split_test is "from_name"
     *         - from_email_b string optional sort of, required when split_test is "from_name"
     *         - subject_a string optional sort of, required when split_test is "subject"
     *         - subject_b string optional sort of, required when split_test is "subject"
     *     - auto associative_array For AutoResponder campaigns, this struct should contain:
     *         - offset-units string one of "hourly", "day", "week", "month", "year" - required
     *         - offset-time string optional, sort of - the number of units must be a number greater than 0 for signup based autoresponders, ignored for "hourly"
     *         - offset-dir string either "before" or "after", ignored for "hourly"
     *         - event string optional "signup" (default) to base this members added to a list, "date", "annual", or "birthday" to base this on merge field in the list, "campaignOpen" or "campaignClicka" to base this on any activity for a campaign, "campaignClicko" to base this on clicks on a specific URL in a campaign, "mergeChanged" to base this on a specific merge field being changed to a specific value
     *         - event-datemerge string optional sort of, this is required if the event is "date", "annual", "birthday", or "mergeChanged"
     *         - campaign_id string optional sort of, required for "campaignOpen", "campaignClicka", or "campaignClicko"
     *         - campaign_url string optional sort of, required for "campaignClicko"
     *         - schedule_hour int The hour of the day - 24 hour format in GMT - the autoresponder should be triggered, ignored for "hourly"
     *         - use_import_time boolean whether or not imported subscribers (ie, <em>any</em> non-double optin subscribers) will receive
     *         - days associative_array optional used for "daily" schedules only, an array of the <a href="http://en.wikipedia.org/wiki/ISO-8601#Week_dates" target="_blank">ISO-8601 weekday numbers</a> to send on<
     *             - 1 bool optional Monday, defaults to true
     *             - 2 bool optional Tuesday, defaults to true
     *             - 3 bool optional Wednesday, defaults to true
     *             - 4 bool optional Thursday, defaults to true
     *             - 5 bool optional Friday, defaults to true
     *             - 6 bool optional Saturday, defaults to true
     *             - 7 bool optional Sunday, defaults to true
     * @return associative_array the new campaign's details - will return same data as single campaign from campaigns/list()
     */
    public function create($type, $options, $content, $segment_opts=null, $type_opts=null) {
        $_params = array("type" => $type, "options" => $options, "content" => $content, "segment_opts" => $segment_opts, "type_opts" => $type_opts);
        return $this->master->call('campaigns/create', $_params);
    }

    /**
     * Delete a campaign. Seriously, "poof, gone!" - be careful! Seriously, no one can undelete these.
     * @param string $cid
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function delete($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/delete', $_params);
    }

    /**
     * Get the list of campaigns and their details matching the specified filters
     * @param associative_array $filters
     *     - campaign_id string optional - return the campaign using a know campaign_id.  Accepts multiples separated by commas when not using exact matching.
     *     - parent_id string optional - return the child campaigns using a known parent campaign_id.  Accepts multiples separated by commas when not using exact matching.
     *     - list_id string optional - the list to send this campaign to - get lists using lists/list(). Accepts multiples separated by commas when not using exact matching.
     *     - folder_id int optional - only show campaigns from this folder id - get folders using folders/list(). Accepts multiples separated by commas when not using exact matching.
     *     - template_id int optional - only show campaigns using this template id - get templates using templates/list(). Accepts multiples separated by commas when not using exact matching.
     *     - status string optional - return campaigns of a specific status - one of "sent", "save", "paused", "schedule", "sending". Accepts multiples separated by commas when not using exact matching.
     *     - type string optional - return campaigns of a specific type - one of "regular", "plaintext", "absplit", "rss", "auto". Accepts multiples separated by commas when not using exact matching.
     *     - from_name string optional - only show campaigns that have this "From Name"
     *     - from_email string optional - only show campaigns that have this "Reply-to Email"
     *     - title string optional - only show campaigns that have this title
     *     - subject string optional - only show campaigns that have this subject
     *     - sendtime_start string optional - only show campaigns that have been sent since this date/time (in GMT) -  - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00" - if this is invalid the whole call fails
     *     - sendtime_end string optional - only show campaigns that have been sent before this date/time (in GMT) -  - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00" - if this is invalid the whole call fails
     *     - uses_segment boolean - whether to return just campaigns with or without segments
     *     - exact boolean optional - flag for whether to filter on exact values when filtering, or search within content for filter values - defaults to true. Using this disables the use of any filters that accept multiples.
     * @param int $start
     * @param int $limit
     * @param string $sort_field
     * @param string $sort_dir
     * @return associative_array containing a count of all matching campaigns, the specific ones for the current page, and any errors from the filters provided
     *     - total int the total number of campaigns matching the filters passed in
     *     - data array structs for each campaign being returned
     *         - id string Campaign Id (used for all other campaign functions)
     *         - web_id int The Campaign id used in our web app, allows you to create a link directly to it
     *         - list_id string The List used for this campaign
     *         - folder_id int The Folder this campaign is in
     *         - template_id int The Template this campaign uses
     *         - content_type string How the campaign's content is put together - one of 'template', 'html', 'url'
     *         - title string Title of the campaign
     *         - type string The type of campaign this is (regular,plaintext,absplit,rss,inspection,auto)
     *         - create_time string Creation time for the campaign
     *         - send_time string Send time for the campaign - also the scheduled time for scheduled campaigns.
     *         - emails_sent int Number of emails email was sent to
     *         - status string Status of the given campaign (save,paused,schedule,sending,sent)
     *         - from_name string From name of the given campaign
     *         - from_email string Reply-to email of the given campaign
     *         - subject string Subject of the given campaign
     *         - to_name string Custom "To:" email string using merge variables
     *         - archive_url string Archive link for the given campaign
     *         - inline_css boolean Whether or not the campaign content's css was auto-inlined
     *         - analytics string Either "google" if enabled or "N" if disabled
     *         - analytics_tag string The name/tag the campaign's links were tagged with if analytics were enabled.
     *         - authenticate boolean Whether or not the campaign was authenticated
     *         - ecomm360 boolean Whether or not ecomm360 tracking was appended to links
     *         - auto_tweet boolean Whether or not the campaign was auto tweeted after sending
     *         - auto_fb_post string A comma delimited list of Facebook Profile/Page Ids the campaign was posted to after sending. If not used, blank.
     *         - auto_footer boolean Whether or not the auto_footer was manually turned on
     *         - timewarp boolean Whether or not the campaign used Timewarp
     *         - timewarp_schedule string The time, in GMT, that the Timewarp campaign is being sent. For A/B Split campaigns, this is blank and is instead in their schedule_a and schedule_b in the type_opts array
     *         - parent_id string the unique id of the parent campaign (currently only valid for rss children). Will be blank for non-rss child campaigns or parent campaign has been deleted.
     *         - is_child boolean true if this is an RSS child campaign. Will return true even if the parent campaign has been deleted.
     *         - tests_sent string tests sent
     *         - tests_remain int test sends remaining
     *         - tracking associative_array the various tracking options used
     *             - html_clicks boolean whether or not tracking for html clicks was enabled.
     *             - text_clicks boolean whether or not tracking for text clicks was enabled.
     *             - opens boolean whether or not opens tracking was enabled.
     *         - segment_text string a string marked-up with HTML explaining the segment used for the campaign in plain English
     *         - segment_opts array the segment used for the campaign - can be passed to campaigns/segment-test or campaigns/create()
     *         - saved_segment associative_array if a saved segment was used (match+conditions returned above):
     *             - id int the saved segment id
     *             - type string the saved segment type
     *             - name string the saved segment name
     *         - type_opts associative_array the type-specific options for the campaign - can be passed to campaigns/create()
     *         - comments_total int total number of comments left on this campaign
     *         - comments_unread int total number of unread comments for this campaign based on the login the apikey belongs to
     *         - summary associative_array if available, the basic aggregate stats returned by reports/summary
     *     - errors array structs of any errors found while loading lists - usually just from providing invalid list ids
     *         - filter string the filter that caused the failure
     *         - value string the filter value that caused the failure
     *         - code int the error code
     *         - error string the error message
     */
    public function getList($filters=array(), $start=0, $limit=25, $sort_field='create_time', $sort_dir='DESC') {
        $_params = array("filters" => $filters, "start" => $start, "limit" => $limit, "sort_field" => $sort_field, "sort_dir" => $sort_dir);
        return $this->master->call('campaigns/list', $_params);
    }

    /**
     * Pause an AutoResponder or RSS campaign from sending
     * @param string $cid
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function pause($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/pause', $_params);
    }

    /**
     * Returns information on whether a campaign is ready to send and possible issues we may have detected with it - very similar to the confirmation step in the app.
     * @param string $cid
     * @return associative_array containing:
     *     - is_ready bool whether or not you're going to be able to send this campaign
     *     - items array an array of structs explaining basically what the app's confirmation step would
     *         - type string the item type - generally success, warning, or error
     *         - heading string the item's heading in the app
     *         - details string the item's details from the app, sans any html tags/links
     */
    public function ready($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/ready', $_params);
    }

    /**
     * Replicate a campaign.
     * @param string $cid
     * @return associative_array the matching campaign's details - will return same data as single campaign from campaigns/list()
     */
    public function replicate($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/replicate', $_params);
    }

    /**
     * Resume sending an AutoResponder or RSS campaign
     * @param string $cid
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function resume($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/resume', $_params);
    }

    /**
     * Schedule a campaign to be sent in the future
     * @param string $cid
     * @param string $schedule_time
     * @param string $schedule_time_b
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function schedule($cid, $schedule_time, $schedule_time_b=null) {
        $_params = array("cid" => $cid, "schedule_time" => $schedule_time, "schedule_time_b" => $schedule_time_b);
        return $this->master->call('campaigns/schedule', $_params);
    }

    /**
     * Schedule a campaign to be sent in batches sometime in the future. Only valid for "regular" campaigns
     * @param string $cid
     * @param string $schedule_time
     * @param int $num_batches
     * @param int $stagger_mins
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function scheduleBatch($cid, $schedule_time, $num_batches=2, $stagger_mins=5) {
        $_params = array("cid" => $cid, "schedule_time" => $schedule_time, "num_batches" => $num_batches, "stagger_mins" => $stagger_mins);
        return $this->master->call('campaigns/schedule-batch', $_params);
    }

    /**
     * Allows one to test their segmentation rules before creating a campaign using them.
     * @param string $list_id
     * @param associative_array $options
     *     - saved_segment_id string a saved segment id from lists/segments() - this will take precendence, otherwise the match+conditions are required.
     *     - match string controls whether to use AND or OR when applying your options - expects "<strong>any</strong>" (for OR) or "<strong>all</strong>" (for AND)
     *     - conditions array of up to 5 structs for different criteria to apply while segmenting. Each criteria row must contain 3 keys - "<strong>field</strong>", "<strong>op</strong>", and "<strong>value</strong>" - and possibly a fourth, "<strong>extra</strong>", based on these definitions:
     * @return associative_array with a single entry:
     *     - total int The total number of subscribers matching your segmentation options
     */
    public function segmentTest($list_id, $options) {
        $_params = array("list_id" => $list_id, "options" => $options);
        return $this->master->call('campaigns/segment-test', $_params);
    }

    /**
     * Send a given campaign immediately. For RSS campaigns, this will "start" them.
     * @param string $cid
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function send($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/send', $_params);
    }

    /**
     * Send a test of this campaign to the provided email addresses
     * @param string $cid
     * @param array $test_emails
     * @param string $send_type
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function sendTest($cid, $test_emails=array(), $send_type='html') {
        $_params = array("cid" => $cid, "test_emails" => $test_emails, "send_type" => $send_type);
        return $this->master->call('campaigns/send-test', $_params);
    }

    /**
     * Get the HTML template content sections for a campaign. Note that this <strong>will</strong> return very jagged, non-standard results based on the template
a campaign is using. You only want to use this if you want to allow editing template sections in your application.
     * @param string $cid
     * @return associative_array content containing all content section for the campaign - section name are dependent upon the template used and thus can't be documented
     */
    public function templateContent($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/template-content', $_params);
    }

    /**
     * Unschedule a campaign that is scheduled to be sent in the future
     * @param string $cid
     * @return associative_array with a single entry:
     *     - complete bool whether the call worked. reallistically this will always be true as errors will be thrown otherwise.
     */
    public function unschedule($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('campaigns/unschedule', $_params);
    }

    /**
     * Update just about any setting besides type for a campaign that has <em>not</em> been sent. See campaigns/create() for details.
Caveats:<br/><ul class='bullets'>
<li>If you set a new list_id, all segmentation options will be deleted and must be re-added.</li>
<li>If you set template_id, you need to follow that up by setting it's 'content'</li>
<li>If you set segment_opts, you should have tested your options against campaigns/segment-test().</li>
<li>To clear/unset segment_opts, pass an empty string or array as the value. Various wrappers may require one or the other.</li>
</ul>
     * @param string $cid
     * @param string $name
     * @param array $value
     * @return associative_array updated campaign details and any errors
     *     - data associative_array the update campaign details - will return same data as single campaign from campaigns/list()
     *     - errors array for "options" only - structs containing:
     *         - code int the error code
     *         - message string the full error message
     *         - name string the parameter name that failed
     */
    public function update($cid, $name, $value) {
        $_params = array("cid" => $cid, "name" => $name, "value" => $value);
        return $this->master->call('campaigns/update', $_params);
    }

}


class Mailchimp_Vip {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Retrieve all Activity (opens/clicks) for VIPs over the past 10 days
     * @return array structs for each activity recorded.
     *     - action string The action taken - either "open" or "click"
     *     - timestamp string The datetime the action occurred in GMT
     *     - url string IF the action is a click, the url that was clicked
     *     - unique_id string The campaign_id of the List the Member appears on
     *     - title string The campaign title
     *     - list_name string The name of the List the Member appears on
     *     - list_id string The id of the List the Member appears on
     *     - email string The email address of the member
     *     - fname string IF a FNAME merge field exists on the list, that value for the member
     *     - lname string IF a LNAME merge field exists on the list, that value for the member
     *     - member_rating int the rating of the subscriber. This will be 1 - 5 as described <a href="http://eepurl.com/f-2P" target="_blank">here</a>
     *     - member_since string the datetime the member was added and/or confirmed
     *     - geo associative_array the geographic information if we have it. including:
     *         - latitude string the latitude
     *         - longitude string the longitude
     *         - gmtoff string GMT offset
     *         - dstoff string GMT offset during daylight savings (if DST not observered, will be same as gmtoff
     *         - timezone string the timezone we've place them in
     *         - cc string 2 digit ISO-3166 country code
     *         - region string generally state, province, or similar
     */
    public function activity() {
        $_params = array();
        return $this->master->call('vip/activity', $_params);
    }

    /**
     * Add VIPs (previously called Golden Monkeys)
     * @param string $id
     * @param array $emails
     *     - email string an email address - for new subscribers obviously this should be used
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array of data and success/error counts
     *     - success_count int the number of successful adds
     *     - error_count int the number of unsuccessful adds
     *     - errors array array of error structs including:
     *         - email associative_array whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - code string the error code
     *         - error string the error message
     *     - data array array of structs for each member added
     *         - email associative_array whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     */
    public function add($id, $emails) {
        $_params = array("id" => $id, "emails" => $emails);
        return $this->master->call('vip/add', $_params);
    }

    /**
     * Remove VIPs - this does not affect list membership
     * @param string $id
     * @param array $emails
     *     - email string an email address - for new subscribers obviously this should be used
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array of data and success/error counts
     *     - success_count int the number of successful deletions
     *     - error_count int the number of unsuccessful deletions
     *     - errors array array of error structs including:
     *         - email associative_array whatever was passed in the email parameter
     *             - email string the email address
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - code string the error code
     *         - msg string the error message
     *     - data array array of structs for each member deleted
     *         - email associative_array whatever was passed in the email parameter
     *             - email string the email address
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     */
    public function del($id, $emails) {
        $_params = array("id" => $id, "emails" => $emails);
        return $this->master->call('vip/del', $_params);
    }

    /**
     * Retrieve all Golden Monkey(s) for an account
     * @return array structs for each Golden Monkey, including:
     *     - list_id string The id of the List the Member appears on
     *     - list_name string The name of the List the Member appears on
     *     - email string The email address of the member
     *     - fname string IF a FNAME merge field exists on the list, that value for the member
     *     - lname string IF a LNAME merge field exists on the list, that value for the member
     *     - member_rating int the rating of the subscriber. This will be 1 - 5 as described <a href="http://eepurl.com/f-2P" target="_blank">here</a>
     *     - member_since string the datetime the member was added and/or confirmed
     */
    public function members() {
        $_params = array();
        return $this->master->call('vip/members', $_params);
    }

}


class Mailchimp_Reports {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Get all email addresses that complained about a given campaign
     * @param string $cid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - since string optional pull only messages since this time - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00"
     * @return associative_array abuse report data for this campaign
     *     - total int the total reports matched
     *     - data array a struct for the each report, including:
     *         - date string date/time the abuse report was received and processed
     *         - member string the email address that reported abuse - will only contain email if the list or member has been removed
     *         - type string an internal type generally specifying the originating mail provider - may not be useful outside of filling report views
     */
    public function abuse($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/abuse', $_params);
    }

    /**
     * Retrieve the text presented in our app for how a campaign performed and any advice we may have for you - best
suited for display in customized reports pages. Note: some messages will contain HTML - clean tags as necessary
     * @param string $cid
     * @return array of structs for advice on the campaign's performance, each containing:
     *     - msg string the advice message
     *     - type string the "type" of the message. one of: negative, positive, or neutral
     */
    public function advice($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/advice', $_params);
    }

    /**
     * Retrieve the most recent full bounce message for a specific email address on the given campaign.
Messages over 30 days old are subject to being removed
     * @param string $cid
     * @param associative_array $email
     *     - email string an email address - this is recommended for this method
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array the full bounce message for this email+campaign along with some extra data.
     *     - date string date the bounce was received and processed
     *     - member associative_array the member record as returned by lists/member-info()
     *     - message string the entire bounce message received
     */
    public function bounceMessage($cid, $email) {
        $_params = array("cid" => $cid, "email" => $email);
        return $this->master->call('reports/bounce-message', $_params);
    }

    /**
     * Retrieve the full bounce messages for the given campaign. Note that this can return very large amounts
of data depending on how large the campaign was and how much cruft the bounce provider returned. Also,
messages over 30 days old are subject to being removed
     * @param string $cid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - since string optional pull only messages since this time - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00"
     * @return associative_array data for the full bounce messages for this campaign
     *     - total int that total number of bounce messages for the campaign
     *     - data array structs containing the data for this page
     *         - date string date the bounce was received and processed
     *         - member associative_array the member record as returned by lists/member-info()
     *         - message string the entire bounce message received
     */
    public function bounceMessages($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/bounce-messages', $_params);
    }

    /**
     * Return the list of email addresses that clicked on a given url, and how many times they clicked
     * @param string $cid
     * @param int $tid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - sort_field string optional the data to sort by - "clicked" (order clicks occurred, default) or "clicks" (total number of opens). Invalid fields will fall back on the default.
     *     - sort_dir string optional the direct - ASC or DESC. defaults to ASC (case insensitive)
     * @return associative_array containing the total records matched and the specific records for this page
     *     - total int the total number of records matched
     *     - data array structs for each email addresses that click the requested url
     *         - member associative_array the member record as returned by lists/member-info()
     *         - clicks int Total number of times the URL was clicked by this email address
     */
    public function clickDetail($cid, $tid, $opts=array()) {
        $_params = array("cid" => $cid, "tid" => $tid, "opts" => $opts);
        return $this->master->call('reports/click-detail', $_params);
    }

    /**
     * The urls tracked and their click counts for a given campaign.
     * @param string $cid
     * @return associative_array including:
     *     - total array structs for each url tracked for the full campaign
     *         - url string the url being tracked - urls are tracked individually, so duplicates can exist with vastly different stats
     *         - clicks int Number of times the specific link was clicked
     *         - clicks_percent double the percentage of total clicks "clicks" represents
     *         - unique int Number of unique people who clicked on the specific link
     *         - unique_percent double the percentage of unique clicks "unique" represents
     *         - tid int the tracking id used in campaign links - used primarily for reports/click-activity. also can be used to order urls by the order they appeared in the campaign to recreate our heat map.
     *     - a array if this was an absplit campaign, stat structs for the a group
     *         - url string the url being tracked - urls are tracked individually, so duplicates can exist with vastly different stats
     *         - clicks int Number of times the specific link was clicked
     *         - clicks_percent double the percentage of total clicks "clicks" represents
     *         - unique int Number of unique people who clicked on the specific link
     *         - unique_percent double the percentage of unique clicks "unique" represents
     *         - tid int the tracking id used in campaign links - used primarily for reports/click-activity. also can be used to order urls by the order they appeared in the campaign to recreate our heat map.
     *     - b array if this was an absplit campaign, stat structs for the b group
     *         - url string the url being tracked - urls are tracked individually, so duplicates can exist with vastly different stats
     *         - clicks int Number of times the specific link was clicked
     *         - clicks_percent double the percentage of total clicks "clicks" represents
     *         - unique int Number of unique people who clicked on the specific link
     *         - unique_percent double the percentage of unique clicks "unique" represents
     *         - tid int the tracking id used in campaign links - used primarily for reports/click-activity. also can be used to order urls by the order they appeared in the campaign to recreate our heat map.
     */
    public function clicks($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/clicks', $_params);
    }

    /**
     * Retrieve the Ecommerce Orders tracked by ecomm/order-add()
     * @param string $cid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - since string optional pull only messages since this time - 24 hour format in <strong>GMT</strong>, eg "2013-12-30 20:30:00"
     * @return associative_array the total matching orders and the specific orders for the requested page
     *     - total int the total matching orders
     *     - data array structs for the actual data for each order being returned
     *         - store_id string the store id generated by the plugin used to uniquely identify a store
     *         - store_name string the store name collected by the plugin - often the domain name
     *         - order_id string the internal order id the store tracked this order by
     *         - member associative_array the member record as returned by lists/member-info() that received this campaign and is associated with this order
     *         - order_total double the order total
     *         - tax_total double the total tax for the order (if collected)
     *         - ship_total double the shipping total for the order (if collected)
     *         - order_date string the date the order was tracked - from the store if possible, otherwise the GMT time we received it
     *         - lines array structs containing details of the order:
     *             - line_num int the line number assigned to this line
     *             - product_id int the product id assigned to this item
     *             - product_name string the product name
     *             - product_sku string the sku for the product
     *             - product_category_id int the id for the product category
     *             - product_category_name string the product category name
     *             - qty double optional the quantity of the item ordered - defaults to 1
     *             - cost double optional the cost of a single item (ie, not the extended cost of the line) - defaults to 0
     */
    public function ecommOrders($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/ecomm-orders', $_params);
    }

    /**
     * Retrieve the eepurl stats from the web/Twitter mentions for this campaign
     * @param string $cid
     * @return associative_array containing tweets, retweets, clicks, and referrer related to using the campaign's eepurl
     *     - twitter associative_array various Twitter related stats
     *         - tweets int Total number of tweets seen
     *         - first_tweet string date and time of the first tweet seen
     *         - last_tweet string date and time of the last tweet seen
     *         - retweets int Total number of retweets seen
     *         - first_retweet string date and time of the first retweet seen
     *         - last_retweet string date and time of the last retweet seen
     *         - statuses array an structs for statuses recorded including:
     *             - status string the text of the tweet/update
     *             - screen_name string the screen name as recorded when first seen
     *             - status_id string the status id of the tweet (they are really unsigned 64 bit ints)
     *             - datetime string the date/time of the tweet
     *             - is_retweet bool whether or not this was a retweet
     *     - clicks associative_array stats related to click-throughs on the eepurl
     *         - clicks int Total number of clicks seen
     *         - first_click string date and time of the first click seen
     *         - last_click string date and time of the first click seen
     *         - locations array structs for geographic locations including:
     *             - country string the country name the click was tracked to
     *             - region string the region in the country the click was tracked to (if available)
     *     - referrers array structs for referrers, including
     *         - referrer string the referrer, truncated to 100 bytes
     *         - clicks int Total number of clicks seen from this referrer
     *         - first_click string date and time of the first click seen from this referrer
     *         - last_click string date and time of the first click seen from this referrer
     */
    public function eepurl($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/eepurl', $_params);
    }

    /**
     * Given a campaign and email address, return the entire click and open history with timestamps, ordered by time. If you need to dump the full activity for a campaign
and/or get incremental results, you should use the <a href="http://apidocs.mailchimp.com/export/1.0/campaignsubscriberactivity.func.php" targret="_new">campaignSubscriberActivity Export API method</a>,
<strong>not</strong> this, especially for large campaigns.
     * @param string $cid
     * @param array $emails
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @return associative_array of data and success/error counts
     *     - success_count int the number of subscribers successfully found on the list
     *     - error_count int the number of subscribers who were not found on the list
     *     - errors array array of error structs including:
     *         - email string whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - msg string the error message
     *     - data array an array of structs where each activity record has:
     *         - email string whatever was passed in the email parameter
     *             - email string the email address added
     *             - euid string the email unique id
     *             - leid string the list member's truly unique id
     *         - member associative_array the member record as returned by lists/member-info()
     *         - activity array an array of structs containing the activity, including:
     *             - action string The action name - either open or click
     *             - timestamp string The date/time of the action (GMT)
     *             - url string For click actions, the url clicked, otherwise this is empty
     *             - ip string The IP address the activity came from
     */
    public function memberActivity($cid, $emails) {
        $_params = array("cid" => $cid, "emails" => $emails);
        return $this->master->call('reports/member-activity', $_params);
    }

    /**
     * Retrieve the list of email addresses that did not open a given campaign
     * @param string $cid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     * @return associative_array a total of all matching emails and the specific emails for this page
     *     - total int the total number of members who didn't open the campaign
     *     - data array structs for each campaign member matching as returned by lists/member-info()
     */
    public function notOpened($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/not-opened', $_params);
    }

    /**
     * Retrieve the list of email addresses that opened a given campaign with how many times they opened
     * @param string $cid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - sort_field string optional the data to sort by - "opened" (order opens occurred, default) or "opens" (total number of opens). Invalid fields will fall back on the default.
     *     - sort_dir string optional the direct - ASC or DESC. defaults to ASC (case insensitive)
     * @return associative_array containing the total records matched and the specific records for this page
     *     - total int the total number of records matched
     *     - data array structs for the actual opens data, including:
     *         - member associative_array the member record as returned by lists/member-info()
     *         - opens int Total number of times the campaign was opened by this email address
     */
    public function opened($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/opened', $_params);
    }

    /**
     * Get the top 5 performing email domains for this campaign. Users wanting more than 5 should use campaign reports/member-activity()
or campaignEmailStatsAIMAll() and generate any additional stats they require.
     * @param string $cid
     * @return array domains structs for each email domains and their associated stats
     *     - domain string Domain name or special "Other" to roll-up stats past 5 domains
     *     - total_sent int Total Email across all domains - this will be the same in every row
     *     - emails int Number of emails sent to this domain
     *     - bounces int Number of bounces
     *     - opens int Number of opens
     *     - clicks int Number of clicks
     *     - unsubs int Number of unsubs
     *     - delivered int Number of deliveries
     *     - emails_pct int Percentage of emails that went to this domain (whole number)
     *     - bounces_pct int Percentage of bounces from this domain (whole number)
     *     - opens_pct int Percentage of opens from this domain (whole number)
     *     - clicks_pct int Percentage of clicks from this domain (whole number)
     *     - unsubs_pct int Percentage of unsubs from this domain (whole number)
     */
    public function domainPerformance($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/domain-performance', $_params);
    }

    /**
     * Retrieve the countries/regions and number of opens tracked for each. Email address are not returned.
     * @param string $cid
     * @return array an array of country structs where opens occurred
     *     - code string The ISO3166 2 digit country code
     *     - name string A version of the country name, if we have it
     *     - opens int The total number of opens that occurred in the country
     *     - regions array structs of data for each sub-region in the country
     *         - code string An internal code for the region. When this is blank, it indicates we know the country, but not the region
     *         - name string The name of the region, if we have one. For blank "code" values, this will be "Rest of Country"
     *         - opens int The total number of opens that occurred in the country
     */
    public function geoOpens($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/geo-opens', $_params);
    }

    /**
     * Retrieve the Google Analytics data we've collected for this campaign. Note, requires Google Analytics Add-on to be installed and configured.
     * @param string $cid
     * @return array of structs for analytics we've collected for the passed campaign.
     *     - visits int number of visits
     *     - pages int number of page views
     *     - new_visits int new visits recorded
     *     - bounces int vistors who "bounced" from your site
     *     - time_on_site double the total time visitors spent on your sites
     *     - goal_conversions int number of goals converted
     *     - goal_value double value of conversion in dollars
     *     - revenue double revenue generated by campaign
     *     - transactions int number of transactions tracked
     *     - ecomm_conversions int number Ecommerce transactions tracked
     *     - goals array structs containing goal names and number of conversions
     *         - name string the name of the goal
     *         - conversions int the number of conversions for the goal
     */
    public function googleAnalytics($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/google-analytics', $_params);
    }

    /**
     * Get email addresses the campaign was sent to
     * @param string $cid
     * @param associative_array $opts
     *     - status string optional the status to pull - one of 'sent', 'hard' (bounce), or 'soft' (bounce). By default, all records are returned
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     * @return associative_array a total of all matching emails and the specific emails for this page
     *     - total int the total number of members for the campaign and status
     *     - data array structs for each campaign member matching
     *         - member associative_array the member record as returned by lists/member-info()
     *         - status string the status of the send - one of 'sent', 'hard', 'soft'
     *         - absplit_group string if this was an absplit campaign, one of 'a','b', or 'winner'
     *         - tz_group string if this was an timewarp campaign the timezone GMT offset the member was included in
     */
    public function sentTo($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/sent-to', $_params);
    }

    /**
     * Get the URL to a customized <a href="http://eepurl.com/gKmL" target="_blank">VIP Report</a> for the specified campaign and optionally send an email to someone with links to it. Note subsequent calls will overwrite anything already set for the same campign (eg, the password)
     * @param string $cid
     * @param array $opts
     *     - to_email string optional - optional, comma delimited list of email addresses to share the report with - no value means an email will not be sent
     *     - theme_id int optional - either a global or a user-specific theme id. Currently this needs to be pulled out of either the Share Report or Cobranding web views by grabbing the "theme" attribute from the list presented.
     *     - css_url string optional - a link to an external CSS file to be included after our default CSS (http://vip-reports.net/css/vip.css) <strong>only if</strong> loaded via the "secure_url" - max 255 bytes
     * @return associative_array details for the shared report, including:
     *     - title string The Title of the Campaign being shared
     *     - url string The URL to the shared report
     *     - secure_url string The URL to the shared report, including the password (good for loading in an IFRAME). For non-secure reports, this will not be returned
     *     - password string If secured, the password for the report, otherwise this field will not be returned
     */
    public function share($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/share', $_params);
    }

    /**
     * Retrieve relevant aggregate campaign statistics (opens, bounces, clicks, etc.)
     * @param string $cid
     * @return associative_array the statistics for this campaign
     *     - syntax_errors int Number of email addresses in campaign that had syntactical errors.
     *     - hard_bounces int Number of email addresses in campaign that hard bounced.
     *     - soft_bounces int Number of email addresses in campaign that soft bounced.
     *     - unsubscribes int Number of email addresses in campaign that unsubscribed.
     *     - abuse_reports int Number of email addresses in campaign that reported campaign for abuse.
     *     - forwards int Number of times email was forwarded to a friend.
     *     - forwards_opens int Number of times a forwarded email was opened.
     *     - opens int Number of times the campaign was opened.
     *     - last_open string Date of the last time the email was opened.
     *     - unique_opens int Number of people who opened the campaign.
     *     - clicks int Number of times a link in the campaign was clicked.
     *     - unique_clicks int Number of unique recipient/click pairs for the campaign.
     *     - last_click string Date of the last time a link in the email was clicked.
     *     - users_who_clicked int Number of unique recipients who clicked on a link in the campaign.
     *     - emails_sent int Number of email addresses campaign was sent to.
     *     - unique_likes int total number of unique likes (Facebook)
     *     - recipient_likes int total number of recipients who liked (Facebook) the campaign
     *     - facebook_likes int total number of likes (Facebook) that came from Facebook
     *     - industry associative_array Various rates/percentages for the account's selected industry - empty otherwise. These will vary across calls, do not use them for anything important.
     *         - type string the selected industry
     *         - open_rate float industry open rate
     *         - click_rate float industry click rate
     *         - bounce_rate float industry bounce rate
     *         - unopen_rate float industry unopen rate
     *         - unsub_rate float industry unsub rate
     *         - abuse_rate float industry abuse rate
     *     - absplit associative_array If this was an absplit campaign, stats for the A and B groups will be returned - otherwise this is empty
     *         - bounces_a int bounces for the A group
     *         - bounces_b int bounces for the B group
     *         - forwards_a int forwards for the A group
     *         - forwards_b int forwards for the B group
     *         - abuse_reports_a int abuse reports for the A group
     *         - abuse_reports_b int abuse reports for the B group
     *         - unsubs_a int unsubs for the A group
     *         - unsubs_b int unsubs for the B group
     *         - recipients_click_a int clicks for the A group
     *         - recipients_click_b int clicks for the B group
     *         - forwards_opens_a int opened forwards for the A group
     *         - forwards_opens_b int opened forwards for the B group
     *         - opens_a int total opens for the A group
     *         - opens_b int total opens for the B group
     *         - last_open_a string date/time of last open for the A group
     *         - last_open_b string date/time of last open for the BG group
     *         - unique_opens_a int unique opens for the A group
     *         - unique_opens_b int unique opens for the B group
     *     - timewarp array If this campaign was a Timewarp campaign, an array of structs from each timezone stats exist for. Each will contain:
     *         - opens int opens for this timezone
     *         - last_open string the date/time of the last open for this timezone
     *         - unique_opens int the unique opens for this timezone
     *         - clicks int the total clicks for this timezone
     *         - last_click string the date/time of the last click for this timezone
     *         - unique_opens int the unique clicks for this timezone
     *         - bounces int the total bounces for this timezone
     *         - total int the total number of members sent to in this timezone
     *         - sent int the total number of members delivered to in this timezone
     *     - timeseries array structs for the first 24 hours of the campaign, per-hour stats:
     *         - timestamp string The timestemp in Y-m-d H:00:00 format
     *         - emails_sent int the total emails sent during the hour
     *         - unique_opens int unique opens seen during the hour
     *         - recipients_click int unique clicks seen during the hour
     */
    public function summary($cid) {
        $_params = array("cid" => $cid);
        return $this->master->call('reports/summary', $_params);
    }

    /**
     * Get all unsubscribed email addresses for a given campaign
     * @param string $cid
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     * @return associative_array a total of all unsubscribed emails and the specific members for this page
     *     - total int the total number of unsubscribes for the campaign
     *     - data array structs for the email addresses that unsubscribed
     *         - member string the member that unsubscribed as returned by lists/member-info()
     *         - reason string the reason collected for the unsubscribe. If populated, one of 'NORMAL','NOSIGNUP','INAPPROPRIATE','SPAM','OTHER'
     *         - reason_text string if the reason is OTHER, the text entered.
     */
    public function unsubscribes($cid, $opts=array()) {
        $_params = array("cid" => $cid, "opts" => $opts);
        return $this->master->call('reports/unsubscribes', $_params);
    }

}


class Mailchimp_Gallery {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Return a section of the image gallery
     * @param associative_array $opts
     *     - type string optional the gallery type to return - images or files - default to images
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - sort_by string optional field to sort by - one of size, time, name - defaults to time
     *     - sort_dir string optional field to sort by - one of asc, desc - defaults to desc
     *     - search_term string optional a term to search for in names
     *     - folder_id int optional to return files that are in a specific folder.  id returned by the list-folders call
     * @return associative_array the matching gallery items
     *     - total int the total matching items
     *     - data array structs for each item included in the set, including:
     *         - id int the id of the file
     *         - name string the file name
     *         - time string the creation date for the item
     *         - size int the file size in bytes
     *         - full string the url to the actual item in the gallery
     *         - thumb string a url for a thumbnail that can be used to represent the item, generally an image thumbnail or an icon for a file type
     */
    public function getList($opts=array()) {
        $_params = array("opts" => $opts);
        return $this->master->call('gallery/list', $_params);
    }

    /**
     * Return a list of the folders available to the file gallery
     * @param associative_array $opts
     *     - start int optional for large data sets, the page number to start at - defaults to 1st page of data  (page 0)
     *     - limit int optional for large data sets, the number of results to return - defaults to 25, upper limit set at 100
     *     - search_term string optional a term to search for in names
     * @return associative_array the matching gallery folders
     *     - total int the total matching folders
     *     - data array structs for each folder included in the set, including:
     *         - id int the id of the folder
     *         - name string the file name
     *         - file_count int the number of files in the folder
     */
    public function listFolders($opts=array()) {
        $_params = array("opts" => $opts);
        return $this->master->call('gallery/list-folders', $_params);
    }

    /**
     * Adds a folder to the file gallery
     * @param string $name
     * @return associative_array the new data for the created folder
     *     - data.id int the id of the new folder
     */
    public function addFolder($name) {
        $_params = array("name" => $name);
        return $this->master->call('gallery/add-folder', $_params);
    }

    /**
     * Remove a folder
     * @param int $folder_id
     * @return boolean true/false for success/failure
     */
    public function removeFolder($folder_id) {
        $_params = array("folder_id" => $folder_id);
        return $this->master->call('gallery/remove-folder', $_params);
    }

    /**
     * Add a file to a folder
     * @param int $file_id
     * @param int $folder_id
     * @return boolean true/false for success/failure
     */
    public function addFileToFolder($file_id, $folder_id) {
        $_params = array("file_id" => $file_id, "folder_id" => $folder_id);
        return $this->master->call('gallery/add-file-to-folder', $_params);
    }

    /**
     * Remove a file from a folder
     * @param int $file_id
     * @param int $folder_id
     * @return boolean true/false for success/failure
     */
    public function removeFileFromFolder($file_id, $folder_id) {
        $_params = array("file_id" => $file_id, "folder_id" => $folder_id);
        return $this->master->call('gallery/remove-file-from-folder', $_params);
    }

    /**
     * Remove all files from a folder (Note that the files are not deleted, they are only removed from the folder)
     * @param int $folder_id
     * @return boolean true/false for success/failure
     */
    public function removeAllFilesFromFolder($folder_id) {
        $_params = array("folder_id" => $folder_id);
        return $this->master->call('gallery/remove-all-files-from-folder', $_params);
    }

}


class Mailchimp_Goal {
    public function __construct(Mailchimp $master) {
        $this->master = $master;
    }

    /**
     * Retrieve goal event data for a particular list member. Note: only unique events are returned. If a user triggers
a particular event multiple times, you will still only receive one entry for that event.
     * @param string $list_id
     * @param associative_array $email
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param int $start
     * @param int $limit
     * @return associative_array Event data and metadata
     *     - data array An array of goal data structs for the specified list member in the following format
     *         - event string The URL or name of the event that was triggered
     *         - last_visited_at string A timestamp in the format 'YYYY-MM-DD HH:MM:SS' that represents the last time this event was seen.
     *     - total int The total number of events that match your criteria.
     */
    public function events($list_id, $email, $start=0, $limit=25) {
        $_params = array("list_id" => $list_id, "email" => $email, "start" => $start, "limit" => $limit);
        return $this->master->call('goal/events', $_params);
    }

    /**
     * This allows programmatically trigger goal event collection without the use of front-end code.
     * @param string $list_id
     * @param associative_array $email
     *     - email string an email address
     *     - euid string the unique id for an email address (not list related) - the email "id" returned from listMemberInfo, Webhooks, Campaigns, etc.
     *     - leid string the list email id (previously called web_id) for a list-member-info type call. this doesn't change when the email address changes
     * @param string $campaign_id
     * @param string $event
     * @return associative_array Event data for the submitted event
     *     - event string The URL or name of the event that was triggered
     *     - last_visited_at string A timestamp in the format 'YYYY-MM-DD HH:MM:SS' that represents the last time this event was seen.
     */
    public function recordEvent($list_id, $email, $campaign_id, $event) {
        $_params = array("list_id" => $list_id, "email" => $email, "campaign_id" => $campaign_id, "event" => $event);
        return $this->master->call('goal/record-event', $_params);
    }

}

?>