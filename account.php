<?php 
include'db_connect.php';
class account extends db_connect
{
    public function __construct()
    {
        parent::__construct();
    }
	public function setSession($ID,$email)
	{
		$_SESSION['user_id'] = $ID;
		$_SESSION['user_email'] = $email;
	}
	
	public  function getCurrentUserId()
    {
		//echo $_SESSION['user_id'];
        if (isset($_SESSION) && isset($_SESSION['user_id'])) {

            return $_SESSION['user_id'];

        } else {

            return 0;
        }
    }
    public function signup($username,$password,$mobile,$email)
    {
        $stmt = $this->db->prepare("insert into `users`(`username`, `password`, `mobile`, `email`) values (:username,:password,:mobile,:email)");
        $stmt->bindParam(':username',$username,PDO::PARAM_STR);
        $stmt->bindParam(':password',md5($password),PDO::PARAM_STR);
        $stmt->bindParam(':mobile',$mobile,PDO::PARAM_INT);
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
    }

    public function checkemail_availability($emailid)
    {
        $result='';
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = (:email) LIMIT 1");
        $stmt->bindParam(':email', $emailid, PDO::PARAM_STR);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $result= 1; // same email exists
            }else
            {
                $result = 0;
            }
        }
        return $result;
    }
	
	
	public function login($email,$pswd)
	{
		 $access_data = '';
		$stmt = $this->db->prepare("select * from users where email = (:email) limit 1");
		$stmt->bindParam(':email',$email,PDO::PARAM_STR);
		if($stmt->execute())
		{
			if($stmt->rowCount()>0)
			{
				$row = $stmt->fetch();
				$hashFromDatabase = $row['password'];
				$userEnteredPasswort = $pswd;
				if ($hashFromDatabase === md5($userEnteredPasswort))
				 {
				 	$message="<label class='text-danger'>Valid</label>";
					$access_data = array("error" => false,
                                     	 "message" => $message,
										 "accountID"=>$row['id'],
										 "email"=>$row['email']);

				 }else
				 {
				 	$message="<label class='text-danger'>Invalid email/password</label>";
					$access_data = array("error" => true,
                                     	 "message" => $message);
				 }
			}
		}
		
		 return $access_data;
	}
	
	
	public function setfarmer_Onboarding($fname,$contact,$email,$pan,$adhar,$newfilename,$kycFilesSerialized)
	{
		$result = '';
		//  code to fetch serail number and increment by 1//
		$qry = $this->db->prepare("select fr_code from farmer_onboarding order by id desc limit 1");
		if($qry->execute())
		{
			if($qry->rowCount() > 0)
			{
				$row = $qry->fetch();
				$serialno = $row['fr_code'];
				$number = (int)substr($serialno, 1); // Extract the numeric part
        		$newNumber = $number + 1;
				$newserailno =  sprintf('F%03d',$newNumber);
				//return 'C' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); // 
			}
			else
		  {
			$newserailno = 'F001';
		  }
		}
		// end code for serial number //
		$stmt=$this->db->prepare("INSERT INTO `farmer_onboarding`(`fr_name`,`fr_code` , `fr_contact`, `fr_email`, `fr_pan`, `fr_adhar`, `fr_image`,`fr_kyc`) VALUES (:fname,:fcode,:fcontact,:femail,:fpan,:fadhar,:fimage,:fkyc)");
		$stmt->bindParam(":fname", $fname, PDO::PARAM_STR);
		$stmt->bindParam(":fcode", $newserailno, PDO::PARAM_STR); // serial number 
		$stmt->bindParam(":fcontact", $contact, PDO::PARAM_INT);
		$stmt->bindParam(":femail", $email, PDO::PARAM_STR);
		$stmt->bindParam(":fpan", $pan, PDO::PARAM_STR);
		$stmt->bindParam(":fadhar", $adhar, PDO::PARAM_STR); 
		$stmt->bindParam(":fimage", $newfilename, PDO::PARAM_STR); 
		$stmt->bindParam(":fkyc", $kycFilesSerialized, PDO::PARAM_STR); 
		//$stmt->bindParam(":fkyc", $td_id, PDO::PARAM_STR); 
		if($stmt->execute())
		{
			$lastID = $this->db->lastInsertId();
			
		}
		 $result = array('insert_last_id'=>$lastID);	
		return $result;
	
	}
