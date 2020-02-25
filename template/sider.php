<?php
	defined('DB_HOST') or die;
	$bugs = array(
		'Lab 01 - SQL injection Attacks (SQLi) ' => array(
			'sqli/01.php'=>'SQLi Attack 01 - Union',
			'sqli/02.php'=>'SQLi Attack 02 - Union',
			'sqli/03.php'=>'SQLi Attack 03 - Union',
			'sqli/04.php'=>'SQLi Attack 04 - Union',
			'sqli/05.php'=>'SQLi Attack 05 - Union',
			'sqli/06.php'=>'SQLi Attack 06 - Union',
			'sqli/07.php'=>'SQLi Attack 07 - Union Out file',
			'sqli/08.php'=>'SQLi Attack 08 - Union ',
			'sqli/09.php'=>'SQLi Attack 09 - Union - Login',
			'sqli/10.php'=>'SQLi Attack 10 - Union SOAP',
			'sqli/11.php'=>'SQLi Attack 11 - Union JSON',
			'sqli/12.php'=>'SQLi Attack 12 - Union XML',
			'sqli/13.php'=>'SQLi Attack 13 - Blind Boolean',
			'sqli/14.php'=>'SQLi Attack 14 - Blind Time',
			'sqli/15.php'=>'SQLi Attack 15 - Double Query',
			'sqli/16.php'=>'SQLi Attack 16 - XPath',
			'sqli/17.php'=>'SQLi Attack 17 - Insert 1',
			'sqli/18.php'=>'SQLi Attack 18 - Insert 2',
			'sqli/19.php'=>'SQLi Attack 19 - Update',
			'sqli/20.php'=>'SQLi Attack 20 - Multi Query',
			'sqli/21.php'=>'SQLi Attack 21 - User Agent',
			'sqli/22.php'=>'SQLi Attack 22 - Referer',
			'sqli/23.php'=>'SQLi Attack 23 - Cookie',
			'sqli/24.php'=>'SQLi Attack 24 - Second Order 1',
			'sqli/25.php'=>'SQLi Attack 25 - Second Order 2',
			'sqli/26.php'=>'SQLi Attack 26 - Limit 1',
			'sqli/27.php'=>'SQLi Attack 27 - Limit 2',
			'sqli/28.php'=>'SQLi Attack 28 - Base64',
			'sqli/29.php'=>'SQLi Attack 29 - Bypass No Comment',
			'sqli/30.php'=>'SQLi Attack 30 - Bypass OR & AND ',
			'sqli/31.php'=>'SQLi Attack 31 - Bypass OR & AND & No Comment',
			'sqli/32.php'=>'SQLi Attack 32 - Bypass UNION & SELECT 1',
			'sqli/33.php'=>'SQLi Attack 33 - Bypass UNION & SELECT 2',
			'sqli/34.php'=>'SQLi Attack 34 - Bypass WAF HTTP Parameter Pollution',
			'sqli/35.php'=>'SQLi Attack 35 - Bypass addslashes',
			'sqli/36.php'=>'SQLi Attack 36 - Bypass mysql_real_escape_string',
			'sqli/37.php'=>'SQLi Attack 37 - Bypass mysqli_real_escape_string',
		),
		'Lab 02 - Cross-Site Scripting (XSS)' => array(
			'xss/01.php'=>'XSS Attack 01 - Reflected GET',
			'xss/02.php'=>'XSS Attack 02 - Reflected POST',
			'xss/03.php'=>'XSS Attack 03 - Reflected Hidden',
			'xss/04.php'=>'XSS Attack 04 - Reflected User Agent',
			'xss/05.php'=>'XSS Attack 05 - Reflected Referer',
			'xss/06.php'=>'XSS Attack 06 - Reflected Cookie',
			'xss/07.php'=>'XSS Attack 07 - Reflected Meta',
			'xss/08.php'=>'XSS Attack 08 - Reflected Ajax',
			'xss/09.php'=>'XSS Attack 09 - Reflected XML 1',
			'xss/10.php'=>'XSS Attack 10 - Reflected XML 2',
			'xss/11.php'=>'XSS Attack 11 - Reflected JSON 1',
			'xss/12.php'=>'XSS Attack 12 - Reflected JSON 2',
			'xss/13.php'=>'XSS Attack 13 - Reflected var',
			'xss/14.php'=>'XSS Attack 14 - Reflected eval 1',
			'xss/15.php'=>'XSS Attack 15 - Reflected eval Base64',
			'xss/16.php'=>'XSS Attack 16 - Reflected document.write 1',
			'xss/17.php'=>'XSS Attack 17 - Reflected document.write 2',
			'xss/18.php'=>'XSS Attack 18 - Reflected Href 1',
			'xss/19.php'=>'XSS Attack 19 - Reflected Href 2',
			'xss/20.php'=>'XSS Attack 20 - Reflected PHP_SELF',
			'xss/21.php'=>'XSS Attack 21 - Reflected Bypass HTML Tag',
			'xss/22.php'=>'XSS Attack 22 - Reflected Bypass Script 1',
			'xss/23.php'=>'XSS Attack 23 - Reflected Bypass Script 2',
			'xss/24.php'=>'XSS Attack 24 - Reflected Bypass addslashes',
			'xss/25.php'=>'XSS Attack 25 - Reflected Bypass Timer',
			'xss/26.php'=>'XSS Attack 26 - Reflected Bypass alert',
			'xss/27.php'=>'XSS Attack 27 - Reflected Session Hijacking',
			'xss/28.php'=>'XSS Attack 28 - Store 1',
			'xss/29.php'=>'XSS Attack 29 - Store 2',
			'xss/30.php'=>'XSS Attack 30 - Store 3',
			'xss/31.php'=>'XSS Attack 31 - Store 4',
			'xss/32.php'=>'XSS Attack 32 - Store 5',
			'xss/33.php'=>'XSS Attack 33 - Store 6',
			'xss/34.php'=>'XSS Attack 34 - Store 7',
			'xss/35.php'=>'XSS Attack 35 - Store SWF',
			'xss/36.php'=>'XSS Attack 36 - Store SVG',
			'xss/37.php'=>'XSS Attack 37 - DOM XSS 1',
			'xss/38.php'=>'XSS Attack 38 - DOM XSS 2',
			'xss/39.php'=>'XSS Attack 39 - DOM XSS 3 Url Hash1',
			'xss/40.php'=>'XSS Attack 40 - DOM XSS 4 Url Hash2',
		),
		'Lab 03 - Cross-Site Request Forgery (CSRF)' => array(
			'csrf/01.php'=>'CSRF Attack 01',
			'csrf/02.php'=>'CSRF Attack 02',
			'csrf/03.php'=>'XSRF Attack 03',
			'csrf/04.php'=>'XSRF Attack 04',
			'csrf/05.php'=>'XSRF Attack 05',
		),	
		'Lab 04 - Remote Command Execution (RCE)' => array(
			'rce/01.php'=>'RCE Attack 01',
			'rce/02.php'=>'RCE Attack 02',
			'rce/03.php'=>'RCE Attack 03',
			'rce/04.php'=>'RCE Attack 04 Blind 1',
			'rce/05.php'=>'RCE Attack 05 Blind 2',
			'rce/06.php'=>'RCE Attack 06',
			'rce/07.php'=>'RCE Attack 07 SOAP',
			'rce/08.php'=>'RCE Attack 08',
			'rce/09.php'=>'RCE Attack 09',
		),		
		'Lab 05 - PHP Code Injection (PCI)' => array(
			'pci/01.php'=>'PCI Attack 01',
			'pci/02.php'=>'PCI Attack 02',
			'pci/03.php'=>'PCI Attack 03',
			'pci/04.php'=>'PCI Attack 04',
			'pci/05.php'=>'PCI Attack 05',
			'pci/06.php'=>'PCI Attack 06 - Server Side Template Injection (SSTI)',
			'pci/ssi/index.php'=>'PCI Attack 07 - Server Side Injection (SSI)',
			'pci/08.php'=>'PCI Attack 08',
			'pci/09.php'=>'PCI Attack 09',
			'pci/10.php'=>'PCI Attack 10 - PHP Object Injection',
		),	
		'Lab 06 - Remote File Inclusion (RFI)' => array(
			'rfi/01.php'=>'RFI Attack 01',
			'rfi/02.php'=>'RFI Attack 02',
			'rfi/03.php'=>'RFI Attack 03',
			'rfi/04.php'=>'RFI Attack 04',
			'rfi/05.php'=>'RFI Attack 05',
		),		
		'Lab 07 - Local File Inclusion (LFI)' => array(
			'lfi/01.php'=>'LFI Attack 01',
			'lfi/02.php'=>'LFI Attack 02',
			'lfi/03.php'=>'LFI Attack 03',
			'lfi/04.php'=>'LFI Attack 04',
			'lfi/05.php'=>'LFI Attack 05',
			'lfi/06.php'=>'LFI Attack 06',
			'lfi/07.php'=>'LFI Attack 07',
		),		
		'Lab 08 - File & Directory Traversal (FDT)' => array(
			'fdt/01.php'=>'FDT Attack 01',
			'fdt/02.php'=>'FDT Attack 02',
			'fdt/03.php'=>'FDT Attack 03',
			'fdt/04.php'=>'FDT Attack 04',
			'fdt/05.php'=>'FDT Attack 05',
			'fdt/06.php'=>'FDT Attack 06',
			'fdt/07.php'=>'FDT Attack 07',
			'fdt/08.php'=>'FDT Attack 08',
			'fdt/09.php'=>'FDT Attack 09',
		),
		'Lab 09 - Unrestricted File Upload (UFU)' => array(
			'ufu/01.php'=>'UFU Attack 01',
			'ufu/02.php'=>'UFU Attack 02',
			'ufu/03.php'=>'UFU Attack 03',
			'ufu/04.php'=>'UFU Attack 04',
		),	
		'Lab 10 - Special Attacks' => array(
			'special/01.php'=>'Special Attacks 01 - XXE 1',
			'special/02.php'=>'Special Attacks 02 - XXE 2',
			'special/03.php'=>'Special Attacks 03 - XML XPath Injection',
			'special/04.php'=>'Special Attacks 04 - Session fixation',
			'special/05.php'=>'Special Attacks 05 - NoSQL Injection 1',
			'special/06.php'=>'Special Attacks 06 - NoSQL Injection 2',
			'special/07.php'=>'Special Attacks 07 - NoSQL Injection 3',
			'special/08.php'=>'Special Attacks 08 - SSRF',
		),		
	);
	
	$currentPage = $_SERVER['SCRIPT_NAME'];
	$currentPage2 = explode('/',$currentPage);
	array_shift($currentPage2);
	if(PROJECT_FOLDER == $currentPage2[0])
		array_shift($currentPage2);
	$FindKey = implode('/',$currentPage2);
