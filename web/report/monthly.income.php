
<script>
    function createPDFMonthlyIncome(month, data) {
        var dataTable = "";
		var amountTotal = 0;
		var discountTotal = 0;
		var balanceTotal = 0;
		var i = 0;

		for (i = 0; i < data.length; ++i) {
			var amount = parseFloat(data[i]["amount"]);
			amountTotal = amountTotal + amount;
			var discount = parseFloat(data[i]["discount"]);
			discountTotal = discountTotal + discount;
			var balance = amount - discount;
			balanceTotal = balanceTotal + balance;

			var xdt = new Date(data[i]["insert_stamp"]);
			var DATE = String(xdt.getFullYear()) +"/"+ String(xdt.getMonth()+1) +"/"+String(xdt.getDate()) +" "+String(xdt.getHours()) +":"+String(xdt.getMinutes());

			dataTable = dataTable + 
			"<tr height=20 style='height:15.0pt'>"+
				"<td height=20 class=xl72 style='height:15.0pt;border-top:none'>"+String(DATE)+"</td>"+
				"<td class=xl67 style='border-top:none;border-left:none'>"+String(data[i]["id"])+"</td>"+
				"<td class=xl67 style='border-top:none;border-left:none'>"+String(data[i]["method"])+"</td>"+
				"<td class=xl69 style='border-top:none;border-left:none'><span style='font-variant-ligatures: normal;font-variant-caps: normal;orphans: 2; widows: 2;-webkit-text-stroke-width: 0px;text-decoration-style: initial; text-decoration-color: initial'>"+String(data[i]["status"])+"</span></td>"+
				"<td class=xl75 style='border-top:none;border-left:none'><span style='font-variant-ligatures: normal;font-variant-caps: normal;orphans: 2; widows: 2;-webkit-text-stroke-width: 0px;text-decoration-style: initial; text-decoration-color: initial'>LKR "+String(amount.toFixed(2))+"</span></td>"+
				"<td class=xl75 style='border-top:none;border-left:none'><span style='font-variant-ligatures: normal;font-variant-caps: normal;orphans: 2; widows: 2;-webkit-text-stroke-width: 0px;text-decoration-style: initial; text-decoration-color: initial'>LKR "+String(discount.toFixed(2))+"</span></td>"+
				"<td class=xl75 style='border-top:none;border-left:none'><span style='font-variant-ligatures: normal;font-variant-caps: normal;orphans: 2; widows: 2;-webkit-text-stroke-width: 0px;text-decoration-style: initial; text-decoration-color: initial'>LKR "+String(balance.toFixed(2))+"</span></td>"+
			"</tr>";
		}

        var dataReport = "<tr height=21 style='height:15.75pt'>" +
							  "<td colspan=4 height=21 class=xl70 style='border-right:.5pt solid black; height:15.75pt'>Total Income</td>" +
							  "<td class=xl76 style='border-top:none;border-left:none'>LKR "+String(amountTotal.toFixed(2))+"</td>" +
							  "<td class=xl76 style='border-top:none;border-left:none'>LKR "+String(discountTotal.toFixed(2))+"</td>" +
							  "<td class=xl76 style='border-top:none;border-left:none'>LKR "+String(balanceTotal.toFixed(2))+"</td>" +
						 "</tr>";

        var header = "<table border=0 cellpadding=0 cellspacing=0 width=852 style='border-collapse: collapse;table-layout:fixed;width:641pt'><col class=xl65 width=98 style='mso-width-source:userset;mso-width-alt:3584; width:74pt'><col class=xl65 width=65 style='mso-width-source:userset;mso-width-alt:2377; width:49pt'><col class=xl65 width=129 span=2 style='mso-width-source:userset;mso-width-alt: 4717;width:97pt'><col class=xl73 width=145 style='mso-width-source:userset;mso-width-alt:5302; width:109pt'><col class=xl73 width=144 style='mso-width-source:userset;mso-width-alt:5266; width:108pt'><col class=xl73 width=142 style='width:107pt'><tr height=109 style='mso-height-source:userset;height:81.75pt'> <td height=109 width=98 style='height:81.75pt;width:74pt' align=left valign=top><![if !vml]> <span style='mso-ignore:vglayout; position:absolute;z-index:1;margin-left:0px;margin-top:0px;width:849px; height:109px'> <img width=849 height=109 src='<?=$_DOMAIN?>images/image002.png' v:shapes='Picture_x0020_4'></span><![endif]><span style='mso-ignore:vglayout2'> <table cellpadding=0 cellspacing=0>  <tr>   <td height=109 class=xl65 width=98 style='height:81.75pt;width:74pt'></td>  </tr> </table> </span></td> <td class=xl65 width=65 style='width:49pt'></td> <td class=xl65 width=129 style='width:97pt'></td> <td class=xl65 width=129 style='width:97pt'></td> <td class=xl73 width=145 style='width:109pt'></td> <td class=xl73 width=144 style='width:108pt'></td> <td class=xl73 width=142 style='width:107pt'></td></tr><tr height=20 style='height:15.0pt'> <td height=20 style='height:15.0pt'></td> <td colspan=6 class=xl65></td></tr><tr height=28 style='mso-height-source:userset;height:21.0pt'> <td height=28 class=xl66 style='height:21.0pt'>DATE</td> <td class=xl66 style='border-left:none'>ORDER ID</td> <td class=xl66 style='border-left:none'>PAYMENT METHOD</td> <td class=xl66 style='border-left:none'>CURRENT STATUS</td> <td class=xl74 style='border-left:none'>AMOUNT (LKR)</td> <td class=xl74 style='border-left:none'>DISCOUNT (LKR)</td> <td class=xl74 style='border-left:none'>BALANCE (LKR)</td></tr>";

        var footer = "<tr height=21 style='height:15.75pt'><td height=21 class=xl65 style='height:15.75pt'></td><td class=xl65></td><td class=xl65></td><td class=xl65></td><td class=xl73></td><td class=xl73></td><td class=xl73></td></tr><tr height=0 style='display:none'><td width=98 style='width:74pt'></td><td width=65 style='width:49pt'></td><td width=129 style='width:97pt'></td><td width=129 style='width:97pt'></td><td width=145 style='width:109pt'></td><td width=144 style='width:108pt'></td><td width=142 style='width:107pt'></td></tr></table></div>";

        var style = '<style>';
        style = style + 'tr{mso-height-source:auto;}';
        style = style + 'col{mso-width-source:auto;}';
        style = style + 'br{mso-data-placement:same-cell;}';
        style = style + '.style0{mso-number-format:General;text-align:general;vertical-align:bottom;white-space:nowrap;mso-rotate:0;mso-background-source:auto;mso-pattern:auto;color:black;font-size:11.0pt;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri, sans-serif;mso-font-charset:0;border:none;mso-protection:locked visible;mso-style-name:Normal;mso-style-id:0;}';
        style = style + 'td{mso-style-parent:style0;padding:0px;mso-ignore:padding;color:black;font-size:11.0pt;font-weight:400;font-style:normal;text-decoration:none;font-family:Calibri, sans-serif;mso-font-charset:0;mso-number-format:General;text-align:general;vertical-align:bottom;border:none;mso-background-source:auto;mso-pattern:auto;mso-protection:locked visible;white-space:nowrap;mso-rotate:0;}';
        style = style + '.xl65{mso-style-parent:style0;text-align:center;vertical-align:middle;}';
        style = style + '.xl66{mso-style-parent:style0;color:white;font-weight:700;text-align:center;vertical-align:middle;border:.5pt solid windowtext;background:#0070C0;mso-pattern:black none;}';
        style = style + '.xl67{mso-style-parent:style0;text-align:center;vertical-align:middle;border:.5pt solid windowtext;}';
        style = style + '.xl68{mso-style-parent:style0;color:#444444;font-size:10.0pt;font-family:Arial, sans-serif;mso-font-charset:0;text-align:center;vertical-align:middle;border:.5pt solid windowtext;}';
        style = style + '.xl69{mso-style-parent:style0;color:black;font-size:10.0pt;font-family:Arial, sans-serif;mso-font-charset:0;text-align:center;vertical-align:middle;border:.5pt solid windowtext;}';
        style = style + '.xl70{mso-style-parent:style0;font-weight:700;text-align:right;vertical-align:middle;border-top:.5pt solid windowtext;border-right:none;border-bottom:none;border-left:none;}';
        style = style + '.xl71{mso-style-parent:style0;font-weight:700;text-align:right;vertical-align:middle;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:none;border-left:none;}';
        style = style + '.xl72{mso-style-parent:style0;mso-number-format:"Short Date";text-align:center;vertical-align:middle;border:.5pt solid windowtext;}';
        style = style + '.xl73{mso-style-parent:style0;mso-number-format:"0\.00\;\[Red\]0\.00";text-align:right;vertical-align:middle;}';
        style = style + '.xl74{mso-style-parent:style0;color:white;font-weight:700;mso-number-format:"0\.00\;\[Red\]0\.00";text-align:center;vertical-align:middle;border:.5pt solid windowtext;background:#203764;mso-pattern:black none;}';
        style = style + '.xl75{mso-style-parent:style0;color:black;font-size:10.0pt;font-family:Arial, sans-serif;mso-font-charset:0;mso-number-format:"0\.00\;\[Red\]0\.00";text-align:right;vertical-align:middle;border:.5pt solid windowtext;}';
        style = style + '.xl76{mso-style-parent:style0;font-weight:700;mso-number-format:"0\.00\;\[Red\]0\.00";text-align:right;vertical-align:middle;border-top:.5pt solid windowtext;border-right:.5pt solid windowtext;border-bottom:2.0pt double windowtext;border-left:.5pt solid windowtext;}';
        style = style + '</style>';

        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write('<title>Monthly Income Report</title>');
        win.document.write(style);
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write('<h1>Monthly Income Report : '+String(month)+'</h1>');
        win.document.write(header);
        win.document.write(dataTable);
        win.document.write(dataReport);
        win.document.write(footer);
        win.document.write('</body></html>');
        win.document.close();
        win.print();
    }


	function callJsonPDFMonthlyIncome(month) {
	    var formData = '{ "status" : "PAID", "month" : "'+month+'" }';
	    //console.log(formData);
	    var jsonData = jQuery.parseJSON(formData);
	    //console.log(jsonData);
	    //console.log('<?=$_DOMAIN?>api/json/viewReportOrder/');
	    $.ajax({
	          type        : 'POST',
	          contentType : "application/json; charset=utf-8",
	          url         : '<?=$_DOMAIN?>api/json/viewReportOrder/',
	          data        : JSON.stringify(jsonData),
	          dataType    : 'json',
	          encode      : false,
	          success: function (response, status, xhr) {
	            //console.log(response);
	            if((xhr.status==200) && (status=="success")){
	              if(response["error"]==false){
	              	if(parseInt(response["result"]["count"])!=0){
	                	createPDFMonthlyIncome(month, response["result"]["data"]);
	            	}else{ alert("No Report Data Found");}
	              }
	          	}
	          }
	      });
	    event.preventDefault();
	}

	function callJsonPDFForecastMonthlyIncome(month) {
	    var formData = '{ "status" : "DELIVERY", "month" : "'+month+'" }';
	    //console.log(formData);
	    var jsonData = jQuery.parseJSON(formData);
	    //console.log(jsonData);
	    //console.log('<?=$_DOMAIN?>api/json/viewReportOrder/');
	    $.ajax({
	          type        : 'POST',
	          contentType : "application/json; charset=utf-8",
	          url         : '<?=$_DOMAIN?>api/json/viewReportOrder/',
	          data        : JSON.stringify(jsonData),
	          dataType    : 'json',
	          encode      : false,
	          success: function (response, status, xhr) {
	            //console.log(response);
	            if((xhr.status==200) && (status=="success")){
	              if(response["error"]==false){
	              	if(parseInt(response["result"]["count"])!=0){
	                	createPDFMonthlyIncome(month, response["result"]["data"]);
	            	}else{ alert("No Report Data Found");}
	              }
	          	}
	          }
	      });
	    event.preventDefault();
	}
</script>
</html>
