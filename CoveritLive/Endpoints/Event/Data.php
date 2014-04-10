<?php

/**
 * ZF-CoveritLive
 * 
 * This method provides a feed of data items from a particular CoveritLive event. 
 * This data can include submitted comments, published comments (guest and writer), 
 * and published media (images, audio, video).
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=281
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Event_Data implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{
    private $_eventcode = NULL;
    
    private $_itemid = NULL;
    
    private $_itemcount = NULL;
    
    private $_itemstatus = NULL;
    
    private $_elements = NULL;
    
    private $_source = NULL;
    
    private $_includereplies = NULL;
    
    /**
     * The event code for the event for which data is being retreived. 
     * Each CiL event that is created is assigned a unique event code that 
     * identifies it in the database - The event owner can find this 
     * value after creating a new event, by selecting the "altcast_code" 
     * which is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list API method.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
        return $this;
    }
    
    /**
     * The item ID at which you want to start receiving events. 
     * The item ID is unique and is provided in the data for any item returned. 
     * If it's not included, it will default to the earliest possible event 
     * stream item (up to the default item_count limit).
     * 
     * @param string $itemid
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setItemId(string $itemid)
    {
        $this->_itemid = $itemid;
        return $this;
    }
    
    /**
     * Controls the number of event stream items that are returned. If no value is 
     * provided, the last 500 matching items will be returned in descending order 
     * of creation date. Set item_count to an integer less than 500 to limit the 
     * number of items returned. If this value is set to an integer greater than 500, 
     * only the last 500 matching items will be returned.
     * 
     * @param int $count
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setItemCount(int $count)
    {
        $this->_itemcount = $count;
        return $this;
    }
    
    /**
     * Controls the status of the returned items. Possible values include:
     * 
     * edited - returns all items that have been edited after being published.
     * deleted - returns all items that have been deleted after being published.
     * 
     * Omit this parameter to return the normal event items (which includes edited items, but excludes deleted items). 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setItemStatus(string $value)
    {
        $this->_itemstatus = $value;
        return $this;
    }
    
    /**
     * A pipe (|) delimited list of elements to return. Possible values include: 
     * 
     * adimage - Advertising image 
     * audio - Audio items in the event 
     * facebook - a Facebook post (published through "Search" in the Event Studio)
     * guest_comment - Guest comments
     * host_comment - Host comments 
     * image - Non-advertising image 
     * instagram - an Instagram image (published through "Search" in the Event Studio) 
     * rss - an RSS item summary (published through "Search" in the Event Studio) 
     * tweet - Guest comments made via Twitter 
     * video - Video items in the event 
     * wikipedia - a Wikipedia article summary (published through "Search" in the Event Studio) 
     * 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setElements(string $value)
    {
        $this->_elements = $value;
        return $this;
    }
    
    /**
     * Where an item originated - will currently only return guest comments. 
     * If parameter not included or left blank, items from all sources will be returned. 
     * Possible values:
     * 
     * native - typed by a person viewing the event 
     * api - Comment supplied by comment/create API method 
     * 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setSource(string $value)
    {
        $this->_source = $value;
        return $this;
    }
    
    /**
     * Indicates whether to include replies to items in the event data. 
     * Set this parameter to "y" if you want replies included in the event data. 
     * Defaults to "n". 
     * 
     * @param string $value
     * @return ZendX_CoveritLive_Endpoints_Event_Data
     */
    public function setIncludeReplies(string $value)
    {
        $this->_includereplies = $value;
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
                'item_id' => $this->_itemid,
                'item_count' => $this->_itemcount,
                'item_status' => $this->_itemstatus,
                'elements' => $this->_elements,
                'source' => $this->_source,
                'include_replies' => $this->_includereplies
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
                'endpointurl' => '/event/data',
                'method' => 'get'
        );
    }
} 