?>
<nav class="side-navbar">
    <div class="sidebar-header text-center">
		<b>
		Dorsa Lab Vulnerable Web Application
		</b>
		<br>
		@dorsateam - @meisamrce
    </div>
    <ul class="list-unstyled">
        <li <?php if(stristr($currentPage,'index.php')) print 'class="active"'; ?>><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
		<?php
			$bugCounter = 0;
			foreach($bugs as $kbug => $vbug)
			{		
				$isActivePage = isset($vbug[$FindKey]) ? true : false;
		?>		
			<li <?php if($isActivePage) print 'class="active"'; ?>><a href="#bug<?php print $bugCounter; ?>" aria-expanded="<?php if($isActivePage) print 'true'; ?>" data-toggle="collapse">
					<i class="fa fa-shield"></i>
					<?php print $kbug; ?>
				</a>
				<ul id="bug<?php print $bugCounter; ?>" class="collapse list-unstyled <?php if($isActivePage) print 'show'; ?>">
					<?php
						foreach($vbug as $kattack => $vattack)
						{
					?>				
						<li><a <?php if(stristr($currentPage,$kattack)) print 'class="active"'; ?> href="<?php print $kattack; ?>"><i class="fa fa-bug">
							</i><?php print $vattack; ?></a></li>
					<?php
						}
					?>							
				</ul>

			</li>
			<?php
					$bugCounter++;
				}
			?>		
    </ul>
</nav>
