<?php

/**
 * ZF-CoveritLive
 * 
 * This method allows the content of a reply to be updated. Any updates made will immediately 
 * propagate to all readers of the live event in real time. Reply items are identified by a 
 * reply id, which is returned by the reply/create and event/data API methods.
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=412
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Reply_Update implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_replyid = NULL;
    
    private $_comment = NULL;
    
    /**
     * This is the content which will replace the current item content. 
     * May include HTML markup. May not be > 5000 characters in length.
     * 
     * @param string $comment
     * @return ZendX_CoveritLive_Endpoints_Reply_Update
     */
    public function setComment(string $comment)
    {
        $this->_comment = $comment;
        return $this;
    } 
    
    
    /**
     * The id of the reply to be deleted. These ids are returned by the 
     * reply/create and event/data API methods. 
     * 
     * @param string $replyid
     * @return ZendX_CoveritLive_Endpoints_Reply_Update
     */
    public function setItemId(string $replyid)
    {
        $this->_replyid = $replyid;
        return $this;
    }
    

    /**
     * The event code for the event which is to be ended. Each CiL event that is created is 
     * assigned a unique event code that identifies it in the database - The event owner can 
     * find this value after creating a new event, by selecting the "altcast_code" which 
     * is found in their Viewer Window embed code 
     * (e.g. the event code is "46e6cd22b5" in "altcast_code=46e6cd22b5"). 
     * This value is also returned by the event/list and event/create API methods.
     * 
     * @param string $code
     * @return ZendX_CoveritLive_Endpoints_Reply_Update
     */
    public function setEventCode(string $code)
    {
        $this->_eventcode = $code;
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
                'reply_id' => $this->_replyid,
                'comment' => $this->_comment
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
                'endpointurl' => '/reply/update',
                'method' => 'post'
        );
    }
} 