<?php
$str='<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15685.519598315546!2d76.1677415!3d10.6275662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x13b1b75de912c455!2sMr.%20Kissan%20coconut%20oil!5e0!3m2!1sen!2sin!4v1601899857213!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>"';
$str = str_replace('width="600" height="450"','width="100%" height="600"',$str);
echo $str;
?>
