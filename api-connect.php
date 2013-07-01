<?php

	function UseAdminIntegracaoConnect() {

			if ($_REQUEST['searchIntegracaoApi']) { $_SESSION['searchIntegracaoApi'] = $_REQUEST['searchIntegracaoApi'] ; }

			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-isConnected") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
			}

			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-login") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['pwd'] = $_SESSION['searchIntegracaoApi']['pwd'] ;
			}

			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-load") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['signature'] = $_SESSION['API']['logged'][$_SESSION['searchIntegracaoApi']['email']] ;
			}

			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-new") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['pwd'] = $_SESSION['searchIntegracaoApi']['pwd'] ;
				$r['nome'] = $_SESSION['searchIntegracaoApi']['nome'] ;
				$r['tel'] = $_SESSION['searchIntegracaoApi']['tel'] ;
				$r['getMail'] = $_SESSION['searchIntegracaoApi']['getMail'] ;
			}
			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-edit") {
				$r['emailEdit'] = $_SESSION['searchIntegracaoApi']['emailEdit'] ;
				$r['signature'] = $_SESSION['API']['logged'][$_SESSION['searchIntegracaoApi']['email']] ;
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['nome'] = $_SESSION['searchIntegracaoApi']['nome'] ;
				$r['tel'] = $_SESSION['searchIntegracaoApi']['tel'] ;
				$r['getMail'] = $_SESSION['searchIntegracaoApi']['getMail'] ;
			}
			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-pwd-reset") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
			}
			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-pwd-edit") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['code'] = $_SESSION['searchIntegracaoApi']['code'] ;
				$r['pwd'] = $_SESSION['searchIntegracaoApi']['pwd'] ;
			}
			if ($_SESSION['searchIntegracaoApi']['act']=="send-mail") {
				$r['emails'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['assunto'] = $_SESSION['searchIntegracaoApi']['assunto'] ;
				$r['url'] = $_SESSION['searchIntegracaoApi']['url'] ;
			}
			if ($_SESSION['searchIntegracaoApi']['act']=="user-b2c-credit-buy") {
				$r['email'] = $_SESSION['searchIntegracaoApi']['email'] ;
				$r['signature'] = $_SESSION['searchIntegracaoApi']['code'] ;
				$r['bandeira'] = $_SESSION['searchIntegracaoApi']['bandeira'] ;
				$r['parcelas'] = $_SESSION['searchIntegracaoApi']['parcelas'] ;
				$r['valor'] = $_SESSION['searchIntegracaoApi']['valor'] ;
				$r['produto'] = $_SESSION['searchIntegracaoApi']['produto'] ;
				$r['cNum'] = $_SESSION['searchIntegracaoApi']['cNum'] ;
				$r['cVal'] = $_SESSION['searchIntegracaoApi']['cVal'] ;
				$r['cCodSegur'] = $_SESSION['searchIntegracaoApi']['cCodSegur'] ;
			}
			if ($_SESSION['searchIntegracaoApi']['act']=="transaction-cancel") {
				$r['lancamentoID'] = $_SESSION['searchIntegracaoApi']['lancamentoID'] ;
			}

			$c = DoAdminIntegracaoConnect($_SESSION['searchIntegracaoApi']['act'],$r) ;
			$c = json_decode($c) ;

			if ($c->result=='ok' && ($c->act=='user-b2c-edit')) {
				$q = ParseQueryStringToArray($c->qString) ;
				unset($_SESSION['API']['logged'][$q['emailPrevious']]) ;
			}
			if ($c->result=='ok' && ($c->act=='user-b2c-login' || $c->act=='user-b2c-new' || $c->act=='user-b2c-edit')) {
				$q = ParseQueryStringToArray($c->qString) ;
				$_SESSION['API']['logged'][$q['email']] = urlencode($q['signature']) ;
			}


			ShowAdminTop() ;
			ShowAdminIntegracaoConnectForm() ;
			print_r($_REQUEST['log']) ;
			print_r("<br><br>Retorno------------------") ;
			print_r($c);

			ShowAdminBottom() ;
			print_r($_REQUEST['searchIntegracaoApi']);

		}
	function ShowAdminIntegracaoConnectForm() {

			ShowSystemFormHead('admin-integracao-api-connect') ;
			echo "
				<table class='search-form-2'>
					<caption>API Connect Example</caption>
					<thead>
						<tr>
							<td>
			" ;
			ShowAdminSearchForm($n='searchIntegracaoApi',$f='act',$t="Act",false,false,false) ;
			echo "
							</td>
							<td rowspan=100 class=border>
								Logged:
			" ;
			print_br($_SESSION['API']['logged']) ;
			echo "
							</td>
						</tr>
						<tr>
							<td><label>Assunto:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[assunto]' value='".$_SESSION['searchIntegracaoApi']['assunto']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>URL:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[url]' value='".$_SESSION['searchIntegracaoApi']['url']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>Email:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[email]' value='".$_SESSION['searchIntegracaoApi']['email']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>Email (edit):</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[emailEdit]' value='".$_SESSION['searchIntegracaoApi']['emailEdit']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>Senha:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[pwd]' value='".$_SESSION['searchIntegracaoApi']['pwd']."' size=95> 5+ caracteres
							</td>
						</tr>
						<tr>
							<td><label>Nome:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[nome]' value='".$_SESSION['searchIntegracaoApi']['nome']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>Tel:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[tel]' value='".$_SESSION['searchIntegracaoApi']['tel']."' size=95> 10 digitos, só numeros
							</td>
						</tr>
						<tr>
							<td><label>CODE:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[code]' value='".$_SESSION['searchIntegracaoApi']['code']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>lancamentoID (pra cancelar):</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[lancamentoID]' value='".$_SESSION['searchIntegracaoApi']['lancamentoID']."' size=95>
							</td>
						</tr>
						<tr>
							<td><label>Receber e-mail:</label></td>
						</tr>
						<tr>
							<td>
								<input type=checkbox name='searchIntegracaoApi[getMail]' value='1'" ; if ($_SESSION['searchIntegracaoApi']['getMail']==1) { echo "checked" ; } echo">
							</td>
						</tr>
						<tr>
							<td height=50></td>
						</tr>
						<tr>
							<td><label>Forma de Pagamento:</label></td>
						</tr>
						<tr>
							<td>
								Crédito à Vista: <input type=radio name='searchIntegracaoApi[produto]' value='1'" ; if ($_SESSION['searchIntegracaoApi']['produto']==1) { echo "checked" ; } echo">
								<br>
								Crédito Parcelado loja: <input type=radio name='searchIntegracaoApi[produto]' value='2'" ; if ($_SESSION['searchIntegracaoApi']['produto']==2) { echo "checked" ; } echo">
								<br>
								Crédito Parcelado administradora: <input type=radio name='searchIntegracaoApi[produto]' value='3'" ; if ($_SESSION['searchIntegracaoApi']['produto']==3) { echo "checked" ; } echo">
								<br>
								Débito: <input type=radio name='searchIntegracaoApi[produto]' value='A'" ; if ($_SESSION['searchIntegracaoApi']['produto']=='A') { echo "checked" ; } echo">
							</td>
						</tr>
						<tr>
							<td><label>Bandeiras:</label></td>
						</tr>
						<tr>
							<td>
								visa: <input type=radio name='searchIntegracaoApi[bandeira]' value='visa'" ; if ($_SESSION['searchIntegracaoApi']['bandeira']=='visa') { echo "checked" ; } echo">
								<br>
								mastercard: <input type=radio name='searchIntegracaoApi[bandeira]' value='mastercard'" ; if ($_SESSION['searchIntegracaoApi']['bandeira']=='mastercard') { echo "checked" ; } echo">
								<br>
								diners: <input type=radio name='searchIntegracaoApi[diners]' value='diners'" ; if ($_SESSION['searchIntegracaoApi']['bandeira']=='diners') { echo "checked" ; } echo">
								<br>
								discover: <input type=radio name='searchIntegracaoApi[bandeira]' value='discover'" ; if ($_SESSION['searchIntegracaoApi']['bandeira']=='discover') { echo "checked" ; } echo">
								<br>
								elo: <input type=radio name='searchIntegracaoApi[bandeira]' value='elo'" ; if ($_SESSION['searchIntegracaoApi']['bandeira']=='elo') { echo "checked" ; } echo">
								<br>
								amex: <input type=radio name='searchIntegracaoApi[bandeira]' value='amex'" ; if ($_SESSION['searchIntegracaoApi']['bandeira']=='amex') { echo "checked" ; } echo">
								<br>
							</td>
						</tr>
						<tr>
							<td><label>Numero Cartão:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[cNum]' value='".$_SESSION['searchIntegracaoApi']['cNum']."' size=20>
							</td>
						</tr>
						<tr>
							<td><label>Validade Cartão:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[cVal]' value='".$_SESSION['searchIntegracaoApi']['cVal']."' size=20> YYYYMM
							</td>
						</tr>
						<tr>
							<td><label>CodSegur:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[cCodSegur]' value='".$_SESSION['searchIntegracaoApi']['cCodSegur']."' size=20>
							</td>
						</tr>
						<tr>
							<td><label>Valor:</label></td>
						</tr>
						<tr>
							<td>
								R$ <input type=text name='searchIntegracaoApi[valor]' value='".$_SESSION['searchIntegracaoApi']['valor']."' size=20>
							</td>
						</tr>
						<tr>
							<td><label>Parcelas:</label></td>
						</tr>
						<tr>
							<td>
								<input type=text name='searchIntegracaoApi[parcelas]' value='".$_SESSION['searchIntegracaoApi']['parcelas']."' size=20>
							</td>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<td colspan=100>
								<input type=submit value='IR'>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
			" ;

			}


		$c = DoAdminIntegracaoConnect($_REQUEST['act'],$_REQUEST['r']);

		echo $c ;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function DoAdminIntegracaoConnect($act,$r) {

			$_API_URL = "http://templocoworking.mymanager.com.br/?site=admin&do=integracao&udo=api" ;
			$_API_KEY = "AAAA" ;
			$_API_SECRET = "BBB" ;

			$token = md5(rand(0,100000)) ;
			$date = date('U') ;

			if ($act=="user-b2c-login") {
				$qs['email'] = $r['email'] ;
				$qs['signature'] = urlencode(str_replace("&","",str_replace("/","",str_replace("+","",str_replace("=","",base64_encode(hash_hmac("sha256",json_encode($qs),$r['pwd'],True))))))) ;
				$r = $qs ;
			}

			if (is_array($r))
				{ $r = json_encode($r) ; }
				else
				{ $r = 'null' ; }

			$request = array(
				"key"=>$_API_KEY,
				"version"=>"0.1a",
				"act"=>$act,
				"token"=>$token,
				"date"=>$date,
				"qString"=>str_replace("\\","",$r),
			) ;

			$request['signature'] = urlencode(str_replace("&","",str_replace("/","",str_replace("+","",str_replace("=","",base64_encode(hash_hmac("sha256",json_encode($request),$_API_SECRET,True))))))) ;
$_REQUEST['log'][] = "<br><br>Envio------------------" ;
$_REQUEST['log'][] = $request ;
			$url = $_API_URL."&".ParseArrayToQueryString($request) ;
$_REQUEST['log'][] = "<br><br>URL------------------" ;
$_REQUEST['log'][] = $url ;
			$rp = file_get_contents($url) ;
$_REQUEST['log'][] = "<br><br>RET------------------" ;
$_REQUEST['log'][] = $rp ;

			$r = @json_decode($rp) ;
			if ($r->qString) { $r->qString = urldecode($r->qString) ; }
			$rp = @json_encode($r) ;

			if ($r==null)
				{ return "ERRO - JSON INVÁLIDO: ".$rp ; }
			else {

				if ($r->token!=$token) {
					return "ERRO - TOKEN INVÁLIDO" ;
				} else {
					return $rp ;
				}

			}

		}

	function ParseArrayToQueryString($a,$n=false,$row="&",$val="=") {

			@reset($a);
			while (list($k,$r)=@each($a)) {
				if (is_array($r)) {
					if ($n===false) {
						$nm = $k ;
					} else {
						$nm = $n."[".$k."]" ;
					}
					$var[] = ParseArrayToQueryString($r,$nm) ;
				} else {
					if ($n===false) {
						$var[] = $k.$val.urlencode($r) ;
					} else {
						$var[] = $n."[".$k."]".$val.urlencode($r) ;
					}
				}
			}

			$out = @implode($row,$var) ;

			return $out ;

		}


?>