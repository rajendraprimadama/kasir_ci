<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.btn-action', function(event){
            _page._logic(this)
        })
    })

    const _page= {
        _logic: (element) => {
            switch($(element).attr('data-action')) {
                case 'search':
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