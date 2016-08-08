<?php

/**
 * Created by IntelliJ IDEA.
 * User: marco
 * Date: 18/07/2016
 * Time: 22:22
 */

require_once 'post.php';

class PostQuery
{

    public $SearchResult;

    public function __construct($sstr, $u)
    {
        $this->SearchResult = Post::Search($sstr, $u);
    }

    public function getDefaultHtml()
    {
        $resultString = "";

        foreach ($this->SearchResult as &$value) {
            $object = json_decode($value);
            $user = $object->User;
            $resultString = $resultString . "        
<div class=\"ui card raised\" style=\"padding: 0px; margin: 6px; margin-top: 0px; border-radius: 0px; \">
<div class=\"content\">
   <a class=\"header\" href=\"postview.php?id=" . $object->ID . "\">" . ucfirst($object->Title) . "</a>
   <div class=\"meta\">
      <a href='../pages/profile.php?id=" . $user->ID . "'>" . $user->Name . "</a>
   </div>
   <div class=\"description\" >
      <p style=\"height: auto; overflow: hidden; max-height: 40px; text-overflow: ellipsis;\">" . $object->Description . "</p>
    </div>
</div>
<div class=\"extra content\">
   <span>
   Enviado em " . $object->Date . "
   </span>
</div>
</div>
";
        }

        return $resultString;
    }

}
