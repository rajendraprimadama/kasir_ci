<script type="text/javascript">
    function cekElement(param){
        if($(param).length > 0){
                return true;
            }
            return false
        }

        if (cekElement(".keyFontUp")){
            $('.keyFontUp').bind("keyup focusout", function () {
                this.value = this.value.toLocaleUpperCase();
            });
        }

        if (cekElement(".keyFontLow")){
            $('.keyFontLow').bind("keyup focusout", function () {
                this.value = this.value.toLocaleUpperCase();
            });
        }

        if (cekElement(".onlyNumber")){
            $('.onlyNumber').keypress(function(event) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
        }

        if (cekElement(".FormatKey")){
            $('.FormatKey').keyup(function(event){
                // Allow arrow keys & Period
                if (event.which >= 37 && event.which <= 40) return;
                // if(event.which == 190 || event.which == 110) return;

                // Format Number
                $(this).val(function(index, value)
                {
                    number = value.replace(/[^0-9'.']/g, "");
                    if (number.match(/\./g))
                    {
                        if (number.match(/\./g).length > 1) {
                            return;
                        }
                        else {
                            n = number.search(/\./);
                            numberSplit = number.substr(0, n);
                            firstNumber = numberSplit.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            lastNumber = number.substr(n, 3);
                            return firstNumber + lastNumber;
                        }
                    }
                    else {
                        return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }

                });
            });
        }

    function masking(arrParam=null){

        if(Array.isArray(arrParam)){

            if(jQuery.inArray('.keyFontUp', arrParam) !== -1 && cekElement(".keyFontUp")){
                $('.keyFontUp').bind("keyup focusout", function () {
                    this.value = this.value.toLocaleUpperCase();
                });
            }

            if(jQuery.inArray('.keyFontLow', arrParam) !== -1 && cekElement(".keyFontLow")){
                $('.keyFontLow').bind("keyup focusout", function () {
                    this.value = this.value.toLocaleUpperCase();
                });
            }

            if(jQuery.inArray('.onlyNumber', arrParam) !== -1 && cekElement(".onlyNumber")){
                $('.onlyNumber').keypress(function(event) {
                    $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
                });
            }

            if(jQuery.inArray('.FormatKey', arrParam) !== -1 && cekElement(".FormatKey")){
                $('.FormatKey').keyup(function(event){
                    // Allow arrow keys & Period
                    if (event.which >= 37 && event.which <= 40) return;
                    // if(event.which == 190 || event.which == 110) return;

                    // Format Number
                    $(this).val(function(index, value)
                    {
                        number = value.replace(/[^0-9'.']/g, "");
                        if (number.match(/\./g))
                        {
                            if (number.match(/\./g).length > 1) {
                                return;
                            }
                            else {
                                n = number.search(/\./);
                                numberSplit = number.substr(0, n);
                                firstNumber = numberSplit.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                lastNumber = number.substr(n, 3);
                                return firstNumber + lastNumber;
                            }
                        }
                        else {
                            return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }

                    });
                });
            }
        }
        else{

            if (cekElement(".keyFontUp")){
                $('.keyFontUp').bind("keyup focusout", function () {
                    this.value = this.value.toLocaleUpperCase();
                });
            }

            if (cekElement(".keyFontLow")){
                $('.keyFontLow').bind("keyup focusout", function () {
                    this.value = this.value.toLocaleUpperCase();
                });
            }

            if (cekElement(".onlyNumber")){
                $('.onlyNumber').keypress(function(event) {
                    $(this).val($(this).val().replace(/[^\d].+/, ""));
                    if ((event.which < 48 || event.which > 57)) {
                        event.preventDefault();
                    }
                });
            }

            if (cekElement(".FormatKey")){
                $('.FormatKey').keyup(function(event){
                    // Allow arrow keys & Period
                    if (event.which >= 37 && event.which <= 40) return;
                    // if(event.which == 190 || event.which == 110) return;

                    // Format Number
                    $(this).val(function(index, value)
                    {
                        number = value.replace(/[^0-9'.']/g, "");
                        if (number.match(/\./g))
                        {
                            if (number.match(/\./g).length > 1) {
                                return;
                            }
                            else {
                                n = number.search(/\./);
                                numberSplit = number.substr(0, n);
                                firstNumber = numberSplit.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                lastNumber = number.substr(n, 3);
                                return firstNumber + lastNumber;
                            }
                        }
                        else {
                            return number.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }

                    });
                });
            }
        }
    }

    function myAlert(type, message, url){
        if(url=="" || url=="undefined"){
            var url="";
        }

        if (typeof swal == 'undefined'){
            console.warn('Warning - sweet_alert.min.js is not loaded.');
            return;
        }

        // Defaults
        var setCustomDefaults = function(){
            swal.setDefaults({
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            });
        }
        setCustomDefaults();

        if (type == "success"){
            swal({
                // title: "Good job!",
                html: message,
                type: "success",
                allowOutsideClick: false,
                // showCloseButton: true
            }).then(function() {
                if(url){
                    window.location.href = url;
                }
            });
        }
        else if (type == "error" || type == "failed" || type == 'unauthorized'){
            swal({
                // title: "Oops...",
                html: message,
                type: "error",
                allowOutsideClick: false,
                // showCloseButton: true
            }).then(function() {
                if(url){
                    window.location.href = url;
                }
            });
        }
        else if (type == "info"){
            swal({
                // title: "For your information",
                html: message,
                type: "info",
                allowOutsideClick: false,
                // showCloseButton: true
            }).then(function() {
                if(url){
                    window.location.href = url;
                }
            });
        }
        else if (type == "warning"){
            swal({
                // title: "For your information",
                html: message,
                type: "warning",
                allowOutsideClick: false,
                // showCloseButton: true
            }).then(function() {
                if(url){
                    window.location.href = url;
                }
            });
        }
    }

    function FormatNumber(harga,desimal=0){
        harga=parseFloat(harga);
        harga=harga.toFixed(desimal);

        s = addSeparatorsNF(harga, '.', '.', ',');
        return s;
    }

    function addSeparatorsNF(nStr, inD, outD, sep){
        nStr += '';
        var dpos = nStr.indexOf(inD);
        var nStrEnd = '';
        if (dpos != -1) {
            nStrEnd = outD + nStr.substring(dpos + 1, nStr.length);
            nStr = nStr.substring(0, dpos);
        }
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(nStr)) {
            nStr = nStr.replace(rgx, '$1' + sep + '$2');
        }
        return nStr + nStrEnd;
    }

    if (cekElement(".datepicker-trans")){
        $( ".datepicker-trans" ).datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "-5:+10",
            autoClose: true
        });
    }
</script>
