<?php require_once('functions.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />

	<title>QA Recent Questions | Q2A Market</title>
    
    <!-- Demo CSS -->
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            font-size: 16px;
            font-family:Tahoma, Arial, sans-serif; 
            line-height:20px;
            color:#666;
        }
        a,a:visited{
            color:#222;
            text-decoration:none;
            display:block;
            padding:8px 15px;
        }
        a:hover,a:focus{
            color:#a00;
        }
        p{margin-bottom:5px;}
        .qa-recent-q{
            padding:20px;
            background:#666;
            border:1px solid #eee;
            width:400px;
            margin:20px auto 0;
        }
        /* default class */
        .qa-list-item{
            list-style:none;
        }
        .qa-list-item li{
            background:#f4f4f4;
            border-top:1px solid #fff;
            border-bottom:1px solid #ddd;
            box-shadow: 5px 0 15px -5px rgba(0,0,0,0.2) inset,
                        0 0 6px -2px rgba(255,255,255,1) inset;
        }
        .qa-list-item li:hover{
            background:#fff;
        }
        
        /* custom class */
        .qa-list-custom{
            list-style:none;
        }
        .qa-list-custom li{
            background:#222;
            border-top:1px solid #444;
            border-bottom:1px solid #000;
            box-shadow: 5px 0 15px -5px rgba(255,255,255,0.2) inset,
                        0 0 6px -2px rgba(0,0,0,1) inset;
        }
        .qa-list-custom li:hover{
            background:#000;
        }
        .qa-list-custom li a{
            color:#aaa;
        }
        
        /* credits by*/
        div.credits{
            width:440px;
            margin:0 auto;
            font-size:11px;
            text-align:right;
        }
        div.credits a{
            display:inline-block;
            padding:0;
            margin:0;
        }
        
    </style>
    <!-- END: Demo CSS -->
</head>

<body>

<?php
  
    // set arguments in array format for the function
    $args = array(
        'limit' => 15,
        'container' => 'div',
        'container_class' => 'qa-recent-q',
        //'list_class' => 'qa-list-custom' //(This is commented to show if not define it will use default class qa-list-item. Uncomment to see how it switch the default class with the defined class in the array)
    );
    
    // call function and pass $args as parameters
    qa_recent_questions($args);
?>

</body>
</html>