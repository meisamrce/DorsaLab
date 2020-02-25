<?php
defined('DB_HOST') or die;
ob_start();
date_default_timezone_set('Asia/Tehran');

class Helper
{
    public $dbLink = null;
    public function __construct()
    {
		$this->setDisplayErrors(false);
        $this->dbLink = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD)
            or die(mysqli_connect_error());
        mysqli_select_db($this->dbLink,DB_NAME)
            or die($this->getError());

        $this->query("SET NAMES 'UTF8'");

    }

    public function getError()
    {
        return mysqli_error($this->dbLink);
    }

    public function __destruct()
    {
        if($this->dbLink)
            mysqli_close($this->dbLink);
    }

    public function query($q)
    {
        $result = mysqli_query($this->dbLink,$q);
        if(stristr($q,'insert'))
            return mysqli_insert_id($this->dbLink);
        else if (stristr($q,'update') || stristr($q,'delete'))
            return mysqli_affected_rows($this->dbLink);
        else
            return $result;
    }

    public function getRow($result)
    {
        return mysqli_fetch_assoc($result);
    }

    public function redirect($url)
    {
        header("location:$url");
        die;
    }

    public function post($key)
    {
        if(isset($_POST[$key]))
            return trim($_POST[$key]);
        else
            return '';
    }

    public function get($key)
    {
        if(isset($_GET[$key]))
            return trim($_GET[$key]);
        else
            return '';
    }



    public function setOk($key,$msg)
    {
        if($this->get('msg') == $key)
        {
            print "<div class=\"alert alert-success\">$msg</div>";
        }
    }

    public function setError($key,$msg)
    {
        if($this->get('msg') == $key)
        {
            print "<div class=\"alert alert-danger\">$msg</div>";
        }
    }
	
	public function setDisplayErrors($st = false)
	{
		if($st)
		{
			ini_set('display_errors','on');
			error_reporting(-1);			
		}
		else
		{
			ini_set('display_errors','off');
			error_reporting(0);			
		}
	}
	
	public function toJSON($data)
	{
		return json_encode($data,JSON_UNESCAPED_UNICODE);
	}
	
	public function queryMultiple($q)
	{
		return mysqli_multi_query($this->dbLink,$q);
	}
	
    public function safeString($str)
    {
        return htmlentities($str,ENT_QUOTES,'UTF-8');
    }	
	
    public function toInt($str)
    {
        return (int)$str;
    }

    public function toFloat($str)
    {
        return (float)$str;
    }	


}