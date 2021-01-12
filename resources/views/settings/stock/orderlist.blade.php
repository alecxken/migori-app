
 <table class="table table-bordered table-hover order-lists table-sm" id="">
        <thead class="bg-primary">
          <tr >
            <th class="text-center">
              #
            </th>
            <th class="text-center">
              Product
            </th>
            <th class="text-center">
              Quantity
            </th>
            <th></th>
           
          </tr>
        </thead>
        <tbody>
        <tr id='t0'>
            <td>
            1
            </td>
            <td>
            <select class="form-control input-sm" name="product[]" required=""><option value="">Choose Product</option>@if(!empty($prodct))@foreach($prodct as $prod)<option value="{{$prod->token}}">{{$prod->name}}</option>@endforeach @endif</select>
            </td>
            <td>
            <input type="number" name='qty[]' class="form-control input-sm"/>
            </td>
           </tr>

        
         

        </tbody>
         <tfoot>
        <tr>
            <td colspan="5" style="text-align: left;">
     <input type="button" class="btn btn-sm btn-block btn-success " id="addrows" value="Add More Items" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
      </table>
<script type="text/javascript">
    $(document).ready(function () {
    var counter = 2;

    $("#addrows").on("click", function () {
        var newRow = $("<tr id='t"+ counter +"'>");
        var cols = "";

        cols += '<td>'+ counter +'</td>';
        cols += '<td><select class="form-control input-sm" name="product[]" required=""><option value="">Choose Product</option>@if(!empty($prodct))@foreach($prodct as $prod)<option value="{{$prod->token}}">{{$prod->name}}</option>@endforeach @endif</select></td>';
        cols += '<td><input type="number" name="qty[]"  class="form-control input-sm"/></td>';

         cols += '<td><input type="button" class="ibtnDel btn btn-sm btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-lists").append(newRow);
        counter++;
    });



    $("table.order-lists").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="shareholder[]"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-lists").find('input[name^="shareholder[]"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
</script>