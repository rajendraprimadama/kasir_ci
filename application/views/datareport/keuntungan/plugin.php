<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn-action', function(event){
            _page._logic(this)
        });

        $('.v_startdate').datepicker({

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
                    break;

                default:
                    myAlert('error','Action not declared')
                    break;
            }
        }
    }
</script>