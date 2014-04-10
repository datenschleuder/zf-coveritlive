<?php

/**
 * ZF-CoveritLive
 * 
 * The comment creation method allows a 3rd party application to submit 
 * comments to a CoveritLive event. Comments are not inserted directly 
 * into the event stream, rather they are placed into the comment stream, 
 * requiring approval prior to being published.
 *
 *
 *
 * @author     Jürgen Meier <juergen.meier@axelspringer.de>
 * @copyright  Axel Springer SE 2014
 * @version    1.0
 * @see        http://www.coveritlive.com/index.php?option=com_content&task=view&id=278
 * @license    MIT
 */
final class ZendX_CoveritLive_Endpoints_Comment_Create implements 
        ZendX_CoveritLive_Interfaces_Endpoint
{

    private $_eventcode = NULL;
    
    private $_comment = NULL;
    
    private $_guestname = NULL;
    
    private $_tag = NULL;
    
    private $_avataruri = NULL;
 
    
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
     * @return ZendX_CoveritLive_Endpoints_Comment_Create
     */
    public function setEventCode($code)
    {
        $this->_eventcode = (string) $code;
        return $this;
    }
    
    
    /**
     * The text of the comment itself. May not include markup. 
     * Max length - 500 chars.
     * 
     * @param string $comment
     * @return ZendX_CoveritLive_Endpoints_Comment_Create
     */
    public function setComment($comment)
    {
        $this->_comment = (string) $comment;
        return $this;
    }
    
    
    /**
     * The author name of the comment, it will appear along with the comment 
     * itself. (e.g. guest_name=Alejandro). If not provided, this value 
     * defaults to "Guest". 
     * 
     * @param string $name
     * @return ZendX_CoveritLive_Endpoints_Comment_Create
     */
    public function setGuestName($name)
    {
        $this->_guestname = (string) $name;
        return $this;
    }
    
    /**
     * A free-form text field which you can use to tag this comment. 
     * Max length: 255 chars. comment/list requests for this event will return this tag. 
     * 
     * @param string $tag
     * @return ZendX_CoveritLive_Endpoints_Comment_Create
     */
    public function setTag($tag)
    {
        $this->_tag = (string) $tag;
        return $this;
    }
    
    /**
     * The URI of the users avatar image (JPG/GIF/PNG). Will be displayed at 
     * 48x48 pixels (e.g. avatar_uri=http://yourdomain.com/user/343894.png). 
     * 
     * @param string $uri
     * @return ZendX_CoveritLive_Endpoints_Comment_Create
     */
    public function setAvatarUri($uri)
    {
        $this->_avataruri = (string) $uri;
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
                'comment' => $this->_comment,
                'guest_name' => $this->_guestname,
                'tag' => $this->_tag,
                'avatar_uri' => $this->_avataruri
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
                'endpointurl' => '/comment/create',
                'method' => 'post'
        );
    }
} 