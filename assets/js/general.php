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
</script>
