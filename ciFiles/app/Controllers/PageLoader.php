<?php

namespace App\Controllers;

class PageLoader extends BaseController
{

	public function page_loader($viewName,$data)
	{
		echo view("templates/header",$data);
		echo view("pages/".$viewName,$data);
		echo view("templates/footer",$data);
	}

	public function admin_login($error="")
	{
		$session = session();
		if ($session->role=="admin") {
			return redirect()->to(site_url(""));
		} else {
			$data = array("title"=>"Login","error"=>$error);
			$this->page_loader("admin_login",$data);
		}
	}

	public function dashboard($error="")
	{
		$session = session();
		if ($session->role!="admin") {
			return redirect()->to(site_url("admin-login"));
		} else {
			$data = array("title"=>"dashboard","error"=>$error);
			$this->page_loader("dashboard",$data);
		}
	}

}
