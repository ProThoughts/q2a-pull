Q2A PULL
========
Q2A Pull allows to get various data from Question2Answer website and display on external website on the same server.

#### IMPORTANT NOTE
Q2A Pull is a experimental and ongoing project. Currently only one function is available to display recent questions. More functions will be added soon. Keep watching this repo for update.

#### VERSION
BETA

AVAILABLE FUNCTION
------------------
- List Recent Questions

Installation Guide
------------------
1. Download source code
2. Place q2a-pull directory to your website directory where you want to display q2a data
3. In q2a-pull/functions.php at line 74 define Q2A path to $qa_path=site_root('YOUR_Q2A_PATH'); where 'YOUR_Q2A_PATH' is your q2a 'qa-config.php' file path
4. Include functions.php file to your system

---

DESCRIPTION
-----------
qa_recent_questions() will allows to display recent questions from Q2A website.

FUNCTION
--------
qa_recent_questions($args)

USAGE
-----
To list recent question you need to call 'qa_recent_questions($args=array())' function where you would like to dispaly.
$args parameter can helps to customize html structure and css class.

#### EXAMPLE
```php
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
```

PARAMETERS
----------
#### $args
(array)(optional) Query string will override the values in $defaults.  
Default: None

#### $limit
(int)(optional) Must be an intiger value defined the number of question will be displayed.  
Default: 10

#### $container
(string)(optional) Valid HTML tag to wrap the un-order list of questions. Required only tag e.g `div` and not `<div>` no closing tag required.  
Default: None

#### $container_class
(string)(optional) CSS class for container  
Default: None

#### $list_class
(string)(optional) CSS class for UL un-order list  
Default: qa-list-item

About Question2Answer
=====================
[Question2Answer][q2a_link] is a open source question and answer system built on PHP. Built with great flexibilities to customize according to the requirements. [Find out Question2Answer community][q2a_community]

About Q2A Market
================
[Q2A Market ][author]is the leading developer for Question2Answer open source system. It is providing high quality theme, plugins and customization service.

Find out more for [Q2A Market][author]


Disclaimer
----------
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
See the [GNU General Public License][GNU] for more details. Q2A Market is not responsible for any losses occur using this program.

[q2a_link]:http://www.question2answer.org
[q2a_community]:http://www.question2answer.org/qa/
[author]: http://www.q2amarket.com
[GNU]:http://www.gnu.org/licenses/gpl.html