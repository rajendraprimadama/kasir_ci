<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn-action', function(event){
            _page._logic(this)
        });

        $('.v_startdate').datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-60:+1",
            minDate: new Date(),
            onClose: function () {
                $('.v_enddate').prop('readonly', true);
                $('.v_enddate').val(null);
                var minDate = $(this).datepicker('getDate');
                if (minDate) {
                    minDate.setDate(minDate.getDate() + 1) + minDate.getFullYear();
                }
                $('.v_enddate').datepicker('option', 'minDate', minDate || 1);

                $('.v_enddate').val(null);
            }
        });

        $('.v_enddate').datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: 1,
            onClose: function () {
                $('.v_startdate').datepicker('option', 'maxDate');
            }
        });

    });

    const _page= {
        _logic: (element) => {
            switch($(element).attr('data-action')) {
                case 'search':
                    if($('input[name=v_stardate]').val().length>0 || $('input[name=v_enddate]').val().length>0) {
                        let data = {
                            startdate: $('input[name=v_stardate]').val(),
                            enddate: $('input[name=v_enddate]').val()
                        }
                        $.ajax({
                            method: "POST",
                            url: "<?php echo base_url('Datareport/getData'); ?>",
                            data: data,
                            beforeSend: function(){
                                myLoad('start','.box-body');
                            }
                        })
                        .done(function(data) {
                            myLoad('end','.box-body');
                            $('.tbody-report').empty().html(data)
                        })
                    }
                    else {
                        myAlert('error', 'Pilih tanggal dulu')
                    }
                    break;

                case 'print':
                    break;

                default:
                    myAlert('error','Action not declared')
                    break;
            }
        }
    }
</script>