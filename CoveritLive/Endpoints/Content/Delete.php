<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows you to delete any item in a live event. Similar to the Live Edit functionality 
 * available through the console, any item deletion made will immediately propagate to all readers 
 * of the live event in real time.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=338
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Content_Delete implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_itemid = NULL;
 
    
    /**
     * The event code for the event which the comments will be added to. 
     * Each CiL event that is created is assigned a unique event code 
     * that identifies it in the database - The event owner can find this 
     * value after creating a new event, by selecting the "altcast_code" 
     * which is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list API method.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Content_Delete
     */
    public function setEventCode($code)
    {
        $this->_eventcode = (string) $code;
        return $this;
    }
    
    
    /**
     * The id of the event item to be deleted.
     * 
     * @param string $item
     * @return ZendX_CoveritLive_Endpoints_Content_Delete
     */
    public function setItemId($item)
    {
        $this->_itemid = (string) $item;
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
                'item_id' => $this->_itemid,
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
                'endpointurl' => '/content/delete',
                'method' => 'post'
        );
    }
} 