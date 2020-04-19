  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <div class="box">
    <div class="box-header">
      <div class="col-md-30">
        <section class="content">
          <div class="row">
            <div class="col-md-30">
              <!-- Custom Tabs -->
              <script src="<?php echo base_url(); ?>assets/bootstrap/js/typeahead.min.js"></script>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Jual Ecer</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Jual Grosir</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Retur Barang</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <form id="form-tambah-barang" class=" col-md-6" method="POST">

                      <div class="input-group form-group">
                        <span class="input-group-addon" id="sizing-addon2">
                          <i class="glyphicon glyphicon-tags"></i>
                        </span>
                        <input type="text" name="kode_brg" id="kode_brg" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" placeholder="kode barang">
                        <input type="text" name="kode_brg" id="kode_brg" class="typeahead tt-query form-control" autocomplete="off" spellcheck="false" placeholder="nama barang">
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data Barang</button>
                        </div>
                      </div>
                    </form>
                    <form id="form-tambah-barang" class=" col-md-6" method="POST">

                      <div class="input-group form-group">
                        <span class="input-group-addon" id="sizing-addon2">
                          <i class="glyphicon glyphicon-tags"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Nama Barang" name="Namabarang" aria-describedby="sizing-addon2">
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data Barang</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <script type="text/javascript" language="javascript">
            $( function() {
              /*$("#kode_brg").autocomplete('<?php echo site_url("Datatransaksi/item_search"); ?>',
              {
                minChars:0,
                max:100,
                delay:10,
                selectFirst: false,
                formatItem: function(row) {
                  alert("a")
                  return row[1];
                }
              });*/
              var availableTags = "";
              $("#sample_search").keyup(function () {
                var that = this,
                value = $(this).val();
                $.ajax({
                  type: "POST",
                  url: "",
                  datatype: "text",
                  data: {
                    'search_keyword' : value
                  },
                  success: function(data) {
                    alert(data);
                  }
                });

              });
              $( "#kode_brg" ).autocomplete({
                source: availableTags
              });
            } );

          </script>