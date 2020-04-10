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
</script>
