<html>

<body>
    date :

    <?php
        $date = date('Y-m-d');
        $timestamp = strtotime($date);
        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        $year = date('Y', $timestamp);
        echo $year;
        echo $month;
        echo $day;

        $tanggal = $day."/".$month."/".$year;
    ?>
    <br>
    <span style="position: relative; display: inline-block;border: 1px solid #a9a9a9;height: 24px;">
        <input type="date" class="xDateContainer" onchange="setCorrect(this,'xTime');"style="position: absolute; opacity: 0.0;height: 100%;width: 100%;">
        <input type="text" id="xTime" name="xTime" value="<?= $tanggal ?>" style="border: none; height: 90%;" tabindex="-1">
            <span style="display: inline-block;width: 20px; z-index: 2; float: right; padding-top: 3px;" tabindex="-1">&#9660;</span>
            <br>
        <input type="date" name="" onchange="setvalue();" id="dateini">
        <input type="date" name="" id="dateitu">

    </span>
    <script language="javascript">
        
        function setvalue(){
            var dateini = document.getElementById("dateini").value;

            // document.getElementById("dateitu").value = dateini;
            console.log(dateini);
        }


        var matchEnterdDate = 0;
        //function to set back date opacity for non supported browsers
        window.onload = function () {
            var input = document.createElement('input');
            input.setAttribute('type', 'date');
            input.setAttribute('value', 'some text');
            if (input.value === "some text") {
                allDates = document.getElementsByClassName("xDateContainer");
                matchEnterdDate = 1;
                for (var i = 0; i < allDates.length; i++) {
                    allDates[i].style.opacity = "1";
                }
            }
        }
        //function to convert enterd date to any format
        function setCorrect(xObj, xTraget) {
            var date = new Date(xObj.value);
            var month = date.getMonth();
            var day = date.getDate();
            var year = date.getFullYear();
            var datm = month + 1;
            var lengthday = day.length;

            //cek jumlah hari 
            var lengthday = day.toString().length
            if (lengthday < 2) {
                daydate = '0' + day;
            } else {
                daydate = day;
            }

            // cek jumlah bulan
            var lengthmonth = datm.toString().length
            if (lengthmonth < 2) {
                daydmonth = '0' + datm;
            } else {
                daydmonth = datm;
            }

            var output =  year + "-" + daydmonth + "-" + daydate;

            // console.log(day);
            console.log(output);

            if (month != 'NaN') {
                // document.getElementById(xTraget).value = day + " / " + datm + " / " + year;
                document.getElementById(xTraget).value = daydate + "/" + daydmonth + "/" + year;
                document.getElementById("dateini").value = year + "-" + daydmonth + "-" + daydate;
            } else {
                if (matchEnterdDate == 1) { document.getElementById(xTraget).value = xObj.value; }
            }
        }
    </script>
</body>

</html>