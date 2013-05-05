<?php
function checkmail($text)
{
$dtc=0;
$doteec=0;
$dotbc=0;
$dotec=0;
$strtc=0;
$flag=0;
$end=0;
$a=0;
$lenc=0;

$text=trim($text);
$len=strlen($text);

if(substr($text,$len-1,1)=='.'  || substr($text,$len-2,1)=='.' )
$end=1;


	for($i=0;$i<$len;$i++)
	{
	if(substr($text,$i,1)=='@') // checks whether @ present or not and only one @ being present 
		{
		$flag++;
		if($i>=2 && $i<=32) // check the lenght min 2 chars and max 32 chars
		$lenc=1;
		$a=$i;
		}
	}//for closed

	for($i=0;$i<=$a;$i++)	// Dot at the begining checked
	{
	if(substr($text,$i,1)=='.')
	$dotbc++;
	}//for closed
	
	for($i=$a;$i<=$len;$i++)  // Dot at the end checked
	{
		if(substr($text,$i,1)=='.')
		{
		$dotec=1;
		if(($i-$a)>=3)
		$dtc=1;
		if(substr($text,$i+1,1)=='.' || substr($text,$i+2,1)=='.')
		$doteec=1;
		}
	}//for closed
	
	
	if($flag==1 && $lenc==1 && $dotbc<=1 && $dotec==1 && $doteec!=1 && $dtc==1 && $end==0)
	return 1;
	else 
	return 0;
	
}
?>
