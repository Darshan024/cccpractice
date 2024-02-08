<?php
class Controller_Front{
    public function init(){
        $request=new Model_Request();
        $text=$request->getRequestUri();
        if(strpos($text,'?')){
            $substr1 = stristr($text, '?');
            $text=stristr($text,'?',true);
            $substr1 = str_replace("?", "", $substr1);
            $id=explode("=", $substr1);
            $text=explode("/",$text);
            $action=array_pop($text);
            $className="View_".implode("_",array_map('ucfirst',$text));
            $obj =new $className();
            $obj->$action($id[1]);
            
        }
        else{ 
        $text=explode("/",$text);
        $action=array_pop($text);
        $className="View_".implode("_",array_map('ucfirst',$text));
        $obj =new $className();
        $obj->$action();
        }
    }
}
// class Controller_Front{
//     public function init(){
//         $request=new Model_Request();
//         $text=$request->getRequestUri();
//         $className="View_".ucwords(str_replace("/","_",$text),"_");
//         $obj =new $className();
//         echo $obj->tohtml();
//     }
// }

?>