/*	public function setfarmer_Onboarding_kyc($newfilename,$lastinsert,$accountId)
	{
		if($lastinsert!="")
		{
			$stmt =  $this->db->prepare("INSERT INTO `farmer_kyc`(`kyc_doc`, `farmer_onboarding_id`, `users_id`)VALUES(:kyc,:lastid,:id)");
			$stmt->bindParam(":kyc",$newfilename,PDO::PARAM_STR);
			$stmt->bindParam(":lastid",$lastinsert,PDO::PARAM_STR);
			$stmt->bindParam(":id",$accountId,PDO::PARAM_STR);
			$stmt->execute();
		}
	}
*/	public function updatefarmer_Onboarding($fid,$fname,$contact,$email,$pan,$adhar,$newfilename,$kycFilesSerialized)
	{
		
		if($fid!="")
		{
			echo "here dss";
			$stmt = $this->db->prepare("UPDATE `farmer_onboarding`
			 							SET `fr_name`=(:name),`fr_contact`=(:contact),`fr_email`=(:email),`fr_pan`=(:pan),`fr_adhar`=(:adhar),
										`fr_image`=(:image), `fr_kyc`=(:kyc) WHERE id = (:id) ");
			$stmt->bindParam(":name", $fname, PDO::PARAM_STR);
			$stmt->bindParam(":contact", $contact, PDO::PARAM_INT);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":pan", $pan, PDO::PARAM_STR);
			$stmt->bindParam(":adhar", $adhar, PDO::PARAM_STR);
			$stmt->bindParam(":image", $newfilename, PDO::PARAM_STR);
			$stmt->bindParam(":kyc", $kycFilesSerialized, PDO::PARAM_STR);
			$stmt->bindParam(":id", $fid, PDO::PARAM_INT);
			$stmt->execute();
		}
		
	}
	public function getfarmer_OnBoardingData()
	{
		$result=[];
		$stmt = $this->db->prepare("select * from farmer_onboarding");
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$rows = $stmt->fetchAll();
				foreach($rows as $frow)
				{
					$result[] = array("fname"=>$frow['fr_name'], 
									"fcode"=>$frow['fr_code'],
									"fmobile"=>$frow['fr_contact'],
									"fadhar"=>$frow['fr_adhar'],
									"fimage"=>$frow['fr_image'],
									"id"=>$frow['id']);
				}
			}
		}
		return $result;
	
	}
	public function getfarmer_OnBoardingData_ById($id)
	{
		$result=[];
		$stmt = $this->db->prepare("SELECT * FROM `farmer_onboarding` where id=(:id)");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$result = $stmt->fetch();
			}
		}
		return $result;
	
	}


	public function setCompany_Onboarding($c_name,$c_pan,$c_reg,$c_gst,$c_adhar,$newfilename,$kycFilesSerialized)
	{
		$result = '';
		//  code to fetch serail number and increment by 1//
		$qry = $this->db->prepare("select cm_code from company_onboarding  order by id desc limit 1");
		if($qry->execute())
		{
			if($qry->rowCount() > 0)
			{
				$row = $qry->fetch();
				$serialno = $row['cm_code'];
				$number = (int)substr($serialno, 1); // Extract the numeric part
        		$newNumber = $number + 1;
				$newserailno =  sprintf('C%03d',$newNumber);
				//return 'C' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); // 
			}
			else
		  {
			$newserailno = 'C001';
		  }
		}
		// end code for serial number //
		

		$stmt=$this->db->prepare("INSERT INTO `company_onboarding`(`cm_name`,`cm_code` , `cm_pan`, `cm_reg`, `cm_gst`, `cm_adhar`, `cm_cheque`,`cm_kyc`) VALUES (:cname,:ccode,:cpan,:creg,:cgst,:cadhar,:ccheque,:ckyc)");
		$stmt->bindParam(":cname", $c_name, PDO::PARAM_STR);
		$stmt->bindParam(":ccode", $newserailno, PDO::PARAM_STR); // serial number 
		$stmt->bindParam(":cpan", $c_pan, PDO::PARAM_STR);
		$stmt->bindParam(":creg", $c_reg, PDO::PARAM_STR);
		$stmt->bindParam(":cgst", $c_gst, PDO::PARAM_STR);
		$stmt->bindParam(":cadhar", $c_adhar, PDO::PARAM_STR);
		$stmt->bindParam(":ccheque", $newfilename, PDO::PARAM_STR); 
		$stmt->bindParam(":ckyc", $kycFilesSerialized, PDO::PARAM_STR); 
		if($stmt->execute())
		{
			$lastID = $this->db->lastInsertId();
			
		}
		 $result = array('insert_last_id'=>$lastID);	
		return $result;
	
	}
	
	public function setCompany_Onboarding_kyc($kycfilename,$lastinsert,$accountId)
	{
		if($lastinsert!="")
		{
			$stmt =  $this->db->prepare("INSERT INTO `company_kyc`(`kyc_doc`, `company_onboarding_id`, `users_id`)VALUES(:kyc,:lastid,:id)");
			$stmt->bindParam(":kyc",$kycfilename,PDO::PARAM_STR);
			$stmt->bindParam(":lastid",$lastinsert,PDO::PARAM_STR);
			$stmt->bindParam(":id",$accountId,PDO::PARAM_STR);
			$stmt->execute();
		}
	} 
	
	public function getcompany_OnBoardingData()
	{
		$result=[];
		$stmt = $this->db->prepare("select * from company_onboarding");
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$rows = $stmt->fetchAll();
				foreach($rows as $frow)
				{
					$result[] = array("name"=>$frow['cm_name'], 
									"code"=>$frow['cm_code'],
									"gst"=>$frow['cm_gst'],
									"adhar"=>$frow['cm_adhar'],
									"pan"=>$frow['cm_pan'],
									"id"=>$frow['id']);
				}
			}
		}
		return $result;
	
	}
	public function getCompany_OnBoardingData_ById($id)
	{
		$result=[];
		$stmt = $this->db->prepare("SELECT * FROM `company_onboarding` where id=(:id)");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$result = $stmt->fetch();
			}
		}
		return $result;
	
	}
	public function updateCompany_Onboarding($id,$c_name,$c_pan,$c_reg,$c_gst,$c_adhar,$newfilename,$kycFilesSerialized)
	{
		
		if($id!="")
		{
			echo "here dss";
			$stmt = $this->db->prepare("UPDATE `company_onboarding` SET 				`cm_name`=(:name),`cm_pan`=(:pan),`cm_reg`=(:reg),`cm_gst`=(:gst),`cm_adhar`=(:adhar),`cm_cheque`=(:cheque),`cm_kyc`=(:kyc) WHERE id = (:id) ");
			$stmt->bindParam(":name", $c_name, PDO::PARAM_STR);
			$stmt->bindParam(":pan", $c_pan, PDO::PARAM_STR);
			$stmt->bindParam(":reg", $c_reg, PDO::PARAM_STR);
			$stmt->bindParam(":gst", $c_gst, PDO::PARAM_STR);
			$stmt->bindParam(":adhar", $c_adhar, PDO::PARAM_STR);
			$stmt->bindParam(":cheque", $newfilename, PDO::PARAM_STR);
			$stmt->bindParam(":kyc", $kycFilesSerialized, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
		}
		
	}
	public function delete_company_ById($del_id)
	{
		$stmt=$this->db->prepare("DELETE FROM company_onboarding  WHERE id = (:id) LIMIT 1");
		$stmt->bindParam(":id", $del_id, PDO::PARAM_INT);
		$stmt->execute();
	} 
	public function delete_farmer_ById($del_id)
	{
		$stmt=$this->db->prepare("DELETE FROM farmer_onboarding  WHERE id = (:id) LIMIT 1");
		$stmt->bindParam(":id", $del_id, PDO::PARAM_INT);
		$stmt->execute();
	} 
	public function delete_Item_ById($del_id)
	{
		$stmt=$this->db->prepare("DELETE FROM items  WHERE id = (:id) LIMIT 1");
		$stmt->bindParam(":id", $del_id, PDO::PARAM_INT);
		$stmt->execute();
	} 
	public function delete_Client_ById($del_id)
	{
		$stmt=$this->db->prepare("DELETE FROM client_onboarding  WHERE id = (:id) LIMIT 1");
		$stmt->bindParam(":id", $del_id, PDO::PARAM_INT);
		$stmt->execute();
	} 


	public function create_Item($itm_name,$itm_code,$itm_qty,$itm_image)
	{
		$stmt=$this->db->prepare("INSERT INTO `items`(`item_name`, `item_code`, `item_quantity`, `item_image`) VALUES (:name,:code,:qty,:image)");
		$stmt->bindParam(":name", $itm_name, PDO::PARAM_STR);
		$stmt->bindParam(":code", $itm_code, PDO::PARAM_STR); // serial number 
		$stmt->bindParam(":qty", $itm_qty, PDO::PARAM_STR);
		$stmt->bindParam(":image", $itm_image, PDO::PARAM_STR);
		if($stmt->execute())
		{
			$lastID = $this->db->lastInsertId();
			
		}
		 $result = array('insert_last_id'=>$lastID);	
		return $result;
	
	}
	public function get_create_ItemData()
	{
		$result=[];
		$stmt = $this->db->prepare("select * from items");
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$rows = $stmt->fetchAll();
				foreach($rows as $frow)
				{
					$result[] = array("name"=>$frow['item_name'], 
									"code"=>$frow['item_code'],
									"image"=>$frow['item_image'],
									"id"=>$frow['id']);
				}
			}
		}
		return $result;
	
	}
	public function check_itemAvailability($code)
	{
		$result=[];
		$stmt = $this->db->prepare("SELECT * FROM `items` where item_code=(:id)");
		$stmt->bindParam(':id',$code,PDO::PARAM_STR);
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				//$result = $stmt->fetch();
				//$result = array("error"=>true,"errordesc"=>"code already exists");
				$result = 1; // found
			}else
			{
				///$result = array("error"=>false,"errordesc"=>"Available");
				$result = 0; // not found
			}
		}
		return $result;
	}
	
	public function update_resetToken($token,$expires,$femail)
	{
		
		if($femail!="")
		{
			//echo "here dss";
			$stmt = $this->db->prepare("UPDATE `users` SET `reset_token`=(:token),`reset_expires`=(:expires) WHERE email = (:femail) ");
			$stmt->bindParam(":token", $token, PDO::PARAM_STR);
			$stmt->bindParam(":expires", $expires, PDO::PARAM_INT);
			$stmt->bindParam(":femail", $femail, PDO::PARAM_STR);
			$stmt->execute();
		}
		
	}
	 public function setClient_Onboarding($clienttype,$clname,$contact,$email,$agreementcopynewfilename,$kycFilesSerialized,$acctname,$acctnumber,$ifsccode,$branchname,$cancelcheqnewfilename)
	 {

		$result = '';
		//  code to fetch serail number and increment by 1//
		$qry = $this->db->prepare("select cl_code from client_onboarding  order by id desc limit 1");
		if($qry->execute())
		{
			if($qry->rowCount() > 0)
			{
				//echo "if cont";
				$row = $qry->fetch();
				$serialno = $row['cl_code'];
				$number = (int)substr($serialno, 2); // Extract the numeric part
        		$newNumber = $number + 1;
				$newserailno =  sprintf('MT%03d',$newNumber);
				//return 'C' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); // 
			}
			else
		  {
			//echo "else cont";
			$newserailno = 'MT001';
		  }
		}
		// end code for serial number //
		//echo $newserailno;
		//exit;
		$stmt=$this->db->prepare("INSERT INTO `client_onboarding`(`cl_clienttype`, `cl_code`,cl_name, `cl_mobile`, `cl_email`, `cl_kyc`, `cl_agreementcopy`, `cl_bank_acctholdername`, `cl_bank_acctnumber`, `cl_bank_ifsccode`, `cl_bank_branchname`, `cl_bank_cancelcheq`)
		 VALUES (:clienttype,:fcode,:clname,:contact,:email,:kycFilesSerialized,:Agreementcopy,:acctname,:acctnumber,:ifsccode,:branchname,:cancelcheqnewfilename)");
		
		$stmt->bindParam(":clienttype", $clienttype, PDO::PARAM_INT);
		$stmt->bindParam(":fcode", $newserailno, PDO::PARAM_STR); // serial number 
		$stmt->bindParam(":clname", $clname, PDO::PARAM_STR);
		$stmt->bindParam(":contact", $contact, PDO::PARAM_INT);
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":kycFilesSerialized", $kycFilesSerialized, PDO::PARAM_STR); 
		$stmt->bindParam(":Agreementcopy", $agreementcopynewfilename, PDO::PARAM_STR);
		$stmt->bindParam(":acctname", $acctname, PDO::PARAM_STR);
		$stmt->bindParam(":acctnumber", $acctnumber, PDO::PARAM_STR);
		$stmt->bindParam(":ifsccode", $ifsccode, PDO::PARAM_STR);
		$stmt->bindParam(":branchname", $branchname, PDO::PARAM_STR);
		$stmt->bindParam(":cancelcheqnewfilename", $cancelcheqnewfilename, PDO::PARAM_STR);
		 
		if($stmt->execute())
		{
			$lastID = $this->db->lastInsertId();
			
		}
		 $result = array('insert_last_id'=>$lastID);	
		return $result;
	
		 } 
		 
	public function getClient_OnBoardingData()
	{
		$result=[];
		$stmt = $this->db->prepare("select * from client_onboarding");
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$rows = $stmt->fetchAll();
				foreach($rows as $frow)
				{
					$result[] = array("name"=>$frow['cl_name'], 
									"code"=>$frow['cl_code'],
									"mobile"=>$frow['cl_mobile'],
									"email"=>$frow['cl_email'],
									"id"=>$frow['id']);
				}
			}
		}
		return $result;
	
	}
	public function getClient_OnBoardingData_ById($id)
	{
		$result=[];
		$stmt = $this->db->prepare("SELECT * FROM `client_onboarding` where id=(:id)");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		if($stmt->execute())
		{
			if($stmt->rowCount() > 0)
			{
				$result = $stmt->fetch();
			}
		}
		return $result;
	
	}
	public function updateClient_Onboarding($id,$clname,$contact,$email,$agreementcopynewfilename,$kycFilesSerialized,$acctname,$acctnumber,$ifsccode,$branchname,$cancelcheqnewfilename)
	{
		
		if($id!="")
		{
/*			echo "here dss";
			echo $cancelcheqnewfilename;
			exit;
*/			$stmt = $this->db->prepare("UPDATE `client_onboarding` SET `cl_name`=(:name),`cl_mobile`=(:contact),`cl_email`=(:email),`cl_kyc`=(:kyc),`cl_agreementcopy`=(:agreementcopy),`cl_bank_acctholdername`=(:acctholdername),`cl_bank_acctnumber`=(:acctnumber),`cl_bank_ifsccode`=(:ifsccode),`cl_bank_branchname`=(:branchname),`cl_bank_cancelcheq`=(:cancelcheq) WHERE id = (:id)");
			$stmt->bindParam(":name", $clname, PDO::PARAM_STR);
			$stmt->bindParam(":contact", $contact, PDO::PARAM_INT);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":agreementcopy", $agreementcopynewfilename, PDO::PARAM_STR);
			$stmt->bindParam(":kyc", $kycFilesSerialized, PDO::PARAM_STR);
			$stmt->bindParam(":acctholdername", $acctname, PDO::PARAM_STR);
			$stmt->bindParam(":acctnumber", $acctnumber, PDO::PARAM_INT);
			$stmt->bindParam(":ifsccode", $ifsccode, PDO::PARAM_STR);
			$stmt->bindParam(":branchname", $branchname, PDO::PARAM_STR);
			$stmt->bindParam(":cancelcheq", $cancelcheqnewfilename, PDO::PARAM_STR);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
		}
		
	}	
	
}// final end





