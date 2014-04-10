<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows for a poll to be ended. Ended polls will be removed from viewer window rotation, 
 * voting on ended polls will be closed and the final poll results will be added as a new event entry.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=297
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Poll_End implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_pollid = NULL;

    
    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Poll_End
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
     * @return ZendX_CoveritLive_Endpoints_Poll_End
     */
    public function setPollId(string $pollid)
    {
        $this->_pollid = $pollid;
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
                'endpointurl' => '/poll/end',
                'method' => 'post'
        );
    }
} 