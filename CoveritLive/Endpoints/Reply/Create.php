<?php

/**
 * ZF-CoveritLive
 * 
 * Replies to items in an event can be created using this method. Any item that is within the event stream 
 * (such as Writer comments, reader comments, image posts, Tweets, etc.) can be replied to any number of 
 * times. The reply id is returned by this method if the reply is successfully created, allowing 
 * for further interactions through the API.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=410
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Reply_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_itemid = NULL;
    
    private $_comment = NULL;
    
    private $_authorname = NULL;
    
    private $_authoravatar = NULL;
    
    /**
     * If provided AND the target event has Writer Avatars enabled, 
     * the URI of an image that will be used as the avatar for the reply 
     * being created. Images are displayed at 48x48 pixels. 
     * If image provided does not match these dimensions it will be 
     * auto-resized in the Viewer Window. 
     * 
     * @param string $avatar
     * @return ZendX_CoveritLive_Endpoints_Reply_Create
     */
    public function setAuthorAvatar(string $avatar)
    {
        $this->_authoravatar = $avatar;
        return $this;
    }
    
    
    /**
     * This is the textual comment of the reply. May include HTML markup. 
     * May not be > 5000 characters in length.
     * 
     * @param string $comment
     * @return ZendX_CoveritLive_Endpoints_Reply_Create
     */
    public function setComment(string $comment)
    {
        $this->_comment = $comment;
        return $this;
    }
    
    
    /**
     * The id of the event item to which the reply will be attached. 
     * Event item ids can be retrieved using the event/data API method
     * 
     * @param string $itemid
     * @return ZendX_CoveritLive_Endpoints_Reply_Create
     */
    public function setItemId(string $itemid)
    {
        $this->_itemid = $itemid;
        return $this;
    }
    
    
    /**
     * If provided AND the target event has Display Names enabled, the 
     * parameter provided here will be used for that display name.
     * 
     * @param string $author
     * @return ZendX_CoveritLive_Endpoints_Reply_Create
     */
    public function setAuthorName(string $author)
    {
        $this->_authorname = $author;
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
     * @return ZendX_CoveritLive_Endpoints_Reply_Create
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
                'item_id' => $this->_itemid,
                'comment' => $this->_comment,
                'author_name' => $this->_authorname,
                'author_avatar' => $this->_authoravatar
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
                'endpointurl' => '/reply/create',
                'method' => 'post'
        );
    }
} 