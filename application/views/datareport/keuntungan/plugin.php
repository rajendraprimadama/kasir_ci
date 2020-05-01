<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn-action', function(event){
            _page.logic(this)
        });

        _page.component()

    });

    const _page= {
        logic: (element) => {
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
                        .done(function(response) {
                            myLoad('end','.box-body');
                            respon = JSON.parse(response);
                            $('.tbody-report').empty().html(respon.table_list)

                            $('.v_startdate_show').val(respon.startdate)
                            $('.v_enddate_show').val(respon.enddate)
                            $('#label_tanggal').removeClass('hidden').empty().html(`<td class="text-center" colspan="100%"><strong>${respon.startdate_show}</strong> s/d <strong>${respon.enddate_show}</strong></td>`)
                            if(respon.count_data > 0) {
                                $('.div-print-export').removeClass('hidden')
                            }else {
                                $('.div-print-export').addClass('hidden')
                            }
                        })
                    }
                    
                    break;

                case 'print':
                    var printContents = document.getElementById('page-all-print').innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;

                    _page.component()
                    break;

                case 'export':
                    
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
                    break;

                default:
                    myAlert('error','Action not declared')
                    break;
            }
        },

        component: () => {
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
        }
    }
</script>