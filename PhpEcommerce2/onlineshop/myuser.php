<?php

class User
{
	protected $name;
	var $email;

	public function __construct($name, $email)
	{
      $this->name = $name;
      $this->email = $email;

      echo "This is from parent";
      echo "<br/>";
	}

	function getType()
	{
		return $this->type;
	}
}

class Admin extends User
{
  
  public $permissionlevel;
  protected $type = "Admin";

  function __construct($name, $email, $permissionlevel)
  {
      parent:: __construct($name, $email);
      echo "This is form child";
      echo "<br/>";
  }

  function getName()
  {
  	 return $this->name;
  }
}

//User::__construct($name, $email);

$obj = new Admin("Rofiq", "rofiq@gmail.com", 1);

//echo $obj->name;
echo $obj->getName();

?>