<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows users to update currently existing polls. The only facet of the poll that can be 
 * updated is its visibility (whether it is showing or hidden). The text of the poll (question and answers) 
 * cannot be updated, to avoid discrepancies in poll results if users vote prior to the poll being updated.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=298
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Poll_Update implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_pollid = NULL;
    
    private $_status = NULL;

    
    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Poll_Update
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * The id of the poll to be ended. Returned by the poll/list and poll/create API methods.
     * 
     * @param string $pollid
     * @return ZendX_CoveritLive_Endpoints_Poll_Update
     */
    public function setPollId(string $pollid)
    {
        $this->_pollid = $pollid;
        return $this;
    }
    
    /**
     * The visibility of the poll, which is being updated. Possible values include:
     * 
     * publish - show the poll. Is only valid if the poll being updated is in a hidden state.
     * hide - hide the poll. Is only valid if the poll being updated is in a published state.
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Poll_Update
     */
    public function setStatus(string $value)
    {
        $this->_status = $value;
        return $this;
    }
    

    /**
     * return POST-Parameter
     * 
     * (non-PHPdoc)
     * @see ZendX_CoveritLive_Interfaces_Endpoint::getData()
     * @return array
     */
    public function getData ()
    {
        return array(
                'event_code' => $this->_eventcode,
                'poll_id' => $this->_pollid,
                'status' => $this->_status
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
                'endpointurl' => '/poll/update',
                'method' => 'post'
        );
    }
} 