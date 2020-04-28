<?php $i = 1; 
                        //print_r($this->cart->contents());
?>

<?php foreach ($this->cart->contents() as $items): ?>
  <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
  <td><?=$items['id'];?></td>
  <td><?=$items['name'];?></td>
  <td style="text-align:center;"><?=$items['satuan'];?></td>
  <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
  <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
  <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>

  <td style="text-align:center;"><a href="<?php echo base_url().'Datatransaksi/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
</tr>

<?php $i++; ?>
<?php endforeach; ?>

<script type="text/javascript">
  var total2 = '<?php echo number_format($this->cart->total());?>';
  var total = '<?php echo $this->cart->total();?>';
</script>
