<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn-action', function(event){
            _page._logic(this)
        });

        $('.v_startdate').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-5:+1",
            maxDate: new Date(),
            onClose: function () {
                $('.v_enddate').prop('readonly', true);
                $('.v_enddate').val(null);
                var minDate = $(this).datepicker('getDate');
                if (minDate) {
                    minDate.setDate(minDate.getDate()) + minDate.getFullYear();
                }
                $('.v_enddate').datepicker('option', 'minDate', minDate ||
                    1);

                $('.v_enddate').val(null);
            }
        });

        $('.v_enddate').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
            onClose: function () {
                $('.v_startdate').datepicker('option', 'maxDate');
            }
        });

    });

    const _page= {
        _logic: (element) => {
            switch($(element).attr('data-action')) {
                case 'search':
                    if($('input[name=v_stardate]').val().length==0) {
                        myAlert('error', 'PILIH TANGGAL AWAL')
                    }
                    else if($('input[name=v_enddate]').val().length==0){
                        myAlert('error', 'PILIH TANGGAL AKHIR')
                    }
                    else{
                        let data = {
                            startdate: $('input[name=v_stardate]').val(),
                            enddate: $('input[name=v_enddate]').val()
                        }
                        $.ajax({
                            method: "POST",
                            url: "<?php echo base_url('Datareport/getDataPenjualan'); ?>",
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
                    
                    break;

                case 'print':
                    var printContents = document.getElementById('page-all-print').innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                    break;

                default:
                    myAlert('error','Action not declared')
                    break;
            }
        }
    }
</script>