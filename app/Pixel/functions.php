<?php
function getEditableTags($dom){

    foreach($dom->find('p[editable="true"]') as $element){
        $content = $element->innertext;
        echo $content . '<br>';
    }
}
 

 
function getChilds($elem) {
    global $xml;

    $childs = $elem->children ();
    $xml .= '<' . $elem->tag . '>';

    if (count ( $childs )) {
        foreach ( $childs as $child ) {

            getChilds ( $child );
        }
    } else {
    }

    $xml .= '</' . $elem->tag . '>';
}
 
 
function getChilds2($elem) {
    global $xml;

    $childs = $elem->children ();
    $xml .= '<div style="border:1px solid red; margin:10px;">' . $elem->tag;

    if (count ( $childs )) {
        foreach ( $childs as $child ) {

            getChilds2 ( $child );
        }
    } else {
    }

    $xml .= '</div>';
}