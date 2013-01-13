<?php

/**
 * @author Q2A Market
 * @copyright 2013
 * @Website http://www.q2amarket.com
 * @version 1.00 
 * 
 * 
 * Description:
 * ------------
 * Get recent questions from Question2Anser website.
 * 
 * Usage:
 * ------
 * Define Q2A path to $qa_path=site_root('YOUR_Q2A_PATH'); where 'YOUR_Q2A_PATH' is your q2a 'qa-config.php' file path.
 * 
 * To list recent question you need to call 'qa_recent_questions($args=array())' function where you would like to dispaly.
 * $args parameter can helps to customize html structure and css class.
 * 
 * Parameters:
 * -----------
 * $args:-
 * (array)(optional) Query string will override the values in $defaults.
 * Default: None
 * 
 * $limit:-
 * (string)(optional) Must be an intiger value defined the number of question will be displayed.
 * Default: 10
 * 
 * $container:-
 * (string)(optional) Valid HTML tag to wrap the un-order list of questions. Required only tag e.g 'div' and not '<div>' no closing tag required.
 * Default: None
 * 
 * $container_class:-
 * (string)(optional) CSS class for container
 * Default: None
 * 
 * $list_class:-
 * (string)(optional) CSS class for UL un-order list
 * Default: None
 * 
 * Example:-
 * ---------
 * // set function parameter in array format
 * $args = array(
 *      'limit' => 25,
 *      'container' => 'div',
 *      'container_class' => 'recent-question',
 *      'list_class' => 'q-list-item'
 * );
 * 
 * Now you can pass $args into the function
 * qa_recent_questions($args);
 * 
 * Note: This is a beta version and may or may not work with your website. Q2A Market is not responsible for any losses.
 * 
 * 
 */
  
    //root path function
    //Usually you do not have to touch this part.
    function site_root($path=null){
        $root = $_SERVER['DOCUMENT_ROOT'];
        return $root.$path;
    }
    
    //recent question function.
    // the function has everything include from databse to html output and can be modify as per your need.
    // to use this function please refer above usage guide.
    function qa_recent_questions(array $args = array()){
    
        /*-----> define your questin&answer (qa) path (not url) <-------*/
        $qa_path=site_root('/qa/');
        
        /*--------------------------------------------*/
        
        $qa_directory = basename($qa_path);    
               
        require_once($qa_path.'qa-config.php');
        include($qa_path.'qa-include/qa-base.php');
        
        $prefix = constant('QA_MYSQL_TABLE_PREFIX'); 
        
        $args += array(
            'limit'             =>      10,
            'container'         =>      null,
            'container_class'   =>      null,
            'list_class'        =>      'qa-list-item',
        );
        
        $limit = $args['limit'];
        $container =  $args['container'];
        $container_class =  $args['container_class'];
        $list_class = $args['list_class'];
        
        $container_open = '<'.$container.' class="'.$container_class.'" >';
        $container_close = '</'.$container.'>';
        $list_class_item = 'class="'.$list_class.'"';
        
        $ul = '<ul '.$list_class_item.'>';
        $ulc = '</ul>';
        $li = '<li>';
        $lic = '</li>';        
         
        $query = qa_db_query_sub("
        
        SELECT * FROM ".$prefix."posts 
        WHERE type= 'Q' 
        ORDER BY `".$prefix."posts`.`postid` DESC 
        LIMIT $limit        
        ") or die(mysql_error());
        
        if (isset($container))
            echo $container_open;
        
        //echo '<h2>Recent Questions</h2>';
        echo $ul;
        while ($row = qa_db_read_one_assoc($query, true)):
        
            $title  =   $row['title'];
            $pid    =   $row['postid'];
                                      
                echo $li.'<a href="'.$qa_directory.'/'.qa_q_path_html($pid, $title).'">'.$title.'</a>'.$lic;       
        endwhile;
        
        echo $ulc;
            
        if (isset($container))
            echo $container_close;
            
        $poweredby = 'Powered by <a href="http://www.question2answer.org" title="Powered by Question2Answer" >Question2Answe</a>';
        $functionby = 'Function by <a href="http://www.q2amarket.com" title="function by Q2A Market" >Q2A Market</a>';
        
        echo '<div class="credits">',$poweredby ,' | ', $functionby,'</div>';
    }
   
    

?>