<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn-action', function(event){
            _page._logic(this)
        });

        $('.v_startdate').datepicker({
<<<<<<< HEAD
            autoclose:true,
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            endDate: new Date(),
=======
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-5:+1",
            maxDate: new Date(),
>>>>>>> e028e507bf6ebc909ff7a577017c4df7014c3d5b
            onClose: function () {
                $('.v_enddate').prop('readonly', true);
                $('.v_enddate').val(null);
                var minDate = $(this).datepicker('getDate');
                if (minDate) {
<<<<<<< HEAD
                    minDate.setDate(minDate.getDate() + 1) + minDate.getFullYear();
                }
                $('.v_enddate').datepicker('option', 'startDate', minDate || 1);
=======
                    minDate.setDate(minDate.getDate()) + minDate.getFullYear();
                }
                $('.v_enddate').datepicker('option', 'minDate', minDate ||
                    1);
>>>>>>> e028e507bf6ebc909ff7a577017c4df7014c3d5b

                $('.v_enddate').val(null);
            }
        });

        $('.v_enddate').datepicker({
<<<<<<< HEAD
            autoclose:true,
            changeMonth: true,
            changeYear: true,
            endDate: new Date(),
=======
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            maxDate: new Date(),
>>>>>>> e028e507bf6ebc909ff7a577017c4df7014c3d5b
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
                            url: "<?php echo base_url('Datareport/getDataKeuntungan'); ?>",
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
<<<<<<< HEAD
=======
                    var printContents = document.getElementById('page-all-print').innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                    break;

                case 'export':
                    if($('input[name=v_stardate]').val().length==0) {
                        myAlert('error', 'PILIH TANGGAL AWAL')
                    }
                    else if($('input[name=v_enddate]').val().length==0){
                        myAlert('error', 'PILIH TANGGAL AKHIR')
                    }
                    else{
                        var data = {
                            startdate: $('input[name=v_stardate]').val(),
                            enddate: $('input[name=v_enddate]').val()
                        }

                        $.ajax({
                            method: "POST",
                            url: "<?php echo base_url('Datareport/exportExcelKeuntungan'); ?>",
                            data: data,
                            beforeSend: function(){
                                myLoad('start','.box-body');
                            }
                        })
                        .done(function(data) {
                            myLoad('end','.box-body');
                            var data = {
                                startdate: $('input[name=v_stardate]').val(),
                                enddate: $('input[name=v_enddate]').val()
                            }

                            window.open("<?php echo base_url(); ?>Datareport/exportExcelKeuntungan/"+data.startdate+"/"+data.enddate, '_blank');
                        })
                    }
>>>>>>> e028e507bf6ebc909ff7a577017c4df7014c3d5b
                    break;

                default:
                    myAlert('error','Action not declared')
                    break;
            }
        }
    }
</script>