<?php

/**
 * ZF-CoveritLive
 * 
 * This method provides data of all upcoming, live and completed events accessible by a user. 
 * This includes the user's own events, as well as any events that are part of Groups or 
 * Enterprise Accounts that the user belongs to. By default, the event/list request only 
 * returns events that belong to the user. To request events that belong to an 
 * Enterprise Account or Group, one of the account or group parameters must be included in the request.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=280
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Event_List implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{
    private $_eventcode = NULL;
    
    private $_status = NULL;
    
    private $_eventcount = NULL;
    
    private $_account = NULL;
    
    private $_group = NULL;
    
    
    
    /**
     * The event code at which you want to start receiving events. 
     * The event code is unique and is provided in the data for any event returned. 
     * If it's not included, it will default to the earliest possible event (by creation date).
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Event_List
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * A pipe (|) delimited list of event types to retrieve. Possible values include:
     * 
     * upcoming - events that haven't started
     * live - events currently live
     * finished - completed events
     * 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_List
     */
    public function setStatus(string $value)
    {
        $this->_status = $value;
        return $this;
    }
    
    /**
     * Controls the number of events that are returned. If no value is provided, the last 
     * 500 matching events will be returned in ascending order of creation date. Set event 
     * count to an integer less than 500 to limit the number of items returned. 
     * If this value is set to an integer greater than 500, only the last 500 matching items will be returned. 
     * 
     * @param int $count
     * @return ZendX_CoveritLive_Endpoints_Event_List
     */
    public function setEventCount(int $count)
    {
        $this->_eventcount = $count;
        return $this;
    }
    
    /**
     * The account code for which you want to retrieve events. If this parameter is provided, the group 
     * parameter should not be. If the user belongs to an Enterprise Account, this code is 
     * available on the APIs and Event Feeds page. Omit this parameter and the group parameter 
     * to retrieve events that belong to the user only.
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_List
     */
    public function setAccount(string $value)
    {
        $this->_account = $value;
        return $this;
    }
    
    /**
     * The group code for which you want to retrieve events. If this parameter is provided, 
     * the account parameter should not be. If the user belongs to any Groups, the codes for 
     * them are available on the APIs and Event Feeds page. Omit this parameter and the 
     * account parameter to retrieve events that belong to the user only.
     * 
     * @param string $group
     * @return ZendX_CoveritLive_Endpoints_Event_List
     */
    public function setGroup(string $group)
    {
        $this->_group = $group;
        return $this;
    } 
    

    /**
     * return GET-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        return array(
                'event_code' => $this->_eventcode,
                'status' => $this->_status,
                'event_count' => $this->_eventcount,
                'account' => $this->_account,
                'group' => $this->_group
        );
    }

    /**
     * return url params
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getUrl()
     * @return array
     */
    public function getUrl ()
    {
        return array(
                'endpointurl' => '/event/list',
                'method' => 'get'
        );
    }
} 