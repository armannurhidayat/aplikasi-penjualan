<div class="col-sm-12">
  <p class="back-link"></p>
</div>

</div>

<script src="<?= base_url('assets') ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/autocomplete/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/js/chart.min.js"></script>
<script src="<?= base_url('assets') ?>/js/chart-data.js"></script>
<script src="<?= base_url('assets') ?>/js/easypiechart.js"></script>
<script src="<?= base_url('assets') ?>/js/easypiechart-data.js"></script>
<script src="<?= base_url('assets') ?>/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('assets') ?>/js/custom.js"></script>
<script src="<?= base_url('assets') ?>/js/customku.js"></script>

<!-- dataTables -->
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets') ?>/vendors/select2/dist/js/select2.min.js"></script>
<script>
	window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
	};
</script>

<script type="text/javascript">
    $(document).ready( function () {
        // Add
        var count = 1;
        $('#addTabel').click(function() {
            count = count + 1;
            var html_baris = `<tr id="baris` + count + `">`;
            html_baris += `<td width="20%"></td>`;
            html_baris += `<td width="30%">
				            <select name="barang[]" id="barang`+count+`" data-row=`+count+` class="form-control barang">
		                      <option value="">- Pilih -</option>
		                      <?php foreach($barang as $value): ?>
		                        <?php if ($value['stock_barang'] > 0): ?>
		                          <option value="<?= $value['id_barang'] ?>" stockbarang`+count+`="<?= $value['stock_barang'] ?>" hargabarang`+count+`="<?= $value['harga_barang'] ?>"><?= ucwords($value['nama_barang']) ?></option>
		                        <?php endif ?>
		                      <?php endforeach ?>
		                    </select>
            			  </td>`;
            html_baris += `<td width="10%">
				            <input type="number" name="jumlah[]" id="jumlah`+count+`" value="1" min="1" class="form-control jumlah">
            			  </td>`;
			html_baris += `<td width="10%">
            				<input type="text" name="stock" id="stockbarang`+count+`" class="form-control" readonly="">
						  </td>`;
			html_baris += `<td width="20%">
							<input type="text" name="harga" id="hargabarang`+count+`" class="form-control" readonly="">
						   </td>`;
			html_baris += `<td width="20%">
							<input type="text" name="subtotal" id="subtotal`+count+`" class="form-control subtotal" readonly="">
						   </td>`;
	        html_baris += `<td class="text-center" width="20%">
					        <button type="button" name="remove" data-row="baris`+ count + `" class="btn btn-danger remove"><i class="fa fa-trash"></i></button>
	        			   </td>`;
	        html_baris += "</tr>";
	        $('#table-transaksi').append(html_baris);
        });

        // Remove
        $(document).on('click', '.remove', function() {
	        var delete_row = $(this).data("row");
	        $('#' + delete_row).remove();
	    });

	    $(document).on('change', '.barang', function() {
	    	var baris = $(this).data('row');
	    	let harga = $('#barang'+baris+' option:selected').attr('hargabarang'+baris);
	    	let stock = $('#barang'+baris+' option:selected').attr('stockbarang'+baris);
	        let jumlah = $('#jumlah'+baris).val();

	        $('#hargabarang'+baris).val(harga);
	        $('#stockbarang'+baris).val(stock);
	        let subtotal = parseInt(harga) * parseInt(jumlah);

	        //Grand total
	        $('#subtotal'+baris).val(subtotal)

	        //Insert Array
	        var array = [];
	        $('.subtotal').each(function(){
	            array.push($(this).val());
	        });

	        // Menjumlahkan Array
	        var grand_total = parseInt($('#subtotal1').val()); //Mengambil value dari subtotal pertama
	        for (var i=1; i < array.length; i++) {
	        	grand_total += array[i] << 0;
	        }
	        $('#grand_total').val(grand_total); //Grand total
	    });

	    // Save
	    $('#saveTabel').on('click',function(){
	        var struk      		= $('#no_struk').val()
	        var tanggal     	= $('#tanggal').val()
	        var id_pelanggan    = $('#id_pelanggan').val()
	        var grand_total    	= $('#grand_total').val()
	        var jumlah     	 	= []
	        var barang 			= []

	        $('.jumlah').each(function(){
	            jumlah.push($(this).val());
	        });

	        $('.barang').each(function(){
	            barang.push($(this).val());
	        });

	        $.ajax({
	            method  : "GET",
	            url     : "<?= base_url('admin/transaksi/insertPenjualan') ?>",
	            data    : { struk:struk, tanggal:tanggal, id_pelanggan:id_pelanggan, jumlah:jumlah, barang:barang, grand_total:grand_total },
	            success:function(data) {
	                alert(data);
	                window.location.replace('<?= base_url('admin/transaksi') ?>')
	            }
	        });
	    });

    });
</script>

</body>
</html>