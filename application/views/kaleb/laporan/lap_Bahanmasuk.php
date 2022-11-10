  <div id="page-wrapper">
   <div class="row">
  <div class="col-md-4"></div>
    <div class="col-md-4">
      <ol class="breadcrumb"  style="width: 300px;">
       <li class="breadcrumb-item " >
        <h5> <strong>Laporan Data Bahan Masuk</strong></h5>
       </li>
      </ol>
    </div>
  </div>
  <br>
<div class="panel panel-default">
<div class="panel-body">
<div class="loader"></div>
    <div id="laporanPage">
            <form class="form-horizontal" method="post" action="<?= site_url('kaleb/laporan/cari_BahanMasuk')?>">

                <div class="row">
            <div class="col-md-4"></div>
        <div class="col-md-4">
                
                    <div class="form-group">
                        <label class="col-md-12"><b>Dari Tanggal</b></label>
                            <div class="col-md-8">
                                <input class="form-control" type="date" id="tglAwal" name="tglAwal">
                            </div>
                    </div>

                    <div class="form-group">              
                        <label class="col-md-12"><b>Sampai Tanggal</b></label>
                            <div class="col-md-8">
                        <input class="form-control" type="date" id="tglAkhir" name="tglAkhir">
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                    <div class="col-md-8"></div>
                        <div class="col-md-8">
                        <button id="btnCari" type="submit" class="btn btn-info btn-block"> <i class="fa fa-search"></i> Cari </button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>

<hr>
    <div class="col-lg-12">
        <div id="hasil"></div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
    $(function(){
        $("#btnCari").click(function() {
            var $form = $('#laporanPage').find('form'),
                $tglAwal = $("#tglAwal").val(),
                $tglAkhir = $("#tglAkhir").val(),
                $url = $form.attr('action');
            $.ajax({
                type: "POST",
                url: $url,
                dataType: "html",
                data: "tglAwal="+$tglAwal+"&tglAkhir="+$tglAkhir,
                cache:false,
                success: function(data){
                    $(".loader").fadeIn(500).fadeOut(500).queue(function(){
                        $('#hasil').html(data);
                    });
                }
            });
            return false;
        });
    });
</script>